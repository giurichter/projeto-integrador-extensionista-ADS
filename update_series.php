<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $seasons = $_POST['seasons'];

    if ($seasons <= 0) {
        echo "O número de temporadas deve ser positivo.";
    } else {
        $sql = "UPDATE series SET title='$title', genre='$genre', seasons='$seasons' WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            header("Location: view_series.php"); // Redireciona para a página de visualização
            exit();
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM series WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Série não encontrada.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Série</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Editar Série</h1>
    <form method="post" action="update_series.php">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="title">Título:</label>
        <input type="text" id="title" name="title" value="<?php echo $row['title']; ?>" required>
        <br>
        <label for="genre">Gênero:</label>
        <select id="genre" name="genre" required>
            <option value="Ação" <?php if ($row['genre'] == 'Ação') echo 'selected'; ?>>Ação</option>
            <option value="Aventura" <?php if ($row['genre'] == 'Aventura') echo 'selected'; ?>>Aventura</option>
            <option value="Comédia" <?php if ($row['genre'] == 'Comédia') echo 'selected'; ?>>Comédia</option>
            <option value="Drama" <?php if ($row['genre'] == 'Drama') echo 'selected'; ?>>Drama</option>
            <option value="Fantasia" <?php if ($row['genre'] == 'Fantasia') echo 'selected'; ?>>Fantasia</option>
            <option value="Ficção Científica" <?php if ($row['genre'] == 'Ficção Científica') echo 'selected'; ?>>Ficção Científica</option>
            <option value="Mistério" <?php if ($row['genre'] == 'Mistério') echo 'selected'; ?>>Mistério</option>
            <option value="Romance" <?php if ($row['genre'] == 'Romance') echo 'selected'; ?>>Romance</option>
            <option value="Terror" <?php if ($row['genre'] == 'Terror') echo 'selected'; ?>>Terror</option>
        </select>
        <br>
        <label for="seasons">Temporadas:</label>
        <input type="number" id="seasons" name="seasons" min="1" value="<?php echo $row['seasons']; ?>" required>
        <br>
        <input type="submit" value="Atualizar">
    </form>
    <br>
    <a href="view_series.php">Voltar para Ver Séries</a>
</body>
</html>
