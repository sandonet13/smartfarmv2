<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
class TablePanenModel extends Model {
 
    var $table = 'panen_a';
    var $table_b = 'panen_b';
     
    public function __construct() {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
        $builder = $db->table('panen_a');
    }
 
    public function get_all_panen_a() {
    //    $query = $this->db->table('panen_a');
       $query = $this->db->query('select * from panen_a');
//      print_r($query->getResult());
       // $query = $this->db->get();
        return $query->getResult();
    }

    public function get_all_panen_b() {
           $query = $this->db->table('panen_b');
           $query = $this->db->query('select * from panen_b');
    //      print_r($query->getResult());
           // $query = $this->db->get();
            return $query->getResult();
        }
 
    public function get_by_id_a($id) {
      $sql = 'select * from panen_a where id ='.$id ;
      $query =  $this->db->query($sql);
       
      return $query->getRow();
    }

    public function get_by_id_b($id) {
        $sql = 'select * from panen_b where id ='.$id ;
        $query =  $this->db->query($sql);
         
        return $query->getRow();
      }
 
 
    public function panen_update_a($where, $data) {
        $this->db->table($this->table)->update($data, $where);
//        print_r($this->db->getLastQuery());
        return $this->db->affectedRows();
    }

    public function panen_update_b($where, $data) {
        $this->db->table($this->table_b)->update($data, $where);
//        print_r($this->db->getLastQuery());
        return $this->db->affectedRows();
    }
 
    public function delete_by_id($id) {
        $this->db->table($this->table)->delete(array('id' => $id)); 
    }

    public function delete_by_id_b($id) {
        $this->db->table($this->table_b)->delete(array('id' => $id)); 
    }
 
}