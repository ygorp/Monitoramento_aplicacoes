<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "monitoramento";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
  die("Conexão falhou: " . $conn->connect_error);
}

$sql = "SELECT id, nome, status, ultima_verificacao FROM Aplicacoes";
$result = $conn->query($sql);

$aplicacoes = array();
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $aplicacoes[] = $row;
  }
} else {
  echo "0 results";
}
$conn->close();

header('Content-Type: application/json');
echo json_encode($aplicacoes);
?>