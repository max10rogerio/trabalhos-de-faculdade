<?php
  session_start();

  require_once 'config.php';
  require_once DBAPI;

  if (isset($_POST['login'])) {
    require_once ('./inc/database.php');

    $where = "RA = '" . $_POST['usuario']. "' AND ";
    $where .= "CPF = '" . $_POST['cpf'] . "'";

    $usuario = findWhere('usuarios', $where);

    if(isset($usuario) && !empty($usuario)) {
      $_SESSION["idUser"] = $usuario['id'];
      $_SESSION["RA"] = $usuario['RA'];
      header("Location: index.php");
    }

  }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>CRUD </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
</head>
<body>
    <div class="login-form">
      <div class="main-div">
        <div class="panel">
          <h2>Login</h2>
          <h5>
            Usuário padrão:
            <br>
            R.A.: 0
            <br>
            CPF: 000.000.000-00
          </h5>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
              <form id="Login" method='POST'>
                <div class="form-group">
                  <input type="text" class="form-control" id="inputEmail" name="usuario" placeholder="R.A.">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="CPF" name="cpf" placeholder="CPF">
                </div>
                <button type="submit" name="login" class="btn btn-primary">Login</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="./js/main.js"></script>
  </body>
</html>