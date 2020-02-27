<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| EMAIL CONFING
| -------------------------------------------------------------------
| Configuration of outgoing mail server.
| */
$config['protocol']='smtp';
$config['smtp_host']='ssl://mail.fatecararas.com.br';
$config['smtp_port']='465';
$config['smtp_timeout']='60';
$config['smtp_user']='eventos@fatecararas.com.br';
$config['smtp_pass']='Ev@Fatec@2019';
$config['charset']='utf-8';
$config['newline']="\r\n";

/* End of file email.php */
/* Location: ./system/application/config/email.php */