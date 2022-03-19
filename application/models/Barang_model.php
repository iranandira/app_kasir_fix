<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model {
    function databarang()
    {
        $this->db->select('*');
        $this->db->from('data_barang');
        $this->db->join('data_kategori', 'data_kategori.pk_kategori_id = data_barang.fk_kategori_id');
        $this->db->join('data_satuan', 'data_satuan.pk_satuan_id = data_barang.fk_satuan_id');
        return $query = $this->db->get()->result();
    }

    function hapusbarang($id)
    {
        $this->db->delete('data_barang', array('pk_barang_id'=>$id));
    }

    function kategori()
    {
        return $this->db->get('data_kategori')->result();
    }
    function satuan()
    {
        return $this->db->get('data_satuan')->result();
    }

    function simpanbarang()
    {
        $nama_barang= $this->input->post('nama_barang');
        $nama_kategori= $this->input->post('nama_kategori');
        $nama_satuan= $this->input->post('nama_satuan');
        $harga= $this->input->post('harga');
        $stok= $this->input->post('stok');

        $data= array(
            'nama_barang' => $nama_barang,
            'fk_kategori_id' => $nama_kategori,
            'fk_satuan_id' => $nama_satuan,
            'harga' => $harga,
            'stok' => $stok
        );
        $this->db->insert('data_barang', $data);
    }

    function simpankategori()
    {
        $nama_kategori= $this->input->post('nama_kategori');
 
        $data= array(
             'nama_kategori' => $nama_kategori
        );
        $this->db->insert('data_kategori',$data);
    }

    function hapuskategori($id)
    {
        $this->db->delete('data_kategori', array('pk_kategori_id'=> $id));
    }

    function simpansatuan()
    {
        $nama_satuan = $this->input->post('nama_satuan');

        $data= array (
            'nama_satuan' => $nama_satuan
        );
        $this->db->insert('data_satuan', $data);
    }

    function hapussatuan($id)
    {
        $this->db->delete('data_satuan', array('pk_satuan_id' => $id));
    }
}