<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Fill Your Data</title>
  </head>
  <body>
    <nav class="navbar navbar-dark bg-primary">
      <span class="navbar-brand mb-0 h1">Simple Crud-Application</span>
      <a class="btn btn-danger" href="<?php echo site_url('Auth/login')?>">Login</a>
    </nav>
    <br></br>
    <div class="container">
      <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
      <?php echo $this->session->flashdata('msg'); ?>
      <?php echo $this->session->flashdata('mess'); ?>
      <form method="post" action="<?php echo site_url('Auth/regist')?>">
        <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input type="text" class="form-control" name="email">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nomor Induk Mahasiswa</label>
          <input type="number" class="form-control" name="nim">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Lengkap</label>
          <input type="text" class="form-control" name="nama">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Password</label>
          <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-primary" value="save">Register</button>
      </form>
    </div>
  </body>
</html>