<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $seasons = $_POST['seasons'];

    if ($seasons <= 0) {
        echo "O número de temporadas deve ser positivo.";
    } else {
        $sql = "INSERT INTO series (title, genre, seasons) VALUES ('$title', '$genre', '$seasons')";

        if ($conn->query($sql) === TRUE) {
            echo "Nova série cadastrada com sucesso!";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastrar Série</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Cadastrar Série</h1>
    <form method="post" action="add_series.php">
        <label for="title">Título:</label>
        <input type="text" id="title" name="title" placeholder="Escreva aqui o título" required>
        <br>
        <label for="genre">Gênero:</label>
        <select id="genre" name="genre" required>
            <option value="">Selecione um gênero</option>
            <option value="Ação">Ação</option>
            <option value="Aventura">Aventura</option>
            <option value="Comédia">Comédia</option>
            <option value="Drama">Drama</option>
            <option value="Fantasia">Fantasia</option>
            <option value="Ficção Científica">Ficção Científica</option>
            <option value="Mistério">Mistério</option>
            <option value="Romance">Romance</option>
            <option value="Terror">Terror</option>
        </select>
        <br>
        <label for="seasons">Temporadas:</label>
        <input type="number" id="seasons" name="seasons" min="1" required>
        <br>
        <input type="submit" value="Cadastrar">
    </form>
    <br>
    <a href="view_series.php">Ver Séries Cadastradas</a>
</body>
</html>
