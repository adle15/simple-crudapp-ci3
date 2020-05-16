<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Login To Your Account</title>
  </head>
  <body>
    <nav class="navbar navbar-light bg-primary">
        <span class="navbar-brand mb-0 h1">Simple Crud-Application</span>
        <a class="btn btn-danger" href="<?php echo site_url('Auth/register')?>" role="button">Register</a>
    </nav>
    <br></br>
    <div class="container">
        <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
        <?= $this->session->flashdata('message'); ?>
        <?= $this->session->flashdata('message_log'); ?>
        <form method="post" action="<?php echo site_url('Auth/login')?>">
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="text" name="email" class="form-control" value="<?= set_value('email'); ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
  </body>
</html>