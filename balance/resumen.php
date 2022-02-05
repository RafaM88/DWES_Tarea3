<?php
session_start();
require_once("db.php");
require_once ('../vendor/autoload.php');
$pdf = new Mpdf\Mpdf([
    'orientation' => 'L',
    'margin_left' => 0,
    'margin_right' => 0,
   
]);
if(!isset($_SESSION['nombre'])){
    die(header("Location:index.php"));

}
$query=$dbh->prepare("select * from operaciones where usuario = ? order by fecha desc;");
$query->bindParam(1,$_SESSION['nombre']);
$result=$query->execute();
$result=$query->fetchAll(PDO::FETCH_ASSOC);
$ingresos = 0;
$gastos = 0;
$i=0;
$class;
ob_start();
?>

<!DOCTYPE html>
<html>
    <head><title>Movimientos de <?=$_SESSION['nombre'];?></title>
    <meta charset="utf-8">
    <style>
        table{
            font-family:'Arial';
           width:80%;
           margin-left:10%;
           
            
           
           
            
        }
        .filaimpar{
            background-color:#555;
        }

        .filapar){
            background-color:#AAA;
        }

        tr,td{
            padding:10px 25px;
            font-weight:bold;
            text-align:center;
        }
        </style>
</head>
<body>
<table style="border:1px solid black">
    <tr style="background-color:rgba(0,255,0,0.5);"><th colspan="4">Movimientos de <?=$_SESSION['nombre'];?></th></tr>
    <tr><th>Fecha</th><th>Concepto</th><th>Ingreso</th><th>Gasto</th></tr>
    <?php
    foreach($result as $row){
        $i++;
        if($i%2==0){
            $class="filapar";
        }else{
            $class="filaimpar";
        }

        ?><tr class="<?=$class;?>">
           <td><?php
            $fecha=date('d-m-Y',strtotime($row['fecha']));
            echo $fecha;
            ?>
           </td>
           <td><?=$row['concepto'];?></td>
           <?php
           if($row['operacion']=="ingreso"){
               ?>
               <td style="color:green;"><?=$row['importe']?> €</td><td></td><?php
               $ingresos+=$row['importe'];
           }else{
               ?>
                <td></td><td style="color:red;"><?=$row['importe']?> €</td>
               <?php
               $gastos+=$row['importe'];
               
           }
           ?>
        </tr>
        
           <?php
    } 

    ?>
    <tr><td colspan="4">SALDO TOTAL:<?php echo $ingresos - $gastos." €";?></td></tr>
</table>
</body>
</html>
<?php
    $html=ob_get_contents();
    $pdf->WriteHTML($html);
    ob_clean();
    $pdf->Output();
?>