<?php
  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $mailFrom = $_POST['email'];
    $message = $_POST['message'];


    $mailTo = "ochukwumafranklin@gmail.com"
    $headers = "From: " .$mailFrom;
    $txt = "You have received an email from" .$name. ".\n\n".$message;

    mail($mailTo, $txt, $headers);
    header("Location: index.php?mailsend");

  }

  if (isset($_FILES['file'])) {
    $file = $_FILES['file'];

    // File Properties
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];

    //Work out the file extension
    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));

    $allowed = array('txt', 'pdf', 'jpg', 'jpeg');

    if (in_array($file_ext, $allowed)) {
      if ($file_error === 0) {
        if ($file_size <= 2097152) {

          $file_name_new = uniqid('', true) . '.' . $file_ext;
          $file_destination = 'uploads/' . $file_name_new;

          if (move_uploaded_file($file_tmp, $file_destination)) {
            echo $file_destination
            // code...
          }
          // code...
        }
        // code...
      }
      // code...
    }
  }


 ?>
