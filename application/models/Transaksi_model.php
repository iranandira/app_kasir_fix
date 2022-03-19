<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {
    function datatransaksi()
    {
       return $this->db->get('data_transaksi')->result();
    }

    function hapustransaksi($id)
    {
        $this->db->delete('data_transaksi', array('pk_transaksi_id'=> $id));
    }

    function simpantransaksi()
    {
        $tanggal_transaksi = $this->input->post('tanggal_transaksi');
        $tipe_konsumen = $this->input->post('tipe_konsumen');
        $member_id = $this->input->post('member_id');

        $data= array(
            'tanggal_transaksi'=> $tanggal_transaksi,
            'tipe_konsumen'=> $tipe_konsumen,
            'fk_member_id'=> $member_id
        );
        $this->db->insert('data_transaksi',$data);
        return $this->db->insert_id();
    }

    function caritransaksi($id)
    {
        return $this->db->get_where('data_transaksi', array('pk_transaksi_id' => $id))->result();
    }

    function carimember($id)
    {
        $this->db->select('*');
        $this->db->from('data_transaksi');
        $this->db->join('data_member', 'data_transaksi.fk_member_id = data_member.pk_member_id');
        $this->db->where('pk_transaksi_id', $id);
        return $query = $this->db->get()->result();
    }

    function carihasil($id)
    {
        $this->db->select('*');
        $this->db->from('detail_transaksi');
        $this->db->join('data_barang', 'data_barang.pk_barang_id = detail_transaksi.fk_barang_id');
        $this->db->join('data_satuan', 'data_barang.fk_satuan_id = data_satuan.pk_satuan_id');
        $this->db->where('fk_transaksi_id', $id);
        return $query = $this->db->get()->result();
    }
    function caribarang()
    {
        return $this->db->get('data_barang')->result();
    } 

    function save_print()
    {
        $trs_id= $this->input->post('transaksi_id');
        $bayar= $this->input->post('bayar');

        $data= array(
            'bayar' => $bayar
        );
        $this->db->where('pk_transaksi_id', $trs_id);
        $this->db->update('data_transaksi', $data);
        return $trs_id;
    }

    function savedetail()
    {
       $trs_id = $this->input->post('transaksi_id');
       $barang = $this->input->post('barang');
       $kuantitas = $this->input->post('kuantitas');

       $query = $this->db->query("SELECT * FROM data_barang where pk_barang_id = $barang");
       $hasil = $query->result();
       $qty = $hasil[0]->stok;

       if($kuantitas <= $qty){

       $query = $this->db->query("SELECT * FROM detail_transaksi where fk_transaksi_id = $trs_id and fk_barang_id = $barang");
       $hasil = $query->result();
       $hitung = $query->num_rows();

       $qty = $hasil[0]->kuantitas;
       $qtyakhir = $kuantitas+$qty;

       if($hitung > 0){
           $data = array(
               'kuantitas' => $qtyakhir
           );
        
           $this->db->where('fk_transaksi_id', $trs_id);
           $this->db->where('fk_barang_id', $barang);
           $this->db->update('detail_transaksi', $data);

           $query = $this->db->query("SELECT * FROM data_barang where pk_barang_id = $barang");
           $hasil = $query->result();
           $stok = $hasil[0]->stok;
           $pengurangastok = $stok-$kuantitas;
           $data = array(
               'stok' => $pengurangastok
           );
           $this->db->where('pk_barang_id', $barang);
           $this->db->update('data_barang', $data);
       }else{
       $data = array(
           'fk_transaksi_id' => $trs_id,
           'fk_barang_id' => $barang,
           'kuantitas' => $kuantitas
       );
       $this->db->insert('detail_transaksi', $data);

       $query = $this->db->query("SELECT * FROM data_barang where pk_barang_id = $barang");
           $hasil = $query->result();
           $stok = $hasil[0]->stok;
           $penguranganstok = $stok-$kuantitas;
           $data = array(
               'stok' => $penguranganstok
           );
           $this->db->where('pk_barang_id', $barang);
           $this->db->update('data_barang', $data);
        }
    }
       return $trs_id;
    }

    function datamember()
    {
       return $this->db->get('data_member')->result();
    }

    function simpanmember()
    {
        $nama_member = $this->input->post('nama_member');
        $alamat = $this->input->post('alamat');
        $no_hp = $this->input->post('no_hp');
        $tipe_member = $this->input->post('tipe_member');
        $dibuat_pada = $this->input->post('dibuat_pada');

        $data = array(
            'nama_member' => $nama_member,
            'alamat' => $alamat,
            'no_hp' => $no_hp,
            'tipe_member' => $tipe_member,
            'dibuat_pada' => $dibuat_pada
        );

        $this->db->insert('data_member', $data);
    }
  
    function hapusmember($id)
    {
        $this->db->delete('data_member', array('pk_member_id' => $id));
    }

    function print_member($id)
    {
       return $this->db->get_where('data_member', array('pk_member_id' => $id))->result();
    }
}
