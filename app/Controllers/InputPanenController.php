<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PanenModela;
use App\Models\PanenModelb;

class InputPanenController extends BaseController
{

    protected $contact;
 
    function __construct()
    {
        $this->panenmodela = new PanenModela();
        $this->panenmodelb = new PanenModelb();
    }

	public function index()
	{
        $data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Input Data Panen']),
			'page_title' => view('partials/page-title', ['title' => 'Input_Data_Panen', 'li_1' => 'Forms', 'li_2' => 'Input Data Panen'])
		];
        return view('input-panen', $data);
	}

    public function create()
    {
        helper(['form', 'url']);
        $validation = $this->validate([
            'tanggal' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Tanggal.'
                ]
            ],
            'umur'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan umur.'
                ]
            ],
        ]);
        if(!$validation) {
            //render view with error validation message
            return view('input-panen', [
                'validation' => $this->validator,
                'title_meta' => view('partials/title-meta', ['title' => 'Input Data Panen']),
                'page_title' => view('partials/page-title', ['title' => 'Input_Data_Panen', 'li_1' => 'Forms', 'li_2' => 'Input Data Panen'])
            ]);

        } else {
            $bw_ekor_array = ['tonase' => $this->request->getPost('tonase'),
                              'ekor' => $this->request->getPost('ekor')];
            $bw_ekor_data = $bw_ekor_array['tonase'] / $bw_ekor_array['ekor'];
        $this->panenmodela->insert([
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
            'bw_ekor_kg' => $bw_ekor_data,
        ]);
        session()->setFlashdata("message", "Data berhasil ditambahkan");

		return redirect()->to(base_url('input-panen'));
    }
        // return view('/input-panen');
    }

    public function create_b()
    {
        helper(['form', 'url']);
        $validation = $this->validate([
            'tanggal2' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Tanggal.'
                ]
            ],
            'umur2'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan umur.'
                ]
            ],
        ]);
        if(!$validation) {
            //render view with error validation message
            return view('input-panen', [
                'validation' => $this->validator,
                'title_meta' => view('partials/title-meta', ['title' => 'Input Data Panen']),
                'page_title' => view('partials/page-title', ['title' => 'Input_Data_Panen', 'li_1' => 'Forms', 'li_2' => 'Input Data Panen'])
            ]);

        } else {
            $bw_ekor_array = ['tonase' => $this->request->getPost('tonase'),
                              'ekor' => $this->request->getPost('ekor')];
            $bw_ekor_data = $bw_ekor_array['tonase'] / $bw_ekor_array['ekor'];
        $this->panenmodelb->insert([
            'tanggal' => $this->request->getPost('tanggal2'),
            'umur' => $this->request->getPost('umur2'),
            'no_do' => $this->request->getPost('no_do2'),
            'penerima' => $this->request->getPost('penerima2'),
            'no_truk' => $this->request->getPost('no_truk2'),
            'nama_supir' => $this->request->getPost('nama_supir2'),
            'jam_tangkap' => $this->request->getPost('jam_tangkap2'),
            'jam_berangkat' => $this->request->getPost('jam_berangkat2'),
            'tonase' => $this->request->getPost('tonase2'),
            'ekor' => $this->request->getPost('ekor2'),
            'lantai' => $this->request->getPost('lantai2'),
            'sekat' => $this->request->getPost('sekat2'),
            'bw_ekor_kg' => $bw_ekor_data,
        ]);
        session()->setFlashdata("message", "Data berhasil ditambahkan");

		return redirect()->to(base_url('input-panen'));
    }
        // return view('/input-panen');
    }
}
