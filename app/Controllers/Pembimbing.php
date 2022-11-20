<?php

namespace App\Controllers;

use App\Models\AktivitasModel;
use App\Models\UserModel;
use App\Models\AbsenModel;
use App\Models\InfoPesertaModel;
use App\Models\NilaiModel;
use CodeIgniter\API\ResponseTrait;
use Google\Service\AdExchangeBuyerII\Proposal;
use Dompdf\Dompdf;
use Rector\Core\NodeManipulator\FuncCallManipulator;

class Pembimbing extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $userModel = new UserModel();
        $aktivitasModel = new AktivitasModel();
        $nilaimodel = new NilaiModel();
        $nilai = $nilaimodel->findAll();

        $report = $nilaimodel->first();
        $pesertaAktif = $userModel->where('role', 3)->where('status', 2)->join('info_peserta', 'user.id=info_peserta.userId')
            ->where('info_peserta.endDate>', date('Y-m-d'))->countAllResults();
        $pendaftar = $userModel->where('role', 3)->where('status', 1)->countAllResults();
        $belumsetuju = $aktivitasModel->select('aktivitas.id as acid, aktivitas.*,user.*')->join('user', 'aktivitas.userId=user.id')->where('aktivitas.status', 0)->countAllResults();
        $setuju = $aktivitasModel->select('aktivitas.id as acid, aktivitas.*,user.*')->join('user', 'aktivitas.userId=user.id')->where('aktivitas.status', 2)->countAllResults();
        $riwayat = $userModel->where('role', 3)->where('status', 2)->join('info_peserta', 'user.id=info_peserta.userId')->countAllResults();
        $daftar = $userModel->limit(10)->where('role', 3)->join('info_peserta', 'user.id=info_peserta.userId')
            ->where('status', 0)->get()->getResultArray();
        $aktivitas = $aktivitasModel->limit(10)->select('aktivitas.id as acid, aktivitas.*,user.*')->join('user', 'aktivitas.userId=user.id')->where('aktivitas.status', 0)->get()->getResultArray();
        $pesAktif = $userModel->where('role', 3)->where('status', 2)->join('info_peserta', 'user.id=info_peserta.userId')
            ->where('info_peserta.endDate>', date('Y-m-d'))->get()->getResultArray();;
        $peserta = $userModel->where('role', 3)->where('status', 2)->join('info_peserta', 'user.id=info_peserta.userId')->get()->getResultArray();;

        $data = [
            'pendaftar' => $pendaftar,
            'laporan' => $belumsetuju,
            'aktif' => $pesertaAktif,
            'riwayat' => $riwayat,
            'daftar' => $daftar,
            'aktivitas' => $aktivitas,
            'pesAktif' => $pesAktif,
            'peserta' => $peserta,
            'nilai' => $nilai,
            'report' => $report
        ];

        echo view('templates/header', $data);
        echo view('templates/sidebarPembimbing');
        echo view('templates/topbar');
        echo view('pembimbing/pembimbing.php');
        echo view('templates/footer');
    }

    // Data peserta
    public function dataPeserta()
    {
        $userModel = new UserModel();
        $aktif = $userModel->where('role', 3)->where('status', 2)->get()->getResultArray();
        $deaktif = $userModel->where('role', 3)->where('status', 3)->get()->getResultArray();
        $pendaftar = $userModel->where('role', 3)->where('status', 1)->get()->getResultArray();

        $data = [
            'pendaftar' => $pendaftar,
            'aktif' => $aktif,
            'deaktif' => $deaktif,
        ];

        echo view('templates/header', $data);
        echo view('templates/sidebarPembimbing');
        echo view('templates/topbar');
        echo view('pembimbing/datapeserta.php');
        echo view('templates/footer');
    }

    public function terimaPeserta($id)
    {
        $userModel = new UserModel();
        $data = [
            'status' => 2
        ];
        $userModel->update($id, $data);
        return redirect()->to(base_url('Pembimbing/dataPeserta'));
    }

    public function hapusPeserta($id)
    {
        $userModel = new UserModel();
        $userModel->where('id', $id)->delete();
        return redirect()->to(base_url('Pembimbing/dataPeserta'));
    }

    public function terimaPesertaDash($id)
    {
        $userModel = new UserModel();
        $data = [
            'status' => 2
        ];
        $userModel->update($id, $data);
        return redirect()->to(base_url('Pembimbing'));
    }

    public function hapusPesertaDash($id)
    {
        $userModel = new UserModel();
        $userModel->where('id', $id)->delete();
        return redirect()->to(base_url('Pembimbing'));
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
        echo view('templates/sidebarPembimbing');
        echo view('templates/topbar');
        echo view('pembimbing/dataabsen.php');
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
        echo view('templates/sidebarPembimbing');
        echo view('templates/topbar');
        echo view('pembimbing/detailAbsen.php');
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
        $setuju = $aktivitasModel->select('aktivitas.id as acid, aktivitas.*,user.*')->join('user', 'aktivitas.userId=user.id')->where('aktivitas.status', 2)->get()->getResultArray();
        $belumsetuju = $aktivitasModel->select('aktivitas.id as acid, aktivitas.*,user.*')->join('user', 'aktivitas.userId=user.id')->where('aktivitas.status', 0)->get()->getResultArray();

        $data = [
            'setuju' => $setuju,
            'belumsetuju' => $belumsetuju
        ];
        echo view('templates/header', $data);
        echo view('templates/sidebarPembimbing');
        echo view('templates/topbar');
        echo view('pembimbing/dataaktivitas.php');
        echo view('templates/footer');
    }

    public function terimaAktivitas($id)
    {
        $aktivitasModel = new AktivitasModel();
        $data = [
            'status' => 2
        ];
        $aktivitasModel->update($id, $data);
        return redirect()->to(base_url('Pembimbing/dataAktivitas'));
    }

    public function hapusAktivitas($id)
    {
        $aktivitasModel = new AktivitasModel();
        $data = [
            'status' => 3
        ];
        $aktivitasModel->update($id, $data);
        return redirect()->to(base_url('Pembimbing/dataAktivitas'));
    }
    public function terimaAktivitasDash($id)
    {
        $aktivitasModel = new AktivitasModel();
        $data = [
            'status' => 1
        ];
        $aktivitasModel->update($id, $data);
        return redirect()->to(base_url('Pembimbing'));
    }

    public function hapusAktivitasDash($id)
    {
        $aktivitasModel = new AktivitasModel();
        $data = [
            'status' => 3
        ];
        $aktivitasModel->update($id, $data);
        return redirect()->to(base_url('Pembimbing'));
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

    public function nilai($id = null)
    {
        $nilaimodel = new NilaiModel();
        if (isset($_POST['submit'])) {
            if (!$this->validate([
                'pengetahuan' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'Masukkan tanggal aktivitas dilakukan']
                ],
                'keterampilan' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'Masukkan jam mulai aktivitas']
                ],
                'kemampuan' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'Masukkan jam selesai aktivitas']
                ],
                'disiplin' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'Masukkan detail aktivitas']
                ],
                'total' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'Masukkan detail aktivitas']
                ]
            ])) {
                session()->setFlashdata('failed', 'Maaf! Terdapat kesalahan dalam pengisian data.');
                return redirect()->to(base_url('Pembimbing/nilai/'))->withInput();
            }
            $nilai = [
                'idduser' => $id,
                'pengetahuan' => $this->request->getPost('pengetahuan'),
                'keterampilan' => $this->request->getPost('keterampilan'),
                'kemampuan' => $this->request->getPost('kemampuan'),
                'disiplin' => $this->request->getPost('disiplin'),
                'total' => $this->request->getPost('total')
            ];

            $nilaimodel = new NilaiModel();
            $nilaimodel->save($nilai);
            session()->setFlashdata('success', 'Sukses! Laporan aktivitas harian berhasil ditambahkan.');
            return redirect()->to(base_url('Pembimbing/dashboard/'));
        }
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('templates/topbar');
        echo view('pembimbing/nilai.php');
        echo view('templates/footer');
    }

    public function report($id = NULL)
    {
        $userModel = new UserModel();
        $nilaimodel = new NilaiModel();
        $aktif = $nilaimodel->select('report.id as acid, report.*,user.*')
            ->join('user', 'report.idduser=user.id')
            ->where('idduser', $id)
            ->get()->getResultArray();
        $data = [
            'aktif' => $aktif,
        ];

        echo view('templates/header');
        echo view('templates/sidebarPembimbing');
        echo view('templates/topbar');
        echo view('pembimbing/report.php', $data);
        echo view('templates/footer');
    }

    public function cetakPDF($name, $id)
    {
        $userModel = new UserModel();
        $nilaimodel = new NilaiModel();
        $aktif = $nilaimodel->select('report.id as acid, report.*,user.*')
            ->join('user', 'report.idduser=user.id')
            ->where('idduser', $id)
            ->get()->getResultArray();
        $data = [
            'aktif' => $aktif,
        ];

        $filename = date('y-m-d-H-i-s') . '_' . $name . '_' . $id;
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('pembimbing/pdf', $data));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream($filename);
    }

    public function dashboard()
    {
        $userModel = new UserModel();
        $aktif = $userModel->where('role', 3)->where('status', 2)->join('info_peserta', 'user.id=info_peserta.userId')
            ->where('info_peserta.endDate>', date('Y-m-d'))->get()->getResultArray();

        $data = [

            'aktif' => $aktif,

        ];

        echo view('templates/header', $data);
        echo view('templates/sidebarPembimbing');
        echo view('templates/topbar');
        echo view('pembimbing/halamannilai.php');
        echo view('templates/footer');
    }

    public function lihatnilai()
    {
        $userModel = new UserModel();
        $aktif = $userModel->where('role', 3)->where('status', 2)->join('info_peserta', 'user.id=info_peserta.userId')
            ->where('info_peserta.endDate>', date('Y-m-d'))->get()->getResultArray();
        $nilaimodel = new NilaiModel();
        $nilai = $nilaimodel->findAll();
        $report = $nilaimodel->first();

        $data = [
            'data' => $nilai,
            'report' => $report,
            'aktif' => $aktif,
            'nama' => $this->request->getPost('nama'),
            'jenisKelamin' => $this->request->getPost('JK'),
            'tglLahir' => $this->request->getPost('tglLahir'),
            'email' => $this->request->getPost('email'),
            'role' => 3,
            'status' => 0
        ];

        echo view('templates/header', $data);
        echo view('templates/sidebarPembimbing');
        echo view('templates/topbar');
        echo view('pembimbing/datanilai.php');
        echo view('templates/footer');
    }

    public function pesan($id = NULL)
    {
        $userModel = new UserModel();
        $aktif = $nilaimodel->select('report.id as acid, report.*,user.*')
            ->join('user', 'report.idduser=user.id')
            ->where('idduser', $id)
            ->get()->getResultArray();

        if (isset($_POST['submit'])) {
            if (!$this->validate([
                'ket' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'Masukkan tanggal kegiatan dilakukan']
                ],

            ])) {
                session()->setFlashdata('failed', 'Maaf! Terdapat kesalahan dalam pengisian data.');
                return redirect()->to(base_url('Peserta/editAktivitas/' . $id))->withInput();
            }
            $user = [
                'ket' => $this->request->getPost('ket'),
            ];
            $userModel->update($id, $user);
            session()->setFlashdata('success', 'Sukses! Laporan aktivitas harian berhasil diubah.');
            return redirect()->to(base_url('Pembimbing/pesan'));
        }
        echo view('templates/header', $user);
        echo view('templates/sidebar');
        echo view('templates/topbar');
        echo view('peserta/editaktivitas.php');
        echo view('templates/footer');
    }
}
