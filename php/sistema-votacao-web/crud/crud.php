<?php 
  require_once('./connection.php');

  $conn = connection();

  if(isset($_POST['cadastrar'])){
    $tmpName     = $_FILES['imagem']['tmp_name'];

    $fp = fopen($tmpName, 'r');
    $imgContent = fread($fp, filesize($tmpName));
    fclose($fp);

    try{
      $stmt = $conn->prepare('
        INSERT INTO candidatos 
          (NOME, NUMERO, PARTIDO, CARGO, IMAGEM, TIPO_IMG) 
        VALUES
          (:nome, :numero, :partido, :cargo, :imagem, :tipo_img)
      ');

      $stmt->execute(array(
        ':nome' => $_POST['nome'],
        ':numero' => $_POST['numero'],
        ':partido' => $_POST['partido'],
        ':cargo' => $_POST['cargo'],
        ':imagem'=> $imgContent,
        ':tipo_img' => $_FILES['imagem']['type']
      ));

      if($stmt->rowCount() > 0){
        header('Location: ../');
      }else{
        echo 'Houve algum erro ao cadastrar';
      }

    }catch(PDOException $e){
      echo 'Error: ' . $e->getMessage();
    }
  }

  if(isset($_POST['editar'])){
    try{
      $stmt = $conn->prepare('
        UPDATE 
          candidatos
        SET 
          NOME = :nome, 
          NUMERO = :numero, 
          PARTIDO = :partido, 
          CARGO = :cargo
        WHERE
          ID = :id
      ');

      $stmt->execute(array(
        ':id' => $_POST['id'],
        ':nome' => $_POST['nome'],
        ':numero' => $_POST['numero'],
        ':partido' => $_POST['partido'],
        ':cargo' => $_POST['cargo']
      ));

      if($stmt->rowCount() > 0){
        header('Location: ../');
      }else{
        echo 'Houve algum erro ao editar';
      }

    }catch(PDOException $e){
      echo 'Error: ' . $e->getMessage();
    }
  }

  if(isset($_GET['action'])){
    switch ($_GET['action']) {
      case 'deletar':
        $stmt = $conn->prepare('DELETE FROM candidatos WHERE id = :id');
        $stmt->bindParam(':id', $_GET['candidato']); 
        $stmt->execute();
    
        if ($stmt->rowCount() > 0){
          header('Location: ../');
        }else{
          echo 'Erro ao excluir candidato';
        }
        break;
      case 'votar':
        try{
          $stmt = $conn->prepare('
            UPDATE 
              candidatos
            SET 
              QTDE_VOTOS = QTDE_VOTOS + 1
            WHERE
              ID = :id
          ');
    
          $stmt->execute(array(
            ':id' => $_GET['candidato']
          ));
    
          if($stmt->rowCount() > 0){
            header('Location: ../');
          }else{
            echo 'Houve algum erro ao votar';
          }
    
        }catch(PDOException $e){
          echo 'Error: ' . $e->getMessage();
        }
        break;
      default:
        echo 'erro desconhecido';
        break;
    }
  }

  header('Location: ../');
?>