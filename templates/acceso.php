<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

    <title></title>
  </head>
  <body>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-4">

    </div>
    <div class="col-md-4">
      <h1>INICIAR SESION</h1>
      <hr>
      <form id="login" method="post">

      <label for="">usuario</label>
      <input type="text" name="" id="user" class="form-control" value="">
      <label for="">contraseña</label>
      <input type="text" name="" id="pass" class="form-control" value="">
      <br>
      <button type="submit" >enviar</button>
    </form>

    </div>
  </div>
</div>
  </body>
</html>

<script type="text/javascript">
$(document).on('submit','#login',function(e){
  user = $("#user").val();
  pass = $("#pass").val();
  $.ajax({
    url:"source/login.php",
    type : "POST",
    data : {"user":user,"pass":pass},
    dataType : "JSON",
    success : function(data){
swal({
  title : data.title,
  type : data.type,
  text : data.text,
  timer : 3000,
  showConfirmButton : false
});
if(data.type="success"){
  setTimeout(function(){
    window.location.href="./";
  },3000);
}
    }
  });
e.preventDefault();
});
</script>
