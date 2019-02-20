<?php
require_once('../config.php');
require_once(DBAPI);

$posts = null;
$posts = null;

function index() {
	global $posts;
	$posts = find_all('posts');
}


?>

<?php
function add() {
  if (!empty($_POST['posts'])) {
    
    $posts = $_POST['posts'];
    
    save('posts', $posts);
    header('location: index.php');
  }
}
?>

<?php

function edit() {
  
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_POST['posts'])) {
      $posts = $_POST['posts'];
      update('posts', $id, $posts);
      header('location: index.php');
    } else {
      global $posts;
      $posts = find('posts', $id);
    } 
  } else {
    header('location: index.php');
  }
}
?>
<?php

function view($id = null) {
  global $posts;
  $posts = find('posts', $id);
}
?>
<?php

function delete($id = null) {
  global $posts;
  $posts = remove('posts', $id);
  header('location: index.php');
}
