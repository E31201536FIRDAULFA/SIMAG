<?php

namespace App\Controllers;

use App\Models\AbsenModel;
use App\Models\NilaiModel;
use App\Models\AktivitasModel;
use App\Models\UserModel;
use App\Models\InfoPesertaModel;
use CodeIgniter\API\ResponseTrait;

class Peserta extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {
        session();
    }

    public function index()
    {
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('templates/topbar');
        echo view('peserta/peserta.php');
        echo view('templates/footer');
    }

    public function addAbsen()
    {
        date_default_timezone_set('Asia/Jakarta');
        $dateNow = strtotime(date('Y-m-d'));
        $timeNow = strtotime(date('H:i:s'));

        $pagi = [strtotime('04:00:00'), strtotime('12:00:00')];
        $sore = [strtotime('12:01:00'), strtotime('17:00:00')];

        $user = session()->userId;
        $absenModel = new AbsenModel();
        $absen = $absenModel->where('date', date('Y-m-d'))->where('user_id', $user)->get()->getRowArray();
        if ($timeNow > $pagi[0] && $timeNow < $pagi[1]) {
            if (!$absen) {
                $absenModel->insert([
                    'user_id' => $user,
                    'date' => date('Y-m-d'),
                    'datang' => date('H:i:s'),
                ]);
                return $this->respond([
                    'type' => 1,
                    'message' => 'absen pagi'
                ]);
            } else {
                return $this->respond([
                    'type' => 3,
                    'message' => 'sudah absen pagi'
                ]);
            }
        }

        if ($timeNow > $sore[0] && $timeNow < $sore[1]) {
            if ($absen) {
                if ($absen['pulang'] == '00:00:00') {
                    $absenModel->set('pulang', date('H:i:s'))->where('id', $absen['id'])->where('user_id', $user)->update();
                    return $this->respond([
                        'type' => 2,
                        'message' => 'absen sore'
                    ]);
                } else {
                    $absenModel->set('pulang', date('H:i:s'))->where('id', $absen['id'])->where('user_id', $user)->update();
                    return $this->respond([
                        'type' => 4,
                        'message' => 'anda sudah absen sore'
                    ]);
                }
            } else {
                $absenModel->insert([
                    'user_id' => $user,
                    'date' => date('Y-m-d'),
                    'pulang' => date('H:i:s'),
                ]);
                return $this->respond([
                    'type' => 2,
                    'message' => 'absen sore'
                ]);
            }
        }

        if (!$absen) {
            return $this->respond([
                'type' => 5,
                'message' => 'anda terlambat',
                $absen
            ]);
        } else {
            return $this->respond([
                'type' => 6,
                'message' => 'anda sudah absen hari ini'
            ]);
        }
    }

    public function addLokasi()
    {
        date_default_timezone_set('Asia/Jakarta');
        $user = session()->userId;
        $absenModel = new AbsenModel();
        $absen = $absenModel->where('date', date('Y-m-d'))->where('user_id', $user)->get()->getRowArray();
        $lokasi = [
            'latitude' => $this->request->getPost('latitude'),
            'longitude' => $this->request->getPost('longitude')
        ];
        $absenModel->where('date', date('Y-m-d'))->where('user_id', $user)->set('latitude', $this->request->getPost('latitude'))->set('longitude', $this->request->getPost('longitude'))->update();

        return $this->respond([
            'latitude' => $this->request->getPost('latitude'),
            'longitude' => $this->request->getPost('longitude')
        ]);
    }

    public function getAbsen()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d');
        $user = session()->userId;
        $absenModel = new AbsenModel();
        $respond = $absenModel->where('date', $date)->where('user_id', $user)->get()->getRowArray();
        if ($respond) {
            return $this->respond($respond);
        }
        return $this->respond([]);
    }

    public function getAbsenKoordinat($id)
    {
        $absenModel = new AbsenModel();
        $respond = $absenModel->where('id', $id)->get()->getRowArray();
        if ($respond) {
            return $this->respond($respond);
        }
        return $this->respond([]);
    }

    public function getKehadiran()
    {
        $user = session()->userId;
        $absenModel = new AbsenModel();
        $absen = $absenModel->where('user_id', $user)->countAllResults();
        $terlambat = $absenModel->where('user_id', $user)->where('datang>', date('07:30:00'),)->countAllResults();
        $data = [
            'absen' => $absen,
            'terlambat' => $terlambat
        ];
        //kirim ke js
        return $this->respond($data);
    }

    public function dataAbsen()
    {
        $absenModel = new AbsenModel();
        $user = session()->userId;
        $absen = $absenModel->where('user_id', $user)->get()->getResultArray();

        $data = [
            'absen' => $absen
        ];

        echo view('templates/header', $data);
        echo view('templates/sidebar');
        echo view('templates/topbar');
        echo view('peserta/absensi.php');
        echo view('templates/footer');
    }

    public function detailAbsen($id)
    {
        $absenModel = new AbsenModel();
        $absen = $absenModel->where('id', $id)->first();
        $data = [
            'absen' => $absen
        ];
        echo view('templates/header', $data);
        echo view('templates/sidebar');
        echo view('templates/topbar');
        echo view('peserta/detailAbsen.php');
        echo view('templates/footer');
    }
    public function dataAktivitas()
    {
        $aktivitasModel = new AktivitasModel();
        $user = session()->userId;
        $aktivitas = $aktivitasModel->where('userId', $user)->get()->getResultArray();
        $setuju = $aktivitasModel->where('userId', $user)->where('status', 2)->get()->getResultArray();
        $tdksetuju = $aktivitasModel->where('userId', $user)->where('status', 3)->get()->getResultArray();
        $blmsetuju = $aktivitasModel->where('userId', $user)->where('status', 0)->get()->getResultArray();

        $data = [
            'aktivitas' => $aktivitas,
            'setuju' => $setuju,
            'tdksetuju' => $tdksetuju,
            'blmsetuju' => $blmsetuju
        ];
        echo view('templates/header', $data);
        echo view('templates/sidebar');
        echo view('templates/topbar');
        echo view('peserta/aktivitasharian.php');
        echo view('templates/footer');
    }

    public function tambahAktivitas()
    {
        $user = session()->userId;
        if (isset($_POST['submit'])) {
            if (!$this->validate([
                'date' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'Masukkan tanggal aktivitas dilakukan']
                ],
                'mulai'    => [
                    'rules' => 'required',
                    'errors' => ['required' => 'Masukkan jam mulai aktivitas']
                ],
                'selesai' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'Masukkan jam selesai aktivitas']
                ],
                'keterangan' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'Masukkan detail aktivitas']
                ]
            ])) {
                session()->setFlashdata('failed', 'Maaf! Terdapat kesalahan dalam pengisian data.');
                return redirect()->to(base_url('Peserta/tambahAktivitas'))->withInput();
            }
            $aktivitas = [
                'userId' => $user,
                'date' => $this->request->getPost('date'),
                'mulai' => $this->request->getPost('mulai'),
                'selesai' => $this->request->getPost('selesai'),
                'keterangan' => $this->request->getPost('keterangan'),
                'status' => 0
            ];
            $aktivitasModel = new AktivitasModel();
            $aktivitasModel->save($aktivitas);
            session()->setFlashdata('success', 'Sukses! Laporan aktivitas harian berhasil ditambahkan.');
            return redirect()->to(base_url('Peserta/dataAktivitas'));
        }
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('templates/topbar');
        echo view('peserta/tambahaktivitas.php');
        echo view('templates/footer');
    }

    public function editAktivitas($id)
    {
        $aktivitasModel = new AktivitasModel();
        $data = $aktivitasModel->find($id);
        if (isset($_POST['submit'])) {
            if (!$this->validate([
                'date' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'Masukkan tanggal kegiatan dilakukan']
                ],

                'mulai'    => [
                    'rules' => 'required',
                    'errors' => ['required' => 'Masukkan jam mulai kegiatan']
                ],
                'selesai' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'Masukkan jam selesai kegiatan']
                ],
                'keterangan' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'Masukkan detail kegiatan']
                ]

            ])) {
                session()->setFlashdata('failed', 'Maaf! Terdapat kesalahan dalam pengisian data.');
                return redirect()->to(base_url('Peserta/editAktivitas/' . $id))->withInput();
            }
            $aktivitas = [
                'date' => $this->request->getPost('date'),
                'mulai' => $this->request->getPost('mulai'),
                'selesai' => $this->request->getPost('selesai'),
                'keterangan' => $this->request->getPost('keterangan'),
                'status' => 0
            ];
            $aktivitasModel->update($id, $aktivitas);
            session()->setFlashdata('success', 'Sukses! Laporan aktivitas harian berhasil diubah.');
            return redirect()->to(base_url('Peserta/dataAktivitas'));
        }
        echo view('templates/header', $data);
        echo view('templates/sidebar');
        echo view('templates/topbar');
        echo view('peserta/editaktivitas.php');
        echo view('templates/footer');
    }

    public function hapusAktivitas($id)
    {
        $aktivitasModel = new AktivitasModel();
        $aktivitasModel->where('id', $id)->delete();
        return redirect()->to(base_url('Peserta/dataAktivitas'));
    }

    public function Profil()
    {
        $id = session()->userId;
        $userModel = new UserModel();
        $user = $userModel->join('info_peserta', 'user.id=info_peserta.userId')->where('info_peserta.userId', $id)->first();
        $data = [
            'user' => $user
        ];
        $infoModel = new InfoPesertaModel();
        $info = $infoModel->where('userId', $id)->first();
        if (isset($_POST['submit'])) {
            if (!$this->validate([
                'foto' => [
                    'uploaded[foto]',
                    'mime_in[foto,image/jpg,image/jpeg,image/png]',
                    'max_size[foto,1024]',
                    'errors' => [
                        'uploaded' => 'Anda belum memilih foto',
                        'mime_in' => 'Foto harus berformat jpg/jpeg/png',
                        'max_size' => 'Ukuran maksimal foto 1MB'
                    ]
                ],
            ])) {
                return redirect()->to(base_url('Peserta/Profil'))->withInput();
            }
            $avatar = $this->request->getFile('foto');
            $randomname = $avatar->getRandomName();
            $avatar->move(ROOTPATH . 'public/assets/fotoprofil/' . $id, $randomname);
            $profil = [
                'foto' => '/assets/fotoprofil/' . $id . '/' . $randomname
            ];
            $infoModel->update($info['id'], $profil);

            return redirect()->to(base_url('Peserta/Profil'));
        }
        echo view('templates/header', $data);
        echo view('templates/sidebar');
        echo view('templates/topbar');
        echo view('peserta/profil');
        echo view('templates/footer');
    }
}
