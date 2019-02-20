<?php
require_once('../config.php');
require_once(DBAPI);

$cursos = null;
$curso = null;

function index() {
	global $cursos;
	$cursos = find_all('cursos');
}


?>

<?php
function add() {
  if (!empty($_POST['curso'])) {
    
    $curso = $_POST['curso'];
    
    save('cursos', $curso);
    header('location: index.php');
  }
}
?>

<?php

function edit() {
  
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_POST['curso'])) {
      $curso = $_POST['curso'];
      
      update('cursos', $id, $curso);
      header('location: index.php');
    } else {
      global $curso;
      $curso = find('cursos', $id);
    } 
  } else {
    header('location: index.php');
  }
}
?>
<?php

function view($id = null) {
  global $curso;
  $curso = find('cursos', $id);
}
?>
<?php

function delete($id = null) {
  global $curso;
  $curso = remove('cursos', $id);
  header('location: index.php');
}
