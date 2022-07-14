<?php include( '../views/adminHeader.php')?>

<link href="<?php echo $url;?>css/dashboard.css" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-sm-2 d-flex justify-content-left title">
            <img src="<?php echo $url;?>assets/logo.png">
        </div>
        <div class="col-sm-8 d-flex justify-content-center title">
            <h1>Tabla de puntuaciones</h1>
        </div>
    <div class="col-sm-2 title"></div>
        <div class="col-sm-12">
            <div class="bg-white container-table">
                <table id="example" class="display" style="width:100%;">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Correo</th>
                            <th>Puntaje</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($this->data["ranking"] as $clave => $valor) {?>
                        <tr>
                            <td><?php echo  $valor[0];?></td>
                            <td><?php echo  $valor[1];?></td>
                            <td><?php echo  $valor[3];?></td>
                            <td><?php echo  date_format(date_create($valor[2]),"H:i d/m/Y");?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                    <tfoot>
                        
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Cambiar fecha de finalización evento</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
            <div class="row">
                <div class="col-sm-12">
                    <div style="position: relative">
                         <input class="form-control" id="datetimepicker" type="text" value="<?php echo $this->data['date']; ?>">
                    </div>
                </div>
            </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <button type="button" class="btn btn-success" id="update">Actualizar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>
<div class="modal" id="myModal2">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Cambiar Credenciales Administrativas</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
            <div class="row">
                <div class="col-sm-12">
                        <label>Correo:</label>
                         <input class="form-control" id="email" type="text" value="<?php echo $this->data['email']; ?>" placeholder="Ingrese su correo">
                         <span class="error"></span>
                    
                </div>
                <div class="col-sm-12">
                <label>Contraseña:</label>
                         <input class="form-control"  id="password" type="password" value="<?php echo $this->data['password']; ?>" placeholder="Ingrese su contraseña">
                         <span class="error"></span>
                    
                </div>
            </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <button type="button" class="btn btn-success" id="updateCredentials">Actualizar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>
<script src="<?php echo $url;?>js/admin.js" ></script>
<?php include( '../views/adminFooter.php')?>
