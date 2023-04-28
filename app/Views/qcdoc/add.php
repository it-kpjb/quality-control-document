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
                    <h2>Add QCdoc</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>

                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br>
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="/qcdoc/create">
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="referenceNo">Reference No. <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 ">
                                <input value="<?= $getReffNo ?>" type="text" name="referenceNo" id="referenceNo" required="required" class="form-control ">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="subject">Subject<span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 ">
                                <input type="text" id="subject" name="subject" required="required" class="form-control">
                            </div>
                        </div>
                
                        <div class="item form-group">
                            <label for="divisi" class="col-form-label col-md-3 col-sm-3 label-align">Division</label>
                            <div class="col-md-8 col-sm-6 ">
                                <select class="form-control" name="divisi" id="divisi">
                                    <?php foreach ($qc_divisi as $item) : ?>
                                        <option value="<?= $item['idDivisi'] ?>"><?= $item['namaDivisi'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="prnumber" class="col-form-label col-md-3 col-sm-3 label-align">PR Number</label>
                            <div class="col-md-8 col-sm-6 ">
                                <input id="prnumber" class="form-control" type="text" name="prnumber">
                            </div>

                        </div>
                        <div class="item form-group">
                            <label for="status" class="col-form-label col-md-3 col-sm-3 label-align">Kategori</label>
                            <div class="col-md-8 col-sm-6 ">
                                <select class="form-control" name="kategori" id="kategori">
                                    <?php foreach ($qc_kategori as $item) : ?>
                                        <option value="<?= $item['idKategori'] ?>"><?= $item['namaKategori'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <!-- <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Date of Entry<span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 ">
                                <input id="tglMasuk" name="tglMasuk" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
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
                                <input id="tglKeluar" name="tglKeluar" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                                <script>
                                    function timeFunctionLong(input) {
                                        setTimeout(function() {
                                            input.type = 'text';
                                        }, 60000);
                                    }
                                </script>
                            </div>
                        </div> -->

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Budget Review<span class="required">*</span>
                            </label>
                            <div class="col-md-8">
                                <textarea id="budget" name="budget"></textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Commercial Issue<span class="required">*</span>
                            </label>
                            <div class="col-md-8">
                                <textarea id="issue" name="issue"></textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Recommendation<span class="required">*</span>
                            </label>
                            <div class="col-md-8">
                                <textarea id="recom" name="recom"></textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Action
                            </label>
                            <div class="col-md-8">
                                <textarea id="action" name="action"></textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Others
                            </label>
                            <div class="col-md-8">
                                <textarea id="other" name="other"></textarea>
                            </div>
                        </div>
                        <!-- <div class="item form-group">
                            <label for="status" class="col-form-label col-md-3 col-sm-3 label-align">Simpan Sebagai</label>
                            <div class="col-md-8 col-sm-6 ">
                                <select class="form-control" name="status" id="status">
                                    <option value="0">Draft</option>
                                    <option value="1">Publish</option>
                                </select>
                            </div>
                        </div> -->
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-8 col-sm-6 offset-md-3">
                                <a role="button" href="/qcdoc" class="btn btn-primary" type="button">back</a>
                                <button type="submit" class="btn btn-success">Submit</button>
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
        });
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
        });
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
        });
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
        });
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
        });
    });

    // $(document).ready(function() {
    //     $('.summernote').summernote({
    //         callbacks: {
    //             onImageUpload: function(files) {
    //                 for (let i = 0; i < files.length; i++) {
    //                     $.upload(files[i]);
    //                 }
    //             },
    //             onMediaDelete: function(target) {
    //                 $.delete(target[0].src);
    //             }
    //         },
    //         height: 200,
    //         toolbar: [
    //             ["style", ["bold", "italic", "underline", "clear"]],
    //             ["fontname", ["fontname"]],
    //             ["fontsize", ["fontsize"]],
    //             ["color", ["color"]],
    //             ["para", ["ul", "ol", "paragraph"]],
    //             ["height", ["height"]],
    //             ["insert", ["link", "picture", "imageList", "video", "hr"]],
    //             ['view', ['fullscreen', 'codeview', 'help']],

    //         ],
    //         dialogsInBody: true,
    //         imageList: {
    //             endpoint: "<?php echo site_url('uploads/listGambar') ?>",
    //             fullUrlPrefix: "<?php echo base_url('uploads/berkas') ?>/",
    //             thumbUrlPrefix: "<?php echo base_url('uploads/berkas') ?>/"
    //         }
    //     });
    //     $.upload = function(file) {
    //         let out = new FormData();
    //         out.append('file', file, file.name);
    //         $.ajax({
    //             method: 'POST',
    //             url: '<?php echo site_url('qcdoc/create/uploadImage') ?>',

    //             contentType: false,
    //             cache: false,
    //             processData: false,
    //             data: out,
    //             success: function(img) {
    //                 $('.summernote').summernote('insertImage', img);
    //             },
    //             error: function(jqXHR, textStatus, errorThrown) {
    //                 console.error(textStatus + " " + errorThrown);

    //             }
    //         });
    //     };
    //     $.delete = function(src) {
    //         $.ajax({
    //             method: 'POST',
    //             url: '<?php echo site_url('article/create/deleteImage ') ?>',

    //             cache: false,
    //             data: {
    //                 src: src
    //             },
    //             success: function(response) {
    //                 console.log(response);
    //             }

    //         });
    //     };
    // });
</script>

<?= $this->endSection() ?>