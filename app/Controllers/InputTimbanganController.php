<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TimbanganModela;
use App\Models\TimbanganModelb;
use App\Models\TimbanganKematianModela;
use App\Models\TimbanganKematianModelb;

class InputTimbanganController extends BaseController
{

    protected $contact;
 
    function __construct()
    {
        $this->timbanganModela = new TimbanganModela();
        $this->timbanganModelb = new TimbanganModelb();
        $this->timbanganKematianModela = new TimbanganKematianModela();
        $this->timbanganKematianModelb = new TimbanganKematianModelb();
    }

	public function index()
	{
        $data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Input Data Harian']),
			'page_title' => view('partials/page-title', ['title' => 'Input_Data_Harian', 'li_1' => 'Forms', 'li_2' => 'Input Data Harian'])
		];
        return view('input-timbangan-harian', $data);
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
            return view('input-timbangan-harian', [
                'validation' => $this->validator,
                'title_meta' => view('partials/title-meta', ['title' => 'Input Data Harian']),
                'page_title' => view('partials/page-title', ['title' => 'Input_Data_Harian', 'li_1' => 'Forms', 'li_2' => 'Input Data Harian'])
                ]);

        } else {
        $bw_array = ['sekat_1' => $this->request->getPost('sekat_1'),
        'sekat_2' => $this->request->getPost('sekat_2'),
        'sekat_3' => $this->request->getPost('sekat_3'),
        'sekat_4' => $this->request->getPost('sekat_4')];
        // 'sekat_5' => $this->request->getPost('sekat_5'),
        $lantai_array = ['lantai' => $this->request->getPost('lantai')];
        $average_bw = array_sum($bw_array) / count($bw_array);

        $kenaikan_query = $this->timbanganModela->where('lantai', $lantai_array['lantai'])->orderBy('tanggal', 'DESC')->findAll(1);
        if(isset($kenaikan_query[0]['bw'])) {
            $kenaikan_data = $average_bw - $kenaikan_query[0]['bw'];
        }
        else {
            $kenaikan_data = 0;
        }
        
        $pakan_array = ['masuk' => $this->request->getPost('masuk'),
        'pakai' => $this->request->getPost('pakai'),
        'lantai' => $this->request->getPost('lantai')];

        $sisa_query = $this->timbanganModela->where('lantai', $pakan_array['lantai'])->orderBy('tanggal', 'DESC')->findAll(1);
        if(isset($sisa_query[0]['sisa'])) {
            $sisa_data = $sisa_query[0]['sisa'] + $pakan_array['masuk'] - $pakan_array['pakai'];
        }
        else {
            $sisa_data = $pakan_array['masuk'] - $pakan_array['pakai'];
        }
        $this->timbanganModela->insert([
            'tanggal' => $this->request->getPost('tanggal'),
            'umur' => $this->request->getPost('umur'),
            'waktu' => $this->request->getPost('waktu'),
            'vaksin' => $this->request->getPost('vaksin'),
            'sekat_1' => $this->request->getPost('sekat_1'),
            'sekat_2' => $this->request->getPost('sekat_2'),
            'sekat_3' => $this->request->getPost('sekat_3'),
            'sekat_4' => $this->request->getPost('sekat_4'),
            'sekat_5' => $this->request->getPost('sekat_5'),
            'bw' => $average_bw,
            'kenaikan_harian' => $kenaikan_data,
            'masuk' => $this->request->getPost('masuk'),
            'pakai' => $this->request->getPost('pakai'),
            'sisa' => $sisa_data,
            'lantai' => $this->request->getPost('lantai'),
        ]);
        session()->setFlashdata("message", "Data berhasil ditambahkan");

		return redirect()->to(base_url('input-timbangan-harian'));
    }
    }

    public function create_b()
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
            return view('input-timbangan-harian', [
                'validation' => $this->validator,
                'title_meta' => view('partials/title-meta', ['title' => 'Input Data Harian']),
                'page_title' => view('partials/page-title', ['title' => 'Input_Data_Harian', 'li_1' => 'Forms', 'li_2' => 'Input Data Harian'])
                ]);

        } else {
        $bw_array = ['sekat_1' => $this->request->getPost('sekat_1'),
        'sekat_2' => $this->request->getPost('sekat_2'),
        'sekat_3' => $this->request->getPost('sekat_3'),
        'sekat_4' => $this->request->getPost('sekat_4')];
        // 'sekat_5' => $this->request->getPost('sekat_5'),
        $lantai_array = ['lantai' => $this->request->getPost('lantai')];
        $average_bw = array_sum($bw_array) / count($bw_array);

        $kenaikan_query = $this->timbanganModelb->where('lantai', $lantai_array['lantai'])->orderBy('tanggal', 'DESC')->findAll(1);
        if(isset($kenaikan_query[0]['bw'])) {
            $kenaikan_data = $average_bw - $kenaikan_query[0]['bw'];
        }
        else {
            $kenaikan_data = 0;
        }
        
        $pakan_array = ['masuk' => $this->request->getPost('masuk'),
        'pakai' => $this->request->getPost('pakai'),
        'lantai' => $this->request->getPost('lantai')];

        $sisa_query = $this->timbanganModelb->where('lantai', $pakan_array['lantai'])->orderBy('tanggal', 'DESC')->findAll(1);
        if(isset($sisa_query[0]['sisa'])) {
            $sisa_data = $sisa_query[0]['sisa'] + $pakan_array['masuk'] - $pakan_array['pakai'];
        }
        else {
            $sisa_data = $pakan_array['masuk'] - $pakan_array['pakai'];
        }
        $this->timbanganModelb->insert([
            'tanggal' => $this->request->getPost('tanggal'),
            'umur' => $this->request->getPost('umur'),
            'waktu' => $this->request->getPost('waktu'),
            'vaksin' => $this->request->getPost('vaksin'),
            'sekat_1' => $this->request->getPost('sekat_1'),
            'sekat_2' => $this->request->getPost('sekat_2'),
            'sekat_3' => $this->request->getPost('sekat_3'),
            'sekat_4' => $this->request->getPost('sekat_4'),
            'sekat_5' => $this->request->getPost('sekat_5'),
            'bw' => $average_bw,
            'kenaikan_harian' => $kenaikan_data,
            'masuk' => $this->request->getPost('masuk'),
            'pakai' => $this->request->getPost('pakai'),
            'sisa' => $sisa_data,
            'lantai' => $this->request->getPost('lantai'),
        ]);
        session()->setFlashdata("message", "Data berhasil ditambahkan");

		return redirect()->to(base_url('input-timbangan-harian'));
    }
    }

    public function create_kematian_a()
    {
        helper(['form', 'url']);
        $validation = $this->validate([
            'tanggal' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Tanggal.'
                ]
            ],
            'waktu'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan umur.'
                ]
            ],
        ]);
        if(!$validation) {
            //render view with error validation message
            return view('input-timbangan-harian', [
                'validation' => $this->validator,
                'title_meta' => view('partials/title-meta', ['title' => 'Input Data Harian']),
                'page_title' => view('partials/page-title', ['title' => 'Input_Data_Harian', 'li_1' => 'Forms', 'li_2' => 'Input Data Harian'])
                ]);

        } else {
        $kematian_array = ['sekat_1' => $this->request->getPost('sekat_1'),
        'sekat_2' => $this->request->getPost('sekat_2'),
        'sekat_3' => $this->request->getPost('sekat_3'),
        'sekat_4' => $this->request->getPost('sekat_4'),
        'sekat_5' => $this->request->getPost('sekat_5')];
        $total_data = array_sum($kematian_array);
        
        $this->timbanganKematianModela->insert([
            'tanggal' => $this->request->getPost('tanggal'),
            'waktu' => $this->request->getPost('waktu'),
            'sekat_1' => $this->request->getPost('sekat_1'),
            'sekat_2' => $this->request->getPost('sekat_2'),
            'sekat_3' => $this->request->getPost('sekat_3'),
            'sekat_4' => $this->request->getPost('sekat_4'),
            'sekat_5' => $this->request->getPost('sekat_5'),
            'total' => $total_data,
            'lantai' => $this->request->getPost('lantai'),
        ]);
        session()->setFlashdata("message", "Data berhasil ditambahkan");

		return redirect()->to(base_url('input-timbangan-harian'));
    }
    }

    public function create_kematian_b()
    {
        helper(['form', 'url']);
        $validation = $this->validate([
            'tanggal' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan Tanggal.'
                ]
            ],
            'waktu'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan umur.'
                ]
            ],
        ]);
        if(!$validation) {
            //render view with error validation message
            return view('input-timbangan-harian', [
                'validation' => $this->validator,
                'title_meta' => view('partials/title-meta', ['title' => 'Input Data Harian']),
                'page_title' => view('partials/page-title', ['title' => 'Input_Data_Harian', 'li_1' => 'Forms', 'li_2' => 'Input Data Harian'])
                ]);

        } else {
        $kematian_array = ['sekat_1' => $this->request->getPost('sekat_1'),
        'sekat_2' => $this->request->getPost('sekat_2'),
        'sekat_3' => $this->request->getPost('sekat_3'),
        'sekat_4' => $this->request->getPost('sekat_4'),
        'sekat_5' => $this->request->getPost('sekat_5')];
        $total_data = array_sum($kematian_array);
        
        $this->timbanganKematianModelb->insert([
            'tanggal' => $this->request->getPost('tanggal'),
            'waktu' => $this->request->getPost('waktu'),
            'sekat_1' => $this->request->getPost('sekat_1'),
            'sekat_2' => $this->request->getPost('sekat_2'),
            'sekat_3' => $this->request->getPost('sekat_3'),
            'sekat_4' => $this->request->getPost('sekat_4'),
            'sekat_5' => $this->request->getPost('sekat_5'),
            'total' => $total_data,
            'lantai' => $this->request->getPost('lantai'),
        ]);
        session()->setFlashdata("message", "Data berhasil ditambahkan");

		return redirect()->to(base_url('input-timbangan-harian'));
    }
    }
}
