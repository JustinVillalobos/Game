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
</style>
<div class="container">
    <div class="body">
        <div class="row header">
                <div class="col-md-2 d-flex justify-content-left title">
                    <img src="<?php echo $url;?>assets/logo.png">
                </div>
                <div class="col-md-8 d-flex justify-content-center title">
                    <h1>Guía</h1>
                </div>
                <div class="col-md-2"></div>
        </div>
        <div class="row" style="margin-top:35px;">
            <div class="col-md-12  text-white">

                <h3>Dispositivos táctiles</h3>
                <span>Para dispositivos táctiles se despliegan 4 botones que permiten el interactuar con el juego.</span>
                
                
            </div>  
            <div class="col-md-12 d-flex justify-content-center img" style="margin-top:35px;">
            <img src="../assets/flechas.PNG">
            </div>
            <div class="col-md-12  text-white" style="margin-top:35px;">

                <h3>Ordenadores o dispositivos con teclados físicos</h3>
                <span>En esta modalidad, se juega con las teclas de flecha del teclado.</span>
                
                
            </div>  
            <div class="col-md-12 d-flex justify-content-center img" style="margin-top:35px;">
                <img src="../assets/flechaspc.png">
            </div> 
            <div class="col-md-12  text-white"  style="margin-top:35px;">
                <h3>Compatibilidad con navegadores</h3>
                <ul>
                    <li class='d-flex'><div style="margin-right:5px;"><i class="fab fa-chrome"></i></div>Google Chrome</li>
                    <li class='d-flex'><div style="margin-right:5px;"><i class="fab fa-firefox-browser"></i></div>Microsoft Edge</li>
                    <li class='d-flex'><div style="margin-right:5px;"><i class="fab fa-edge"></i></div>Firefox</li>
                    <li class='d-flex'><div style="margin-right:5px;"><i class="fab fa-safari"></i></div>Safari</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="row">
             
            <div class="col-md-12 d-flex justify-content-center" style="margin-top:20px;padding-bottom:20px;">
                <a href="PageController.php?action=game" class="btn btn-primary">Volver</a>
            </div>
    </div>
    </div>
</div>

<?php include( '../views/footer.php')?>