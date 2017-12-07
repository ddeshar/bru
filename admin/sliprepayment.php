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
  $pay_id = $_GET["pay_id"];
  $sql = "SELECT * FROM `repayment` WHERE status_pay = 1 AND repayment.pay_id = '$pay_id'";

    $result = mysqli_query($link, $sql);
    $row= mysqli_fetch_assoc($result);
    $pay_id = $row["pay_id"];
    $mem_id = $row["mem_id"];
    $mem_name = $row["mem_name"];
    $pay_pice = $row["pay_pice"];
    $pay_date = $row["pay_date"];

// Set some content to print

$pdf->Image('tcpdf/img/logos.png',96,20,20,20);
$pdf->Ln(15);
$ft = '<div style="text-align:center"><b>กองทุนหมู่บ้านและสัจจะออมทรัพย์ <br> บ้านสวนครัว หมู่ 14 ต.อิสาณ อ.เมือง <br> จ.บุรีรัมย์ 31000</b></div><br>';
$pdf->writeHTML($ft, true, false, true, false, '');

$date = "<div style=\"text-align:right\"><b>วันที่ $pay_date <b></div><br>";
$pdf->writeHTML($date, true, false, true, false, '');

$title = '<div style="text-align:center"><b>ใบเสร็จชำระเงินกู้</b></div>';
$pdf->writeHTML($title, true, false, true, false, '');

// $html .= "<td>$status_mem</td>";


$someinfo = "<div style=\"text-align:right\"><b>เลขที่ $pay_id <br>รหัส $mem_id1 <br>ชื่อ $mem_name </b></div><br>";
$pdf->writeHTML($someinfo, true, false, true, false, '');

$pdf->SetFont('thsarabun', '', 16, '', true);

// -----------------------------------------------------------------------------


$tbl = <<<EOD
<table cellspacing="0" cellpadding="1" border="1">
  <tr style="background-color:#53f442;color:#000000;">
   <td width="10%" align="center"><b>ลำดับที่</b></td>
   <td width="60%" align="center"><b>รายการ</b></td>
   <td width="30%" align="center"><b>จำนวนเงิน</b></td>
  </tr>
    <tr>
        <td align=\"center\">1</td>
        <td>จำนวนเงินที่จ่าย </td>
        <td align="right">$pay_pice</td>
    </tr>
    <tr>
      <td colspan="2" align="right">รวม</td>
      <td align="right">$pay_pice</td>
    </tr>

</table>
EOD;

$pdf->writeHTML($tbl, true, false, true, false, '');

$reciver = "<div style=\"text-align:center\"><b>.................................................... <br>($mem_name)<br>ชื่อผู้ชำระเงิน</b></div><br>";
$pdf->writeHTML($reciver, true, false, true, false, '');

$customer = "<div style=\"text-align:center\"><b>.................................................... <br>($name_commit)<br>ชื่อผู้รับเงิน</b></div><br>";
$pdf->writeHTML($customer, true, false, true, false, '');
}
//Close and output PDF document
ob_end_clean();
$pdf->Output('GodOfBug.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
