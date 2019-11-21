<?php
include_once ("../header.php");
include_once("../controlador/controlador_pago.php");
?>
<div class="row page-title-header">
    <div class="col-12">
        <div class="page-header">
            <h4 class="page-title">Factura</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="separador"></div>
    </div>
</div>
<div class="col-md-8 order-md-1">
      <br>
      <form class="needs-validation" novalidate="">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Número</label>
            <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
            
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Cliente</label>
            <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
          </div>
        </div>

        

        
        
        
        <hr class="mb-4">
        <!-- poner iconos -->
        <button class="btn btn-primary btn-lg btn-block" type="submit">Imprimir</button> 
        <button class="btn btn-primary btn-lg btn-block" type="submit">Enviar por e-mail</button>
      </form>
    </div>
<?php
include("../footer.php");
?>