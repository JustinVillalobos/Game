<?php include('./views/header.php')?>
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
    background: url(./assets/FONDO-AZUL.jpg);
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
                    <h1>Tetris</h1>
                </div>
                <div class="col-md-2"></div>
        </div>
        <div class="row" style="margin-top:35px;">
            <div class="col-md-12 text-center text-white">

                <h3>Ha ocurrido un error en el servidor</h3>
                <br>
                <span>Reintente más tarde</span>
                
                
            </div>  
            <div class="col-md-12 d-flex justify-content-center img" style="margin-top:35px;">
                <img src="./assets/broken.png">
            </div> 
        </div>
    </div>
    <div class="footer">
        <div class="row">
              
            <div class="col-md-12 d-flex justify-content-center" style="margin-top:20px;">
                <a href="controllers/PageController.php?action=index" class="btn btn-primary">Volver</a>
            </div>
    </div>
    </div>
</div>

<?php include( './views/footer.php')?>