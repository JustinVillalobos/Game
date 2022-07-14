
<?php include( '../views/header.php')?>
<link href="<?php echo $url;?>css/index.css" rel="stylesheet">
<div class="container">
  <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="login-box">
                <div class="login-snip"> 
                <div class="row">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-8 d-flex justify-content-center">
                    <img src="<?php echo $url;?>assets/logo.png">
                  </div>
                  <div class="col-sm-2"></div>
                  
                      
                    </div>
                  <div class="col-sm-12 text-center">
                   <input id="tab-1" type="radio" name="tab" class="sign-in" checked>
                    <label for="tab-1" class="tab">Inicio Sesi&oacuten</label> 
                    <input id="tab-2" type="radio" name="tab" class="sign-up">
                    <label for="tab-2" class="tab" >Registrarse</label>
                    <div class="login-space">
                   
                    <div class="login text-left">
                      <div class="row">
                        <div class="col-sm-12 text-center">
                          <p class="errorTitle"><?php if(!empty($_SESSION["errorBD"])){ echo $_SESSION["errorBD"];}?></p>
                        </div>
                      </div>
                        <form method="POST" action="./AuthController.php?action=login" onsubmit ="return validateLogin()">
                            <div class="group"> <label for="user" class="label">Correo</label> 
                              <input id="user" name="user" type="text" class="input" placeholder="Ingresa tu correo">
                              <span class="error"></span>
                            </div>
                            <div class="group"> <label for="pass" class="label">Contrase&ntildea</label> 
                                <input id="pass" name="pass" type="password" class="input" data-type="password" placeholder="Ingresa tu contraseña">
                                <span class="error"></span>
                            </div>
                            <div class="group"> <input type="submit" id="iniciar_sesion" class="button" value="Iniciar Sesión"> </div>
                        </form>
                      <div class="hr"></div>
                      <div class="text-center">
                        <p>Concurso de videojuego</p>
                     
                        <p>¡Has tu mejor intento!</p>
                        <span>Válido hasta: <?php echo $this->data["dateValid"];?></span>
                      </div>
                      
                  </div>
                  <div class="sign-up-form text-left">
                      <div class="row">
                        <div class="col-sm-12 text-center">
                          <p id="error" class="errorTitle"></p>
                        </div>
                      </div>
                      <div class="group groupsm"> <label for="user2" class="label">Nombre completo</label> <input id="user2" type="text" class="input" placeholder="Ingrese su nombre completo"><span class="error"></span> </div>
                      <div class="group groupsm"> <label for="email2" class="label">Correo</label> <input id="email2" type="text" class="input" placeholder="Ingrese su correo"><span class="error"></span> </div>
                      <div class="group groupsm"> <label for="pass2" class="label">Contrase&ntildea</label> <input id="pass2" type="password" class="input" data-type="password" placeholder="Crea tu contraseña"> <span class="error"></span></div>
                      <div class="group groupsm"> <label for="pass3" class="label">Nick de Usuario</label> <input id="pass3" type="text" class="input"  placeholder="Ingresa tu nick"> <span class="error"></span></div>
                      
                      <div class="group groupsm"> <button id="SignUp" class="button" value="Registrarse">Registrarse</button> </div>
                      
                  </div>  
                  </div>
                    

                

                </div>
              </div>
          </div>
     
  </div>
</div>

<script src="<?php echo $url;?>js/index.js" ></script>
<?php include( '../views/footer.php')?>