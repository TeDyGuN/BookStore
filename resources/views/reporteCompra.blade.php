<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reportes</title>
    <!-- Toastr style -->
    <link href="css/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="css/jquery.gritter.css" rel="stylesheet">

</head>
<body>
<div class="" style="margin-bottom: 15px; margin-right: 20px">
        <pre>    EDITORIAL CHUNGARA
     LA PAZ - BOLIVIA
        </pre>
</div>
<h2 align="center">Recibo por Orden de Compra</h2>
<div class="table table-striped" align="center">
        <table width="100%" border=1 cellspacing=0 align="center" class="table table-bordered" >
            <thead class="table-primary">
                <tr>
                    <th>Id</th> 
                    <th>Producto</th> 
                    <th>Cantidad</th> 
                    <th>Precio</th> 
                    <th>Total</th> 
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>{{ $l->nombre}}</td>
                    <td>{{ $number }}</td>
                    <td>Bs. {{ $l->precio }}</td>
                    <td>Bs. {{ $number * $l->precio}}</td>
                </tr>
                <tr>
                    <td colspan="5">

                            <p>Depositar el monto a la cuenta 123166XXX-XXX113
                                del Banco Bisa y apersonarse a las oficinas de Editorial Chungara para recoger
                                los equipos</p>
                    </td>
                </tr>
            </tbody>
        </table>
</div>
<br><br><br>
<div style="margin-bottom: 50px">
    <p>&nbsp;</p>
    <pre>
</div>

<?php
date_default_timezone_set('America/La_Paz');
$hoy = getdate();
echo("<pre>");
echo("<p>");
echo("Reporte Generado en Fecha: ".$hoy['mday']."/".$hoy['mon']."/".$hoy['year']."     ".$hoy['hours'].":".$hoy['minutes'].":".$hoy['seconds']);
echo("</p>");
echo("</pre>");
?>
</body>
</html>