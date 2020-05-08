<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
        <form method="post" action="<?php echo site_url('crudController/update')?>/<?php echo $row->id; ?>">
            <div class="form-group">
            <label for="exampleInputEmail1">Nama Lengkap</label>
            <input type="text" class="form-control" name="namalengkap" value="<?php echo $row->namalengkap; ?>">
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">NIM</label>
            <input type="number" class="form-control" name="NIM" value="<?php echo $row->NIM; ?>">
            </div>
            <div class="form-group">
            <label for="exampleInputEmail1">Nomer Handphone</label>
            <input type="number" class="form-control" name="no_telp" value="<?php echo $row->no_telp; ?>">
            </div>
            <button type="submit" class="btn btn-primary" value="save">Save Changes</button>
        </form>
    </div>
   </body>
</html>