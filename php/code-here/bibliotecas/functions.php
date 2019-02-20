<?php
require_once('../config.php');
require_once(DBAPI);

$bibliotecas = null;
$bibliotecas = null;

function index() {
	global $bibliotecas;
	$bibliotecas = find_all('bibliotecas');
}


?>

<?php
function add() {
  if (!empty($_POST['bibliotecas'])) {
    
    $bibliotecas = $_POST['bibliotecas'];
    
    save('bibliotecas', $bibliotecas);
    header('location: index.php');
  }
}
?>

<?php

function edit() {
  
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_POST['bibliotecas'])) {
      $bibliotecas = $_POST['bibliotecas'];
      update('bibliotecas', $id, $bibliotecas);
      header('location: index.php');
    } else {
      global $bibliotecas;
      $bibliotecas = find('bibliotecas', $id);
    } 
  } else {
    header('location: index.php');
  }
}
?>
<?php

function view($id = null) {
  global $bibliotecas;
  $bibliotecas = find('bibliotecas', $id);
}
?>
<?php

function delete($id = null) {
  global $bibliotecas;
  $bibliotecas = remove('bibliotecas', $id);
  header('location: index.php');
}
