<?php
error_reporting(0);
include ('include/connect.php');
require_once('tcpdf/config/lang/eng.php');
require_once('tcpdf/tcpdf.php');

class my_pdf extends TCPDF {

      //Page header
      public function Header() {
      	$file = 'tcpdf/img/logos.png';
        $this->Image($file, 15, 3, '', '', 'PNG', '', 'T', false, 600, '', false, false, 0, false, false, false);
      }

      // Page footer
      public function Footer() {
      	$this->SetFont('thsarabun', '', 14, '', true);
      	$footer_text = '<div><br></div>';
        $this->writeHTMLCell(100, 50, 50, 280, $footer_text, 0, 0, 0, true, 'C', true);
		//$this->writeHTML($footer_text, true, true, true, true, '');
      }
}


// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Dipendra Deshar');
$pdf->SetTitle('ใบเสร็จชำระเงินกู้');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
// $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 048', PDF_HEADER_STRING);

// set default header data
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
$pdf->SetFont('thsarabun', '', 18, '', true);

// add a page
$pdf->AddPage();

if (isset($_GET["pay_id"])) {
    $payid = $_GET["pay_id"];
    $sql = "SELECT * FROM `repayment` WHERE pay_id ='$payid'";
    $result = mysqli_query($link, $sql);
    $row= mysqli_fetch_assoc($result);

    $pay_id = $row["pay_id"];
    $mem_name = $row["mem_name"];
    $pay_date = number_format($row["pay_date"]);
    $sub_moneyloan = number_format($row["sub_moneyloan"]);

// Set some content to print

$pdf->Image('tcpdf/img/logos.png',96,20,20,20);
$pdf->Ln(15);
$ft = '<div style="text-align:center"><b>กองทุนหมู่บ้านและสัจจะออมทรัพย์ <br> บ้านสวนครัว หมู่ 14 ต.อิสาณ อ.เมือง <br> จ.บุรีรัมย์ 31000</b></div><br>';
$pdf->writeHTML($ft, true, false, true, false, '');

$someinfo = "<div style=\"text-align:left\"><b>เรื่อง แจ้งหนี้ให้ชำระ <br />เรียน คุณ  $mem_name </b></div><br>";
$pdf->writeHTML($someinfo, true, false, true, false, '');

$pdf->SetFont('thsarabun', '', 18, '', true);

// print a line of text
$text = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.'เนื่องจาก <b color="#FF0000">คุณ ' . $mem_name . '</b>  ได้ทำการกู้ยืมเงินกองทุนหมู่บ้าน และยังไม่ได้ชำระหนึ้ที่กู้ยืมไป ซึ่งมีหนี้ที่ต้องชำระจำนวนเงิน <b color="#FF0000"> ' .$sub_moneyloan. ' บาท </b>  ขอให้ไปชำระหนี้ให้เร็วที่สุด';
$pdf->writeHTML($text, true, 0, true, 0);

$reciver = "<div style=\"text-align:center\"><br/><br/><b>ขอแสดงความนับถือ</b></div><br>";
$pdf->writeHTML($reciver, true, false, true, false, '');

$customer = "<div style=\"text-align:center\"><b>(นายถนอม ชัยพรรณ)<br>
ประธานกองทุนหมู่บ้าน</b></div><br>";
$pdf->writeHTML($customer, true, false, true, false, '');
}
//Close and output PDF document
ob_end_clean();
$pdf->Output('GodOfBug.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
