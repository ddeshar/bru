<?php
error_reporting(0);
include ('include/connect.php');
require_once('tcpdf/config/lang/thai.php');
require_once('tcpdf/tcpdf.php');

class my_pdf extends TCPDF {

      //Page header
      public function Header() {
          // Logo
          $image_file = 'asset/img/logos.png';
          $this->Image($image_file, 15, 15, 15, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
      }

      // Page footer
      public function Footer() {
          // Position at 15 mm from bottom
          $this->SetY(-15);
          // Set font
          $this->SetFont('thsarabun', '', 14, '', true);
          // Page number
          $this->Cell(10, 10, 'หน้า'.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');

          $footer_text = '<div></div>';
          $this->writeHTMLCell(100, 50, 50, 280, $footer_text, 0, 0, 0, true, 'C', true);
      }
}


// create new PDF document
$pdf = new my_pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setPageOrientation('p'); // PDF_PAGE_ORIENTATION---> 'l' or 'p'
// set document information
$pdf->SetCreator('Ben');
$pdf->SetAuthor('BEN');
$pdf->SetTitle('กองทุนหมู่บ้านและสัจจะออมทรัพย์หมู่บ้านสวนครัว');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->setPrintHeader(true);
$pdf->setPrintFooter(true);
// $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
// $pdf->SetMargins(2, 2, 2,2); // left = 2.5 cm, top = 4 cm, right = 2.5cm
$pdf->SetMargins(PDF_MARGIN_LEFT, 15, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
$pdf->SetFont('thsarabun', '', 18, '', true);

// Add a page
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

$i = "01";
// Set some content to print
$ft = '<div style="text-align:center"><b>กองทุนหมู่บ้านและสัจจะออมทรัพย์หมู่บ้านสวนครัว</b><br />  <b> รายงานข้อมูลสมาชิก</b> </div><br>';
$pdf->writeHTML($ft, true, false, true, false, '');
$pdf->SetFont('thsarabun', '', 16, '', true);

$html = '';
$html = '<hr />';
$html .= '<table border="1" align="center" width="100%">';
//Header
$html .= "<thead>";
$html .= "<tr>";
// $html .= '<th rowspan="2">สาขา</th>';
$html .= '<th>รหัส</th>';
$html .= '<th>ชื่อ-สกุล</th>';
$html .= '<th>เลขบัตรปชช.</th>';
$html .= '<th>ว/ด/ปเกิด</th>';
$html .= '<th>ที่อยู่</th>';
$html .= '<th>เบอร์โทร</th>';
// $html .= '<th>สถานะ</th>';
$html .= "</tr>";
$html .= "</thead>";

$sql = "SELECT * FROM member
        LEFT JOIN gender
        ON member.id_gender = gender.id_gender
        LEFT JOIN title
        ON member.id_title = title.id_title
        LEFT JOIN status
        ON member.id_status = status.id_status
        ORDER BY mem_id ASC	";
$query = mysqli_query($link, $sql);

//Content
$html .= "<tbody>";
while ($data = mysqli_fetch_array($query)){
  //$name = 'x';
  $mem_id = $data['mem_id'];
  $id_title = $data['title'];
  $mem_name = $data['mem_name'];
  $mem_idcard = $data['mem_idcard'];
  $mem_birthday = $data['mem_birthday'];
  $mem_address = $data['mem_address'];
  $mem_tel = $data['mem_tel'];
  // $status_mem = $data['status_mem'];

  // $name = iconv('tis-620','utf-8',$data['post_title']);
  // $author = iconv('tis-620','utf-8',$data['post_author']);
  $html .= "<tr nobr='true'>";
  $html .= "<td>$mem_id</td>";
  $html .= "<td>$title $mem_name</td>";
  $html .= "<td>$mem_idcard</td>";
  $html .= "<td>$mem_birthday</td>";
  $html .= "<td>$mem_address</td>";
  $html .= "<td>$mem_tel</td>";
  // $html .= "<td>$status_mem</td>";
  $html .= "</tr>";
}
$html .= "</tbody>";

//Footer
$html .= "<tfooter>";
$html .= "<tr>";
$html .= '<td align="left">รวม</td>';
$html .= "<td></td>";
$html .= "<td></td>";
$html .= "<td></td>";
$html .= "<td></td>";
$html .= "<td></td>";
$html .= "<td></td>";
$html .= "</tr>";
$html .= "</tfooter>";
$html .= "</table>";

$html .= '<br><b>หมายเหตุ</b> ********** <br/><br/>';
// Print text using writeHTMLCell()
//$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('GodOfBug.pdf', 'I');

$pdf->lastPage();

//============================================================+
// END OF FILE
//============================================================+
?>
