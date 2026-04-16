<?php if ( ! defined('BASEPATH')) exit();

class Cfpdf{
	function __construct()
	{
		require_once APPPATH.'/libraries/PDF/fpdf.php';
		require_once APPPATH.'/libraries/TCPDF/tcpdf.php';
	}
}