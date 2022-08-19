<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
class DashboardModel extends Model {
 
    var $table = 'panen_a';
    var $table_b = 'panen_b';
     
    public function __construct() {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
        $builder = $db->table('panen_a');
    }
 
    public function get_hasil_panen_a() {
       $query = $this->db->table('panen_a');
       $query = $this->db->query('select ekor from panen_a');
       $data_array = $query->getResultArray();
       foreach($data_array as $data) {
        $data_decode[] = json_decode(json_encode($data),true);
    }
    $total_panen = 0;
    foreach($data_decode as $key => $val) {
        $total_panen += $val['ekor'];
    }
        return $total_panen;
    }

    public function get_panen_seminggu() {
        $query = $this->db->table('panen_a');
        $query = $this->db->query('select sum(ekor) as ekor from panen_a where tanggal between date_sub(now(),INTERVAL 1 WEEK) and now()');
        $data_last = $query->getResultArray();
        
         return $data_last[0]['ekor'];
     }

     public function get_panen_day() {
        $query = $this->db->table('panen_a');
        $query = $this->db->query('select SUM(ekor) as ekor FROM panen_a GROUP BY DATE(panen_a.tanggal)');
        $data_array = $query->getResultArray();
        $test = array_column($data_array, 'ekor');
        $integer_array = array_map('intval', $test);
        // echo json_encode($integer_array);
        return json_encode($integer_array);

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