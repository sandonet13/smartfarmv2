<?php
 
namespace App\Controllers;
 
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\TimbanganModela;
use App\Models\TimbanganModelb;
use App\Models\TableHarianModel;
class TableHarianController extends BaseController {
 
 
    function __construct()
    {
        $this->timbanganModela = new TimbanganModela();
        $this->timbanganModelb = new TimbanganModelb();
        $this->tableHarianModel = new TableHarianModel();
    }

    public function index() {
         
        helper(['form', 'url']);
        $data['timbangan_a_lantai_1'] = $this->tableHarianModel->get_all_timbangan_a_1();
        $data['timbangan_a_lantai_2'] = $this->tableHarianModel->get_all_timbangan_a_2();
        $data['timbangan_b_lantai_1'] = $this->tableHarianModel->get_all_timbangan_b_1();
        $data['timbangan_b_lantai_2'] = $this->tableHarianModel->get_all_timbangan_b_2();
        $data['title_meta'] = ['title' => 'Table Data Harian'];
        $data['page_title'] = ['title' => 'Table_Data_Harian', 'li_1' => 'Forms', 'li_2' => 'Table Data Harian'];

        return view('table-harian', $data);
    }
 
 
    public function timbangan_a_lantai_1_update($id)
 
    {
        $this->timbanganModela->update($id, [
            'tanggal' => $this->request->getPost('tanggal'),
            'umur' => $this->request->getPost('umur'),
            'waktu' => $this->request->getPost('waktu'),
            'vaksin' => $this->request->getPost('vaksin'),
            'sekat_1' => $this->request->getPost('sekat_1'),
            'sekat_2' => $this->request->getPost('sekat_2'),
            'sekat_3' => $this->request->getPost('sekat_3'),
            'sekat_4' => $this->request->getPost('sekat_4'),
            'sekat_5' => $this->request->getPost('sekat_5'),
            'masuk' => $this->request->getPost('masuk'),
            'pakai' => $this->request->getPost('pakai'),
            'lantai' => $this->request->getPost('lantai'),
            // 'bw_ekor_kg' => $this->request->getPost('bw_ekor_kg')
        ]);
        session()->setFlashdata("message", "Data berhasil diubah");
        return redirect()->to(base_url('table-harian'));
    }


    public function timbangan_a_lantai_1_delete($id)
    {   

    $this->timbanganModela->delete($id);

    session()->setFlashdata("message", "Data berhasil dihapus");
    return redirect()->to(base_url('table-harian'));
    }

    public function timbangan_b_lantai_1_delete($id)
    {   

    $this->timbanganModelb->delete($id);

    session()->setFlashdata("message", "Data berhasil dihapus");
    return redirect()->to(base_url('table-harian'));
    }

 
}