<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\I18n\Time;

class Registrasi extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        helper('halo');
        cekSession();
    }

    public function index(): string
    {
        $data = [
            'title' => 'Halo Registrasi!',
            'validation' => \Config\Services::validation()
        ];

        return view('/auth/registrasi', $data);
    }

    public function register()
    {
        $rules = [
            'nama' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong'
                ]
            ],
            'username' => [
                'rules' => 'required|min_length[5]|alpha_dash|is_unique[user.username]',
                'errors' => [
                    'required' => 'Username tidak boleh kosong',
                    'min_dash' => 'Minimal 5 karakter',
                    'alpha_numeric' => 'Username tidak boleh mengandung spasi',
                    'is_unique' => 'Username sudah terdaftar'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[3]|matches[repassword]',
                'errors' => [
                    'required' => 'Kata sandi tidak boleh kosong',
                    'min_length' => 'Kata sandi minimal 3 karakter',
                    'matches' => 'Kata sandi tidak cocok'
                ]
            ],
            'repassword' => [
                'rules' => 'required|min_length[3]|matches[password]',
                'errors' => [
                    'required' => 'Konfirmasi kata sandi harus diisi',
                    'matches' => 'Kata sandi tidak cocok',
                    'min_length' => 'Kata sandi tidak boleh kosong'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            $validasi = \Config\Services::validation();
            $errorInput = [
                "nama" => $validasi->getError('nama'),
                "username" => $validasi->getError('username'),
                "password" => $validasi->getError('password'),
                "repassword" => $validasi->getError('repassword'),
            ];
            session()->setFlashdata('errorInput', $errorInput);
            return redirect()->to('/daftar')->withInput();
        }

        $password = htmlspecialchars($this->request->getPost('password'));
        $password = password_hash($password, PASSWORD_DEFAULT);

        $data = [
            'nama' => htmlspecialchars($this->request->getPost('nama')),
            'username' => strtolower(htmlspecialchars($this->request->getPost('username'))),
            'password' => $password,
            'created_at' => Time::now('Asia/Jakarta'),
            'gambar' => 'default.png'
        ];

        $this->userModel->insert($data);

        session()->setFlashdata('pesan', 'Registrasi berhasil!');
        session()->setFlashdata('warna', '<div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Check icon</span>
    </div>');

        return redirect()->to('/masuk');
    }
}
