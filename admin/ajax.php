<?php
require_once 'include/connect.php';
if($_POST['type'] == 'country_table'){
	$row_num = $_POST['row_num'];
	//
	// $result = mysqli_query($link, "SELECT mem_name, member.mem_id, promise.sub_moneyloan FROM member LEFT JOIN promise ON member.mem_id = promise.mem_id  where mem_name LIKE '".strtoupper($_POST['name_startsWith'])."%' ORDER BY promise.pro_id DESC LIMIT 1");
// SELECT COALESCE(NULLIF(ref_rate, ''), ref_date) as newa FROM `refund` WHERE 1

	$result = mysqli_query($link, "SELECT member.mem_name, member.mem_id, COALESCE(NULLIF(refund.owe, ''), submitted.sub_moneyloan) as loan  FROM member LEFT JOIN refund ON member.mem_id = refund.mem_id 	LEFT JOIN submitted ON member.mem_id = submitted.mem_id WHERE member.mem_name LIKE '%".strtoupper($_POST['name_startsWith'])."%' ORDER BY refund.ref_id DESC LIMIT 1");
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$name = $row['mem_name'].'|'.$row['mem_id'].'|'.$row['loan'].'|'.$row_num;
		array_push($data, $name);
	}
	echo json_encode($data);

}
