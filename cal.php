<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de amortización</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

  </head>
<body>    
</body>
</html>

<?php

function cuotas($interes,$tiempo){
      return ($interes*pow(1+$interes,$tiempo))/(pow(1+$interes,$tiempo)-1);
}
function showSimple($fecha, $Valor, $i, $Interes, $prestamo,$plazo, $CostoAnual, $add,$tipo){
    $n=0;
    echo "<div class=\"resultado container text-center\">
    <div class=\"item\">
    <p class=\"h2 mt-3\"> Tabla de amortización</p> </br>
    <label>Fecha del préstamo: $fecha</label>
    </div>
    <div class=\"item\">
    <label>Préstamo: $$Valor</label>
    </div>
    <div class=\"item\">
    <label>Periodo: $tipo</label>
    </div>
    <div class=\"item\">
    <label>Interés del préstamo: ".($i*100).  "% </label> 
    <label>Plazo: $plazo</label>
    </div>
    </div>
    <table class=\"table table-bordered table-striped mt-2 \">
    <thead class=\"thead-dark\">
      <tr>
        <th scope=\"col\"># Desembolso</th>
        <th scope=\"col\">Fecha</th>
        <th scope=\"col\">Cuota</th>
        <th scope=\"col\">Interés</th>
        <th scope=\"col\">Saldo</th>
      </tr>
    </thead>
    <tbody>";
   do{
    $Interes= ($i*$Valor);
    $prestamo= ($Valor+$Interes-$CostoAnual);
    $Valor = ($prestamo);
    $fecha= date('Y-m-d', strtotime($fecha. ' + ' .$add ));
    echo "<tr>
    <th scope=\"row\">" .($n+1). "</th>
    <td>$fecha</td>
    <td>$".round($CostoAnual,2)."</td>
    <td>$".round($Interes,2)."</td>
    <td>$".round($prestamo,2)."</td>
    </tr>\n </div> ";
        $n=$n+1;
   }while($n<$plazo);
   echo " </tbody>\n\n </table>";
}
function iSimple($fecha, $imp, $periodo, $interes, $plazo){
     
    switch ($periodo){
        case 'diario':
            $prestamo=0;
            $i = $interes/100;
            $CostoAnual = round(cuotas($i,$plazo)*$imp,2);
            $Interes =0;
            $Valor = $imp;
            $add = '1 days';
            showSimple($fecha, $Valor, $i, $Interes, $prestamo,$plazo, $CostoAnual, $add,"Diario");
        break;
        case 'semanal':
            $prestamo=0;
            $i = $interes/100;
            $CostoAnual = cuotas($i,$plazo)*$imp;
            $Interes =0;
            $Valor = $imp;
            $add = '7 days';
            showSimple($fecha, $Valor, $i, $Interes, $prestamo,$plazo, $CostoAnual, $add,"Semanal");
        break;
        case 'quincenal':
            $prestamo=0;
            $i = $interes/100;
            $CostoAnual = cuotas($i,$plazo)*$imp;
            $Interes =0;
            $Valor = $imp;
            $add = '15 days';
            showSimple($fecha, $Valor, $i, $Interes, $prestamo,$plazo, $CostoAnual, $add,"Quincenal");
        break;
        case 'mensual':
            $prestamo=0;
            $i = $interes/100;
            $CostoAnual = cuotas($i,$plazo)*$imp;
            $Interes =0;
            $Valor = $imp;
            $add = '1 months';
            showSimple($fecha, $Valor, $i, $Interes, $prestamo,$plazo, $CostoAnual, $add,"Mensual");
        break;   
        case 'anual':
            $prestamo=0;
            $i = $interes/100;
            $CostoAnual = cuotas($i,$plazo)*$imp;
            $Interes =0;
            $Valor = $imp;
            $add = '1 years';
            showSimple($fecha, $Valor, $i, $Interes, $prestamo,$plazo, $CostoAnual, $add,"Anual");
        break;
    }
}

function showCompuesto ($fechadesembolso, $VA, $i, $Tasa, $Saldo,$plazo, $adicional, $tipo){
  $n=0;
  echo "<div class=\"resultado container text-center\">
  <div class=\"item mt-3\">
  <p class=\"h2\"> Resumen general </p> </br>
  <label>Fecha del préstamo: $fechadesembolso</label>
  </div>
  <div class=\"item\">
  <label>Monto del préstamo:$$VA</label>
  </div>
  <div class=\"item\">
  <label>Periodo del préstamo: $tipo</label>
  </div>
  <div class=\"item\">
  <label>Interés del préstamo:".($i*100).  "% </label> 
  </div>
  <div class=\"item\">
  <label>Plazo del préstamo: $plazo</label>
  </div>

</div>
  <table class=\"table table-bordered \">
  <thead>
    <tr>
      <th scope=\"col\"># Desembolso</th>
      <th scope=\"col\">Fecha</th>
      <th scope=\"col\">Interés</th>
      <th scope=\"col\">Saldo</th>
    </tr>
  </thead>
  <tbody>";
      do{
        $Tasa= ($i*$VA);
        $Saldo= ($VA+$Tasa);
        $VA = ($Saldo);
        $fechadesembolso= date('Y-m-d', strtotime($fechadesembolso. ' + ' .$adicional ));
  echo "<tr>
  <th scope=\"row\">" .($n+1). "</th>
  <td>$fechadesembolso</td>
  <td>$".round($Tasa,2)."</td>
  <td>$".round($Saldo,2)."</td>
  </tr>\n </div> ";
      $n=$n+1;
 }while( $n<  $plazo);
 echo " </tbody>\n\n </table>";
}
function iCompuesto($fecha, $imp, $periodo, $interes, $plazo){
switch ($periodo){

    case 'diario':
      $prestamo=0;
      $i = $interes/100;
      $CostoAnual =0;
      $Interes =0;
      $Valor = $imp;
      $add = '1 days';
      showCompuesto($fecha, $Valor, $i, $Interes, $prestamo,$plazo, $add,"Diario");
    break;
    
    case 'semanal':
      $prestamo=0;
      $i = $interes/100;
      $CostoAnual =0;
      $Interes =0;
      $Valor = $imp;
      $add = '7 days';
      showCompuesto($fecha, $Valor, $i, $Interes, $prestamo,$plazo, $add,"Semanal");
    break;

    case 'quincenal':
      $prestamo=0;
      $i = $interes/100;
      $CostoAnual =0;
      $Interes =0;
      $Valor = $imp;
      $add = '15 days';
      showCompuesto($fecha, $Valor, $i, $Interes, $prestamo,$plazo, $add,"Quincenal");
    break;

    case 'mensual':
      $prestamo=0;
      $i = $interes/100;
      $CostoAnual =0;
      $Interes =0;
      $Valor = $imp;
      $add = '1 months';
      showCompuesto($fecha, $Valor, $i, $Interes, $prestamo,$plazo, $add,"Mensual");
    break;

    case 'anual':
      $prestamo=0;
      $i = $interes/100;
      $CostoAnual =0;
      $Interes =0;
      $Valor = $imp;
      $add = '1 years';
      showCompuesto($fecha, $Valor, $i, $Interes, $prestamo,$plazo, $add,"Anual");
    break;
  }
}
if ($_POST['sistema']==='simple')
    echo iSimple($_POST['fecha'], $_POST['dinero'], $_POST['periodo'], $_POST['i'],$_POST['i']);
    else
    echo iCompuesto($_POST['fecha'], $_POST['dinero'], $_POST['periodo'], $_POST['i'],$_POST['i']);
?>

