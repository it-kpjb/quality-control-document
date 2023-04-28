<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\QcdocModel;
use App\Libraries\Pdfgenerator;

use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;


class Qcdoc extends BaseController
{

    protected $menu;
    protected $db;
    protected $qcdoc;
    protected $qcdocStatus;
    protected $qcdoc_kategori;
    function __construct()
    {
        $this->qcdoc = new QcdocModel();
        $this->db = \Config\Database::connect();
        $this->qcdocStatus = $this->db->table('qcdoc_status');
        $this->qcdoc_kategori = $this->db->table('kategori');
        $this->qcdoc_divisi = $this->db->table('divisi');
        // $this->users = $this->db->table('users');
    }

    public function index()
    {

        $data['title'] = "Qcdoc";
        // filter by qcdoc user
        if (in_groups('enguser')) {
            $data['qcdocs'] = $this->qcdoc->getQcdocAndStatusByUser(user_id())->getResultArray();
            // $data['qcdocs'] = $this->qcdoc->where('user_id', user_id())->findAll();
        } else {
            // $data['qcdocs'] = $this->qcdoc->findAll();
            $data['qcdocs'] = $this->qcdoc->getQcdocAndStatusByUser()->getResultArray();
        }

        return view('qcdoc/index', $data);
    }

    public function create_view()
    {

        $data['title'] = 'Add data qcdoc';
        $data['getReffNo'] = $this->qcdoc->getReffNo();
        $data['qc_kategori'] = $this->qcdoc_kategori->get()->getResultArray();
        $data['qc_divisi'] = $this->qcdoc_divisi->get()->getResultArray();
        return view('qcdoc/add', $data);
    }



    public function store()
    {
        $post = $this->request->getPost();

        // this will handle the date
        $date = date("Y-m-d");
        $day = 5;
        $additonalDate = date('Y-m-d', strtotime("+$day days"));

        $data = [
            'referenceNo' => $post['referenceNo'],
            'subject' => $post['subject'],
            'divisi' => $post['divisi'],
            'tglMasuk' => $date,
            'tglKeluar' => $additonalDate,
            'budget' => $post['budget'],
            'issue' => $post['issue'],
            'recom' => $post['recom'],
            'action' => $post['action'],
            'other' => $post['other'],
            'prNumber' => $post['prnumber'],
            'qcKategori' => $post['kategori'],
            'user_id' => user_id(),
        ];

        $storeQcdoc = $this->qcdoc->insert($data, true);
        if ($storeQcdoc) {
            $getLastID = $this->qcdoc->getInsertID();
            $data_status = [
                'qcId' => $getLastID,
                'status' => 0 //status set to 0 
            ];
            $this->qcdocStatus->insert($data_status);
            return redirect()->to('qcdoc')->with('success', 'QCdoc Added Successfully');
        } else {
            return redirect()->to('qcdoc')->with('danger', 'QCdoc failed to save');
        }
    }

    public function send_qc($id)
    {
        // check status
        $data_status = [
            'status' => 1,
        ];
        $this->qcdocStatus->where('qcId', $id);
        $this->qcdocStatus->update($data_status);

        return redirect()->to('qcdoc')->with('info', 'Qcdoc Sended');
    }

    public function approval($id)
    {
        $data['qcdoc'] = $this->qcdoc->getQcdocAndStatus($id)->getRowArray();
        return view('qcdoc/approval', $data);
    }
    public function approval_action()
    {
        $post = $this->request->getPost();
        $qcId = $post['id'];

        // check status
        $data_status = [
            'status' => $post['status'],
            'keterangan' => $post['keterangan']
        ];
        $this->qcdocStatus->where('qcId', $qcId);
        $this->qcdocStatus->update($data_status);

        if ($post['status'] == '2' || $post['status'] == '5') {
            $msg = [
                'success' => 'success',
                'message' => 'Data Approve'
            ];
        } else {
            $msg = [
                'reject' => 'reject',
                'message' => 'Data Rejected'
            ];
        }
        echo json_encode($msg);
    }

    public function view($id)
    {
        $data['qcdoc'] = $this->qcdoc->find($id);
        $data['qc_kategori'] = $this->qcdoc_kategori->get()->getResultArray();

        return view('qcdoc/view', $data);
    }


    public function edit_view($id)
    {
        // $data['qcdoc'] = $this->qcdoc->find($id);
        $data['qcdoc'] = $this->qcdoc->getQcdocAndStatus($id)->getRowArray();
        $data['qc_kategori'] = $this->qcdoc_kategori->get()->getResultArray();
        $data['qc_divisi'] = $this->qcdoc_divisi->get()->getResultArray();

        return view('qcdoc/edit', $data);
    }

    public function edit($id)
    {
        $post = $this->request->getPost();
        $qcdoc_update = $this->qcdoc->update($id, [
            'referenceNo' => $post['referenceNo'],
            'subject' => $post['subject'],
            'divisi' => $post['divisi'],
            'tglMasuk' => $post['tglMasuk'],
            'tglKeluar' => $post['tglKeluar'],
            'budget' => $post['budget'],
            'issue' => $post['issue'],
            'recom' => $post['recom'],
            'action' => $post['action'],
            'other' => $post['other'],
        ], true);

        if ($qcdoc_update) {
            $qcId = $post['id'];

            // check status
            $data_status = [
                'status' => 1, //setelah edit, status kembali ke 1
            ];
            $this->qcdocStatus->where('qcId', $qcId);
            $this->qcdocStatus->update($data_status);


            return redirect()->to('qcdoc')->with('info', 'Qcdoc Updated Successfully');
        }
    }



    public function delete($id)
    {
        $this->qcdoc->delete($id);

        return redirect()->to('qcdoc')->with('danger', 'Data Deleted Successfully');
    }


    public function uploadImage()
    {
        $validateImg = $this->validate([
            'file' => [
                'uploaded[file]',
                'mime_in[file,image/jpg,image/jpeg,image/png,image/gif]',
                'max_size[file,4096]',
            ]
        ]);
        if (!$validateImg) {
            echo "Eiter file type or size (Max 4Mb) not correct.";
        } else {
            if ($this->request->getFile('file')) {
                $dataFile = $this->request->getFile('file');
                $fileName = $dataFile->getRandomName();

                // Image manipulation
                $image = \Config\Services::image()
                    ->withFile($dataFile)
                    ->resize(200, 100, true, 'height')
                    ->save(FCPATH . '/images/' . $dataFile->getRandomName());

                // $dataFile->move(WRITEPATH . 'uploads');
                $dataFile->move("uploads/article/content", $fileName);
                echo base_url("uploads/article/content/$fileName");
            }
        }
    }

    public function deleteImage()
    {
        $src = $this->request->getVar('src');
        // this variable all url from image that uploaded

        if ($src) {
            $fileName = str_replace(base_url() . "/", "", $src);

            if (unlink($fileName)) {
                echo "file image deleted!";
            }
        }
    }

    public function qrcode($id)
    {
        $data_qc = $this->qcdoc->getQcdocAndStatus($id)->getRowArray();
        $json = json_encode($data_qc);
        $data_qc_test = base_url('/qcdoc/export/'). $data_qc['idQc'];
        $writer = new PngWriter();

        // Create QR code
        $qrCode = QrCode::create($data_qc_test)
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(200)
            ->setMargin(5)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));

        // Create generic logo
        $logo = Logo::create(FCPATH . 'assets/images/white.png')
            ->setResizeToWidth(10);

        // Create generic label
        // $label = Label::create('qc')
        //     ->setTextColor(new Color(0, 0, 0));

        $result = $writer->write($qrCode, $logo);
        header('Content-Type: ' . $result->getMimeType());
        $result->getString();

        // Save image to local storage
        $str = rand();
        $random = md5($str);

        $filename = 'qrcode_' . $random . '.png';
        $filepath = FCPATH . 'uploads/qrcode/' . $filename;
        // file_put_contents($filepath, $result->getString());

        $dataUri = $result->getDataUri();
        // echo '<img src="' . $dataUri . '" alt="nice">';
        return $dataUri;
    }

    public function export($id)
    {
        $data['qcdoc'] = $this->qcdoc->find($id);
        $data['qrcode'] = $this->qrcode($id); // get the QR code data URI
        $pdfGenerator = new Pdfgenerator();
        //set title
        $data['title_pdf'] = $data['qcdoc']['referenceNo'];
        $file_pdf = "nama_file_laporan";
        // setting paper size
        $paper = 'A4';

        // layout dari halaman
        $orientation = 'portrait';

        $html = view('qcdoc/export', $data);

        $pdfGenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    public function qrcode_image($id)
    {

        $data_qc = $this->qcdoc->getQcdocAndStatus($id)->getRowArray();
        $json = json_encode($data_qc);

        $qrCode = QrCode::create($json)
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));


        $dataUri = $qrCode->writeDataUri();

        return $dataUri;
    }
}