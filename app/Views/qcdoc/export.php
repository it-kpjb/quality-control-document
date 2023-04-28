<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title_pdf; ?></title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url(); ?>/assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url(); ?>/assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url(); ?>/assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url(); ?>/assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url(); ?>/assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Datatables -->

    <link href="<?php echo base_url(); ?>/assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">



    <style>
        #table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #table td,
        #table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #table tr td:nth-child(1) {
            font-weight: 700;
        }

        #table tr:nth-child(even) {
            /* background-color: #f2f2f2; */
        }

        #table tr:hover {
            background-color: #ddd;
        }

        #table th {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: left;
            /* background-color: #4CAF50; */
            color: black;
        }
    </style>
</head>

<body>
    <div style="text-align:center">
        <!-- <h3> Contoh Export</h3> -->
        <img src="<?= $qrcode ?>" alt="QR code">
    </div>


    <table id="table">
        <!-- <thead>
            <tr>
                <th>Referenco No.</th>
                <th>Nama Produk</th>
            </tr>
        </thead> -->
        <tbody>
            <tr>
                <td>Referenco No.</td>
                <td style="width: 80%;"><?= $qcdoc['referenceNo'] ?></td>
            </tr>
            <tr>
                <td>Subject</td>
                <td style="width: 80%;"><?= $qcdoc['subject'] ?></td>
            </tr>
            <tr>
                <td>Division Concerned</td>
                <td style="width: 80%;"><?= $qcdoc['divisi'] ?></td>
            </tr>
            <tr>
                <td>Date of Entry</td>
                <td style="width: 80%;"><?= $qcdoc['tglMasuk'] ?></td>
            </tr>
            <tr>
                <td>Date Out</td>
                <td style="width: 80%;"><?= $qcdoc['tglKeluar'] ?></td>
            </tr>
            <tr>
                <td colspan="2">Review and Documentation</td>
                <!-- <td >Nama Produk</td> -->
            </tr>
            <tr>
                <td>Budget & Review</td>
                <td style="width: 80%;"><?= $qcdoc['budget'] ?></td>
            </tr>
            <tr>
                <td>Commercial Issue</td>
                <td style="width: 80%;"><?= $qcdoc['issue'] ?></td>
            </tr>
            <tr>
                <td>Recommendation</td>
                <td style="width: 80%;"><?= $qcdoc['recom'] ?></td>
            </tr>
            <tr>
                <td>Action</td>
                <td style="width: 80%;"><?= $qcdoc['action'] ?></td>
            </tr>
            <tr>
                <td>Others</td>
                <td style="width: 80%;"><?= $qcdoc['other'] ?></td>
            </tr>
        </tbody>
    </table>
</body>

</html>