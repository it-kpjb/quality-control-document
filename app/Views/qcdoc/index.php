<?= $this->extend('templates/index') ?>
<?= $this->section('content') ?>

<div class="">
    <div class="clearfix">
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>QCdoc</h2>
                    <div class="clearfix"></div>
                </div>

                <div class="x_content">
                    <?php
                    if (has_permission('qcdoc.create')) : ?>
                        <a type="button" class="btn btn-primary mb-5" href="/qcdoc/create">
                            Add Qcdoc
                        </a>
                    <?php endif; ?>
                    <div class="row">
                        <?= $this->include('templates/alerts') ?>

                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Reference No</th>
                                            <th>Subject</th>
                                            <th>Division Concerned</th>
                                            <th>Deadline</th>
                                            <!-- <th>Date Out</th> -->
                                            <th>Status</th>
                                            <th>PIC Name</th>
                                            <!-- <th>Budget Review</th>
                                            <th>Commercial Issue</th>
                                            <th>Recommendation</th>
                                            <th>Status Action</th>
                                            <th>Other</th> -->
                                            <th>Notes</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($qcdocs as $index => $item) : ?>

                                            <tr>
                                                <td><?= ++$index ?>.</td>
                                                <td><?= $item['referenceNo'] ?></td>
                                                <td><?= $item['subject'] ?></td>
                                                <td><?= divisi($item['divisi']) ?></td>
                                                <td><?= $item['status'] == '5' ? '-'  : convert_two_dates($item['tglKeluar']) ?></td>
                                                <!-- <td><?= $item['tglKeluar'] ?></td> -->
                                                <td><?= status_berkas($item['status']) ?></td>
                                                <td><?= $item['pic_name'] ?></td>
                                                <td><?= $item['keterangan'] ?></td>
                                                <td>

                                                    <?php if ((in_groups('enguser')||in_groups('qcdoc') ) && $item['status'] == 0) : ?>
                                                        <button type="button" class="btn btn-success  mr-1" data-toggle="modal" data-target="#modalQc<?= $item['referenceNo'] ?>" title="kirim data"><i class="fa fa-check"></i></button>
                                                    <?php endif ?>
                                                    <?php if (has_permission('qcdoc.view')) : ?>
                                                        <a type="button" class="btn btn-secondary  mr-1" href="/qcdoc/view/<?= $item['idQc']  ?>" title="view data"><i class="fa fa-eye"></i></a>
                                                        <?php if ($item['status'] == 5) : ?>
                                                            <a type="button" class="btn btn-warning  mr-1" href="/qcdoc/export/<?= $item['idQc']  ?>" title="export"><i class="fa fa-print"></i></a>
                                                        <?php endif; ?>
                                                    <?php endif; ?>

                                                    <?php if (has_permission('qcdoc.edit') && (in_groups('enguser')||in_groups('qcdoc') ) && ($item['status'] != 5)) : ?>
                                                        <a type="button" class="btn btn-primary mr-1" href="/qcdoc/edit/<?= $item['idQc'] ?>" title="Edit"><i class="fa fa-pencil"></i></a>
                                                    <?php endif; ?>

                                                    <?php if (has_permission('qcdoc.delete')  && ($item['status'] < 1)) : ?>
                                                        <button onclick="hapus('<?= base_url('qcdoc/delete/' . $item['idQc']) ?>')" class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" href="#deleteModal"><i class="fa fa-trash"></i></button>
                                                    <?php endif; ?>

                                                    <?php if ((has_permission('qcdoc.edit')) && ((in_groups('leader')) || (in_groups('manager'))) && ($item['status'] != 5)) : ?>
                                                        <a type="button" class="btn btn-success  mr-1" href="/qcdoc/approval/<?= $item['idQc']  ?>" title="Approve data"><i class="fa fa-check"></i></a>
                                                    <?php endif; ?>


                                                </td>
                                            </tr>
                                            <div class="modal fade" id="modalQc<?= $item['referenceNo'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Data Qc <?= $item['referenceNo'] ?> </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Data akan dikirimkan untuk di cek
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <a href="/qcdoc/send-qc/<?= $item['idQc']  ?>" type="button" class="btn btn-primary">Send</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>