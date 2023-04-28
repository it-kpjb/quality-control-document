<?= $this->extend('templates/index') ?>


<?= $this->section('admin-styles') ?>
<!-- FullCalendar -->
<link href="<?= base_url() ?>/assets/vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
<link href="<?= base_url() ?>/assets/vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">
<style>
    .fc-title {
        color: #fff;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- top tiles -->
<!-- <div class="page-title">
    <div class="title_left">
        <h3>Dashboard</h3>
    </div>

</div> -->
<div class="row" style="display: inline-block;">
    <div class="animated flipInY col-lg-4 col-md-4 col-sm-6  ">
        <div class="tile-stats">
            <a href="/qcdoc">
            <!-- <div class="icon"><i class="fa fa-file"></i>
            </div> -->
            <div class="count"><?= $total_qc ?></div>
            <h3>Total QC Document</h3>
            <!-- <p>Total Document Quality Control </p> -->
            </a>
        </div>
    </div>
    <div class="animated flipInY col-lg-4 col-md-4 col-sm-6  ">
        <div class="tile-stats">
            <a href="/qcdoc">
            <div class="icon"><i class="fa fa-check-square-o"></i>
            </div>
            <div class="count"><?= $total_qc_wait_lead ?></div>
            <h3>QC Document Waiting Leader Approval</h3>
            <!-- <p>Total QC</p> -->
            </a>
        </div>
    </div>
    <div class="animated flipInY col-lg-4 col-md-4 col-sm-6  ">
        <div class="tile-stats">
            <a href="/qcdoc">
            <div class="icon"><i class="fa fa-check-square-o"></i>
            </div>
            <div class="count"><?= $total_qc_wait_manager ?></div>
            <h3>QC Document Waiting Manager Approval</h3>
            <!-- <p>Total QC</p> -->
            </a>
        </div>
    </div>
    <div class="animated flipInY col-lg-4 col-md-4 col-sm-6  ">
        <div class="tile-stats">
            <a href="/qcdoc">
            <div class="icon"><i class="fa fa-reply"></i>
            </div>
            <div class="count"><?= $total_qc_revised_lead ?></div>
            <h3>QC Document Revised By Leader</h3>
            <!-- <p>Total QC revised</p> -->
            </a>
        </div>
    </div>
    <div class="animated flipInY col-lg-4 col-md-4 col-sm-6  ">
        <div class="tile-stats">
            <a href="/qcdoc">
            <div class="icon"><i class="fa fa-reply"></i>
            </div>
            <div class="count"><?= $total_qc_revised_manager ?></div>
            <h3>QC Document Revised By Manager</h3>
            <!-- <p>Total QC revised</p> -->
            </a>
        </div>
    </div>
    <div class="animated flipInY col-lg-4 col-md-4 col-sm-6  ">
        <div class="tile-stats">
            <a href="/qcdoc">
            <div class="icon"><i class="fa fa-check-square"></i>
            </div>
            <div class="count"><?= $total_qc_done ?></div>
            <h3>QC Completed</h3>
            <!-- <p>Total QC is completed</p> -->
            </a>
        </div>
    </div>


</div>
<!-- /top tiles -->

<div class="row mt-5 p-3">
    <!-- <div class=""> -->
        <!-- <div class="page-title">
            <div class="title_left">
                <h3>Calendar</h3>
            </div>
        </div> -->

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Calendar</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <!-- <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li> -->
                            <!-- <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li> -->
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div id='calendar-new'></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- calendar modal -->
<div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">New Calendar Entry</h4>
            </div>
            <div class="modal-body">
                <div id="testmodal" style="padding: 5px 20px;">
                    <form id="antoform" class="form-horizontal calender" role="form">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" style="height:55px;" id="descr" name="descr"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary antosubmit">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel2">Edit Calendar Entry</h4>
            </div>
            <div class="modal-body">

                <div id="testmodal2" style="padding: 5px 20px;">
                    <form id="antoform2" class="form-horizontal calender" role="form">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="title2" name="title2">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Description</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" style="height:55px;" id="descr2" name="descr"></textarea>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary antosubmit2">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>
<div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>
<!-- /calendar modal -->


<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>/assets/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php echo base_url(); ?>/assets/vendors/nprogress/nprogress.js"></script>
<!-- FullCalendar -->
<script src="<?php echo base_url(); ?>/assets/vendors/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/vendors/fullcalendar/dist/fullcalendar.min.js"></script>

<script>
    let events = <?php echo json_encode($qcdoc) ?>;
    var date = new Date()
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear()

    $('#calendar-new').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        buttonText: {
            today: 'today',
            month: 'month',
            week: 'week',
            day: 'day'
        },
        events: events
    })
</script>
<?= $this->endSection() ?>