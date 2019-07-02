<?php
session_start();
$post = $_POST;
$dsn = 'mysql:dbname=utenti_php;host=127.0.0.1';
$user = 'root';
$password = '';

$sql = 'Select * from user_data where username = :user;';
try{
    $pdo = new PDO($dsn, $user, $password);
    $set = $pdo->prepare($sql);
    $set->bindValue(':user', $post['mail']);
    $set->execute();
    $dataToCheck = $set->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e){
    setcookie('message', $value="Errore di connessione al database.");
    header("Location: ../index.php");
    http_response_code(401);
    exit;
}

if (!$dataToCheck){
    setcookie('message', $value="Errore 404.Account non trovato.");
    http_response_code(404);
    header("Location: ../index.php");
    exit;
} else {
    if (password_verify($post['pwd'], $dataToCheck['pwd'])){
        http_response_code(200);
        $_SESSION['mail'] = $post['mail'];
        setcookie('fico', $value= $_SESSION['mail']);

        //$_SESSION['pwd'] = $post['pwd'];
        setcookie('message', $value= "");
        header("Location: ../index.php");
        exit;
    } else {
        setcookie('message', $value="Errore 401.Riprova.");
        http_response_code(401);
        header("Location: ../index.php");
        exit;
    }
}