<?php

namespace App\Controllers;

use App\Models\QcdocModel;

class Dashboard extends BaseController
{
    protected $qcdoc;
    function __construct()
    {
        $this->qcdoc = new QcdocModel();
    }
    // public function index()
    // {
    //     return view('welcome_message');
    // }
    public function index()
    {
        $data = [
            'qcdoc' => $this->qcdoc->getQcdocAndStatusByUser()->getResultArray(),
            'total_qc' => $this->qcdoc->countAllResults(),
            'total_qc_wait_lead' => $this->qcdoc->CountQcDocByStatus('1'),
            'total_qc_wait_manager' => $this->qcdoc->CountQcDocByStatus('2'),
            'total_qc_revised_lead' => $this->qcdoc->CountQcDocByStatus('3'),
            'total_qc_revised_manager' => $this->qcdoc->CountQcDocByStatus('4'),
            'total_qc_done' => $this->qcdoc->CountQcDocByStatus('5'),
        ];
        // dd($data);
        foreach ($data['qcdoc'] as $key => $value) {
            $data['qcdoc'][$key]['title'] = $value['referenceNo'] . '(' . convert_status($value['status']) . ')';
            $data['qcdoc'][$key]['start'] = $value['tglMasuk'];
            $data['qcdoc'][$key]['end'] = $value['tglKeluar'];
            $data['qcdoc'][$key]['backgroundColor'] = convert_status_badge($value['status']);

            // primary #007bff
            //secondary #6c757d
            // success #28a745
            //danger #dc3545
            //warning #ffc107
            //info #17a2b8
        }
        // dd($data);
        return view('dashboard', $data);
    }
}
