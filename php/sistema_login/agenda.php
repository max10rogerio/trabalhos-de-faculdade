<?php
session_start();
 
require_once 'conexao.php';
require_once 'verifica_sessao.php';
require_once './assets/header.php';
require_once './assets/menu.php';
require_once './funcoes.php';

error_reporting(0);


// Verificar se foi enviando dados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // ?? == isset e empty
    $id = $_POST["id"] ?? "";
    $nome = $_POST["nome"] ?? "";
    $email = $_POST["email"] ?? "";
    $celular = $_POST["celular"] ?? "";
} else if (!isset($id)) {
    // Se não se não foi setado nenhum valor para variável $id
    $id = $_GET["id"] ?? "";
}

// busca a instancia do banco de dados
$conexao = db_connect();

// Bloco If que Salva os dados no Banco - atua como Create e Update
if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && $nome != "") {
    try {
        if ($id != "") {
            $stmt = $conexao->prepare("UPDATE contatos SET nome=?, email=?, celular=? WHERE id = ?");
            $stmt->bindParam(4, $id);
        } else {
            $stmt = $conexao->prepare("INSERT INTO contatos (nome, email, celular) VALUES (?, ?, ?)");
        }
        $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $email);
        $stmt->bindParam(3, $celular);

        if ($stmt->execute()) {
            if ($stmt->rowCount() == 0) return showBadge("Erro ao tentar efetivar cadastro", "danger");
                
            showBadge("Dados cadastrados com sucesso!", "success");

            $id = null;
            $nome = null;
            $email = null;
            $celular = null;
        } else {
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
    } catch (PDOException $erro) {
        showBadge("Erro: ".$erro->getMessage(), "danger");
    }
}

// Bloco if que recupera as informações no formulário, etapa utilizada pelo Update
if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $id != "") {
    try {
        $stmt = $conexao->prepare("SELECT * FROM contatos WHERE id = ?");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $rs = $stmt->fetch(PDO::FETCH_OBJ);
            $id = $rs->id;
            $nome = $rs->nome;
            $email = $rs->email;
            $celular = $rs->celular;
        } else {
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
    } catch (PDOException $erro) {
        showBadge("Erro: ".$erro->getMessage(), "danger");
    }
}

// Bloco if utilizado pela etapa Delete
if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $id != "") {
    try {
        $stmt = $conexao->prepare("DELETE FROM contatos WHERE id = ?");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            showBadge("Registo foi excluído com êxito", "success");
            $id = null;
        } else {
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
    } catch (PDOException $erro) {
        showBadge("Erro: ".$erro->getMessage(), "danger");
    }
}
?>
    <h1 class="text-center mb-4">Agenda de contatos</h1>
    <form action="?act=save" method="POST" name="form1" >

        <div class="row">
            <div class="col-sm">
                <input type="hidden" name="id" value='<?php echo $id ?? ''; ?>' />
                <input type="text" placeholder="Nome" required name="nome" id="nome" value='<?php echo $nome ?? ''; ?>'>
            </div>
            <div class="col-sm">
                <input type="email" placeholder="Email" value='<?php echo $email ?? ''; ?>' required name="email" id="email">
            </div>
            <div class="col-sm">
                <input type="text" placeholder="Celular" required name="celular" value='<?php echo $celular ?? ''; ?>' />
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary">SALVAR</button>
                <button type="reset" class="btn btn-danger">LIMPAR</button>
                <input type="reset" value="LIMPAR" class="btn btn-danger">
            </div>
        </div>
    </form>

        <table class="table table-hover">
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Celular</th>
                <th>Ações</th>
            </tr>
            <?php
            try {
                $stmt = $conexao->prepare("SELECT * FROM contatos");
                if ($stmt->execute()) {
                    while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                        echo "<tr>";
                        echo "<td>".$rs->nome."</td><td>".$rs->email."</td><td>".$rs->celular
                                   ."</td><td><center><a href=\"?act=upd&id=".$rs->id."\">[Alterar]</a>"
                                   ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
                                   ."<a href=\"?act=del&id=".$rs->id."\">[Excluir]</a></center></td>";
                        echo "</tr>";
                    }
                } else {
                    showBadge("Erro: Não foi possível recuperar os dados do banco de dados", "danger");
                }
            } catch (PDOException $erro) {
                showBadge("Erro: ".$erro->getMessage(), "danger");
            }
            ?>
        </table>
<?php require_once './assets/footer.php'; ?>
