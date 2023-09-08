<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
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
            'title' => 'Halo Sign In!',
            'validation' => \Config\Services::validation(),
        ];

        return view('/auth/login', $data);
    }

    public function login()
    {
        $rules = [
            'username' => [
                'rules' => 'required|alpha_dash',
                'errors' => [
                    'required' => 'Username harus diisi!',
                    'alpha_dash' => 'Username tidak mengandung spasi!'
                ]
            ],
            'password' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Kata sandi harus diisi!'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            $validasi = \Config\Services::validation();
            $errorInput = [
                'username' => $validasi->getError('username'),
                'password' => $validasi->getError('password')
            ];
            session()->setFlashdata('errorInput', $errorInput);
            return redirect()->to('/masuk')->withInput();
        }

        $username = htmlspecialchars($this->request->getPost('username'));
        $password = htmlspecialchars($this->request->getPost('password'));

        $user = $this->userModel->where('username', $username)->first();

        // Jika user ada
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $username
                ];
                session()->set($data);

                return redirect()->to('/dashboard');
            } else {
                session()->setFlashdata('pesan', 'Kata Sandi Salah!');
                session()->setFlashdata('warna', '<div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Error icon</span>
                    </div>');
                return redirect()->to('/masuk')->withInput();
            }
        } else {
            session()->setFlashdata('pesan', 'Pengguna tidak terdaftar!');
            session()->setFlashdata('warna', '<div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Error icon</span>
                    </div>');
            return redirect()->to('/masuk')->withInput();
        }
    }
}
