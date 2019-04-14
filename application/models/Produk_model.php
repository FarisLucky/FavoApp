<?php

    class Produk_model extends CI_Model
    {

        private $table = 'product';

        public function getDataProduk()
        {
            return $this->db->get($this->table)->result();
        }

        public function insertDataProduk($data)
        {
            $input = ['product_kd' =>$data['kd_barang'],
                    'product_name' =>$data['nama_barang'],
                    'price' =>$data['harga_barang'],
                    'quantity' =>$data['stok_barang']
                ];
            $this->db->insert($this->table,$input);
        }
        public function updateDataProduk($data)
        {
            $input = ['product_name' =>$data['nama_barang'],
                    'price' =>$data['harga_barang'],
                    'quantity' =>$data['stok_barang']
                ];
            $this->db->where(['product_kd'=>$data['kd_barang']]);
            $this->db->update($this->table,$input);
        }
        public function deletebarang($kd)
        {
            $input = ['product_kd' =>$kd['kd_barang']];
            $this->db->where($input);
            $this->db->delete($this->table);
        }
        public function getSelectionData($kd)
        {
            $data = $this->db->get_where($this->table,['product_kd'=>$kd['kd_barang']]);
            return $data->result_array();
        }
    }