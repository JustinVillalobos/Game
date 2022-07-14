$("#s-1").click(function () {
  $("#s-1").attr("checked", false);
  $("#tab-1").attr("checked", true);
});
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
function AlphabeticAndSpacePattern() {
  return '[^a-zA-ZáéíóúaÁÉÍÓÚñÑ ]';
}
function MixtPattern() {
  return '[^a-zA-Z0-9áéíóúaÁÉÍÓÚñÑ,. -]';
}
function evaluateValue(value, pattern) {
  var regex = new RegExp(pattern, "g");
  return regex.test(value);
}
function validateLength(value, max) {
  return value.length <= max;
}
function validateLogin() {
  let email = $("#user").val();
  let pass = $("#pass").val();

  let validate = true;
  let validatePassword = true;
  if (!validarEmail(email)) {
    validate = false;
    $("#user + span").html("Correo Inv&aacutelido");
  }

  if (email.length > 25) {
    validate = false;
    $("#user + span").html("Correo demasiado extenso");
  }
  if (email.length == 0) {
    validate = false;
    $("#user + span").html("Campo vacío");
  }
  if(validate){
      $("#user + span").html("");
  }
  if (evaluateValue(pass, PasswordPattern())) {
    validatePassword = false;
    $("#pass + span").html("Contraseña Inv&aacutelida");
  }
  if (pass.length > 25) {
    validatePassword = false;
    $("#pass + span").html("Contraseña demasiado extensa");
  }
  if (pass.length == 0) {
    validatePassword = false;
    $("#pass + span").html("Campo vacío");
  }
  if(validatePassword){
    $("#pass + span").html("");
}
if(validatePassword && validate){
  return true;
}else{
  returnfalse
}
}
$("button").click(registerUser);
function registerUser() {
  let data = {
    name: "",
    email: "",
    password: "",
    nick:""
  };
  data.name = $("#user2").val();
  data.email = $("#email2").val();
  data.password = $("#pass2").val();
  data.nick = $("#pass3").val();
  let validateU =true;
  let validateP = true;
  let validateE = true;
  let validateN = true;
    $("#error").html("");
    let validate = true;
    if (!validarEmail(data.email)) {
      validateE = false;
      $("#email2 + span").html("Correo Inv&aacutelido");
    }

    if (data.email.length > 35) {
      validateE = false;
      $("#email2 + span").html("Correo demasiado extenso");
    }
    if (data.email.length == 0) {
      validateE = false;
      $("#email2 + span").html("Campo vacío");
    }
    if(validateE){
      $("#email2 + span").html("");
  }
    if (evaluateValue(data.password, PasswordPattern())) {
      validateP = false;
      $("#pass2 + span").html("Contraseña Inv&aacutelida");
    }
    if (data.password.length > 35) {
      validateP = false;
      $("#pass2 + span").html("Contraseña demasiado extensa");
    }
    if (data.password.length == 0) {
      validateP = false;
      $("#pass2 + span").html("Campo vacío");
    }
    if(validateP){
      $("#pass2 + span").html("");
  }
    if (evaluateValue(data.name, AlphabeticAndSpacePattern())) {
      validateU = false;
      $("#user2 + span").html("Nombre Inv&aacutelida");
    }
    if (data.name.length > 75) {
      validateU = false;
      $("#user2 + span").html("Nombre demasiado extensa");
    }
    if (data.name.length == 0) {
      validateU = false;
      $("#user2 + span").html("Campo vacío");
    }
    if(validateU){
      $("#user2 + span").html("");
  }
  if (evaluateValue(data.nick, MixtPattern())) {
    validateN = false;
    $("#pass3 + span").html("Nick Inv&aacutelido");
  }
  if (data.nick.length > 75) {
    validateN = false;
    $("#pass3 + span").html("Nick demasiado extenso");
  }
  if (data.nick.length == 0) {
    validateN = false;
    $("#pass3 + span").html("Campo vacío");
  }
  if(validateN){
    $("#pass3 + span").html("");
}
    if(validateP && validateU && validateE && validateN){
      var posting = $.post("AjaxController.php?action=saveUser", data);

      posting.done(function (data) {
          
        let json = JSON.parse(data);
       
        if (json.result == true) {
          let rsp=alertTimeCorrect("Usuario Registrado con éxito",function(response){
              $("#user2").val("");
              $("#email2").val("");
              $("#pass2").val("");
              $("#pass3").val("");
              $("#pass2 + span").html("");
              $("#pass3 + span").html("");
              $("#email2 + span").html("");
              $("#user2 + span").html("");
              $(".sign-in").trigger('click');
            });
        } else {
          $("#pass2").val("");
          $("#pass3").val("");
          alertError(json.error);
        }
      });
      posting.fail(function (data) {
          alertError("Ha ocurrido un error inesperado.");
      });
    }
  
}
