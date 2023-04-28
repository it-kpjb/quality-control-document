<?php

namespace App\Models;

use CodeIgniter\Model;

class QcdocModel extends Model
{
    protected $table      = 'qcdoc';
    protected $primaryKey = 'idQc';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['referenceNo', 'subject', 'divisi', 'tglMasuk', 'tglKeluar', 'budget', 'recom', 'action', 'issue', 'other', 'status', 'image', 'user_id', 'qcKategori', 'prNumber'];



    function getQcdocAndStatusByUser($userId = null)
    {
        if (in_groups('enguser')) {
            $query = $this->db->table('qcdoc q')
                ->join('qcdoc_status qs', 'q.idQc = qs.qcId')
                ->join('users u', 'q.user_id = u.id')
                ->where('user_id', $userId)
                ->orderBy('qs.idStatus', 'desc')
                ->select('q.*,qs.*, u.fullname as pic_name')
                ->get();
        } else if (in_groups('leader')) {
            $query = $this->db->table('qcdoc q')
                ->join('qcdoc_status qs', 'q.idQc = qs.qcId')
                ->join('users u', 'q.user_id = u.id')
                ->where('qs.status', '1')
                ->orWhere('qs.status', '3')
                ->orderBy('qs.idStatus', 'desc')
                ->select('q.*,qs.*, u.fullname as pic_name')
                ->get();
        } else if (in_groups('manager')) {
            $query = $this->db->table('qcdoc q')
                ->join('qcdoc_status qs', 'q.idQc = qs.qcId')
                ->join('users u', 'q.user_id = u.id')
                ->where('qs.status', '2')
                ->orWhere('qs.status', '5')
                ->orWhere('qs.status', '4')
                ->orderBy('qs.idStatus', 'desc')
                ->select('q.*,qs.*, u.fullname as pic_name')
                ->get();
        } else {
            $query = $this->db->table('qcdoc q')
                ->join('qcdoc_status qs', 'q.idQc = qs.qcId')
                ->join('users u', 'q.user_id = u.id')
                ->orderBy('qs.idStatus', 'desc')
                ->select('q.*,qs.*, u.fullname as pic_name')
                ->get();
        }

        return $query;
    }
    function getQcdocAndStatus($id)
    {
        $query = $this->db->table('qcdoc q')
            ->join('qcdoc_status qs', 'q.idQc = qs.qcId')
            ->join('users u', 'q.user_id = u.id')
            ->where('q.idQc', $id)
            ->orderBy('qs.idStatus', 'desc')
            ->select('q.*, qs.*, u.fullname as pic_name')
            ->get();
        return $query;
    }

    function CountQcDocByStatus($status)
    {
        $query = $this->db->table('qcdoc q')
            ->join('qcdoc_status qs', 'q.idQc = qs.qcId')
            ->where('qs.status', $status)
            ->countAllResults();
        return $query;
    }


    function getReffNo()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(referenceNo,2)) AS kd_max FROM qcdoc WHERE MONTH(created_at)=MONTH(CURDATE())");
        
        $kd = "";
        if ($q->getNumRows() > 0) {
            foreach ($q->getResult() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%02s", $tmp);
            }
        } else {
            $kd = "01";
        }
        date_default_timezone_set('Asia/Jakarta');
        // return "ITRN" . '-24101-' . 'QC-' . date('Y') . '-' . $kd;
        return "ITRN-" . 'QC-' . date('Y-m') . '-' . $kd;
    }
}
