<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class BookModel extends CI_Model {

    //const perSize=10;

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function addBook()
    {
        $info = array(
               'name' => $_POST['name'] ,
               'type'=> $_POST['type'] ,
               'authors'=> $_POST['authors'] ,
               'press' => $_POST['press'] ,
               'school'=> $_POST['school'] ,
               'owner'=> $_POST['owner'] ,
               'contact'=> $_POST['contact'] ,
               'place' => $_POST['place'] ,
               'price' => $_POST['price'] ,
            );
        $this->db->insert('book', $info);
        $data['row']=$info;
        $data['err']="";
        return $data;
    }

    public function readBook($page,$perSize)
    {
        //$perSize=self::perSize;
        $beg=($page-1)*$perSize;
        $query=$this->db->query("SELECT * FROM book LIMIT $beg,$perSize");
        return $query->result();
    }

    public function countPage($perSize)
    {
        /*
        $query=$this->db->query("SELECT count(*) FROM book");
        $ret=$query->result_array();
        */
        $query=mysql_query("SELECT count(*) FROM book");
        $ret=mysql_fetch_array($query);
        $totalSize=intval($ret[0]);
        //$perSize=self::perSize;
        $pageNum=ceil($totalSize/$perSize);
        return $pageNum;
    }
}