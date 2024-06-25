<?php
include 'db.php';

$sql = "SELECT id, title, genre, seasons FROM series";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ver Séries</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Séries Cadastradas</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Gênero</th>
            <th>Temporadas</th>
            <th>Ações</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"]. "</td>
                        <td>" . $row["title"]. "</td>
                        <td>" . $row["genre"]. "</td>
                        <td>" . $row["seasons"]. "</td>
                        <td>
                            <a href='update_series.php?id=".$row["id"]."'>Editar</a> |
                            <a href='delete_series.php?id=".$row["id"]."'>Deletar</a>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Nenhuma série cadastrada</td></tr>";
        }
        $conn->close();
        ?>
    </table>
    <br>
    <a href="add_series.php">Cadastrar Nova Série</a>
</body>
</html>
