<?php
	require('asset/fpdf17/fpdf.php');
	define('FPDF_FONTPATH','font/');

class PDF extends FPDF
{
//Load data
function LoadData($file)
{
    //Read file lines
   $lines=file($file);
   $data=array();
   foreach($lines as $line)
   $data[]=explode(';',chop($line));
  return $data;
}

//Simple table
function BasicTable($header,$data)
{
   //Header
  $w=array(15,30,30,30,30,30,30);
   //Header
   for($i=0;$i<count($header);$i++)
     $this->Cell($w[$i],7,iconv('UTF-8', 'TIS-620', $header[$i]),1,0,'C');

    $this->Ln();
  //Data
   foreach ($data as $eachResult)
  {
    $this->Cell(15,6,$eachResult["id_committee"],1,0,'C');
    $this->Cell(30,6,$eachResult["com_idcard"],1,0,'C');
    $this->Cell(30,6,$eachResult["com_name"],1,0,'C');
    $this->Cell(30,6 ,$eachResult["name_position"],1,0,'C');
    $this->Cell(30,6 ,$eachResult["com_birthday"],1,0,'C');
    $this->Cell(30,6 ,$eachResult["com_address"],1,0,'C');
		$this->Cell(30,6 ,$eachResult["com_tel"],1,0,'C');
	  $this->Ln();
   }
}

//Colored table
function FancyTable($header,$data)
{
    //Colors, line width and bold font
   $this->SetFillColor(255,0,0);
   $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
   //Header
    $w=array(15,30,30,30,30,30,30);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],4,$header[$i],1,0,'C',true);
    $this->Ln();
    //Color and font restoration
   $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    //Data
   $fill=false;
   foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'L',0,'L',$fill);
        $this->Cell($w[1],6,$row[1],'L',0,'L',$fill);
        $this->Cell($w[2],6,$row[2],'L',0,'L',$fill);
        $this->Cell($w[3],6,$row[3],'L',0,'L',$fill);
				$this->Cell($w[4],6,$row[4],'L',0,'L',$fill);
				$this->Cell($w[5],6,$row[5],'L',0,'L',$fill);
				$this->Cell($w[6],6,$row[6],'L',0,'L',$fill);
        $this->Ln();
        $fill=!$fill;
   }
   $this->Cell(array_sum($w),0,'','T');
}
}

$pdf=new PDF();
//Column titles

$header=array('รหัส','เลขบัตรปชช','ชื่อ - สกุล','ตำแหน่ง','ว/ด/ป เกิด','ที่อยู่','เบอร์โทรศัพท์');
//Data loading

//*** Load MySQL Data ***//
$objConnect = mysql_connect("localhost","root","") or die("Error Connect to Database");
$objDB = mysql_select_db("db_sk");
mysql_query("SET NAMES 'tis620' ");// set อักขระให้เป็น Utf8  เพิ่มตรงนี้เลยครับ   รับรองได้ชัวครับ
$strSQL = "SELECT * FROM committee
LEFT JOIN position
ON committee.id_position = position.id_position
ORDER BY id_committee ASC ";
$objQuery = mysql_query($strSQL);
$resultData = array();
for ($i=0;$i<mysql_num_rows($objQuery);$i++) {
   $result = mysql_fetch_array($objQuery);
   array_push($resultData,$result);
}

//************************//
$pdf->AddFont('angsana','','angsa.php');


$pdf->AddFont('angsana','B','angsab.php');


$pdf->AddFont('angsana','I','angsai.php');


$pdf->AddFont('angsana','BI','angsaz.php');


$pdf->SetFont('angsana','',18);

//*** Table 1 ***//
$pdf->AddPage();
$pdf->SetFont('angsana','',18);
$pdf->Image('asset/fpdf17/tutorial/logo.png',88,8,33);
$pdf->Ln(25);
$pdf->Cell(0,20,iconv( 'UTF-8','TIS-620','รายงานคณะกรรมการ'),0,1,"C");
$pdf->Cell(0,0,iconv('UTF-8','TIS-620','บ้านสวนครัว'),0,1,"L");
$pdf->Cell(0,0,date('Y-m-d_H-i',time())  ,0,1,'R');
$pdf->Ln(10);
$pdf->BasicTable($header,$resultData);
//$pdf->Cell(10,10,iconv('UTF-8','TIS-620','หมายเหตุ : publish = เป็นสมาชิก, unpublish = ไม่เป็นสมาชิก'),0,1,"L");



$pdf->Output("asset/fpdf17/MyPDF/MyPDF.pdf","F");
?>
