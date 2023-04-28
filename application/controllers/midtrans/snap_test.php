<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Snap_test extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$serverKey = 'SB-Mid-server-54P_6px5V_VBoeo1mN2lU4mp';  //sandbox
		// $serverKey = 'Mid-server-u12fP7T_z58tnVJhoBl68Kd1';  //production
		$params = array('server_key' => $serverKey, 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
	}

	public function index()
	{
		$this->load->view('checkout_snap');
	}

	public function spp()
	{
		$data['transaksi'] = $this->db->order_by('transaction_time', 'DESC')->get('transaksi_midtrans')->result_array();
		$this->load->view('midtrans/pembayaran', $data);
	}

	public function token()
	{

		$nama 	= $this->input->post('nama');
		$email 	= $this->input->post('email');
		$kelas 	= $this->input->post('kelas');
		$jml_bayar = $this->input->post('jml_bayar');

		// Required
		$transaction_details = array(
			'order_id' => rand(),
			'gross_amount' => $jml_bayar, // no decimal allowed for creditcard
		);

		// Optional
		$item1_details = array(
			'id' => 'a1',
			'price' => $jml_bayar,
			'quantity' => 1,
			'name' => "Pembayaran SPP Kelas " . $kelas
		);

		// Optional
		$item_details = array($item1_details);

		// Optional
		$customer_details = array(
			'first_name'    => $nama,
			'last_name'     => " ",
			'email'    		=> $email,
			'phone'         => "081122334455",
		);

		// Data yang akan dikirim untuk request redirect_url.
		$credit_card['secure'] = true;
		//ser save_card true to enable oneclick or 2click
		//$credit_card['save_card'] = true;

		$time = time();
		$custom_expiry = array(
			'start_time' => date("Y-m-d H:i:s O", $time),
			'unit' => 'day',
			'duration'  => 1
		);

		$transaction_data = array(
			'transaction_details' => $transaction_details,
			'item_details'       => $item_details,
			'customer_details'   => $customer_details,
			'credit_card'        => $credit_card,
			'expiry'             => $custom_expiry
		);

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
	}

	public function finish()
	{
		$result = json_decode($this->input->post('result_data'), true);
		// echo 'RESULT <br><pre>';
		// var_dump($result);
		// echo '</pre>';
		// die;
		$nama 	= $this->input->post('nama');
		$kelas 	= $this->input->post('kelas');
		$data 	= [
			'order_id' 		=> $result['order_id'],
			'nama' 			=> $nama,
			'kelas' 		=> $kelas,
			'gross_amount' 	=> $result['gross_amount'],
			'payment_type' 	=> $result['payment_type'],
			'transaction_time' => $result['transaction_time'],
			// 'bank' 			=> $result['va_numbers'][0]['bank'],
			// 'va_number' 	=> $result['va_numbers'][0]['va_number'],
			// 'pdf_url' 		=> $result['pdf_url'],
			'status_code' 	=> $result['status_code'],
		];
		$simpan = $this->db->insert('transaksi_midtrans', $data);
		if ($simpan) {
			// echo "Sukses";
			redirect('midtrans/snap_test/spp');
		} else {
			echo "Gagal";
		}
	}
}
