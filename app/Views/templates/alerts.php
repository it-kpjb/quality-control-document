<div class="col-sm-12">

    <?php if (session()->getFlashData('success')) : ?>

        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                <?= session()->getFlashData('success') ?>
            </div>
        </div>
    <?php endif ?>

    <?php if (session()->getFlashData('danger')) : ?>

        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                <?= session()->getFlashData('danger') ?>
            </div>
        </div>
    <?php endif ?>

    <?php if (session()->getFlashData('info')) : ?>

        <div class="alert alert-info alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                <?= session()->getFlashData('info') ?>
            </div>
        </div>
    <?php endif ?>

    <?php if (session()->getFlashData('warning')) : ?>

        <div class="alert alert-warning alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                <?= session()->getFlashData('warning') ?>
            </div>
        </div>
    <?php endif ?>

</div>