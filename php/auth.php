<?php
// ...
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT password_hash FROM Usuarios WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password_hash'])) {
        // A autenticação foi bem-sucedida, inicie uma sessão
        session_start();
        $_SESSION['username'] = $username;
        echo "Autenticação bem-sucedida";
    } else {
        // A autenticação falhou
        http_response_code(401);
        echo "Nome de usuário ou senha incorretos";
    }
}
// ...
?>