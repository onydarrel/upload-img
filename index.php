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
  <h1>Upload Gambar</h1>

  <form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="userfile[]" value="" multiple="">
    <input type="submit" name="submit" value="Upload">
  </form>

  <?php

  $mysqli = new mysqli('localhost', 'root', '', 'images') or die($mysqli->connect_error);
  $table = 'img';

  $phpFileUploadErrors = array(
    0 => 'There is no error, the file uploaded with success',
    1 => 'The uploaded file exceeds the upload_max_filesize directive ini php.ini',
    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
    3 => 'The uploaded file was only partially uploaded',
    4 => 'No file was uploaded',
    5 => 'Missing a temporary folder',
    6 => 'Failed to write file to disk',
    7 => 'A PJP extension stopped the file upload',
  );

  //$_$FILES global variable
  if (isset($_FILES['userfile'])) {
    $file_array = reArrayFiles($_FILES['userfile']);
    //pre_r($file_array);
    for ($i = 0; $i < count($file_array); $i++) {
      if ($file_array[$i]['error']) {
  ?> <div class="alert alert-danger">
          <?php echo $file_array['$i']['name'] . '-' . $phpFileUploadErrors[$file_array[$i]['error']];
          ?></div>
        <?php
      } else {
        $extensions = array('jpg', 'png', 'gif', 'jpeg');

        $file_ext = explode('.', $file_array[$i]['name']);

        $name = $file_ext[0];
        $name = preg_replace("!-!", " ", $name);
        $name = ucwords($name);

        $file_ext = end($file_ext);

        if (!in_array($file_ext, $extensions)) {
        ?>
          <div class="alert alert-danger">
            <?php echo "{$file_array[$i]['name']} - Invalid file extension!"; ?>
          </div>
        <?php
        } else {
          $img_dir = 'img-web/' . $file_array[$i]['name'];
          move_uploaded_file($file_array[$i]['tmp_name'], $img_dir);

          $sql = "INSERT IGNORE INTO $table (name, img_dir) VALUES ('$name','$img_dir')";
          $mysqli->query($sql) or die($mysqli->error);

        ?>
          <div class="alert alert-success">
            <?php echo $file_array[$i]['name'] . '-' . $phpFileUploadErrors[$file_array[$i]['error']]; ?>
          </div>
  <?php
        }
      }
    }
  }

  function reArrayFiles(&$file_post)
  {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i = 0; $i < $file_count; $i++) {
      foreach ($file_keys as $key) {
        $file_ary[$i][$key] = $file_post[$key][$i];
      }
    }

    return $file_ary;
  }

  ?>



  <!-- Optional JavaScript -->
  <!-- Popper.js first, then Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>

</html>