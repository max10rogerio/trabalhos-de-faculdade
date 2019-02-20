<?php
    session_start();

    if(empty($_SESSION['id'])) {
        header("Location: " . BASEURL . "login.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>ADMIN</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/bootstrap.min.css">
    <style>
        body {
            padding-top: 50px;
            padding-bottom: 20px;
        }
    </style>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
</head>
<body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="<?php echo BASEURL; ?>admin/" class="navbar-brand">DASHBOARD</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">          
            <li>
                <a href="../usuarios/" class="dropdown-toggle" role="button">
                    Usuarios
                </a>
            </li>
            <li class="dropdown">
                <a href="../posts/">
                    Posts
                </a>
            </li>
            <li class="dropdown">
                <a href="../bibliotecas">
                    Bibliotecas
                </a>
            </li>
            <li>
                <a href="<?php echo BASEURL; ?>">Ir para o Blog</a>
            </li>
            <li>
                <a href="<?php echo BASEURL; ?>logout.php">SAIR</a>
            </li>          
          </ul>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>


<main class="container">