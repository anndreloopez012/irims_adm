<div class="content loggin">
  <section class="content col-lg-12">
    <div class="container-fluid">
      <div class="row">
        <section class="content col-lg-8">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <div class="col-lg-12 sismenu">
                  <h2><?php echo $adm_cont_arr_lg ?></h2>
                </div>
                <div class="col-lg-12 sismenu">
                  <img src="../irims_adm/lib/dist/img/<?php echo $adm_cont_img ?>" class="img">
                </div>
                <div class="col-lg-12">
                  <h5><?php echo $adm_cont_aba_lg ?></h5>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="content col-lg-4">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-box">

                  <?php
                  require_once 'interbase/tmfAdm.php';
                  session_start();
                  if (isset($_POST['username'])) {

                    $username = stripslashes($_REQUEST['username']);
                    $username = pg_escape_string($rmfAdm, $username);
                    $password = stripslashes($_REQUEST['adm_usr_password']);
                    $password = pg_escape_string($rmfAdm, $password);

                    $query = "SELECT * 
                              FROM adm_usuarios 
                              WHERE username='$username' 
                              AND adm_usr_password='$password'
                              AND adm_usr_status = '1'
                              AND adm_usr_lock = 0";
                    $result = pg_query($rmfAdm,$query) or die(pg_last_error());
                    $rows = pg_num_rows($result);
                    if ($rows == 1) {
                      while ($rTMP = pg_fetch_assoc($result)) {
                        $_SESSION['logged'] = true;
                        $_SESSION['username'] = $rTMP['username'];
                        $_SESSION['adm_usr_ci'] = $rTMP['adm_usr_ci'];
                        $_SESSION['adm_usr_nombre'] = $rTMP['adm_usr_nombre'];

                        //CONDICIONAL PARA OCULTAR O MOSTRAR INFO
                        //$_SESSION['a'] = (isset($rTMP["a"]) && $rTMP["a"] == 'Y')?true:false;

                      }

                      header("Location:home.php");
                    } else {
                      header('Location:index.php?error=1');
                    }
                  } else {
                  ?>


                    <br>
                    <div class="card">
                      <?php
                      if (isset($_REQUEST['error'])) {
                      ?>
                        <div class="error">
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Invalid login data!</strong> Enter data again.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </div>
                      <?php
                      }
                      ?>
                      <div class="card-body login-card-body">
                        <p class="login-box-msg"><?php echo $adm_log_enc_lg ?></p>

                        <form action="" method="post" name="login">
                          <input type="text" name="username" placeholder="<?php echo $adm_input_name_lg ?>" class="form-control" required /><br />
                          <input type="password" name="adm_usr_password" placeholder="<?php echo $adm_input_pass_lg ?>" class="form-control" required /><br />
                          <input name="submit" type="submit" value="<?php echo $adm_bt_lg ?>" class="btn btn-sm btn-info" />
                        </form>

                      </div>
                    </div>
                  <?php
                  }
                  ?>

                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </section>
</div>

<style type="text/css">
  .col-centrada {
    float: none;
    margin: 0 auto;
  }
</style>