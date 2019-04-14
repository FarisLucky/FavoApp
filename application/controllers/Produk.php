<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Produk extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            if ($this->session->userdata('login') == false) {
                redirect('user');
            }
            $this->load->model('produk_model');
            $this->load->library('form_validation');
        }
        public function index()
        {
            $data['mhs_active'] = 'active';
            $data['list_produk'] = $this->produk_model->getDataProduk();
            $this->load->view('templates/sidebar',$data);
            $this->load->view('templates/header');
            $this->load->view('admin/produk/view_produk',$data);
            $this->load->view('templates/footer');
        }

        public function tambah()
        {
            $data['mhs_active'] = 'active';
            $this->load->view('templates/sidebar',$data);
            $this->load->view('templates/header');
            $this->load->view('admin/produk/tambah_produk',$data);
            $this->load->view('templates/footer');
        }

        public function coreTambah()
        {
            $this->form_validation->set_rules('val_kd_barang',"Kode Barang","trim|required|is_unique[product.product_kd]",['required'=>'Kode Barang Tidak Boleh Kosong !!','is_unique'=>'kode barang sudah digunakan']);
            $this->form_validation->set_rules('val_nama_barang',"Nama Barang","trim|required",['required'=>'Nama Barang Tidak Boleh Kosong !!']);
            $this->form_validation->set_rules('val_stok_barang',"Stok Barang","trim|required|numeric",['required'=>'Stok Barang Tidak Boleh Kosong !!','numeric'=>'Stok hanya boleh di isi dengan angka !!!']);
            $this->form_validation->set_rules('val_harga_barang',"harga Barang","trim|required|numeric",['required'=>'Harga Barang Tidak Boleh Kosong !!','numeric'=>'Harga hanya boleh di isi dengan angka !!!']);
            $this->form_validation->set_error_delimiters('<small class="form-text text-danger ml-1">','</small>');
            if ($this->form_validation->run() == false) {
                $this->tambah();
                return false;
            }
            else{
                $post = ['kd_barang'=>$this->input->post('val_kd_barang',true),
                        'nama_barang'=>$this->input->post('val_nama_barang',true),
                        'stok_barang'=>$this->input->post('val_stok_barang',true),
                        'harga_barang'=>$this->input->post('val_harga_barang',true),
                    ];
                    $this->produk_model->insertDataproduk($post);
                    $this->session->set_flashdata('success','<div class="alert alert-success" style="margin-bottom:0px" role="alert">Data berhasil ditambahkan :)</div>');
                    redirect('produk');
                    return false;
            }
        }
        public function hapus($kd_barang)
        {
            $value = ['kd_barang' =>$kd_barang];
            $this->produk_model->deleteBarang($value);
            $this->session->set_flashdata('success','<div class="alert alert-success" style="margin-bottom:0px" role="alert">Data berhasil dihapus :)</div>');
            redirect('produk');
            redirect('product');
        }
        public function perbarui($kd)
        {
            $value = ['kd_barang' =>$kd];
            $data['mhs_active'] = 'active';
            $data['select_barang'] = $this->produk_model->getSelectionData($value);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('templates/header');
            $this->load->view('admin/produk/edit_produk',$data);
            $this->load->view('templates/footer');
        }
        public function corePerbarui()
        {
            $post = ['kd_barang'=>$this->input->post('edit_kd_barang',true),
                    'nama_barang'=>$this->input->post('edit_nama_barang',true),
                    'stok_barang'=>$this->input->post('edit_stok_barang',true),
                    'harga_barang'=>$this->input->post('edit_harga_barang',true),
                ];
                $this->produk_model->updateDataproduk($post);
                $this->session->set_flashdata('success','<div class="alert alert-success" style="margin-bottom:0px" role="alert">Data berhasil diubah :)</div>');
                redirect('produk');
        }
    }
    
