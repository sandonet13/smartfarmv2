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
       if (empty($data_array)){
        "Data Empty";
       }else{

            foreach($data_array as $data) {
                $data_decode[] = json_decode(json_encode($data),true);
            }
            $total_panen = 0;
            foreach($data_decode as $key => $val) {
                $total_panen += $val['ekor'];
            }
                return $total_panen;
        }   
    }

    public function get_hasil_panen_b() {
        $query = $this->db->table('panen_b');
        $query = $this->db->query('select ekor from panen_b');
        $data_array = $query->getResultArray();
        if (empty($data_array)){
            "Data Empty";
           }else{
                foreach($data_array as $data) {
                $data_decode[] = json_decode(json_encode($data),true);
            }
            $total_panen = 0;
            foreach($data_decode as $key => $val) {
                $total_panen += $val['ekor'];
            }
                return $total_panen;
            }
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
        if (empty($data_array)){
            "Data Empty";
           }else{
        foreach($data_array as $data) {
            $data_decode[] = json_decode(json_encode($data),true);
        }
        $total_panen = 0;
        foreach($data_decode as $key => $val) {
            $total_panen += $val['ekor'];
        }

    
        return $data_array_berat[0]['tonase'] / $total_panen;
           }
    
     }

     public function get_berat_rata_b() {
        $query = $this->db->table('panen_b');
        $query = $this->db->query('select SUM(tonase) as tonase FROM panen_b');
        $data_array_berat = $query->getResultArray();
        $query_ekor = $this->db->table('panen_b');
        $query_ekor = $this->db->query('select ekor from panen_b');
        $data_array = $query_ekor->getResultArray();
        if (empty($data_array)){
            "Data Empty";
           }else{
        foreach($data_array as $data) {
            $data_decode[] = json_decode(json_encode($data),true);
        }
        $total_panen = 0;
        foreach($data_decode as $key => $val) {
            $total_panen += $val['ekor'];
        }

    
        return $data_array_berat[0]['tonase'] / $total_panen;
        }
     }
     

     public function timbangan_harian_a_1() {
        $query = $this->db->table('timbangan_harian_a');
        $query_umur = $this->db->query('select MAX(umur) as umur FROM timbangan_harian_a where lantai=1');
        $query_sekat_1 = $this->db->query('select sekat_1 FROM timbangan_harian_a where umur=(select MAX(umur) from timbangan_harian_a where lantai=1)');
        $query_sekat_2 = $this->db->query('select sekat_2 FROM timbangan_harian_a where umur=(select MAX(umur) from timbangan_harian_a where lantai=1)');
        $query_sekat_3 = $this->db->query('select sekat_3 FROM timbangan_harian_a where umur=(select MAX(umur) from timbangan_harian_a where lantai=1)');
        $query_sekat_4 = $this->db->query('select sekat_4 FROM timbangan_harian_a where umur=(select MAX(umur) from timbangan_harian_a where lantai=1)');
        $query_sekat_5 = $this->db->query('select sekat_5 FROM timbangan_harian_a where umur=(select MAX(umur) from timbangan_harian_a where lantai=1)');
        $query_avg = $this->db->query('select (sekat_1 + sekat_2 + sekat_3 + sekat_4 + sekat_5) / 5 as avg_sekat FROM timbangan_harian_a where umur=(select MAX(umur) from timbangan_harian_a where lantai=1)');
        $query_pakai = $this->db->query('select SUM(pakai) as pakai FROM timbangan_harian_a where lantai=1');
        $query_sisa = $this->db->query('select SUM(sisa) as sisa FROM timbangan_harian_a where lantai=1');


        if(empty($query_sekat_1->getResultArray())){
            $query_sekat_1 = json_decode('[{"sekat_1":"0"}]', true);
        }else{
            $query_sekat_1 = $query_sekat_1->getResultArray();
        }
        if(empty($query_sekat_2->getResultArray())){
            $query_sekat_2 = json_decode('[{"sekat_2":"0"}]', true);
        }else{
            $query_sekat_2 = $query_sekat_2->getResultArray();
        }
        if(empty($query_sekat_3->getResultArray())){
            $query_sekat_3 = json_decode('[{"sekat_3":"0"}]', true);
        }else{
            $query_sekat_3 = $query_sekat_3->getResultArray();
        }
        if(empty($query_sekat_4->getResultArray())){
            $query_sekat_4 = json_decode('[{"sekat_4":"0"}]', true);
        }else{
            $query_sekat_4 = $query_sekat_4->getResultArray();
        }
        if(empty($query_sekat_5->getResultArray())){
            $query_sekat_5 = json_decode('[{"sekat_5":"0"}]', true);
        }else{
            $query_sekat_5 = $query_sekat_5->getResultArray();
        }
        if(empty($query_avg->getResultArray())){
            $query_avg = json_decode('[{"avg_sekat":"0"}]', true);
        }else{
            $query_avg = $query_avg->getResultArray();
        }
        if(empty($query_umur->getResultArray())){
            $query_umur = json_decode('[{"umur":"0"}]', true);
        }else{
            $query_umur = $query_umur->getResultArray();
        }
        if(empty($query_pakai->getResultArray())){
            $query_pakai = json_decode('[{"pakai":"0"}]', true);
        }else{
            $query_pakai = $query_pakai->getResultArray();
        }
        if(empty($query_sisa->getResultArray())){
            $query_sisa = json_decode('[{"sisa":"0"}]', true);
        }else{
            $query_sisa = $query_sisa->getResultArray();
        }

        $data = [
            floatval($query_sekat_1[0]['sekat_1']),
			floatval($query_sekat_2[0]['sekat_2']),
			floatval($query_sekat_3[0]['sekat_3']),
			floatval($query_sekat_4[0]['sekat_4']),
			floatval($query_sekat_5[0]['sekat_5']),
			floatval($query_avg[0]['avg_sekat']),
			floatval($query_umur[0]['umur']),
            floatval($query_pakai[0]['pakai']),
            floatval($query_sisa[0]['sisa']),
		];
		

        return $data;

        }


        public function timbangan_harian_a_2() {
            $query = $this->db->table('timbangan_harian_a');
            $query_umur = $this->db->query('select MAX(umur) as umur FROM timbangan_harian_a where lantai=2');
            $query_sekat_1 = $this->db->query('select sekat_1 FROM timbangan_harian_a where umur=(select MAX(umur) from timbangan_harian_a where lantai=2)');
            $query_sekat_2 = $this->db->query('select sekat_2 FROM timbangan_harian_a where umur=(select MAX(umur) from timbangan_harian_a where lantai=2)');
            $query_sekat_3 = $this->db->query('select sekat_3 FROM timbangan_harian_a where umur=(select MAX(umur) from timbangan_harian_a where lantai=2)');
            $query_sekat_4 = $this->db->query('select sekat_4 FROM timbangan_harian_a where umur=(select MAX(umur) from timbangan_harian_a where lantai=2)');
            $query_sekat_5 = $this->db->query('select sekat_5 FROM timbangan_harian_a where umur=(select MAX(umur) from timbangan_harian_a where lantai=2)');
            $query_avg = $this->db->query('select (sekat_1 + sekat_2 + sekat_3 + sekat_4 + sekat_5) / 5 as avg_sekat FROM timbangan_harian_a where umur=(select MAX(umur) from timbangan_harian_a where lantai=2)');
            $query_pakai = $this->db->query('select SUM(pakai) as pakai FROM timbangan_harian_a where lantai=2');
            $query_sisa = $this->db->query('select SUM(sisa) as sisa FROM timbangan_harian_a where lantai=2');


            if(empty($query_sekat_1->getResultArray())){
                $query_sekat_1 = json_decode('[{"sekat_1":"0"}]', true);
            }else{
                $query_sekat_1 = $query_sekat_1->getResultArray();
            }
            if(empty($query_sekat_2->getResultArray())){
                $query_sekat_2 = json_decode('[{"sekat_2":"0"}]', true);
            }else{
                $query_sekat_2 = $query_sekat_2->getResultArray();
            }
            if(empty($query_sekat_3->getResultArray())){
                $query_sekat_3 = json_decode('[{"sekat_3":"0"}]', true);
            }else{
                $query_sekat_3 = $query_sekat_3->getResultArray();
            }
            if(empty($query_sekat_4->getResultArray())){
                $query_sekat_4 = json_decode('[{"sekat_4":"0"}]', true);
            }else{
                $query_sekat_4 = $query_sekat_4->getResultArray();
            }
            if(empty($query_sekat_5->getResultArray())){
                $query_sekat_5 = json_decode('[{"sekat_5":"0"}]', true);
            }else{
                $query_sekat_5 = $query_sekat_5->getResultArray();
            }
            if(empty($query_avg->getResultArray())){
                $query_avg = json_decode('[{"avg_sekat":"0"}]', true);
            }else{
                $query_avg = $query_avg->getResultArray();
            }
            if(empty($query_umur->getResultArray())){
                $query_umur = json_decode('[{"umur":"0"}]', true);
            }else{
                $query_umur = $query_umur->getResultArray();
            }
            if(empty($query_pakai->getResultArray())){
                $query_pakai = json_decode('[{"pakai":"0"}]', true);
            }else{
                $query_pakai = $query_pakai->getResultArray();
            }
            if(empty($query_sisa->getResultArray())){
                $query_sisa = json_decode('[{"sisa":"0"}]', true);
            }else{
                $query_sisa = $query_sisa->getResultArray();
            }
    
            $data = [
                floatval($query_sekat_1[0]['sekat_1']),
                floatval($query_sekat_2[0]['sekat_2']),
                floatval($query_sekat_3[0]['sekat_3']),
                floatval($query_sekat_4[0]['sekat_4']),
                floatval($query_sekat_5[0]['sekat_5']),
                floatval($query_avg[0]['avg_sekat']),
                floatval($query_umur[0]['umur']),
                floatval($query_pakai[0]['pakai']),
                floatval($query_sisa[0]['sisa']),

            ];
            
    
            return $data;
    
            }

            public function timbangan_harian_b_1() {
                $query = $this->db->table('timbangan_harian_b');
                $query_umur = $this->db->query('select MAX(umur) as umur FROM timbangan_harian_b where lantai=1');
                $query_sekat_1 = $this->db->query('select sekat_1 FROM timbangan_harian_b where umur=(select MAX(umur) from timbangan_harian_b where lantai=1)');
                $query_sekat_2 = $this->db->query('select sekat_2 FROM timbangan_harian_b where umur=(select MAX(umur) from timbangan_harian_b where lantai=1)');
                $query_sekat_3 = $this->db->query('select sekat_3 FROM timbangan_harian_b where umur=(select MAX(umur) from timbangan_harian_b where lantai=1)');
                $query_sekat_4 = $this->db->query('select sekat_4 FROM timbangan_harian_b where umur=(select MAX(umur) from timbangan_harian_b where lantai=1)');
                $query_sekat_5 = $this->db->query('select sekat_5 FROM timbangan_harian_b where umur=(select MAX(umur) from timbangan_harian_b where lantai=1)');
                $query_avg = $this->db->query('select (sekat_1 + sekat_2 + sekat_3 + sekat_4 + sekat_5) / 5 as avg_sekat FROM timbangan_harian_b where umur=(select MAX(umur) from timbangan_harian_b where lantai=1)');
                $query_pakai = $this->db->query('select SUM(pakai) as pakai FROM timbangan_harian_b where lantai=1');
                $query_sisa = $this->db->query('select SUM(sisa) as sisa FROM timbangan_harian_b where lantai=1');


                if(empty($query_sekat_1->getResultArray())){
                    $query_sekat_1 = json_decode('[{"sekat_1":"0"}]', true);
                }else{
                    $query_sekat_1 = $query_sekat_1->getResultArray();
                }
                if(empty($query_sekat_2->getResultArray())){
                    $query_sekat_2 = json_decode('[{"sekat_2":"0"}]', true);
                }else{
                    $query_sekat_2 = $query_sekat_2->getResultArray();
                }
                if(empty($query_sekat_3->getResultArray())){
                    $query_sekat_3 = json_decode('[{"sekat_3":"0"}]', true);
                }else{
                    $query_sekat_3 = $query_sekat_3->getResultArray();
                }
                if(empty($query_sekat_4->getResultArray())){
                    $query_sekat_4 = json_decode('[{"sekat_4":"0"}]', true);
                }else{
                    $query_sekat_4 = $query_sekat_4->getResultArray();
                }
                if(empty($query_sekat_5->getResultArray())){
                    $query_sekat_5 = json_decode('[{"sekat_5":"0"}]', true);
                }else{
                    $query_sekat_5 = $query_sekat_5->getResultArray();
                }
                if(empty($query_avg->getResultArray())){
                    $query_avg = json_decode('[{"avg_sekat":"0"}]', true);
                }else{
                    $query_avg = $query_avg->getResultArray();
                }
                if(empty($query_umur->getResultArray())){
                    $query_umur = json_decode('[{"umur":"0"}]', true);
                }else{
                    $query_umur = $query_umur->getResultArray();
                }
                if(empty($query_pakai->getResultArray())){
                    $query_pakai = json_decode('[{"pakai":"0"}]', true);
                }else{
                    $query_pakai = $query_pakai->getResultArray();
                }
                if(empty($query_sisa->getResultArray())){
                    $query_sisa = json_decode('[{"sisa":"0"}]', true);
                }else{
                    $query_sisa = $query_sisa->getResultArray();
                }
        
                $data = [
                    floatval($query_sekat_1[0]['sekat_1']),
                    floatval($query_sekat_2[0]['sekat_2']),
                    floatval($query_sekat_3[0]['sekat_3']),
                    floatval($query_sekat_4[0]['sekat_4']),
                    floatval($query_sekat_5[0]['sekat_5']),
                    floatval($query_avg[0]['avg_sekat']),
                    floatval($query_umur[0]['umur']),
                    floatval($query_pakai[0]['pakai']),
                    floatval($query_sisa[0]['sisa']),
                ];
                
        
                return $data;
        
                }

                public function timbangan_harian_b_2() {
                    $query = $this->db->table('timbangan_harian_b');
                    $query_umur = $this->db->query('select MAX(umur) as umur FROM timbangan_harian_b where lantai=2');
                    $query_sekat_1 = $this->db->query('select sekat_1 FROM timbangan_harian_b where umur=(select MAX(umur) from timbangan_harian_b where lantai=2)');
                    $query_sekat_2 = $this->db->query('select sekat_2 FROM timbangan_harian_b where umur=(select MAX(umur) from timbangan_harian_b where lantai=2)');
                    $query_sekat_3 = $this->db->query('select sekat_3 FROM timbangan_harian_b where umur=(select MAX(umur) from timbangan_harian_b where lantai=2)');
                    $query_sekat_4 = $this->db->query('select sekat_4 FROM timbangan_harian_b where umur=(select MAX(umur) from timbangan_harian_b where lantai=2)');
                    $query_sekat_5 = $this->db->query('select sekat_5 FROM timbangan_harian_b where umur=(select MAX(umur) from timbangan_harian_b where lantai=2)');
                    $query_avg = $this->db->query('select (sekat_1 + sekat_2 + sekat_3 + sekat_4 + sekat_5) / 5 as avg_sekat FROM timbangan_harian_b where umur=(select MAX(umur) from timbangan_harian_b where lantai=2)');
                    $query_pakai = $this->db->query('select SUM(pakai) as pakai FROM timbangan_harian_b where lantai=2');
                    $query_sisa = $this->db->query('select SUM(sisa) as sisa FROM timbangan_harian_b where lantai=2');


                    if(empty($query_sekat_1->getResultArray())){
                        $query_sekat_1 = json_decode('[{"sekat_1":"0"}]', true);
                    }else{
                        $query_sekat_1 = $query_sekat_1->getResultArray();
                    }
                    if(empty($query_sekat_2->getResultArray())){
                        $query_sekat_2 = json_decode('[{"sekat_2":"0"}]', true);
                    }else{
                        $query_sekat_2 = $query_sekat_2->getResultArray();
                    }
                    if(empty($query_sekat_3->getResultArray())){
                        $query_sekat_3 = json_decode('[{"sekat_3":"0"}]', true);
                    }else{
                        $query_sekat_3 = $query_sekat_3->getResultArray();
                    }
                    if(empty($query_sekat_4->getResultArray())){
                        $query_sekat_4 = json_decode('[{"sekat_4":"0"}]', true);
                    }else{
                        $query_sekat_4 = $query_sekat_4->getResultArray();
                    }
                    if(empty($query_sekat_5->getResultArray())){
                        $query_sekat_5 = json_decode('[{"sekat_5":"0"}]', true);
                    }else{
                        $query_sekat_5 = $query_sekat_5->getResultArray();
                    }
                    if(empty($query_avg->getResultArray())){
                        $query_avg = json_decode('[{"avg_sekat":"0"}]', true);
                    }else{
                        $query_avg = $query_avg->getResultArray();
                    }
                    if(empty($query_umur->getResultArray())){
                        $query_umur = json_decode('[{"umur":"0"}]', true);
                    }else{
                        $query_umur = $query_umur->getResultArray();
                    }
                    if(empty($query_pakai->getResultArray())){
                        $query_pakai = json_decode('[{"pakai":"0"}]', true);
                    }else{
                        $query_pakai = $query_pakai->getResultArray();
                    }
                    if(empty($query_sisa->getResultArray())){
                        $query_sisa = json_decode('[{"sisa":"0"}]', true);
                    }else{
                        $query_sisa = $query_sisa->getResultArray();
                    }
            
                    $data = [
                        floatval($query_sekat_1[0]['sekat_1']),
                        floatval($query_sekat_2[0]['sekat_2']),
                        floatval($query_sekat_3[0]['sekat_3']),
                        floatval($query_sekat_4[0]['sekat_4']),
                        floatval($query_sekat_5[0]['sekat_5']),
                        floatval($query_avg[0]['avg_sekat']),
                        floatval($query_umur[0]['umur']),
                        floatval($query_pakai[0]['pakai']),
                        floatval($query_sisa[0]['sisa']),
                    ];
                    
            
                    return $data;
            
                    }
        public function kematian_a_1() {
            $query = $this->db->table('timbangan_harian_a');
            $query_umur = $this->db->query('select MAX(umur) as umur FROM timbangan_harian_a where lantai=1');
            $query = $this->db->table('kematian_a');
            $query_sekat_1 = $this->db->query('select SUM(sekat_1) as sekat_1 FROM kematian_a where lantai=1');
            $query_sekat_2 = $this->db->query('select SUM(sekat_2) as sekat_2 FROM kematian_a where lantai=1');
            $query_sekat_3 = $this->db->query('select SUM(sekat_3) as sekat_3 FROM kematian_a where lantai=1');
            $query_sekat_4 = $this->db->query('select SUM(sekat_4) as sekat_4 FROM kematian_a where lantai=1');
            $query_sekat_5 = $this->db->query('select SUM(sekat_5) as sekat_5 FROM kematian_a where lantai=1');
            $query_avg = $this->db->query('select SUM(sekat_1) + SUM(sekat_2) + SUM(sekat_3) + SUM(sekat_4) + SUM(sekat_5) as total FROM kematian_a where lantai=1');
    
            if(empty($query_sekat_1->getResultArray())){
                $query_sekat_1 = json_decode('[{"sekat_1":"0"}]', true);
            }else{
                $query_sekat_1 = $query_sekat_1->getResultArray();
            }
            if(empty($query_sekat_2->getResultArray())){
                $query_sekat_2 = json_decode('[{"sekat_2":"0"}]', true);
            }else{
                $query_sekat_2 = $query_sekat_2->getResultArray();
            }
            if(empty($query_sekat_3->getResultArray())){
                $query_sekat_3 = json_decode('[{"sekat_3":"0"}]', true);
            }else{
                $query_sekat_3 = $query_sekat_3->getResultArray();
            }
            if(empty($query_sekat_4->getResultArray())){
                $query_sekat_4 = json_decode('[{"sekat_4":"0"}]', true);
            }else{
                $query_sekat_4 = $query_sekat_4->getResultArray();
            }
            if(empty($query_sekat_5->getResultArray())){
                $query_sekat_5 = json_decode('[{"sekat_5":"0"}]', true);
            }else{
                $query_sekat_5 = $query_sekat_5->getResultArray();
            }
            if(empty($query_avg->getResultArray())){
                $query_avg = json_decode('[{"total":"0"}]', true);
            }else{
                $query_avg = $query_avg->getResultArray();
            }
            if(empty($query_umur->getResultArray())){
                $query_umur = json_decode('[{"umur":"0"}]', true);
            }else{
                $query_umur = $query_umur->getResultArray();
            }
    
            $data = [
                floatval($query_sekat_1[0]['sekat_1']),
                floatval($query_sekat_2[0]['sekat_2']),
                floatval($query_sekat_3[0]['sekat_3']),
                floatval($query_sekat_4[0]['sekat_4']),
                floatval($query_sekat_5[0]['sekat_5']),
                floatval($query_avg[0]['total']),
                floatval($query_umur[0]['umur']),
            ];
            
    
            return $data;
    
            }

        public function kematian_a_2() {
            $query = $this->db->table('timbangan_harian_a');
            $query_umur = $this->db->query('select MAX(umur) as umur FROM timbangan_harian_a where lantai=2');
            $query = $this->db->table('kematian_a');
            $query_sekat_1 = $this->db->query('select SUM(sekat_1) as sekat_1 FROM kematian_a where lantai=2');
            $query_sekat_2 = $this->db->query('select SUM(sekat_2) as sekat_2 FROM kematian_a where lantai=2');
            $query_sekat_3 = $this->db->query('select SUM(sekat_3) as sekat_3 FROM kematian_a where lantai=2');
            $query_sekat_4 = $this->db->query('select SUM(sekat_4) as sekat_4 FROM kematian_a where lantai=2');
            $query_sekat_5 = $this->db->query('select SUM(sekat_5) as sekat_5 FROM kematian_a where lantai=2');
            $query_avg = $this->db->query('select (SUM(sekat_1) + SUM(sekat_2) + SUM(sekat_3) + SUM(sekat_4) + SUM(sekat_5)) as total FROM kematian_a where lantai=2');
    
            if(empty($query_sekat_1->getResultArray())){
                $query_sekat_1 = json_decode('[{"sekat_1":"0"}]', true);
            }else{
                $query_sekat_1 = $query_sekat_1->getResultArray();
            }
            if(empty($query_sekat_2->getResultArray())){
                $query_sekat_2 = json_decode('[{"sekat_2":"0"}]', true);
            }else{
                $query_sekat_2 = $query_sekat_2->getResultArray();
            }
            if(empty($query_sekat_3->getResultArray())){
                $query_sekat_3 = json_decode('[{"sekat_3":"0"}]', true);
            }else{
                $query_sekat_3 = $query_sekat_3->getResultArray();
            }
            if(empty($query_sekat_4->getResultArray())){
                $query_sekat_4 = json_decode('[{"sekat_4":"0"}]', true);
            }else{
                $query_sekat_4 = $query_sekat_4->getResultArray();
            }
            if(empty($query_sekat_5->getResultArray())){
                $query_sekat_5 = json_decode('[{"sekat_5":"0"}]', true);
            }else{
                $query_sekat_5 = $query_sekat_5->getResultArray();
            }
            if(empty($query_avg->getResultArray())){
                $query_avg = json_decode('[{"total":"0"}]', true);
            }else{
                $query_avg = $query_avg->getResultArray();
            }
            if(empty($query_umur->getResultArray())){
                $query_umur = json_decode('[{"umur":"0"}]', true);
            }else{
                $query_umur = $query_umur->getResultArray();
            }
    
            $data = [
                floatval($query_sekat_1[0]['sekat_1']),
                floatval($query_sekat_2[0]['sekat_2']),
                floatval($query_sekat_3[0]['sekat_3']),
                floatval($query_sekat_4[0]['sekat_4']),
                floatval($query_sekat_5[0]['sekat_5']),
                floatval($query_avg[0]['total']),
                floatval($query_umur[0]['umur']),
            ];
            
    
            return $data;
    
            }

        public function kematian_b_1() {
            $query = $this->db->table('timbangan_harian_b');
            $query_umur = $this->db->query('select MAX(umur) as umur FROM timbangan_harian_b where lantai=1');
            $query = $this->db->table('kematian_b');
            $query_sekat_1 = $this->db->query('select SUM(sekat_1) as sekat_1 FROM kematian_b where lantai=1');
            $query_sekat_2 = $this->db->query('select SUM(sekat_2) as sekat_2 FROM kematian_b where lantai=1');
            $query_sekat_3 = $this->db->query('select SUM(sekat_3) as sekat_3 FROM kematian_b where lantai=1');
            $query_sekat_4 = $this->db->query('select SUM(sekat_4) as sekat_4 FROM kematian_b where lantai=1');
            $query_sekat_5 = $this->db->query('select SUM(sekat_5) as sekat_5 FROM kematian_b where lantai=1');
            $query_avg = $this->db->query('select SUM(sekat_1) + SUM(sekat_2) + SUM(sekat_3) + SUM(sekat_4) + SUM(sekat_5) as total FROM kematian_b where lantai=1');
    
            if(empty($query_sekat_1->getResultArray())){
                $query_sekat_1 = json_decode('[{"sekat_1":"0"}]', true);
            }else{
                $query_sekat_1 = $query_sekat_1->getResultArray();
            }
            if(empty($query_sekat_2->getResultArray())){
                $query_sekat_2 = json_decode('[{"sekat_2":"0"}]', true);
            }else{
                $query_sekat_2 = $query_sekat_2->getResultArray();
            }
            if(empty($query_sekat_3->getResultArray())){
                $query_sekat_3 = json_decode('[{"sekat_3":"0"}]', true);
            }else{
                $query_sekat_3 = $query_sekat_3->getResultArray();
            }
            if(empty($query_sekat_4->getResultArray())){
                $query_sekat_4 = json_decode('[{"sekat_4":"0"}]', true);
            }else{
                $query_sekat_4 = $query_sekat_4->getResultArray();
            }
            if(empty($query_sekat_5->getResultArray())){
                $query_sekat_5 = json_decode('[{"sekat_5":"0"}]', true);
            }else{
                $query_sekat_5 = $query_sekat_5->getResultArray();
            }
            if(empty($query_avg->getResultArray())){
                $query_avg = json_decode('[{"total":"0"}]', true);
            }else{
                $query_avg = $query_avg->getResultArray();
            }
            if(empty($query_umur->getResultArray())){
                $query_umur = json_decode('[{"umur":"0"}]', true);
            }else{
                $query_umur = $query_umur->getResultArray();
            }
    
            $data = [
                floatval($query_sekat_1[0]['sekat_1']),
                floatval($query_sekat_2[0]['sekat_2']),
                floatval($query_sekat_3[0]['sekat_3']),
                floatval($query_sekat_4[0]['sekat_4']),
                floatval($query_sekat_5[0]['sekat_5']),
                floatval($query_avg[0]['total']),
                floatval($query_umur[0]['umur']),
            ];
            
    
            return $data;
    
            }

    public function kematian_b_2() {
        $query = $this->db->table('timbangan_harian_b');
        $query_umur = $this->db->query('select MAX(umur) as umur FROM timbangan_harian_b where lantai=2');
        $query = $this->db->table('kematian_b');
        $query_sekat_1 = $this->db->query('select SUM(sekat_1) as sekat_1 FROM kematian_b where lantai=2');
        $query_sekat_2 = $this->db->query('select SUM(sekat_2) as sekat_2 FROM kematian_b where lantai=2');
        $query_sekat_3 = $this->db->query('select SUM(sekat_3) as sekat_3 FROM kematian_b where lantai=2');
        $query_sekat_4 = $this->db->query('select SUM(sekat_4) as sekat_4 FROM kematian_b where lantai=2');
        $query_sekat_5 = $this->db->query('select SUM(sekat_5) as sekat_5 FROM kematian_b where lantai=2');
        $query_avg = $this->db->query('select (SUM(sekat_1) + SUM(sekat_2) + SUM(sekat_3) + SUM(sekat_4) + SUM(sekat_5)) as total FROM kematian_b where lantai=2');

        if(empty($query_sekat_1->getResultArray())){
            $query_sekat_1 = json_decode('[{"sekat_1":"0"}]', true);
        }else{
            $query_sekat_1 = $query_sekat_1->getResultArray();
        }
        if(empty($query_sekat_2->getResultArray())){
            $query_sekat_2 = json_decode('[{"sekat_2":"0"}]', true);
        }else{
            $query_sekat_2 = $query_sekat_2->getResultArray();
        }
        if(empty($query_sekat_3->getResultArray())){
            $query_sekat_3 = json_decode('[{"sekat_3":"0"}]', true);
        }else{
            $query_sekat_3 = $query_sekat_3->getResultArray();
        }
        if(empty($query_sekat_4->getResultArray())){
            $query_sekat_4 = json_decode('[{"sekat_4":"0"}]', true);
        }else{
            $query_sekat_4 = $query_sekat_4->getResultArray();
        }
        if(empty($query_sekat_5->getResultArray())){
            $query_sekat_5 = json_decode('[{"sekat_5":"0"}]', true);
        }else{
            $query_sekat_5 = $query_sekat_5->getResultArray();
        }
        if(empty($query_avg->getResultArray())){
            $query_avg = json_decode('[{"total":"0"}]', true);
        }else{
            $query_avg = $query_avg->getResultArray();
        }
        if(empty($query_umur->getResultArray())){
            $query_umur = json_decode('[{"umur":"0"}]', true);
        }else{
            $query_umur = $query_umur->getResultArray();
        }

        $data = [
            floatval($query_sekat_1[0]['sekat_1']),
            floatval($query_sekat_2[0]['sekat_2']),
            floatval($query_sekat_3[0]['sekat_3']),
            floatval($query_sekat_4[0]['sekat_4']),
            floatval($query_sekat_5[0]['sekat_5']),
            floatval($query_avg[0]['total']),
            floatval($query_umur[0]['umur']),
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