<?php

namespace App\Controllers;

use App\Models\UserModel;
use Google_Client;
use Google_Service;
use Google_Service_Oauth2;

class AuthGoogle extends BaseController
{
    public function __construct()
    {
        session();
    }

    public function index()
    {
        $client = new Google_Client();
        $clientId = '605482851070-6iieagmg60dcif8t5da14p9bof1ccr42.apps.googleusercontent.com';
        $clientSecret = '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';
        $redirectUri = base_url('AuthGoogle');

        $client->setClientId($clientId);
        $client->setClientSecret($clientSecret);
        $client->setRedirectUri($redirectUri);
        $client->addScope('profile');
        $client->addScope('email');

        if (isset($_GET['code'])) {
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            $client->setAccessToken($token['access_token']);
            $service = new Google_Service_Oauth2($client);
        } else {
            return redirect()->to($client->createAuthUrl());
        }
        $respond = [
            'name' => $service->userinfo->get()->getName(),
            'email' => $service->userinfo->get()->getEmail(),
            'regist' => true
        ];
        $userModel = new UserModel();
        $user = $userModel->join('info_peserta', 'user.id=info_peserta.userId', 'left')->where('email', $respond['email'])->get()->getRowArray();
        if ($user) {
            if ($user['status'] == 1) {
                session()->set($user);
                session()->set('log', true);
                session()->set('role', $user['role']);
                switch ($user['role']) {
                    case '1':
                        return redirect()->to(base_url('Admin'));
                        break;
                    case '2':
                        return redirect()->to(base_url('Pembimbing'));
                        break;
                    case '3':
                        return redirect()->to(base_url('Notif'));
                        break;
                    case '4':
                        return redirect()->to(base_url('TU'));
                        break;
                    default:
                        # code...
                        break;
                }
            } else if ($user['status'] == 2) {
                session()->set($user);
                session()->set('log', true);
                session()->set('role', $user['role']);
                return redirect()->to(base_url('Peserta'));
            }
        } else {
            session()->set($respond);
            return redirect()->to(base_url('Registrasi'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('Home'));
    }
}
