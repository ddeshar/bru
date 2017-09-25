<h2>คุณพีสามารถกู้ได้เลยนะ เพราะคุณพีมีจำนวนเงิน</h2>
<?php=$budget?>
<?php
  if (isset($_GET["loan"])) {
    $id = $_GET["loan"];
		$sql = "SELECT * FROM submitted WHERE sub_id='$id'";
		$result = mysqli_query($link, $sql);
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_array($result);
			$sub_id = $row["sub_id"];
			$mem_id = $row["mem_id"];
			$mem_name = $row["mem_name"];
			$sub_moneyloan = $row["sub_moneyloan"];
			$sub_objective = $row["sub_objective"];
			$sub_date = $row["sub_date"];
			$sub_idcardBM1 = $row["sub_idcardBM1"];
			$name1 = $row["name1"];
			$sub_idcardBM2 = $row["sub_idcardBM2"];
			$name2 = $row["name2"];
			$id_commit = $row["id_commit"];
		}else{
			$sub_id = "";
			$mem_id = "";
			$mem_name = "";
			$sub_moneyloan = "";
			$sub_objective = "";
			$sub_date = "";
			$sub_idcardBM1 = "";
			$name1 = "";
			$sub_idcardBM2 = "";
			$name2 = "";
			$id_commit = "";
		}
  }
?>
<form class="form-horizontal" action="approve_add.php" method="post">
    <fieldset>
        <!-- Name input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="id">รหัสการอนุมัติ</label>
            <div class="col-md-3">
            <input id="app_id" name="app_id" type="text" placeholder="AUTO-ID" class="form-control" readonly></div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="name">รหัสสมาชิก</label>
            <div class="col-md-3">
            <input id="mem_id" name="mem_id" type="text" placeholder="MEM-ID" class="form-control"></div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="name">ชื่อ-สกุลสมาชิก</label>
            <div class="col-md-3">
            <input id="mem_name" name="mem_name" type="text" placeholder="MEM-NAME" class="form-control"></div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="name">รหัสการยื่นกู้</label>
            <div class="col-md-3">
            <input id="sub_id" name="sub_id" type="text" placeholder="SUB-ID" class="form-control" readonly></div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="detail">วันที่ยื่นกู้</label>
              <div class="col-md-3">
            <input type="date" id="datepicker" name="sub_date" class="form-control round-form"  placeholder="DATE"></div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="birth">จำนวนเงินที่ขอกู้</label>
              <div class="col-md-3">
        <input id="sub_moneyloan" name="sub_moneyloan" type="text" placeholder="MONEY" class="form-control" readonly></div>
            <label class=" control-label" for="id">บาท</label>
    </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="money">สถานะการอนุมัติ</label>
            <div class="col-md-3">
            <input id="app_status" name="app_status" type="text" placeholder="STATUS" class="form-control" readonly></div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="money">จำนวนเงินที่อนุมัติ</label>
            <div class="col-md-3">
            <input id="app_number" name="app_number" type="text" placeholder="MONEY" class="form-control"></div>
            <label class=" control-label" for="id">บาท</label>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="money">วันที่อนุมัติ</label>
            <div class="col-md-3">
          <input type="date" id="datepicker" name="app_date" class="form-control round-form"  placeholder="DATE"></div>
      </div>

        <div class="form-group">
          <label class="col-md-3 control-label" for="name">ชื่อกรรมการ</label>
          <div class="col-md-3">
        <select class="form-control" name="id_commit" id="id_commit">
                <option>--เลือก--</option>
                <?php
                  $sql="SELECT * FROM commits";
                  $result = mysqli_query($link, $sql);
                  while ($row=mysqli_fetch_array($result)){
                ?>
                <option value="<?=$row['id_commit']?>"> <?=$row['name_commit']?></option>
                <?php
                  }
                ?>
                </select>
              </div>
        </div>

        <div class="form-group">
            <div class="col-md-12 text-right">

                 <button type="submit" name="btnsubmit" value="send" class="btn btn-success">เพิ่ม</button>
            </div>
        </div>
    </fieldset>
</form>
