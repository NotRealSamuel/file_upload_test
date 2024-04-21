<?php
include 'db.php';

if (isset($_POST['submit_btn'])) {
    $file = $_FILES['file_input'];

    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 5000000) { //5mb size 5000kb 5000000bytes
                $fileNameNew = uniqid('', true) . '.' . $fileActualExt;
                $fileDestination = '/files/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $sql = "INSERT INTO img (img_url) VALUES ('$fileDestination')";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    header('Location:./?err=File uploaded successfully');
                } else {
                    header('Location:./?err=There was error while uploading your file');
                }
            } else {
                header('Location:./?err=File must have size les than 5mb');
            }
        } else {
            header('Location:./?err=There was error while uploading your file');
        }
    } else {
        header('Location:./?err=File must be type of jpg / jpeg / png');
    }
}
