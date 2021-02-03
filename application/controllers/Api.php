<?php
class Api extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
    }
    function getData()
    {
        $query = $this->db->get('tb_user');
        if ($query->num_rows() > 0) {
            $data = array(
                "status" => true,
                "message" => "Success get Data",
                "user" => $query->result(),
            );
        } else {
            $data = array(
                "status" => false,
                "message" => "Gagal get Data",
                "user" => array(),
            );
        }

        echo json_encode($data);
    }

    function getDataByAge()
    {
        // $query = $this->db->get('tb_user')->where();
        $umur = $this->input->get('umur');
        $q = $this->db->select('*')->from('tb_user')->where('umur', $umur)->get();
        // return $q->result();

        if ($q->num_rows() > 0) {
            $data = array(
                "status" => true,
                "message" => "Success get Data",
                "user" => $q->result(),
            );
        } else {
            $data = array(
                "status" => false,
                "message" => "Gagal get Data",
                "user" => array(),
            );
        }
        echo json_encode($data);
    }
}
