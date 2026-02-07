<?php
// 1. Configurações de sistema e Headers (Sempre no topo!)
ini_set("display_errors", 1);
header('Content-Type: text/html; charset=utf-8');

// 2. Coleta de variáveis de ambiente
$servername = getenv('DB_HOST');
$username   = getenv('DB_USER');
$password   = getenv('DB_PASS');
$database   = getenv('DB_NAME');

// 3. Conexão com o banco
$link = new mysqli($servername, $username, $password, $database);

if (mysqli_connect_errno()) {
  die("Connect failed: " . mysqli_connect_error());
}

// 4. Lógica de negócio (Geração de dados e Insert)
$valor_rand1 = rand(1, 999);
$valor_rand2 = strtoupper(substr(bin2hex(random_bytes(4)), 1));
$host_name   = gethostname();

$query = "INSERT INTO dados (AlunoID, Nome, Sobrenome, Endereco, Cidade, Host) 
          VALUES ('$valor_rand1', '$valor_rand2', '$valor_rand2', '$valor_rand2', '$valor_rand2', '$host_name')";

$status_message = "";
if ($link->query($query) === TRUE) {
  $status_message = "New record created successfully";
} else {
  $status_message = "Error: " . $link->error;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Exemplo PHP - Modernizado</title>
  <style>
    body {
      font-family: sans-serif;
      line-height: 1.6;
      padding: 20px;
    }

    .success {
      color: green;
      font-weight: bold;
    }

    .info {
      color: #555;
    }
  </style>
</head>

<body>
  <h2>🚀 Status do Sistema (Stack 2026)</h2>
  <p class="info">Versão Atual do PHP: <strong><?php echo phpversion(); ?></strong></p>
  <p class="info">ID do Host (Container): <strong><?php echo $host_name; ?></strong></p>
  <hr>
  <p class="success"><?php echo $status_message; ?></p>
</body>

</html>