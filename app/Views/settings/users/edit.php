<?= $this->extend('templates/index') ?>
<?= $this->section('admin-styles') ?>

<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="">
    <h1 class="h4 text-gray-900 mb-4"><?= $title ?></h1>
</div>

<?= view('\Myth\Auth\Views\_message_block') ?>

<div class="row">
    <div class="col-12 col-md-6">
        <div class="card shadow my-4 ">
            <div class="card-header">
                <h4>Edit user</h4>
            </div>
            <?php $validation = \Config\Services::validation(); ?>
            <div class="card-body">
                <form action="<?= base_url(); ?>/users/edit-user/<?= $users->id ?>" id="user-form" class="user" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input hidden type="text" id="id" name="id" value="<?= $users->id ?>">
                    
                    <div class="form-group row">
                        <label for="fullname" class="col-form-label text-md-left col-12 col-md-3 col-lg-3">Nama Lengkap</label>
                        <div class="col-sm-12 col-md-9">
                            <input id="fullname" type="text" class="form-control form-control-user " name="fullname" placeholder="Isi Nama Lengkap Anda..." value="<?= $users->fullname ?>">
                            <div class="invalid-feedback errorfullname">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-form-label text-md-left col-12 col-md-3 col-lg-3">Email</label>

                        <div class="col-sm-12 col-md-9">
                            <input id="email" type="email" class="form-control form-control-user" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= $users->email ?>">
                            <div class="invalid-feedback erroremail">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-form-label text-md-left col-12 col-md-3 col-lg-3">Username</label>
                        <div class="col-sm-12 col-md-9">
                            <input id="username" type="text" class="form-control form-control-user" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= $users->username ?>">
                            <div class="invalid-feedback errorusername">
                            </div>
                        </div>
                    </div>
                    <br>

                    <button type="submit" id="btn-editUser" class="btn btn-primary btn-user btn-block">Edit User</button>

                </form>
            </div>
        </div>
    </div>
</div>



<?= $this->section('scripts') ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>


<script>
    function onFileUpload(input, id) {
        id = id || '#ajaxImgUpload';
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(id).attr('src', e.target.result).width(300)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).ready(function() {
        $('#profile-form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                // data: $(this).serialize(),
                data: new FormData(this),
                processData: false,
                contentType: false,
                dataType: 'json',
                // async: false,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                beforeSend: function() {
                    $('#btn-editProfile').attr('disabled', 'disabled');
                    $('#btn-editProfile').html(
                        '<i class="fa fa-spin fa-spinner"></i> Sending');
                },
                complete: function() {
                    $('#btn-editProfile').removeAttr('disabled');
                    $('#btn-editProfile').html('Edit Profile');
                },

                success: function(response, data) {
                    // console.log(response);
                    //klo ada error

                    $('div input[type=text]').on('keyup', function() {
                        if ($(this).val().length > 0) {
                            $(this).closest('div').find('.is-invalid').removeClass("is-invalid");
                        } else {
                            $(this).closest('div').find('.form-control').addClass('is-invalid');
                            $(this).closest('div').find('.form-control').addClass('is-invalid');

                        }
                    });

                    if (response.success) {

                        $("#profile-form").find('.is-invalid').removeClass("is-invalid");
                        // document.getElementById("finput").reset();
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.success
                        }).then(() => window.location.reload());


                    } //sukses
                    else {
                        if (response.error.fullname) {
                            $('#fullname').addClass('is-invalid');
                            $('.errorname').html(response.error.fullname);
                        }
                        if (response.error.profile_image) {
                            $('#finput').addClass('is-invalid');
                            $('.errorprofile_image').html(response.error.profile_image);
                        }

                    }
                },
                error: function(response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed',
                        text: "Please fill all of the form"
                    });
                }


            });
            return false;
        });


        $('#user-form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                // data: $(this).serialize(),
                data: new FormData(this),
                processData: false,
                contentType: false,
                dataType: 'json',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                beforeSend: function() {
                    $('#btn-editUser').attr('disabled', 'disabled');
                    $('#btn-editUser').html(
                        '<i class="fa fa-spin fa-spinner"></i> Sending');
                },
                complete: function() {
                    $('#btn-editUser').removeAttr('disabled');
                    $('#btn-editUser').html('Edit User');
                },

                success: function(response, data) {
                    //klo ada error
                    console.log(response)
                    $('form#user-form div input[type=text]').on('keyup', function() {
                        if ($(this).val().length > 0) {
                            $(this).closest('div').find('.is-invalid').removeClass("is-invalid");
                        } else {
                            $(this).closest('div').find('.form-control').addClass('is-invalid');
                        }
                    });

                    if (response.success) {

                        $("#user-form").find('.is-invalid').removeClass("is-invalid");
                        Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: response.success
                            })
                            .then(() => window.location.href = "/users")



                    } //sukses
                    else {
                        if (response.error.username) {
                            $('#username').addClass('is-invalid');
                            $('.errorusername').html(response.error.username);
                        }
                        if (response.error.fullname) {
                            $('#fullname').addClass('is-invalid');
                            $('.errorfullname').html(response.error.fullname);
                        }
                        if (response.error.email) {
                            $('#email').addClass('is-invalid');
                            $('.erroremail').html(response.error.email);
                        }
                    }
                },
                error: function(response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed',
                        text: "Please fill all of the form"
                    });
                }


            });
            return false;
        });
    })
</script>

<?= $this->endSection() ?>

<?= $this->endSection() ?>