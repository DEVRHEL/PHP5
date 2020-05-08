<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('mail/PHPMailerAutoload.php');
class Mmail extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('Vsendmail');
	}
	public function dosend()
	{
		$ten=$this->input->post('ten');
		$nguoinhan=$this->input->post('nguoinhan');
		$noidung=$this->input->post('noidung');

		$mail = new PHPMailer;

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'ruthietrumbauer77@gmail.com';                 // SMTP username
		$mail->Password = 'etatxhiqtxouzjpd';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to

		
		$mail->setFrom('rhel@jsotan.vn', 'RHEL Admin' );
		$mail->addAddress($nguoinhan, $ten);
		$mail->Subject = $ten;
		$mail->Body    = $noidung;
		$mail->CharSet = "UTF-8";
		if(!$mail->send()) {
		    echo 'Message could not be sent.';
		    echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		    echo 'Thư đã được gửi rồi .';
		}
	}
	public function datban()
	{
		$tenkh=$this->input->post('tenkh');
		$email=$this->input->post('email');
		$sdt=$this->input->post('sdt');
		$ngaydatban=$this->input->post('ngaydatban');
		$giodatban=$this->input->post('giodatban');
		$giodatban=(string)$ngaydatban." ".(string)$giodatban;
		$songuoi=$this->input->post('songuoi');
		$this->load->model('Modelmail');
		if($this->Modelmail->booking($tenkh, $email, $sdt, $ngaydatban, $giodatban, $songuoi))
		{
			echo "ok";
			// gui mail thong bao cho admin
			$mail = new PHPMailer;
			$mail->isSMTP();                                      
			$mail->Host = 'smtp.gmail.com'; 
			$mail->SMTPAuth = true;                              
			$mail->Username = 'ruthietrumbauer77@gmail.com';      
			$mail->Password = 'etatxhiqtxouzjpd';  
			$mail->SMTPSecure = 'tls';            
			$mail->Port = 587;                     

			
			$mail->setFrom('rhel@jsotan.vn', 'Your web' );
			$mail->addAddress('haovobaomat@gmail.com', 'Hao Vo');
			$mail->Subject = 'Thong bao co khach dat ban';
			$mail->Body    = "Ten: ".$tenkh."\n Email: ".$email."\n Sdt: ".$sdt."\n Ngay dat ban: ".$ngaydatban."\n Gio dat ban: ".$giodatban."\n So nguoi: ".$songuoi;
			$mail->CharSet = "UTF-8"; // CharSet S phai viet hoa
			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    echo 'Thư đã được gửi rồi .';
			}
		}
		else
		{
			echo "check lai db";
		}
	}
}

/* End of file Mmail.php */
/* Location: ./application/controllers/Mmail.php */