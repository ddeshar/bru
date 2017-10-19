<?php
header("Content-type:application/json; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
// เชื่อมต่อฐานข้อมูล
$link=mysql_connect("localhost","root","") or die("error".mysql_error());
mysql_select_db("db_sk",$link);
mysql_query("set character set utf8");

$more_q="";
if(isset($_GET['month']) && $_GET['month']!=""){
    $more_q.="AND DATE_FORMAT(fak_date,'%m') ='".$_GET['month']."' ";
}
$q="
SELECT  SUM(fak_sum) as sum_fak, SUM(fak_total) as sum_tol FROM deposit
WHERE 1 $more_q
GROUP BY DATE_FORMAT(fak_date,'%Y-%m-01')
ORDER BY fak_date
";
$qr=mysql_query($q);
while($rs=mysql_fetch_array($qr)){
    $json_data[]=intval($rs['sum_fak']);  // ใช้ intval ฟังชั่นเพื่อกำหนดค่าเป็นตัวเลข
$json_data[]=intval($rs['sum_tol']);
}
// จัดรูปแบบข้อมูลก่อนแปลงเป็น json object
$json_series[]=array(
    "fak_id"=>"ฝาก",
    "data"=>$json_data
);
$json= json_encode($json_series); // แปลงข้อมูล array เป็น ข้อความ json object นำไปใช้งาน
// ทำให้ json ไฟล์รองรับ callback function สำหรับ cross domain
if(isset($_GET['callback']) && $_GET['callback']!=""){
echo $_GET['callback']."(".$json.");";
}else{
echo $json;
}
exit;
?>
