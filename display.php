<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gallery</title>
  <!-- Bootstrap 5 CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <link rel="shortcut icon" href="img/ony_logo_5.png" type="image/x-icon">
</head>

<body>
  <div class="container">
    <h1>Gallery</h1>

    <?php

    $mysqli = new mysqli('localhost', 'root', '', 'images') or die($mysqli->connect_error);
    $table = 'img';

    $result = $mysqli->query("SELECT * FROM $table") or die($mysqli->error);

    while ($data = $result->fetch_assoc()) {
      echo "<img src='{$data['img_dir']}' width='20%'";
      echo "<br>";
      echo "<p>{$data['name']}</p>";
    }

    ?>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>

</html>