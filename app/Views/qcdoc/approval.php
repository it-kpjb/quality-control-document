<?= $this->extend('templates/index') ?>

<?= $this->section('admin-styles') ?>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="">
    <div class="clearfix">
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Approval <?= (in_groups('leader') ? 'Leader' : in_groups('manager')) ? 'Manager' : 'Leader' ?> </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>

                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form id="approval-form" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="/qcdoc/approval/<?= $qcdoc['idQc'] ?>">
                        <?= csrf_field() ?>
                        <input hidden type="text" name="id" value="<?= $qcdoc['idQc'] ?>">
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="referenceNo">Reference No. <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input readonly value="<?= $qcdoc['referenceNo'] ?>" type="text" name="referenceNo" id="referenceNo" required="required" class="form-control ">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewModal-<?= $qcdoc['idQc'] ?>" title="view">Lihat Data</button>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="subject">Keterangan<span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-6">
                                <textarea class="form-control" name="keterangan" id="" rows="10"><?= $qcdoc['keterangan'] ?></textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="status" class="col-form-label col-md-3 col-sm-3 label-align">Status Berkas</label>
                            <div class="col-md-8 col-sm-6 ">
                                <select required class="form-control" name="status" id="status">
                                    <option disabled value="">-- Pilih Status --</option>
                                    <?php if (in_groups('leader')) : ?>
                                        <option <?= $qcdoc['status'] == '2' ? 'selected' : '' ?> value="2">Approve</option>
                                        <option <?= $qcdoc['status'] == '3' ? 'selected' : '' ?> value="3">Revise</option>
                                    <?php endif ?>
                                    <?php if (in_groups('manager')) : ?>
                                        <option <?= $qcdoc['status'] == '5' ? 'selected' : '' ?> value="5">Approve</option>
                                        <option <?= $qcdoc['status'] == '4' ? 'selected' : '' ?> value="4">Revise</option>
                                    <?php endif ?>
                                </select>
                            </div>
                        </div>


                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-8 col-sm-6 offset-md-3">
                                <button type="submit" id="btn-approval" class="btn btn-success">save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?= $this->include('qcdoc/modal_data') ?>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<script>
    $(document).ready(function() {
        $('#summernote').summernote('disable');
        $('#budget').summernote({
            height: 200,

            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        }).summernote('disable');
        $('#issue').summernote({
            height: 200,

            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        }).summernote('disable');
        $('#recom').summernote({
            height: 200,

            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        }).summernote('disable');
        $('#action').summernote({
            height: 200,

            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        }).summernote('disable');
        $('#other').summernote({
            height: 200,

            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        }).summernote('disable');
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>

<script>
    $(document).ready(function() {
        $('#approval-form').submit(function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Do you want to save the changes?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Save',
                denyButtonText: `Don't save`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: $(this).attr('action'),
                        data: new FormData(this),
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        beforeSend: function() {
                            $('#btn-approval').attr('disabled', 'disabled');
                            $('#btn-approval').html(
                                '<i class="fa fa-spin fa-spinner"></i> Sending');
                        },
                        complete: function() {
                            $('#btn-approval').removeAttr('disabled');
                            $('#btn-approval').html('Save');
                        },
                        success: function(response, data) {
                            console.log(response)

                            if (response.success) {
                                Swal.fire(response.message, '', 'success').then(() => window.location.href = "/qcdoc")

                            } else {
                                Swal.fire(response.message, '', 'warning').then(() => window.location.href = "/qcdoc")
                            }

                        }
                    })

                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })

        })
    })
</script>

<?= $this->endSection() ?>