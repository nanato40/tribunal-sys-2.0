@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

<style type="text/css">
	.gly-spin {
  -webkit-animation: spin 2s infinite linear;
  -moz-animation: spin 2s infinite linear;
  -o-animation: spin 2s infinite linear;
  animation: spin 2s infinite linear;
}
@-moz-keyframes spin {
  0% {
    -moz-transform: rotate(0deg);
  }
  100% {
    -moz-transform: rotate(359deg);
  }
}
@-webkit-keyframes spin {
  0% {
    -webkit-transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(359deg);
  }
}
@-o-keyframes spin {
  0% {
    -o-transform: rotate(0deg);
  }
  100% {
    -o-transform: rotate(359deg);
  }
}
@keyframes spin {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(359deg);
    transform: rotate(359deg);
  }
}
.gly-rotate-90 {
  filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=1);
  -webkit-transform: rotate(90deg);
  -moz-transform: rotate(90deg);
  -ms-transform: rotate(90deg);
  -o-transform: rotate(90deg);
  transform: rotate(90deg);
}
.gly-rotate-180 {
  filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=2);
  -webkit-transform: rotate(180deg);
  -moz-transform: rotate(180deg);
  -ms-transform: rotate(180deg);
  -o-transform: rotate(180deg);
  transform: rotate(180deg);
}
.gly-rotate-270 {
  filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
  -webkit-transform: rotate(270deg);
  -moz-transform: rotate(270deg);
  -ms-transform: rotate(270deg);
  -o-transform: rotate(270deg);
  transform: rotate(270deg);
}
.gly-flip-horizontal {
  filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=0, mirror=1);
  -webkit-transform: scale(-1, 1);
  -moz-transform: scale(-1, 1);
  -ms-transform: scale(-1, 1);
  -o-transform: scale(-1, 1);
  transform: scale(-1, 1);
}
.gly-flip-vertical {
  filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=2, mirror=1);
  -webkit-transform: scale(1, -1);
  -moz-transform: scale(1, -1);
  -ms-transform: scale(1, -1);
  -o-transform: scale(1, -1);
  transform: scale(1, -1);
}
	
</style>



<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript">

	
$(document).ready(function() {

  var path;
  var div;


	setInterval(function(){ ajax(path); }, 1000);

	function ajax(){
  $.ajax({
    type:"GET",
    url:"/admin/totalSec",
    success: function(data) {
      $("#totalSec").text(JSON.stringify(data));
    },


    dataType: 'json',
  });

  $.ajax({
    type:"GET",
    url:"/admin/totalUsu",
    success: function(data) {
      $("#totalUsu").text(JSON.stringify(data));
    },


    dataType: 'json',
  });

$.ajax({
    type:"GET",
    url:"/admin/totalCon",
    success: function(data) {
      $("#totalCon").text(JSON.stringify(data));
    },


    dataType: 'json',
  });




}

 
});
</script>




<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
.tg .tg-yw4l{vertical-align:top}
</style>
<table class="tg" style="width: 100%;">
  <tr>
    <th class="tg-yw4l"><div class="info-box bg-green" align="left">
        <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Dispositivos Online</span>
          <span class="info-box-number">100</span>
          <!-- The progress section is optional -->
          <div class="progress">
            <div class="progress-bar" style="width: 70%"></div>
          </div>
          <span class="progress-description">
            100% Increase in 30 Days
          </span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box --></th>
    <th class="tg-yw4l"><div class="info-box bg-green">
        <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Seções Cadastradas</span>
          <span class="info-box-number" id="totalSec">  <i class="glyphicon glyphicon-refresh gly-spin"></i></span>
          <!-- The progress section is optional -->
          <div class="progress">
            <div class="progress-bar" style="width: 70%"></div>
          </div>
          <span class="progress-description">
            70% Increase in 30 Days
          </span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box --></th>
    <th class="tg-yw4l">

      <div class="info-box bg-green">
        <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Usuários cadastrados</span>
          <span class="info-box-number" id="totalUsu"><i class="glyphicon glyphicon-refresh gly-spin"></i></span>
          <!-- The progress section is optional -->
          <div class="progress">
            <div class="progress-bar" style="width: 70%"></div>
          </div>
          <span class="progress-description">
            70% Increase in 30 Days
          </span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box --></th>
    <th class="tg-yw4l">
      <div class="info-box bg-green">
        <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Requisições em aguardo</span>
           <span class="info-box-number" id="totalCon"><i class="glyphicon glyphicon-refresh gly-spin"></i></span>
          <!-- The progress section is optional -->
          <div class="progress">
            <div class="progress-bar" style="width: 70%"></div>
          </div>
          <span class="progress-description">
            70% Increase in 30 Days
          </span>
        </div><!-- /.info-box-content -->
      </div><!-- /.info-box --></th>
  </tr>
</table>



@stop