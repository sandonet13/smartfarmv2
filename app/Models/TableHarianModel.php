<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
class TableHarianModel extends Model {
 
    var $table = 'timbangan_harian_a';
    var $table_b = 'timbangan_harian_b';
    var $table_kematian_a = 'kematian_a';
    var $table_kematian_b = 'kematian_b';
     
     
    public function __construct() {
        parent::__construct();
        //$this->load->database();
        $db = \Config\Database::connect();
        $builder = $db->table('timbangan_harian_a');
    }
 
    public function get_all_timbangan_a_1() {
    //    $query = $this->db->table('panen_a');
       $query = $this->db->query('select * from timbangan_harian_a where lantai = 1');
//      print_r($query->getResult());
       // $query = $this->db->get();
        return $query->getResult();
    }

    public function get_all_timbangan_a_2() {
        //    $query = $this->db->table('panen_a');
           $query = $this->db->query('select * from timbangan_harian_a where lantai = 2');
    //      print_r($query->getResult());
           // $query = $this->db->get();
            return $query->getResult();
        }

        public function get_all_timbangan_b_1() {
               $query = $this->db->table('timbangan_harian_b');
               $query = $this->db->query('select * from timbangan_harian_b where lantai = 1');
        //      print_r($query->getResult());
               // $query = $this->db->get();
                return $query->getResult();
            }
        
            public function get_all_timbangan_b_2() {
                   $query = $this->db->table('timbangan_harian_b');
                   $query = $this->db->query('select * from timbangan_harian_b where lantai = 2');
            //      print_r($query->getResult());
                   // $query = $this->db->get();
                    return $query->getResult();
                }

 
    public function get_by_id_a($id) {
      $sql = 'select * from timbangan_harian_a where id ='.$id ;
      $query =  $this->db->query($sql);
       
      return $query->getRow();
    }

    public function get_by_id_b($id) {
        $sql = 'select * from timbangan_harian_b where id ='.$id ;
        $query =  $this->db->query($sql);
         
        return $query->getRow();
      }


 
 
    public function timbangan_update_a($where, $data) {
        $this->db->table($this->table)->update($data, $where);
//        print_r($this->db->getLastQuery());
        return $this->db->affectedRows();
    }

    public function timbangan_update_b($where, $data) {
        $this->db->table($this->table_b)->update($data, $where);
//        print_r($this->db->getLastQuery());
        return $this->db->affectedRows();
    }
 
    public function delete_by_id_a($id) {
        $this->db->table($this->table)->delete(array('id' => $id)); 
    }

    public function delete_by_id_b($id) {
        $this->db->table($this->table_b)->delete(array('id' => $id)); 
    }

    public function get_all_kematian_a_1() {
        //    $query = $this->db->table('panen_a');
           $query = $this->db->query('select * from kematian_a where lantai = 1');
    //      print_r($query->getResult());
           // $query = $this->db->get();
            return $query->getResult();
        }

        public function get_all_kematian_a_2() {
            //    $query = $this->db->table('panen_a');
               $query = $this->db->query('select * from kematian_a where lantai = 2');
        //      print_r($query->getResult());
               // $query = $this->db->get();
                return $query->getResult();
            }

            public function get_all_kematian_b_1() {
                //    $query = $this->db->table('panen_a');
                   $query = $this->db->query('select * from kematian_b where lantai = 1');
            //      print_r($query->getResult());
                   // $query = $this->db->get();
                    return $query->getResult();
                }
        
                public function get_all_kematian_b_2() {
                    //    $query = $this->db->table('panen_a');
                       $query = $this->db->query('select * from kematian_b where lantai = 2');
                //      print_r($query->getResult());
                       // $query = $this->db->get();
                        return $query->getResult();
                    }

                    public function get_by_id_kematian_a($id) {
                        $sql = 'select * from kematian_a where id ='.$id ;
                        $query =  $this->db->query($sql);
                         
                        return $query->getRow();
                      }
                  
                      public function get_by_id_kematian_b($id) {
                          $sql = 'select * from kematian_b where id ='.$id ;
                          $query =  $this->db->query($sql);
                           
                          return $query->getRow();
                        }

                        public function kematian_update_a($where, $data) {
                            $this->db->table($this->table_kematian_a)->update($data, $where);
                    //        print_r($this->db->getLastQuery());
                            return $this->db->affectedRows();
                        }
                    
                        public function kematian_update_b($where, $data) {
                            $this->db->table($this->table_kematian_b)->update($data, $where);
                    //        print_r($this->db->getLastQuery());
                            return $this->db->affectedRows();
                        }

                        public function delete_by_id_kematian_a($id) {
                            $this->db->table($this->table_kematian_a)->delete(array('id' => $id)); 
                        }
                    
                        public function delete_by_id_kematian_b($id) {
                            $this->db->table($this->table_kematian_b)->delete(array('id' => $id)); 
                        }
                  
 
}