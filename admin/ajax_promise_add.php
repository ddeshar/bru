<?php
require_once 'include/connect.php';
if(@$_POST['type'] == 'country_table'){
	$row_num = $_POST['row_num'];

	// SELECT ``,``,``,`` FROM `submitted` WHERE 1
	$result = mysqli_query($link, "SELECT member.mem_name, member.mem_id, member.mem_idcard, submitted.sub_moneyloan, submitted.sub_idcardBM1, submitted.name1, submitted.sub_idcardBM2, submitted.name2 FROM member LEFT JOIN submitted ON member.mem_id = submitted.mem_id  where member.mem_name LIKE '%".strtoupper($_POST['name_startsWith'])."%' ORDER BY sub_id DESC LIMIT 1");
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$name = $row['mem_name'].'|'.$row['mem_id'].'|'.$row['mem_idcard'].'|'.$row['sub_moneyloan'].'|'.$row['sub_idcardBM1'].'|'.$row['name1'].'|'.$row['sub_idcardBM2'].'|'.$row['name2'].'|'.$row_num;
		array_push($data, $name);
	}
	echo json_encode($data);
}
