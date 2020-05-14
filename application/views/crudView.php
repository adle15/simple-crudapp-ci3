<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Simple Crud-App</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
      <a class="navbar-brand mb-01 h1">Simple CrudApp</a>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
        </ul>
        <span class="navbar-text">
          Welcome User
        </span>
        <br></br>
        <a class="btn btn-danger btn-sm" href="<?php base_url('CrudController/logout') ?>">Logout</a>
      </div>
    </nav>
    <br></br>
    <div class="container">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">NO</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">NIM</th>
                <th scope="col">Nomer Handphone</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($result as $row) {?>
                <tr>
                <th scope="row"><?php echo $row->id; ?></th>
                <td><?php echo $row->namalengkap; ?></td>
                <td><?php echo $row->NIM; ?></td>
                <td><?php echo $row->no_telp; ?></td>
                <td><a class="btn btn-primary btn-sm" href="<?php echo site_url('CrudController/edit');?>/<?php echo $row->id;?>" role="button">Edit</a> 
                <a class ="btn btn-danger btn-sm" href="<?php echo site_url('CrudController/delete');?>/<?php echo $row->id;?>">Delete</a></td>
                </tr>
                <?php } ?>
            </tbody>
    </table>
    <a class="btn btn-warning" href="<?php echo site_url('CrudController');?>" >Tambah Data Lainnya</a>
    </div>
  </body>
</html>