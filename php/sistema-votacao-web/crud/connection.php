<?php
  
  function connection(){
    $DBHOST = 'localhost';
    $DBNAME = 'sistema-votacao-web';
    $DBUSER = 'root';
    $DBPASSWORD = '';

    try {
        $dbh = new PDO("mysql:host={$DBHOST};dbname={$DBNAME}", $DBUSER, $DBPASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->exec("set names utf8");

        return $dbh;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
  }

?>