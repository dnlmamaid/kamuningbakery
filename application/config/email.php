<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Email
| -------------------------------------------------------------------------
| This file lets you define parameters for sending emails.
| Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/libraries/email.html
|
*/
$config['charset'] = 'utf-8';
$config['newline'] = "\r\n";
$config['protocol'] = 'smtp';
$config['smtp_host']='ssl://smtp.googlemail.com';
$config['smtp_user']='kamuningsystem@gmail.com';
$config['smtp_pass']='kamuningbaker';
$config['smtp_port']='465';
$config['smtp_timeout']='30';
$config['mailtype'] = 'html';
$config['validation'] = TRUE;  
			
			


/* End of file email.php */
/* Location: ./application/config/email.php */