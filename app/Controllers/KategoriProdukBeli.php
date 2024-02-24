<?php

namespace App\Controllers;

use App\Models\KategoriProdukBeliModel;

class KategoriProdukBeli extends BaseController
{
    protected $kategoriModel;

    public function __construct()
    {
        $this->kategoriModel = new KategoriProdukBeliModel();
        helper('halo');
        cekLogin();
    }

    public function index()
    {
        $categories = $this->kategoriModel
            ->select('kategori_produk_beli.id, kategori_produk_beli.nama_kategori, COUNT(produk_beli.id) as jumlah_catatan')
            ->join('produk_beli', 'kategori_produk_beli.id = produk_beli.id_kategori', 'left')
            ->where('kategori_produk_beli.id_user', $this->user['id'])
            ->groupBy('kategori_produk_beli.nama_kategori')
            ->orderBy('kategori_produk_beli.nama_kategori')
            ->findAll();
        $data = [
            'title' => 'Kategori Produk Beli',
            'user' => $this->user,
            'heading' => 'Kategori Produk Beli',
            'categories' => $categories
        ];
        return view('kategori_produk_beli/index', $data);
    }

    public function storeKategori()
    {
        $rules = [
            'nama_kategori' => [
                'rules' => 'required|min_length[4]|trim',
                'errors' => [
                    'required' => 'Nama kategori tidak boleh kosong',
                    'min_length' => 'Nama kategori minimal 4 karakter'
                ]
            ]
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $data = [
            'id_user' => intval($this->user['id']),
            'nama_kategori' => ucwords(strtolower($this->request->getPost('nama_kategori')))
        ];
        // return dd($data);
        $this->kategoriModel->insert($data);
        return redirect()->to('/kategori')->with('success', 'Kategori ditambahkan!');
    }

    public function hapus($id)
    {
        $this->kategoriModel->delete($id);
        return redirect()->to('/kategori')->with('success', 'Kategori dihapus!');
    }
}
