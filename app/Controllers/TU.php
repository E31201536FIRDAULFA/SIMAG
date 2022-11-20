<?php

namespace App\Controllers;

use App\Models\AbsenModel;
use App\Models\AjuanModel;
use App\Models\UserModel;
use App\Models\AktivitasModel;
use App\Models\KuotaModel;
use App\Models\InfoPesertaModel;
use CodeIgniter\API\ResponseTrait;
use Google\Service\CloudSearch\Id;

class TU extends BaseController
{
    use ResponseTrait;
    public function __construct()
    {
        session();
    }

    public function index()
    {
        $kuotaModel = new KuotaModel();
        $userModel = new UserModel();
        $ajuanModel = new AjuanModel();
        $kuota = $userModel->where('role', 4)->get()->getResultArray();
        $kuota = $kuotaModel->findAll();
        $divisi = $kuotaModel->first();


        $data = [
            'data' => $kuota,
            'divisi' => $divisi
        ];

        echo view('templates/header', $data);
        echo view('templates/sidebartu');
        echo view('templates/topbar');
        echo view('spadmin/tu.php');
        echo view('spadmin/kasubagtu');
    }

    // Data pembimbing
    public function datatu()
    {
        $kuotaModel = new KuotaModel();
        $userModel = new UserModel();
        $kuota = $userModel->where('role', 4)->get()->getResultArray();
        $kuota = $kuotaModel->findAll();

        $data = [
            'data' => $kuota,
        ];

        echo view('templates/header', $data);
        echo view('templates/sidebartu');
        echo view('templates/topbar');
        echo view('spadmin/kasubagtu');
    }

    public function updatekuota($id)
    {
        $kuotaModel = new KuotaModel();
        $data = $kuotaModel->find($id);
        if (isset($_POST['submit'])) {

            // Kuota Perseksi    
            if (!$this->validate([
                'd_distribusi' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'Masukkan Jumlah Kuota']
                ],
                'd_produksi' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'Masukkan Jumlah Kuota']
                ],
                'd_sosial' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'Masukkan Jumlah Kuota']
                ],
                'd_neraca' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'Masukkan Jumlah Kuota']
                ],
            ])) {
                session()->setFlashdata('failed', 'Maaf! Terdapat kesalahan dalam pengisian data.');
                return redirect()->to(base_url('TU/updatekuota/' . $id))->withInput();
            }

            $data = [
                'd_distribusi' => $this->request->getPost('d_distribusi'),
                'd_produksi' => $this->request->getPost('d_produksi'),
                'd_sosial' => $this->request->getPost('d_sosial'),
                'd_neraca' => $this->request->getPost('d_neraca'),
                'status' => 1
            ];
            $kuotaModel->update($id, $data);
            session()->setFlashdata('success', 'Sukses! Anda berhasil mengubah data.');
            return redirect()->to(base_url('TU/'));
        }
        echo view('templates/header', $data);
        echo view('templates/sidebartu');
        echo view('spadmin/edittu');
        echo view('templates/topbar');
        echo view('spadmin/kasubagtu');
    }
}
