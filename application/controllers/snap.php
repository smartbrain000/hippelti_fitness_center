<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
// header('Access-Control-Allow-Origin: *');
// header("Access-Control-Allow-Methods: GET, OPTIONS");


class Snap extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$clientKey = 'SB-Mid-client-76quQ6K8eEhZtmc0'; //sandbox
		// $clientKey = 'Mid-client-2Reb0jY-8hRswtue'; //production
		$serverKey = 'SB-Mid-server-54P_6px5V_VBoeo1mN2lU4mp';  //sandbox
		// $serverKey = 'Mid-server-u12fP7T_z58tnVJhoBl68Kd1';  //production

		$params = array('server_key' => $serverKey, 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
	}

	public function token() //sistem to midtrans
	{
		$nama 		= $this->input->post('nama');
		$alamat 	= $this->input->post('alamat');
		$no_telp 	= $this->input->post('no_telp');
		$paket 		= $this->input->post('paket');
		$nama_pemasukan = ($paket == '150000') ? 'Paket Membership 1 Bulan' : 'Paket Membership 1 Tahun';

		// Required
		$transaction_details = array(
			'order_id' => rand(),
			'gross_amount' => $paket, // no decimal allowed for creditcard
		);
		$item_details = array(
			'id' 		=> rand(),
			'price' 	=> $paket,
			'quantity' 	=> 1,
			'name' 		=> $nama_pemasukan
		);
		$customer_details = array(
			'name'    	=> $nama,
			'phone'   	=> $no_telp,
			'alamat'  	=> $alamat,
		);
		// Data yang akan dikirim untuk request redirect_url.
		$credit_card['secure'] = true;
		//ser save_card true to enable oneclick or 2click
		//$credit_card['save_card'] = true;

		$time = time();
		$custom_expiry = array(
			'start_time' => date("Y-m-d H:i:s O", $time),
			'unit' => 'day',
			'duration'  => 3
		);
		$transaction_data = array(
			'transaction_details' => $transaction_details,
			'item_details'        => $item_details,
			'customer_details'    => $customer_details,
			'credit_card'         => $credit_card,
			'expiry'              => $custom_expiry
		);

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;

		// echo json_encode($transaction_data, true);
	}

	public function finish() //midtrans to sistem
	{
		//mengubah data json object ke dalam array
		$result = json_decode($this->input->post('result_data'), true);

		// echo 'RESULT <br><pre>';
		// var_dump($result);
		// echo '</pre>';
		// die;

		$nama 		= $this->input->post('nama');
		$alamat 	= $this->input->post('alamat');
		$no_telp 	= $this->input->post('no_telp');
		$jk 		= $this->input->post('jk');
		$paket 		= $this->input->post('paket');
		$username 	= $this->input->post('username');
		$password 	= md5($this->input->post('password'));
		$nama_pemasukan = ($paket == '150000') ? 'Paket Membership 1 Bulan' : 'Paket Membership 1 Tahun';

		$tgl_daftar 	= date("Y-m-d");
		$waktu_sekarang = strtotime(date("Y-m-d H:i:s"));
		$detik 			= ($paket == '150000') ? 2592000 : 31104000;
		$jml_detik 		= $waktu_sekarang + $detik;
		$tgl_kedaluarsa = date("Y-m-d", $jml_detik);

		$thn_daftar 	= date("y");
		//menghitung jumlah member
		$jml_member = $this->db->query('SELECT max(id_member+1) as jml FROM t_member')->row_array()['jml'];
		//mengacak angka dari angka jumlah_member sampai 999
		$acak_angka 	= mt_rand($jml_member, 999);
		//membuat NILAI QRCODE
		$nilai_qr 	= $thn_daftar . $acak_angka . $jml_member;
		//membuat file QRCODE
		$file_qr 	= $this->mydb->create_qrcode($nilai_qr);


		if ($result['status_code'] == 200) { //TRANSAKSI SUKSES
			$level = '2';
			// PROSES INPUT PEMASUKAN
			$data_pemasukan = [
				'nama_pemasukan' => $nama_pemasukan,
				'sumber' 		 => $nama,
				'tgl_pemasukan'  => date('Y-m-d'),
				'jml_pemasukan'  => $paket,
			];
			$this->mydb->input_dt($data_pemasukan, 't_pemasukan');

			notifikasi('Registrasi dan Proses Transaksi Berhasil, Silakan login!', true);
		}

		if ($result['status_code'] == 201) { //TRANSAKSI PENDING
			$level = '0';
			notifikasi('Registrasi Berhasil, Transaksi sedang di proses (pending).
						Anda hanya bisa LOGIN ketika sudah melakukan pembayaran atau sudah di setujui Admin !!!', false);
		}

		//PROSES INPUT USER
		$data_user = [
			'username' => $username,
			'password' => $password,
			'level'    => $level,
		];
		$this->mydb->input_dt($data_user, 't_user');

		$foto = ($jk == 'L') ? '' : '';

		//PROSES INPUT MEMBER
		$data_member = [
			'id_user' 		=> $this->db->insert_id(),
			'nama' 			=> $nama,
			'foto' 			=> $foto,
			'jk' 			=> $jk,
			'alamat' 		=> $alamat,
			'no_telp' 		=> $no_telp,
			'tgl_daftar' 	=> $tgl_daftar,
			'tgl_kedaluarsa' => $tgl_kedaluarsa,
			'no_qr' 		=> $nilai_qr,
			'qr_code' 		=> $file_qr

		];
		$this->mydb->input_dt($data_member, 't_member');

		redirect(base_url('auth'));
	}
}
