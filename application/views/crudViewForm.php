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
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand mb-0 h1">Simple CrudApp</a>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">
          </ul>
          <span class="navbar-text">
           Welcome User
          </span>
          <br></br>
          <a href="<?= base_url('Auth/logout')?>" class="btn btn-danger btn-sm">Logout</a>
      </div>
    </nav>
    <br></br>
    <br></br>
    <div class="container">
      <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
      <?php echo $this->session->flashdata('msg'); ?>
      <form method="post" action="<?php echo site_url('CrudController/create')?>">
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Lengkap</label>
          <input type="text" class="form-control" name="namalengkap">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nomer Induk Mahasiswa</label>
          <input type="number" class="form-control" name="NIM">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nomer Handphone</label>
          <input type="number" class="form-control" name="no_telp">
        </div>
        <button type="submit" class="btn btn-primary" value="save">Submit</button>
      </form>
      <br></br>
      <a class="btn btn-warning" href="<?php echo site_url('CrudController/data');?>" >Lihat Data</a>
    </div>
  </body>
</html>