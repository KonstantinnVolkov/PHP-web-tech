<?php
session_start();
if (!isset($_COOKIE['session_id'])) {
    header("Location: login.php");
}
include "FileManagerLogic.php";

$fileManagerLogic = new FileManagerLogic();
$fileManagerLogic -> showAllFiles();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>File manager</title>
</head>
<body style="background: #e1e3e6">
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5">
                <div class="card-body p-4 p-sm-5">
                    <form action="/lr_6/fileManagerView.php" method="post" enctype="multipart/form-data">
                        <div class="file-drop-area form-floating mb-3">
                            <input type="file" class="file-input form-control mb-2" name="files[]" multiple/>
                        </div>
                        <br>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="pathToFile" name="pathToFile" placeholder="Path to file to upload">
                            <label for="pathToFile">Path to file to upload</label>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary text-uppercase fw-bold mb-1" type="submit" name="download">Download</button>
                            <button class="btn btn-primary text-uppercase fw-bold mb-1" type="submit" name="upload">Upload</button>
                            <button class="btn btn-primary text-uppercase fw-bold" type="submit" id="delete" name="delete">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php

if (isset($_POST['delete'])) {
    if ((isset($_POST['pathToFile'])) && ($_POST['pathToFile'] != ""))
    {
        $fileManagerLogic->deleteFile($_POST['pathToFile']);
        header("Location: fileManagerView.php");
    }
}
elseif (isset($_POST['download'])) {
    if ((isset($_POST['pathToFile'])) && ($_POST['pathToFile'] != ""))
    {
        $fileManagerLogic->downloadFile($_POST['pathToFile']);
        header("Location: fileManagerView.php");
    }
}
elseif (isset($_POST['upload'])) {
    $fileManagerLogic->uploadFiles($_FILES['files']);
    header("Location: fileManagerView.php");
}

