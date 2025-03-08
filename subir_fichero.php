<?php
session_start();

    if (!isset($_SESSION['login']))
    {
      printf('chungo');
	    header("location:index.html");
    }
?>

<!DOCTYPE html>
<html>
<head>
  <title>PHP File Upload</title>
  <link rel="stylesheet" type="text/css" href="estilos.css">
</head>

<body>
  <?php
    if (isset($_SESSION['message']) && $_SESSION['message'])
    {
      printf('<b>%s</b>', $_SESSION['message']);
      unset($_SESSION['message']);
    }
  ?>

  <table class="form-table">
    <form method="POST" action="upload.php" enctype="multipart/form-data">
      <tr>
        <th class="label">Subir un fichero:</th>
        <td>
          <input type="file" name="uploadedFile" class="form-input"/>
        </td>
      </tr>
      <tr>
        <td colspan="2" class="center-text">
          <input type="submit" name="uploadBtn" value="Upload" class="form-button"/>
        </td>
      </tr>
    </form>
  </table>
  <p align="center">
    <a href="cerrar.php">Cerrar sesión</a>
  </p>

</body>
</html>
