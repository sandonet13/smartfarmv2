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

    public function get_hasil_panen_b() {
        $query = $this->db->table('panen_b');
        $query = $this->db->query('select ekor from panen_b');
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

     public function get_panen_seminggu_b() {
        $query = $this->db->table('panen_b');
        $query = $this->db->query('select sum(ekor) as ekor from panen_b where tanggal between date_sub(now(),INTERVAL 1 WEEK) and now()');
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

    public function get_panen_day_b() {
        $query = $this->db->table('panen_b');
        $query = $this->db->query('select SUM(ekor) as ekor FROM panen_b GROUP BY DATE(panen_b.tanggal)');
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


    public function get_berat_total_a() {
        $query = $this->db->table('panen_a');
        $query = $this->db->query('select SUM(tonase) as tonase FROM panen_a');
        $data_array = $query->getResultArray();

        return $data_array[0]['tonase'];

        }

    public function get_berat_total_b() {
        $query = $this->db->table('panen_b');
        $query = $this->db->query('select SUM(tonase) as tonase FROM panen_b');
        $data_array = $query->getResultArray();
    
        return $data_array[0]['tonase'];
    
        }

    public function get_berat_rata() {
        $query = $this->db->table('panen_a');
        $query = $this->db->query('select SUM(tonase) as tonase FROM panen_a');
        $data_array_berat = $query->getResultArray();
        $query_ekor = $this->db->table('panen_a');
        $query_ekor = $this->db->query('select ekor from panen_a');
        $data_array = $query_ekor->getResultArray();
        foreach($data_array as $data) {
            $data_decode[] = json_decode(json_encode($data),true);
        }
        $total_panen = 0;
        foreach($data_decode as $key => $val) {
            $total_panen += $val['ekor'];
        }

    
        return $data_array_berat[0]['tonase'] / $total_panen;
    
     }

     public function get_berat_rata_b() {
        $query = $this->db->table('panen_b');
        $query = $this->db->query('select SUM(tonase) as tonase FROM panen_b');
        $data_array_berat = $query->getResultArray();
        $query_ekor = $this->db->table('panen_b');
        $query_ekor = $this->db->query('select ekor from panen_b');
        $data_array = $query_ekor->getResultArray();
        foreach($data_array as $data) {
            $data_decode[] = json_decode(json_encode($data),true);
        }
        $total_panen = 0;
        foreach($data_decode as $key => $val) {
            $total_panen += $val['ekor'];
        }

    
        return $data_array_berat[0]['tonase'] / $total_panen;
    
     }
     

     public function timbangan_harian_a_1() {
        $query = $this->db->table('timbangan_harian_a');
        $query_umur = $this->db->query('select MAX(umur) as umur FROM timbangan_harian_a');
        $query_sekat_1 = $this->db->query('select sekat_1 as sekat_1 FROM timbangan_harian_a where umur=(select MAX(umur) and lantai=1 from timbangan_harian_a)');
        $query_sekat_2 = $this->db->query('select sekat_2 as sekat_2 FROM timbangan_harian_a where umur=(select MAX(umur) and lantai=1 from timbangan_harian_a)');
        $query_sekat_3 = $this->db->query('select sekat_3 as sekat_3 FROM timbangan_harian_a where umur=(select MAX(umur) and lantai=1 from timbangan_harian_a)');
        $query_sekat_4 = $this->db->query('select sekat_4 as sekat_4 FROM timbangan_harian_a where umur=(select MAX(umur) and lantai=1 from timbangan_harian_a)');
        $query_sekat_5 = $this->db->query('select sekat_5 as sekat_5 FROM timbangan_harian_a where umur=(select MAX(umur) and lantai=1 from timbangan_harian_a)');
        $query_avg = $this->db->query('select (sekat_1 + sekat_2 + sekat_3 + sekat_4 + sekat_5) / 5 as avg_sekat FROM timbangan_harian_a where umur=(select MAX(umur) and lantai=1 from timbangan_harian_a)');

        $data = [

			$query_sekat_1->getResultArray(),
			$query_sekat_2->getResultArray(),
			$query_sekat_3->getResultArray(),
			$query_sekat_4->getResultArray(),
			$query_sekat_5->getResultArray(),
			$query_avg->getResultArray(),
            $query_umur->getResultArray(),

			
		];
		

        return $data;

        }

    public function get_pakan_pakai() {
        $query = $this->db->table('timbangan_harian_a');
        $query = $this->db->query('select tanggal,pakai FROM timbangan_harian_a where lantai=1 and tanggal between date_sub(now(),INTERVAL 1 MONTH) and now() GROUP BY DATE(timbangan_harian_a.tanggal)');
        $data_array = $query->getResultArray();
        $parse_data_array_x = str_replace('tanggal', 'x', json_encode($data_array, JSON_NUMERIC_CHECK));
        $parse_data_array_y = str_replace('pakai', 'y', $parse_data_array_x);
        return $parse_data_array_y;

        }

        public function get_pakan_sisa() {
            $query = $this->db->table('timbangan_harian_a');
            $query = $this->db->query('select tanggal,sisa FROM timbangan_harian_a where lantai=1 and tanggal between date_sub(now(),INTERVAL 1 MONTH) and now() GROUP BY DATE(timbangan_harian_a.tanggal)');
            $data_array = $query->getResultArray();
            $parse_data_array_x = str_replace('tanggal', 'x', json_encode($data_array, JSON_NUMERIC_CHECK));
            $parse_data_array_y = str_replace('sisa', 'y', $parse_data_array_x);
            return $parse_data_array_y;
    
            }
        public function get_pakan_masuk() {
            $query = $this->db->table('timbangan_harian_a');
            $query = $this->db->query('select tanggal,masuk FROM timbangan_harian_a where lantai=1 and tanggal between date_sub(now(),INTERVAL 1 MONTH) and now() GROUP BY DATE(timbangan_harian_a.tanggal)');
            $data_array = $query->getResultArray();
            $parse_data_array_x = str_replace('tanggal', 'x', json_encode($data_array, JSON_NUMERIC_CHECK));
            $parse_data_array_y = str_replace('masuk', 'y', $parse_data_array_x);
            return $parse_data_array_y;
    
            }

            public function get_pakan_pakai_2() {
                $query = $this->db->table('timbangan_harian_a');
                $query = $this->db->query('select tanggal,pakai FROM timbangan_harian_a where lantai=2 and tanggal between date_sub(now(),INTERVAL 1 MONTH) and now() GROUP BY DATE(timbangan_harian_a.tanggal)');
                $data_array = $query->getResultArray();
                $parse_data_array_x = str_replace('tanggal', 'x', json_encode($data_array, JSON_NUMERIC_CHECK));
                $parse_data_array_y = str_replace('pakai', 'y', $parse_data_array_x);
                return $parse_data_array_y;
        
                }
        
                public function get_pakan_sisa_2() {
                    $query = $this->db->table('timbangan_harian_a');
                    $query = $this->db->query('select tanggal,sisa FROM timbangan_harian_a where lantai=2 and tanggal between date_sub(now(),INTERVAL 1 MONTH) and now() GROUP BY DATE(timbangan_harian_a.tanggal)');
                    $data_array = $query->getResultArray();
                    $parse_data_array_x = str_replace('tanggal', 'x', json_encode($data_array, JSON_NUMERIC_CHECK));
                    $parse_data_array_y = str_replace('sisa', 'y', $parse_data_array_x);
                    return $parse_data_array_y;
            
                    }
                public function get_pakan_masuk_2() {
                    $query = $this->db->table('timbangan_harian_a');
                    $query = $this->db->query('select tanggal,masuk FROM timbangan_harian_a where lantai=2 and tanggal between date_sub(now(),INTERVAL 1 MONTH) and now() GROUP BY DATE(timbangan_harian_a.tanggal)');
                    $data_array = $query->getResultArray();
                    $parse_data_array_x = str_replace('tanggal', 'x', json_encode($data_array, JSON_NUMERIC_CHECK));
                    $parse_data_array_y = str_replace('masuk', 'y', $parse_data_array_x);
                    return $parse_data_array_y;
            
                    }

                    public function get_pakan_pakai_b() {
                        $query = $this->db->table('timbangan_harian_b');
                        $query = $this->db->query('select tanggal,pakai FROM timbangan_harian_b where lantai=1 and tanggal between date_sub(now(),INTERVAL 1 MONTH) and now() GROUP BY DATE(timbangan_harian_b.tanggal)');
                        $data_array = $query->getResultArray();
                        $parse_data_array_x = str_replace('tanggal', 'x', json_encode($data_array, JSON_NUMERIC_CHECK));
                        $parse_data_array_y = str_replace('pakai', 'y', $parse_data_array_x);
                        return $parse_data_array_y;
                
                        }

                    public function get_pakan_sisa_b() {
                        $query = $this->db->table('timbangan_harian_b');
                        $query = $this->db->query('select tanggal,sisa FROM timbangan_harian_b where lantai=1 and tanggal between date_sub(now(),INTERVAL 1 MONTH) and now() GROUP BY DATE(timbangan_harian_b.tanggal)');
                        $data_array = $query->getResultArray();
                        $parse_data_array_x = str_replace('tanggal', 'x', json_encode($data_array, JSON_NUMERIC_CHECK));
                        $parse_data_array_y = str_replace('sisa', 'y', $parse_data_array_x);
                        return $parse_data_array_y;
                
                        }
                    public function get_pakan_masuk_b() {
                        $query = $this->db->table('timbangan_harian_b');
                        $query = $this->db->query('select tanggal,masuk FROM timbangan_harian_b where lantai=1 and tanggal between date_sub(now(),INTERVAL 1 MONTH) and now() GROUP BY DATE(timbangan_harian_b.tanggal)');
                        $data_array = $query->getResultArray();
                        $parse_data_array_x = str_replace('tanggal', 'x', json_encode($data_array, JSON_NUMERIC_CHECK));
                        $parse_data_array_y = str_replace('masuk', 'y', $parse_data_array_x);
                        return $parse_data_array_y;
                
                        }
            
                        public function get_pakan_pakai_b_2() {
                            $query = $this->db->table('timbangan_harian_b');
                            $query = $this->db->query('select tanggal,pakai FROM timbangan_harian_b where lantai=2 and tanggal between date_sub(now(),INTERVAL 1 MONTH) and now() GROUP BY DATE(timbangan_harian_b.tanggal)');
                            $data_array = $query->getResultArray();
                            $parse_data_array_x = str_replace('tanggal', 'x', json_encode($data_array, JSON_NUMERIC_CHECK));
                            $parse_data_array_y = str_replace('pakai', 'y', $parse_data_array_x);
                            return $parse_data_array_y;
                    
                            }
                    
                            public function get_pakan_sisa_b_2() {
                                $query = $this->db->table('timbangan_harian_b');
                                $query = $this->db->query('select tanggal,sisa FROM timbangan_harian_b where lantai=2 and tanggal between date_sub(now(),INTERVAL 1 MONTH) and now() GROUP BY DATE(timbangan_harian_b.tanggal)');
                                $data_array = $query->getResultArray();
                                $parse_data_array_x = str_replace('tanggal', 'x', json_encode($data_array, JSON_NUMERIC_CHECK));
                                $parse_data_array_y = str_replace('sisa', 'y', $parse_data_array_x);
                                return $parse_data_array_y;
                        
                                }
                            public function get_pakan_masuk_b_2() {
                                $query = $this->db->table('timbangan_harian_b');
                                $query = $this->db->query('select tanggal,masuk FROM timbangan_harian_b where lantai=2 and tanggal between date_sub(now(),INTERVAL 1 MONTH) and now() GROUP BY DATE(timbangan_harian_b.tanggal)');
                                $data_array = $query->getResultArray();
                                $parse_data_array_x = str_replace('tanggal', 'x', json_encode($data_array, JSON_NUMERIC_CHECK));
                                $parse_data_array_y = str_replace('masuk', 'y', $parse_data_array_x);
                                return $parse_data_array_y;
                        
                                }
 
}