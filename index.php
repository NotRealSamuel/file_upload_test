<?php
include 'db.php';

$sql = "SELECT img_url FROM img;";
$result = mysqli_query($con, $sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <title>File Upload</title>
</head>

<body style="height: 100vh">
  <div style="height: 100vh" class="container d-flex flex-column justify-content-center align-items-center">


    <div class="container d-flex flex-wrap">
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div style="height: 100px; width: 100px;"> <img style="object-fit: cover; height: 100px; width: 100px;" src="<?php echo $row['img_url']; ?>"></div>
      <?php } ?>
    </div>

    <?php if (isset($_GET['err'])) { ?>
      <div class="alert alert-danger" role="alert">
        <?php echo $_GET['err']; ?>
      </div>
    <?php } ?>

    <form action="upload_file.php" method="post" class="d-flex flex-column" enctype="multipart/form-data">
      <input type="file" name="file_input" />
      <button class="btn btn-danger" type="submit" name="submit_btn">
        Submit
      </button>
    </form>
  </div>
</body>

</html>