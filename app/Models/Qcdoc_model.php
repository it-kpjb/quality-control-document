<?php

namespace App\Models;

use CodeIgniter\Model;

class Qcdoc_model extends Model
{
    protected $table      = 'qcdoc';
    protected $primaryKey = 'idQc';

    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'referenceNO', 'subject', 'divisi', 'tglMasuk', 'tglKeluar','budget','issue','recom','action','other'];
}