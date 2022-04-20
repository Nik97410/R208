<?php
session_start(); 
?>
<!DOCTYPE html>
<html>

<head>
    <title>PHP File Upload</title>
</head>

<body>
    <?php
session_start();
 
$message = ''; 
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload')
{
  if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
  {
    // get details of the uploaded file
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
 
    // sanitize file-name
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
 
    // check if file has one of the following extensions
    $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc');
 
    if (in_array($fileExtension, $allowedfileExtensions))
    {
      // directory in which the uploaded file will be moved
      $uploadFileDir = './uploaded_files/';
      $dest_path = $uploadFileDir . $newFileName;
 
      if(move_uploaded_file($fileTmpPath, $dest_path)) 
      {
        $message ='File is successfully uploaded.';
      }
      else
      {
        $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
      }
    }
    else
    {
      $message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
    }
  }
  else
  {
    $message = 'There is some error in the file upload. Please check the following error.<br>';
    $message .= 'Error:' . $_FILES['uploadedFile']['error'];
  }
}
$_SESSION['message'] = $message;
header("Location: index.php");
    ?>
    <form method="POST" action="upload.php" enctype="multipart/form-data">
        <div class="upload-wrapper">
            <span class="file-name">Choose a file...</span>
            <label for="file-upload">Browse<input type="file" id="file-upload" name="uploadedFile"></label>
        </div>

        <input type="submit" name="uploadBtn" value="Upload" />
    </form>
</body>

</html>
<styles div.upload-wrapper { color: white; font-weight: bold; display: flex; } input[type="file" ] { position: absolute; left: -9999px; } input[type="submit" ] { border: 3px solid #555; color: white; background: #666; margin: 10px 0; border-radius: 5px; font-weight: bold; padding: 5px 20px; cursor: pointer; } input[type="submit" ]:hover { background: #555; } label[for="file-upload" ] { padding: 0.7rem; display: inline-block; background: #fa5200; cursor: pointer; border: 3px solid #ca3103; border-radius: 0 5px 5px 0; border-left: 0; } label[for="file-upload" ]:hover { background: #ca3103; } span.file-name { padding: 0.7rem 3rem 0.7rem 0.7rem; white-space: nowrap; overflow: hidden; background: #ffb543; color: black; border: 3px solid #f0980f; border-radius: 5px 0 0 5px; border-right: 0; } />