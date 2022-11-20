<?php

namespace App\Controllers;


use App\Models\UserModel;
use App\Models\AbsenModel;
use App\Models\AktivitasModel;
use CodeIgniter\API\ResponseTrait;
use App\Models\InfoPesertaModel;

class Admin extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $aktivitasModel = new AktivitasModel();
        $userModel = new UserModel();
        $pesertaAktif = $userModel->where('role', 3)->where('status', 2)->join('info_peserta', 'user.id=info_peserta.userId')
            ->where('info_peserta.endDate>', date('Y-m-d'))->countAllResults();
        $pesertaDeaktif = $userModel->where('role', 3)->where('status', 2)->join('info_peserta', 'user.id=info_peserta.userId')
            ->where('info_peserta.endDate<=', date('Y-m-d'))->countAllResults();
        $pendaftar = $userModel->where('role', 3)->where('status', 1)->countAllResults();
        $pembimbing = $userModel->where('role', 2)->countAllResults();
        $admin = $userModel->where('role', 1)->countAllResults();
        $belumsetuju = $aktivitasModel->select('aktivitas.id as acid, aktivitas.*,user.*')->join('user', 'aktivitas.userId=user.id')->where('aktivitas.status', 0)->countAllResults();
        $setuju = $aktivitasModel->join('user', 'aktivitas.userId=user.id')->where('aktivitas.status', 1)->get()->getResultArray();

        $data = [
            'pesertaAktif' => $pesertaAktif,
            'pesertaDeaktif' => $pesertaDeaktif,
            'pembimbing' => $pembimbing,
            'pendaftar' => $pendaftar,
            'belumsetuju' => $belumsetuju,
            'admin' => $admin
        ];


        echo view('templates/header', $data);
        echo view('templates/sidebarAdmin');
        echo view('templates/topbar');
        echo view('admin/admin');
        echo view('templates/footer');
    }

    // Data pembimbing
    public function dataPembimbing()
    {
        $userModel = new UserModel();
        $detail = $userModel->where('role', 1)->orWhere('role', 2)->get()->getResultArray();

        $data = [
            'detail' => $detail
        ];

        echo view('templates/header', $data);
        echo view('templates/sidebarAdmin');
        echo view('templates/topbar');
        echo view('admin/datapembimbing.php');
        echo view('templates/footer');
    }

    public function tambahPembimbing()
    {
        $user = session()->userId;
        if (isset($_POST['submit'])) {
            if (!$this->validate([
                'nama' => [
                    'rules' => 'required', 'errors' => ['required' => 'nama harus diisi']
                ],
                'JK' => [
                    'rules' => 'required', 'errors' => ['required' => 'Jenis Kelamin harus diisi']
                ],
                'role' => [
                    'rules' => 'required', 'errors' => ['required' => 'Peran harus diisi']
                ],
                'tglLahir' => [
                    'rules' => 'required', 'errors' => ['required' => 'tanggal lahir harus diisi']
                ],
                'email'    => [
                    'required', 'valid_email', 'errors' => ['required' => 'email harus diisi', 'valid_email' => 'email tidak valid']
                ]
            ])) {
                session()->setFlashdata('failed', 'Maaf! Terdapat kesalahan dalam pengisian data.');
                return redirect()->to(base_url('Admin/tambahPembimbing'))->withInput();
            }

            $data = [
                'nama' => $this->request->getPost('nama'),
                'jenisKelamin' => $this->request->getPost('JK'),
                'tglLahir' => $this->request->getPost('tglLahir'),
                'email' => $this->request->getPost('email'),
                'role' => $this->request->getPost('role'),
                'status' => 1
            ];
            $userModel = new UserModel();
            $userModel->save($data);
            session()->setFlashdata('success', 'Sukses! Anda berhasil menambahkan data.');
            return redirect()->to(base_url('Admin/dataPembimbing'));
        }
        echo view('templates/header');
        echo view('templates/sidebarAdmin');
        echo view('templates/topbar');
        echo view('admin/tambahPembimbing');
        echo view('templates/footer');
    }

    public function editPembimbing($id)
    {
        $userModel = new UserModel();
        $data = $userModel->find($id);
        if (isset($_POST['submit'])) {
            if (!$this->validate([
                'nama' => [
                    'rules' => 'required', 'errors' => ['required' => 'nama harus diisi']
                ],
                'JK' => [
                    'rules' => 'required', 'errors' => ['required' => 'Jenis Kelamin harus diisi']
                ],
                'tglLahir' => [
                    'rules' => 'required', 'errors' => ['required' => 'tanggal lahir harus diisi']
                ],
                'email'    => [
                    'required', 'valid_email', 'errors' => ['required' => 'email harus diisi', 'valid_email' => 'email tidak valid']
                ]
            ])) {
                session()->setFlashdata('failed', 'Maaf! Terdapat kesalahan dalam pengisian data.');
                return redirect()->to(base_url('Admin/editPembimbing/' . $id))->withInput();
            }
            $data = [
                'nama' => $this->request->getPost('nama'),
                'jenisKelamin' => $this->request->getPost('JK'),
                'tglLahir' => $this->request->getPost('tglLahir'),
                'email' => $this->request->getPost('email'),
            ];
            $userModel->update($id, $data);
            session()->setFlashdata('success', 'Sukses! Anda berhasil mengubah data.');
            return redirect()->to(base_url('Admin/dataPembimbing'));
        }

        echo view('templates/header', $data);
        echo view('templates/sidebarAdmin');
        echo view('templates/topbar');
        echo view('admin/editpembimbing');
        echo view('templates/footer');
    }

    public function hapusPembimbing($id)
    {
        $userModel = new UserModel();
        $userModel->where('id', $id)->delete();
        return redirect()->to(base_url('Admin/dataPembimbing'));
    }

    // Data peserta
    public function dataPeserta()
    {
        $userModel = new UserModel();
        $aktif = $userModel->where('role', 3)->where('status', 2)->join('info_peserta', 'user.id=info_peserta.userId')
            ->where('info_peserta.endDate>', date('Y-m-d'))->get()->getResultArray();
        $deaktif = $userModel->where('role', 3)->where('status', 2)->join('info_peserta', 'user.id=info_peserta.userId')
            ->where('info_peserta.endDate<=', date('Y-m-d'))->get()->getResultArray();
        $pendaftar = $userModel->where('role', 3)->join('info_peserta', 'user.id=info_peserta.userId')
            ->where('status', 1)->get()->getResultArray();

        $data = [
            'pendaftar' => $pendaftar,
            'aktif' => $aktif,
            'deaktif' => $deaktif,
        ];

        echo view('templates/header', $data);
        echo view('templates/sidebarAdmin');
        echo view('templates/topbar');
        echo view('admin/datapeserta.php');
        echo view('templates/footer');
    }

    public function terimaPeserta($id)
    {
        $userModel = new UserModel();
        $data = [
            'status' => 2
        ];
        $userModel->update($id, $data);
        return redirect()->to(base_url('Admin/dataPeserta'));
    }

    public function hapusPeserta($id)
    {
        $userModel = new UserModel();
        $userModel->where('id', $id)->delete();
        return redirect()->to(base_url('Admin/dataPeserta'));
    }

    public function detailPeserta($id)
    {
        $userModel = new UserModel();
        $user = $userModel->join('info_peserta', 'user.id=info_peserta.userId')->where('info_peserta.userId', $id)->first();
        $data = [
            'user' => $user
        ];
        echo view('templates/header', $data);
        echo view('templates/sidebarAdmin');
        echo view('templates/topbar');
        echo view('admin/detailpeserta');
        echo view('templates/footer');
    }

    // Data Absensi
    public function dataAbsen()
    {
        $absenModel = new AbsenModel();
        $absen = $absenModel->select('absen.id as acid, absen.*,user.*')->join('user', 'absen.user_id=user.id')->get()->getResultArray();

        $data = [
            'absen' => $absen
        ];

        echo view('templates/header', $data);
        echo view('templates/sidebarAdmin');
        echo view('templates/topbar');
        echo view('admin/dataabsen');
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
        echo view('templates/sidebarAdmin');
        echo view('templates/topbar');
        echo view('admin/detailAbsen.php');
        echo view('templates/footer');
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
    // Data Laporan Aktivitas Harian
    public function dataAktivitas()
    {
        $aktivitasModel = new AktivitasModel();
        $setuju = $aktivitasModel->join('user', 'aktivitas.userId=user.id')->where('aktivitas.status', 1)->get()->getResultArray();
        $belumsetuju = $aktivitasModel->join('user', 'aktivitas.userId=user.id')->where('aktivitas.status', 0)->get()->getResultArray();

        $data = [
            'setuju' => $setuju,
            'belumsetuju' => $belumsetuju
        ];

        echo view('templates/header', $data);
        echo view('templates/sidebarAdmin');
        echo view('templates/topbar');
        echo view('admin/dataaktivitas.php');
        echo view('templates/footer');
    }
    // Buka file proposal
    public function bukaProposal($id)
    {
        $infoPeserta = new InfoPesertaModel();
        $file = $infoPeserta->where('id', $id)->get()->getRow();
        $data = [
            'link' => $file->proposal
        ];
        echo view('templates/header', $data);
        echo view('templates/topbar');
        echo view('templates/file.php');
        echo view('templates/footer');
    }

    // Buka file pengantar
    public function bukaPengantar($id)
    {
        $infoPeserta = new InfoPesertaModel();
        $file = $infoPeserta->where('id', $id)->get()->getRow();
        $data = [
            'link' => $file->pengantar
        ];
        echo view('templates/header', $data);
        echo view('templates/topbar');
        echo view('templates/file.php');
        echo view('templates/footer');
    }
}
