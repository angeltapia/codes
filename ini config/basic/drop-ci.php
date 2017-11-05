<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Examen</title>
        <meta name="description" content="">        

        <link rel="stylesheet" href="<?=base_url()?>public/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?=base_url()?>public/css/style.css">
        <script src="<?=base_url()?>public/js/jquery.js"></script>
        <script src="<?=base_url()?>public/js/bootstrap.js"></script>
    </head>
    <body>
 <div id="header">
             <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">            
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Examen</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?=base_url()?>empresas">Empresas</a></li>
            <li class="active"><a href="<?=base_url()?>clientes">Clientes</a></li>            
          </ul>
        </div>
      </div>
    </div>
        </div>
        
        <div class="container contenido">
        <div class="row" >
            <div class="span12">
                <h1>Nuevo Cliente</h1>
                
                <hr>                                                                
                
                <?php echo validation_errors('<div class="alert alert-danger" role="alert" >','</div>'); ?>
<?php
$input_codigo = array(
  'id' => 'contact_no',
  'name' =>'contact_no',
  'class' => 'form-control',
  'value' => set_value('contact_no',@$dato_cliente[0]->contact_no)
);

$input_nombre = array(
  'id' => 'firstname',
  'name' =>'firstname',
  'class' => 'form-control',
  'value' => set_value('firstname',@$dato_cliente[0]->firstname)
);

$input_apellido = array(
  'id' => 'lastname',
  'name' =>'lastname',
  'class' => 'form-control',
  'value' => set_value('lastname',@$dato_cliente[0]->lastname)
);


$input_email = array(
  'id' => 'email',
  'name' =>'email',
  'class' => 'form-control',
  'value' => set_value('email',@$dato_cliente[0]->email)
);

$formulario = array(
  'class' => 'form-horizontal listaemp'  
);

?>
<!-- <form class="form-horizontal listaemp" role="form" action="<?=base_url()?>empresas/insertar" method="post" > -->
    <?php echo form_open('',$formulario); ?>
   <div class="form-group">
    <label class="col-sm-2 control-label">Empresa</label>
    <div class="col-sm-2">
        <?php echo form_dropdown('accountid',$empresas,@$dato_cliente[0]->accountid); ?>
    </div>
  </div>
  <div class="form-group">
    <label for="contact_no" class="col-sm-2 control-label">Código</label>
    <div class="col-sm-2">
        <?php echo form_input($input_codigo); ?>
    </div>
  </div>
  <div class="form-group">
    <label for="firstname" class="col-sm-2 control-label">Nombre</label>
    <div class="col-sm-6">
        <?php echo form_input($input_nombre); ?>
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">Apellido</label>
    <div class="col-sm-6">
        <?php echo form_input($input_apellido); ?>
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-3">
        <?php echo form_input($input_email); ?>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" id="grabar" name="grabar" class="btn btn-primary">Grabar</button>
        <?php //echo form_submit('grabar','Grabar'); ?>
        &nbsp;
        <a href="<?=base_url()?>clientes" class="btn btn-default" >Cancelar</a>
    </div>
  </div>
<?php echo form_close(); ?>                
<!-- </form> -->

                
                
            </div>

        </div>
        
        </div>
        
        
    </body>
</html>

