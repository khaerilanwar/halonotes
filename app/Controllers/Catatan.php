<?php

namespace App\Controllers;

use App\Models\KategoriProdukBeliModel;
use App\Models\ProdukBeliModel;
use CodeIgniter\I18n\Time;

class Catatan extends BaseController
{
    protected $produkBeli;
    protected $kategoriProdukBeli;

    public function __construct()
    {
        $this->produkBeli = new ProdukBeliModel();
        $this->kategoriProdukBeli = new KategoriProdukBeliModel();
        helper('halo');
        cekLogin();
    }

    public function index()
    {
        $data = [
            'title' => 'Catatan Penggunaan Dana',
            'user' => $this->user,
            'heading' => 'Data Penggunaan Dana',
            'produks' => $this->produkBeli->getData($this->user['id'])
        ];
        return view('catatan/index', $data);
    }

    public function detail($name_id)
    {
        $id = array_slice(explode('-', $name_id), -1)[0];
        $builder = \Config\Database::connect()->table('produk_beli');
        $builder->select('*');
        $builder->join('kategori_produk_beli', 'kategori_produk_beli.id = produk_beli.id_kategori');
        $builder->where('produk_beli.id', $id)->where('produk_beli.id_user', $this->user['id']);
        $catatan = $builder->get()->getRowArray();
        $data = [
            'title' => 'Catatan Penggunaan Dana',
            'user' => $this->user,
            'heading' => 'Data Penggunaan Dana',
            'catatan' => $catatan
        ];
        return view('catatan/detail', $data);
    }

    public function tambah()
    {
        $categories = $this->kategoriProdukBeli
            ->where('id_user', $this->user['id'])
            ->findAll();
        $data = [
            'title' => 'Catatan Penggunaan Dana',
            'user' => $this->user,
            'heading' => 'Data Penggunaan Dana',
            'validation' => \Config\Services::validation(),
            'categories' => $categories
        ];
        return view('catatan/tambah', $data);
    }

    public function storeNote()
    {
        $rules = [
            'nama_produk' => [
                'rules' => 'required|min_length[5]|trim',
                'errors' => [
                    'required' => 'Nama produk tidak boleh kosong',
                    'min_length' => 'Nama produk minimal 5 karakter'
                ]
            ],
            'id_kategori' => [
                'rules' => 'required',
                'errors' => ['required' => 'Kategori produk tidak boleh kosong']
            ],
            'jumlah_beli' => [
                'rules' => 'required|trim',
                'errors' => ['required' => 'Jumlah beli tidak boleh kosong']
            ],
            'jenis_produk' => [
                'rules' => 'required',
                'errors' => ['required' => 'Jenis produk tidak boleh kosong']
            ],
            'keperluan' => [
                'rules' => 'required|trim|min_length[10]',
                'errors' => [
                    'required' => 'Jenis produk tidak boleh kosong',
                    'min_length' => 'Deskripsi keperluan terlalu singkat'
                ]
            ],
            'catatan' => [
                'rules' => 'trim'
            ],
            'tanggal_beli' => [
                'rules' => 'required',
                'errors' => ['required' => 'Tanggal beli tidak boleh kosong']
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $data = [
            'id' => random_int(100000, 999999),
            'id_user' => $this->user['id'],
            'created_at' => Time::now('Asia/Jakarta', 'id')
        ];

        $data = $this->validator->getValidated() + $data;
        $this->produkBeli->insert($data);

        return redirect()->to('/catatan')->with('success', 'Catatan telah ditambahkan!');
    }

    public function hapus($id)
    {
        $this->produkBeli->delete($id);
        return redirect()->to('catatan')->with('success', 'Data telah dihapus');
    }
}
