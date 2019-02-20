<?php
  session_start();
  
  require_once 'config.php';
  require_once DBAPI;
  
  if (isset($_POST['login'])) {
    require_once ('./inc/database.php');
    
    $where = "email = '" . $_POST['email']. "' AND ";
    $where .= "senha = '" . md5($_POST['senha']) . "'";
    
    $usuario = findWhere('usuarios', $where);
    
    print_r($usuario);

    if(isset($usuario) && !empty($usuario)) {
      $_SESSION["id"] = $usuario['id'];
      $_SESSION["nome"] = $usuario['nome'];
      header("Location: ./admin/index.php");
    } 
  }
?>
<?php require_once('./partials/header.php'); ?>
  <main>
    <section class="section section-shaped section-lg">
      <div class="shape shape-style-1 bg-gradient-default">
      </div>
      <div class="container pt-lg-md">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="card bg-secondary shadow border-0">
              <div class="card-header bg-white pb-5">
                <div class="text-muted text-center">
                  LOGIN
                </div>
                <div class="btn-wrapper text-center">
                  Preencha os campos abaixo:
                  <br>
                  Usuário e senha de teste:
                  <br>
                  admin@admin.com
                  <br>
                  123456
                </div>
              </div>
              <div class="card-body px-lg-5 py-lg-5">
                <form role="form" method="POST">
                  <div class="form-group mb-3">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                      </div>
                      <input class="form-control" placeholder="Email" type="email" name="email">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                      </div>
                      <input class="form-control" placeholder="Senha" name="senha" type="password">
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary my-4" name="login">Entrar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

<?php require_once('./partials/header.php'); ?>