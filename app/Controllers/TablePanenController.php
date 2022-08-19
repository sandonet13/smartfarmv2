<?php
 
namespace App\Controllers;
 
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\TablePanenModel;
use App\Models\PanenModela;
use App\Models\PanenModelb;
class TablePanenController extends BaseController {
 
 
    public function index() {
         
        helper(['form', 'url']);
        $this->tablePanenModel= new TablePanenModel();
        $data['panen'] = $this->tablePanenModel->get_all_panen_a();
        $data['panen_b'] = $this->tablePanenModel->get_all_panen_b();
        $data['title_meta'] = ['title' => 'Input Data Panen'];
        $data['page_title'] = ['title' => 'Input_Data_Panen', 'li_1' => 'Forms', 'li_2' => 'Input Data Panen'];

        return view('table-panen', $data);
    }
 
 
    public function panen_update($id)
 
    {
        $this->panenModela = new PanenModela();
        $this->panenModela->update($id, [
            'tanggal' => $this->request->getPost('tanggal'),
            'umur' => $this->request->getPost('umur'),
            'no_do' => $this->request->getPost('no_do'),
            'penerima' => $this->request->getPost('penerima'),
            'no_truk' => $this->request->getPost('no_truk'),
            'nama_supir' => $this->request->getPost('nama_supir'),
            'jam_tangkap' => $this->request->getPost('jam_tangkap'),
            'jam_berangkat' => $this->request->getPost('jam_berangkat'),
            'tonase' => $this->request->getPost('tonase'),
            'ekor' => $this->request->getPost('ekor'),
            'lantai' => $this->request->getPost('lantai'),
            'sekat' => $this->request->getPost('sekat'),
            // 'bw_ekor_kg' => $this->request->getPost('bw_ekor_kg')
        ]);
        session()->setFlashdata("message", "Data berhasil diubah");
        return redirect()->to(base_url('table-panen'));
    }

    public function panen_update_b($id)
 
    {
        $this->panenModelb = new PanenModelb();
        $this->panenModelb->update($id, [
            'tanggal' => $this->request->getPost('tanggal'),
            'umur' => $this->request->getPost('umur'),
            'no_do' => $this->request->getPost('no_do'),
            'penerima' => $this->request->getPost('penerima'),
            'no_truk' => $this->request->getPost('no_truk'),
            'nama_supir' => $this->request->getPost('nama_supir'),
            'jam_tangkap' => $this->request->getPost('jam_tangkap'),
            'jam_berangkat' => $this->request->getPost('jam_berangkat'),
            'tonase' => $this->request->getPost('tonase'),
            'ekor' => $this->request->getPost('ekor'),
            'lantai' => $this->request->getPost('lantai'),
            'sekat' => $this->request->getPost('sekat'),
            // 'bw_ekor_kg' => $this->request->getPost('bw_ekor_kg')
        ]);
        session()->setFlashdata("message", "Data berhasil diubah");
        return redirect()->to(base_url('table-panen'));
    }
    
    public function panen_delete($id)
    {   
    $this->panenModela = new PanenModela();
    $this->panenModela->delete($id);

    session()->setFlashdata("message", "Data berhasil dihapus");
    return redirect()->to(base_url('table-panen'));
    }

    public function panen_delete_b($id)
    {   
    $this->panenModelb = new PanenModelb();
    $this->panenModelb->delete($id);

    session()->setFlashdata("message", "Data berhasil dihapus");
    return redirect()->to(base_url('table-panen'));
    }

 
}