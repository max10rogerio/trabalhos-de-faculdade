<?php
require_once('../config.php');
require_once(DBAPI);

$turmas = null;
$turma = null;

function index() {
	global $turmas;
	$turmas = find_all('turmas');
}


?>

<?php
function add() {
  if (!empty($_POST['turma'])) {
    
    $turma = $_POST['turma'];
    
    save('turmas', $turma);
    header('location: index.php');
  }
}
?>

<?php

function edit() {
  
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_POST['turma'])) {
      $turma = $_POST['turma'];
      
      update('turmas', $id, $turma);
      header('location: index.php');
    } else {
      global $turma;
      $turma = find('turmas', $id);
    } 
  } else {
    header('location: index.php');
  }
}
?>
<?php

function view($id = null) {
  global $turma;
  $turma = find('turmas', $id);
}
?>
<?php

function delete($id = null) {
  global $turma;
  $turma = remove('turmas', $id);
  header('location: index.php');
}
