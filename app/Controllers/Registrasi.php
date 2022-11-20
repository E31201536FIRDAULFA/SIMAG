<?php

namespace App\Controllers;

use App\Models\InfoPesertaModel;
use App\Models\UserModel;

class Registrasi extends BaseController
{
    public function index()
    {

        if (!session()->regist) {
            return redirect()->to(base_url('Home'));
        }

        if (isset($_POST['submit'])) {
            // validasi pendaftaran    
            if (!$this->validate([
                'nama' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'Masukkan nama lengkap Anda']
                ],
                'JK' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'Masukkan jenis kelamin Anda']
                ],
                'tglLahir' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'Masukkan tanggal lahir Anda']
                ],

                'email'    => 'required|valid_email',

            ])) {
                session()->setFlashdata('failed', 'Maaf! Terdapat kesalahan dalam pengisian data.');
                return redirect()->to(base_url('Registrasi'))->withInput();
            }

            $user = [
                'nama' => $this->request->getPost('nama'),
                'jenisKelamin' => $this->request->getPost('JK'),
                'tglLahir' => $this->request->getPost('tglLahir'),
                'email' => $this->request->getPost('email'),
                'role' => 3,
                'status' => 1
            ];
            $userModel = new UserModel();
            $userModel->save($user);
            $user_id = $userModel->getInsertID();

            session()->setFlashdata('success', 'Sukses! Anda berhasil melakukan pendaftaran.');
            return redirect()->to(base_url('Notif'));
        }
        echo view('templates/header');
        echo view('auth/registrasi');
    }
}
