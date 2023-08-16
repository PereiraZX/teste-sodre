<?php   

$DBhost = "localhost";
$DBname = "empresa";
$DBusername = "root";
$DBpassword = "";

try {
    $pdo = new PDO("mysql:host=$DBhost;dbname=$DBname;charset=utf8", $DBusername, $DBpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //echo "Conexão realizada com sucesso!";
} catch (PDOException $err) {
    //echo "Erro: " . $err->getMessage();
}

?>
