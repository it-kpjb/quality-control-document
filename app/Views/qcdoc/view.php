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
                    <h2>View Qcdoc <?= $qcdoc['referenceNo'] ?></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="/qcdoc/edit/<?= $qcdoc['idQc'] ?>">
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="referenceNo">Reference No. <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 ">
                                <input readonly type="text" name="referenceNo" id="referenceNo" readonly value="<?= $qcdoc['referenceNo'] ?>" required="required" class="form-control ">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="subject">Subject<span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 ">
                                <input readonly value="<?= $qcdoc['subject'] ?>" type="text" id="subject" name="subject" required="required" class="form-control">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="divisi" class="col-form-label col-md-3 col-sm-3 label-align">Division</label>
                            <div class="col-md-8 col-sm-6 ">
                                <input readonly id="divisi" class="form-control" type="text" name="divisi" value="<?= $qcdoc['divisi'] ?>">
                            </div>
                        </div>

                        <div class="item form-group">
                            <label for="divisi" class="col-form-label col-md-3 col-sm-3 label-align">PR Number</label>
                            <div class="col-md-8 col-sm-6 ">
                                <input readonly id="divisi" class="form-control" type="text" name="prnumber" value="<?= $qcdoc['prNumber'] ?>">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="status" class="col-form-label col-md-3 col-sm-3 label-align">Kategori</label>
                            <div class="col-md-8 col-sm-6 ">
                                <select readonly class="form-control" name="kategori" id="kategori">
                                    <?php foreach ($qc_kategori as $item) : ?>
                                        <option <?= $qcdoc['qcKategori'] === $item['namaKategori'] ? 'selected' : '' ?> value="<?= $item['idKategori'] ?>"><?= $item['namaKategori'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>


                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Date of Entry<span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 ">
                                <input readonly id="tglMasuk" name="tglMasuk" value="<?= $qcdoc['tglMasuk'] ?>" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                <script>
                                    function timeFunctionLong(input) {
                                        setTimeout(function() {
                                            input.type = 'text';
                                        }, 60000);
                                    }
                                </script>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Date Out<span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 ">
                                <input readonly id="tglKeluar" name="tglKeluar" value="<?= $qcdoc['tglKeluar'] ?>" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                <script>
                                    function timeFunctionLong(input) {
                                        setTimeout(function() {
                                            input.type = 'text';
                                        }, 60000);
                                    }
                                </script>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Budget Review<span class="required">*</span>
                            </label>
                            <div class="col-md-8">
                                <textarea id="budget" name="budget"><?= $qcdoc['budget'] ?></textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Commercial Issue<span class="required">*</span>
                            </label>
                            <div class="col-md-8">
                                <textarea id="issue" name="issue"><?= $qcdoc['issue'] ?></textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Recommendation<span class="required">*</span>
                            </label>
                            <div class="col-md-8">
                                <textarea id="recom" name="recom"><?= $qcdoc['recom'] ?></textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Action
                            </label>
                            <div class="col-md-8">
                                <textarea id="action" name="action"><?= $qcdoc['action'] ?></textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Others
                            </label>
                            <div class="col-md-8">
                                <textarea id="other" name="other"><?= $qcdoc['other'] ?></textarea>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-8 col-sm-6 offset-md-3">
                                <a href="/qcdoc" class="btn btn-primary" type="button">Back</a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<script>
    $(document).ready(function() {
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

<?= $this->endSection() ?>