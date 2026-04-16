<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_fungsi extends CI_Model{

    function __construct(){
        parent:: __construct();
    }

    function Dan($table, $param, $kondisi1, $kondisi2)
    {
    	$data = $this->db->query("select * from " .$table. " where " .$param. " " .$kondisi1. " and " .$param. " " .$kondisi2);
    	return $data->result_array();
    }
    function Aritmetik($table, $param, $kondisi)
    {
    	$data = $this->db->query("select * from " .$param. " " .$kondisi. " from " .$table);
    	return $data->result_array();
    }
    /*function As($table)
    {
		$data = $this->db->query("select * from " .$table);
		return $data->result_array();
    }*/
    function Avg($table, $param)
    {
    	$data = $this->db->query("select avg(" .$param. ") from " .$table);
    	return $data->result_array();
    }
    function Between($table, $param, $kondisi1, $kondisi2)
    {
    	$data = $this->db->query("select * from " .$table. " where " .$param. " between " .$kondisi1. " and " .$param. " " .$kondisi2);
    	return $data->result_array();
    }
    function Concat($table, $param, $kondisi1, $kondisi2, $kondisi3, $kondisi4, $kondisi5)
    {
    	$data = $this->db->query('select concat (' .$kondisi1. ", '" .$param. "', " .$kondisi2. ", '" .$kondisi3. ", '" .$param. "', " .$kondisi4. ", '" .$param. "', " .$kondisi5. ") from " .$table);
    	return $data->result_array();
    }
    function Count($table, $param)
    {
    	$data = $this->db->query("select count (" .$param. ") from " .$table);
    	return $data->result_array();
    }
    function Distinct($table, $kondisi)
    {
    	$data = $this->db->query("select distinct " .$kondisi. " from " .$table);
    	return $data->result_array();
    }
    function Edit($table, $data, $where)
    {
    	$res = $this->db->update($table,$data,$where);
    	return $res;
    }
    function Get($table)
    {
    	$data = $this->db->query("select * from " .$table);
    	return $data->result_array();
    }
    function Hapus($table, $where)
    {
    	$res = $this->db->delete($table, $where);
    	return $res;
    }
    function In($table, $param, $kondisi1, $kondisi2, $kondisi3, $kondisi4, $kondisi5)
    {
    	$data = $this->db->query("select * from " .$table. " where " .$param. ", in('" .$kondisi1. "', '" .$kondisi2. "', '" .$kondisi3. "', '" .$kondisi4. "', '" .$kondisi5. "')" );
    	return $data->result_array();
    }
    function Join($select, $from, $where)
    {
        $data = $this->db->query("select " .$select. " from " .$from. " where " .$where);
        return $data->result_array();
    }
    function Like($table, $param, $kondisi)
    {
    	$data = $this->db->query("select * from " .$table. " where " .$param. " like " .$kondisi. "'");
    	return $data->result_array();
    }
    function Limit($table, $param, $kondisi)
    {
    	$data = $this->db->query("select " .$param. " from " .$table. " limit " .$kondisi);
    	return $data->result_array();
    }
    function Min($table, $param)
    {
    	$data = $this->db->query('select min(' .$param. ') from ' .$table);
    	return $data->result_array();
    }
    function Notin($table, $param, $kondisi1, $kondisi2, $kondisi3, $kondisi4, $kondisi5)
    {
    	$data = $this->db->query("select * from " .$table. " where " .$param. ", not in('" .$kondisi1. "', '" .$kondisi2. "', '" .$kondisi3. "', '" .$kondisi4. "', '" .$kondisi5. "')" );
    	return $data->result_array();
    }
    function Atau($table, $param, $kondisi1, $kondisi2)
    {
    	$data = $this->db->query('select * from' .$table. ' where ' .$param. " = " .$kondisi1. " or " .$param. " = " .$kondisi2);
    	return $data->result_array();
    }
    function Select($table, $kondisi)
    {
    	$data = $this->db->query('select ' .$kondisi. ' from ' .$table);
    	return $data->result_array();
    }
    function Sqrt($table, $param)
    {
    	$data = $this->db->query('select ' .$param. ', sqrt(' .$param. ') from ' .$table);
    	return $data->result_array();
    }
    /*function Subqueries($table)
    {
    	$data = $this->db->query('select * from ' .$table. "");
    	return $data->result_array();
    }*/
    function Sum($table, $param)
    {
    	$data = $this->db->query('select sum(' .$param. ') from ' .$table);
    	return $data->result_array();
    }
    function Upper($table, $param)
    {
    	$data = $this->db->query('select upper(' .$param. ') from ' .$table);
    	return $data->result_array();
    }
    function Where($table, $kondisi)
    {
    	$data = $this->db->query("select * from " .$table. " where " .$kondisi);
    	return $data->result_array();
    }

    //DARI SINI JOIN TABLE
    function Join_RekapHarian($a, $b, $where)
    {
        $data = $this->db->query("select b.UraianID, a.NamaUraian, b.StockAwal, b.KgPenerimaan, b.AkumPenerimaan, b.KgPemakaian, b. AkumPemakaian, b.StockAkhir, b.Keterangan1 from " .$a. " AS a JOIN " .$b. " AS b ON a.IDUraian=b.UraianID WHERE b." .$where);
        return $data->result_array();
    }
}
