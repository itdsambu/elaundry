<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function tgl_eng($tgl)
{
    if ($tgl == '' || $tgl == null) {
        return null;
    } else {
        $tanggal  = substr($tgl, 0, 2);
        $bulan    = substr($tgl, 3, 2);
        $tahun    = substr($tgl, 6, 4);
        return $tahun . '-' . $bulan . '-' . $tanggal;
    }
}

function tgl_ind($tgl)
{
    return date("d/m/Y",  strtotime($tgl));
}

function getperiode($tgl)
{
    return date("m/Y", strtotime($tgl));
}

function getPeriodeText($tgl)
{
    return date("M y", strtotime($tgl));
}

// function getperiodesebelum($tgl){
//     $getbulan= date("m",strtotime(date($tgl) . '-1 MONTH'));
//     // $bulan=$getbulan-1;
//     $tahun=date("Y",strtotime(date($tgl) . '-1 YEAR'));
//     return $getbulan.'/'.$tahun;
// }

function getperiodesebelum($tgl)
{
    $getbulan = date("m", strtotime($tgl));
    $bulan = $getbulan - 1;
    $gettahun = date("Y", strtotime($tgl));

    if ($getbulan != "01") {
        $bulan = $getbulan - 1;
        $tahun = $gettahun;
    } else {
        $bulan = 12;
        $tahun = $gettahun - 1;
    }

    return $bulan . '/' . $tahun;
}

function current_date_eng()
{
    date_default_timezone_set('Asia/Jakarta');
    return date("Y-m-d H:i:s");
}

function datetime_ind($datetime)
{
    if (is_null($datetime)) {
        $result = '';
    } else {
        $result = date("d/m/Y H:i:s", strtotime($datetime));
    }
    return $result;
}

function datetime_eng($datetime)
{
    if (is_null($datetime)) {
        $result = '';
    } else {
        $result = date("Y-m-d H:i:s", strtotime($datetime));
    }
    return $result;
}

function add_date_ind($orgDate, $mth)
{
    $cd = strtotime($orgDate);
    $retDAY = date('d/m/Y', mktime(0, 0, 0, date('m', $cd) + $mth, date('d', $cd), date('Y', $cd)));
    return $retDAY;
}

function periode($tgl)
{
    $bulan    = substr($tgl, 3, 2);
    $tahun    = substr($tgl, 6, 4);
    return $bulan . '/' . $tahun;
}
