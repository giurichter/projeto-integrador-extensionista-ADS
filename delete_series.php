<?php
include 'db.php';

$id = $_GET['id'];
$sql = "DELETE FROM series WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Série deletada com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Deletar Série</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Série Deletada</h1>
    <br>
   
