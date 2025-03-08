<?php
    session_start();

    echo '<style>' . file_get_contents('estilos.css') . '</style>';

    $servername = "localhost";
    $username = "userDB";
    $password = "abc123";
    $dbname = "Partes_de_trabajo";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Capturar datos del formulario sin sanitizar
    $username = $_POST['username'];  
    $password = $_POST['password'];

    // Consulta SQL con comillas simples para prevenir errores de sintaxis
    $sql = "SELECT * FROM usuarios WHERE name = '$username' AND password = SHA1('$password')";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['login'] = TRUE;
        echo "<table>
          <tr>
            <th>Usuario</th>
          </tr>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["name"] . "</td>
                </tr>";
        }
        echo "</table>";
        echo " <p><a href='subir_fichero.php'>Subir fichero</a></p>";
    } else {
        // XSS reflejado: el username ingresado se muestra sin sanitizar
        echo "<p>Usuario <b>" . $_POST['username'] . "</b> no encontrado.</p>";
    }

    // Cerrar conexión
    $conn->close();
?>

