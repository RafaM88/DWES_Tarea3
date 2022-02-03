<?php
require_once '../vendor/autoload.php';
$pdf=new \Mpdf\Mpdf(['orientation' => 'L']);

ob_start();

$a="Hola";
?>
 <h1 style="background-color:green;"><?=$a;?></h1>
<?php
$html = ob_get_contents();
ob_clean();
$pdf->WriteHTML($html);
$pdf->Output();
?>