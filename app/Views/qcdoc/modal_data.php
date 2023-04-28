<!-- Add  Modal -->
<div class="modal fade" id="viewModal-<?= $qcdoc['idQc'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Data Qcdoc <br> <?= $qcdoc['referenceNo'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" method="POST" action="/qcdoc/edit/<?= $qcdoc['idQc'] ?>">
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="referenceNo">Reference No. <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-6 ">
                                <input type="text" name="referenceNo" id="referenceNo" readonly value="<?= $qcdoc['referenceNo'] ?>" required="required" class="form-control ">
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
                                <textarea readonly id="budget" name="budget"><?= $qcdoc['budget'] ?></textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Commercial Issue<span class="required">*</span>
                            </label>
                            <div class="col-md-8">
                                <textarea readonly id="issue" name="issue"><?= $qcdoc['issue'] ?></textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Recommendation<span class="required">*</span>
                            </label>
                            <div class="col-md-8">
                                <textarea readonly id="recom" name="recom"><?= $qcdoc['recom'] ?></textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Action
                            </label>
                            <div class="col-md-8">
                                <textarea readonly id="action" name="action"><?= $qcdoc['action'] ?></textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Others
                            </label>
                            <div class="col-md-8">
                                <textarea readonly id="other" name="other"><?= $qcdoc['other'] ?></textarea>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end add modal -->