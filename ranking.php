<?php include( '../views/header.php')?>
<style>
 @media screen and (max-width: 1000px){
       
        .header img{
            width: 100px!important;
        }
        h1{
            font-size: small;
        }
        .header .col-md-8{
            width:60%;
        }
        .header .col-md-2{
            width:20%;
        }
        
    }
    .header img{
        width:200px;
        cursor: pointer;
    }
    .title{
        
        align-items: center;
        text-align: center;
        
    }
    h1{
       
        color:white;
    }
    body{
    background: url(../assets/FONDO-AZUL.jpg);
    background-size: cover;
}
.body{
    
}
.img img{
    width:20%;
}
.container-table{
    padding: 25px 25px 25px 25px;
    border-radius: 25px;
    overflow-x: auto;
}
</style>
<div class="container">
    <div class="body">
        <div class="row header">
                <div class="col-md-2 d-flex justify-content-left title">
                    <img src="<?php echo $url;?>assets/logo.png">
                </div>
                <div class="col-md-8 d-flex justify-content-center title">
                    <h1></h1>
                </div>
                <div class="col-md-2"></div>
        </div>
        <div class="row" style="margin-top:35px;">
            <div class="col-md-12 text-center text-white">

                <h3>Tabla de Puntajes de los 10 mejores</h3>
                
            </div>  
            <div class="col-md-2"></div>
            <div class="col-md-8 bg-white container-table">
                <table id="example" class="display" style="width:100%;">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Puntaje</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($this->data["ranking"] as $clave => $valor) {?>
                        <tr>
                            <td><?php echo  $valor[0];?></td>
                            <td><?php echo  $valor[3];?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                    <tfoot>
                        
                    </tfoot>
                </table>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <div class="footer">
        <div class="row">  
            <div class="col-md-12 d-flex justify-content-center" style="margin-top:20px;">
                <a href="PageController.php?action=game" class="btn btn-primary">Volver</a>
            </div>
    </div>
    </div>
</div>
<script>
    $(document).ready(function () {
    $('#example').DataTable({
        destroy: true,
      language: {
        url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
      },columns: [
        {

        },
        {
          "className":'text-center'
        }
    ],
      responsive: true,
        initComplete: function () {
            $("#spinner").css("display", "none");
           $("#example_info").html("");
          }
    });
});
</script>
<?php include( '../views/footer.php')?>