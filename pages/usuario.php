
<?php
include'../autoload.php';
$session = new Session();
$session->validity();

$assets = new Assets();
$assets->title('usuario');
$assets->dataTables();
$assets->sweetalert();
$assets->head();
$assets->nav('../');
 ?>
<div class="row">
  <div class="col-md-12">
    <div class="pull-right">
      <button class=" btn-agregar btn btn-primary">agregar</button>
    </div>
    <div class="panel panel-danger">
      <div class="panel-heading">
        <h3 class="panel-title">Listado</h3>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table id="consulta" class="table table-condensed table-hover">
            <thead>
              <tr>
                <td>NOMBRES</td>
                <td>APELLIDOS</td>
                <td>FECHA</td>
                <td>USER</td>
                <td>ACCIONES</td>

              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>



 <?php
$assets->footer();
  ?>

  <script type="text/javascript">
    function loadData(){
      $(document).ready(function(){
        $("#consulta").DataTable({
        "destroy":true,
        "bAutoWidth": false,
        "deferRender": true,
        "sAjaxSource" : "../source/usuario.php?op=1",
        "aoColumns" : [
          {mData :"nombres"},
            {mData :"apellidos"},
                {mData :"fecha"},
                  {mData :"user"},
                  {mData :null,render : function(data){
              accines = '<button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>';
              return accines;
                  }}
        ]

        });
      });
    }
    loadData();
  </script>
