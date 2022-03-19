<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model');
        $this->load->model('Barang_model');
        $this->load->model('Login_model');
    }

    function index()
    {
        $this->load->view('login');
    }

    function dashboard()
    {
        $this->load->view('basetemplete');
        $this->load->view('dashboard');
    }
    
    function proses_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$pass = MD5($password);

		$cek_user = $this->Login_model->cek_login( $username, $pass)->result();

		if(count($cek_user) > 0){
			$this->session->set_userdata('username', $username);
			redirect('Home/dashboard');
		}else{
			redirect('Home');
		}
	}
    function logout()
    {
        $this->session->sess_destroy();
        redirect('Home');
    }

    function datatransaksi()
    {
        $this->load->view('basetemplete');
        $data['transaksi']= $this->Transaksi_model->datatransaksi();
        $this->load->view('transaksi/datatransaksi',$data);
    }

    function hapustransaksi($id)
    {
        $this->Transaksi_model->hapustransaksi($id);
        redirect('Home/datatransaksi');
    }

    function tambahtransaksi()
    {
        $this->load->view('basetemplete');
        $this->load->view('transaksi/tambahtransaksi');
    }

    function simpantransaksi()
    {
        $data= $this->Transaksi_model->simpantransaksi();
        redirect('Home/detail_transaksi/'.$data);
    }

    function detail_transaksi($id)
    {
        $data['trs']= $this->Transaksi_model->caritransaksi($id);
        $data['datamember']= $this->Transaksi_model->carimember($id);
        $data['hasil']= $this->Transaksi_model->carihasil($id);
        $data['barang']= $this->Transaksi_model->caribarang();
        $this->load->view('transaksi/detailtransaksi',$data);
    }

    function saveprint_transaksi()
    {
        $id = $this->Transaksi_model->save_print();

        $data['trs']= $this->Transaksi_model->caritransaksi($id);
        $data['datamember']= $this->Transaksi_model->carimember($id);
        $data['hasil']= $this->Transaksi_model->carihasil($id);
        $data['barang']= $this->Transaksi_model->caribarang();
        
        $this->load->view('printdata',$data);
    }

    function tambah_detail()
    {
        $data= $this->Transaksi_model->savedetail();
        redirect('Home/detail_transaksi/'.$data);
    }

    function hapusdetail($id, $trs_id)
    {
        $this->Transaksi_model->hapusdetail($id);
        redirect('Home/detail_transaksi',$trs_id);
    }

    function databarang()
    {
        $data['barang']= $this->Barang_model->databarang();
        $this->load->view('basetemplete');
        $this->load->view('barang/databarang', $data);
    }

    function hapusbarang($id)
    {
        $this->Barang_model->hapusbarang($id);
        redirect('Home/databarang');
    }

    function tambahbarang()
    {
        $data['kategori']= $this->Barang_model->kategori();
        $data['satuan']= $this->Barang_model->satuan();
        $this->load->view('basetemplete');
        $this->load->view('barang/tambahbarang',$data);
    }

    function simpanbarang()
    {
        $this->Barang_model->simpanbarang();
        redirect('Home/databarang');
    }

    function datakategori()
    {
        $data['kategori']= $this->Barang_model->kategori();
        $this->load->view('basetemplete');
        $this->load->view('kategori/datakategori',$data);
    }

    function hapuskategori($id)
    {
        $this->Barang_model->hapuskategori($id);
        redirect('Home/datakategori');
    }

    function hapussatuan($id)
    {
        $this->Barang_model->hapussatuan($id);
        redirect('Home/datasatuan');
    }

     function tambahkategori()
     {
         $this->load->view('basetemplete');
         $this->load->view('kategori/tambahkategori');
    }
    
    function simpankategori()
    {
        $data= $this->Barang_model->simpankategori();
        redirect('Home/datakategori/'.$data);
    }

    function datasatuan()
    {
        $data['satuan']= $this->Barang_model->satuan();
        $this->load->view('basetemplete');
        $this->load->view('satuan/datasatuan',$data);
    }

    function tambahsatuan()
    {
        $this->load->view('basetemplete');
        $this->load->view('satuan/tambahsatuan');
    }

    function simpansatuan()
    {
        $data= $this->Barang_model->simpansatuan();
        redirect('Home/datasatuan/'.$data);
    }

    function datamember()
    {
        $this->load->view('basetemplete');
        $data['datamember']= $this->Transaksi_model->datamember();
        $this->load->view('member/datamember',$data);
    }
  
    function tambahmember()
    {
        $this->load->view('basetemplete');
        $this->load->view('member/tambahmember');
    }

    function simpanmember()
    {
        $this->Transaksi_model->simpanmember();
        redirect('Home/datamember');
    }

    function hapusmember($id)
    {
        $this->Transaksi_model->hapusmember($id);
        redirect('Home/datamember');
    }

    function printmember($id)
    {
        $data['datamember'] = $this->Transaksi_model->print_member($id);
        $this->load->view('member/printmember', $data);
    }
}

