$(document).ready(function () {
    $('#example').DataTable({
        destroy: true,
      language: {
        url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json",
      },
      responsive: true,
      dom: 'Bfrtip',
      buttons: [
             'excel', 'pdf'
        ],
        initComplete: function () {
            $("#spinner").css("display", "none");
            $(".buttons-excel").addClass("btn-success");
            $(".buttons-pdf").addClass("btn-danger");
            $(".dt-buttons").append("<button class='btn btn-primary' title='Reiniciar'><i class='fa fa-repeat'></i></button>");
            $(".dt-buttons").append('<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal" title="Evento"><i class="fa fa-calendar"></i></button>');
            $(".dt-buttons").append('<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal2" title="Credenciales"><i class="fa fa-user"></i></button>');
            $(".dt-buttons").append("<button class='btn btn-info' title='Salir'><i class='fa fa-home'></i></button>");
            $(".btn-primary").click(deleteAll);
            $("img,.btn-info").click(goToHome);
            $(".buttons-pdf").html("<i class='fa fa-file-pdf-o'></i>");
            $(".buttons-excel").html("<i class='fa fa-file-excel-o'></i>");
           
            
          }
    });
    $.datetimepicker.setLocale('de');
    $('#datetimepicker').datetimepicker({
      i18n:{
       de:{
        months:[
         'Enero','Febrero','Marzo','Abril',
         'Mayo','Junio','Julio','Agosto',
         'Septiembre','Octubre','Noviembrer','Diciembre',
        ],
        dayOfWeek:[
         "Sa", "Lu", "Ju", "Mi",
         "Do", "Vi", "Ma",
        ]
       }
      },
      timepicker:true,
      format:'Y-m-d h:m'
     });
});
$("img,.btn-info").click(goToHome);
$("#updateCredentials").click(registerUser);
function goToHome(){
  confirmacionEliminar("¿Desea Salir?", function(response) {
    if(response) {
      window.location ="PageController.php?action=home";
    }
  });
}
function validarEmail(valor) {
  if (/^[^\s@]+@[^\s@]+$/.test(valor)) {
    return true;
  } else {
    return false;
  }
}
function PasswordPattern() {
  return "[^a-zA-Z0-9!.,?¡¿_#]";
}
function evaluateValue(value, pattern) {
  var regex = new RegExp(pattern, "g");
  return regex.test(value);
}
function registerUser() {
  let data = {
    email: "",
    password: "",
  };
  data.email = $("#email").val();
  data.password = $("#password").val();
  let validateE =true;
  let validateP = true;
  if (!validarEmail(data.email)) {
    validateE = false;
    $("#email + span").html("Correo Inv&aacutelido");
  }

  if (data.email.length > 35) {
    validateE = false;
    $("#email + span").html("Correo demasiado extenso");
  }
  if (data.email.length == 0) {
    validateE = false;
    $("#email + span").html("Campo vacío");
  }
  if(validateE){
    $("#email + span").html("");
}
  if (evaluateValue(data.password, PasswordPattern())) {
    validateP = false;
    $("#password + span").html("Contraseña Inv&aacutelida");
  }
  if (data.password.length > 35) {
    validateP = false;
    $("#password + span").html("Contraseña demasiado extensa");
  }
  if (data.password.length == 0) {
    validateP = false;
    $("#password + span").html("Campo vacío");
  }
  if(validateP){
    $("#password + span").html("");
}
if(validateE && validateP){
  var posting = $.post("AjaxController.php?action=updateCredentials", data);

  posting.done(function (data) {
    let json = JSON.parse(data);
    if (json.result == true) {
      let rsp=alertTimeCorrect("Información actualizada con éxito",function(response){
         
        });
    } else {
      alertError(json.error);
    }
  });
  posting.fail(function (data) {
      alertError("Ha ocurrido un error inesperado.");
  });
}
}
function deleteAll(){
    //Delet all ranking
    let data ={

    }
    confirmacionEliminar("¿Desea eliminar todos los registros de puntuaciones?", function(response) {
        if(response) {
          var posting = $.post("AjaxController.php?action=deleteAll", data);

          posting.done(function (data) {
            let json = JSON.parse(data);
            if (json.result == true) {
              let rsp=alertTimeCorrect("Registros eliminados",function(response){
                window.location = "PageController.php?action=dashboard";
              });
            } else {
              alertError(json.error);
            }
          });
          posting.fail(function (data) {
              alertError("Ha ocurrido un error inesperado.");
          });
           
           return true;
        }
      }); 
}
$("#update").click(function(){
  let data ={
    "date":$("#datetimepicker").val()
  };
  var posting = $.post("AjaxController.php?action=saveNewDate", data);

  posting.done(function (data) {
    let json = JSON.parse(data);
    if (json.result == true) {
      let rsp=alertTimeCorrect("Información actualizada con éxito",function(response){
         
        });
    } else {
      alertError(json.error);
    }
  });
  posting.fail(function (data) {
      alertError("Ha ocurrido un error inesperado.");
  });
})