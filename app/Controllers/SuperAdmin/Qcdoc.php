<?php

namespace App\Controllers;

use App\Models\Qcdoc_model;
use CodeIgniter\Exceptions\PageNotFoundException;

class Qcdoc extends BaseController
{
	public function index()
	{
        // buat object model $qcdoc
		$qcdoc = new Qc_model();
        
        /*
         siapkan data untuk dikirim ke view dengan nama $newses
         dan isi datanya dengan news yang sudah terbit
        */
		// $data['newses'] = $news->where('status', 'published')->findAll();

        // // kirim data ke view
		// echo view('news', $data);
	}

	//------------------------------------------------------------

	public function viewsQcdoc($tglMasuk)
	{
		$news = new Qcdoc_model();
		$data['qcdoc'] = $qcdoc->where([
			'slug' => $slug,
			'status' => 'published'
		])->first();

        // tampilkan 404 error jika data tidak ditemukan
		if (!$data['qcdoc']) {
			throw PageNotFoundException::forPageNotFound();
		}

		echo view('qcdoc_detail', $data);
	}
}