<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 text-center mt-5 mx-auto p-4">
                <h1 class="h2">Login Quality Control Document</h1>
                <h2>Quality Control Document</h2>
                
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-5 mx-auto mt-5">
                <form action="<?= site_url('login') ?>" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" required />
                    </div>
                    <br>
                    
                    <div class="form-group">
                        <input type="submit" class="btn btn-success w-100" value="Login" />
                    </div>


                </form>

                <?php if ($this->session->flashdata('success')): ?>
              <div class="alert alert-success" role="alert" style="justify-content: center;">
                <?php echo $this->session->flashdata('success'); ?>
              </div>
              <?php endif; ?>

            </div>
        </div>
    </div>

</body>

</html>