<h2><center>สามารถกู้ได้ เพราะคุณมีจำนวนเงินคือ<?php echo number_format($budget);?> <center></h2>

<?php
    $sql2 = "SELECT * FROM `member` WHERE mem_id = '$loan'";

    $result = mysqli_query($link, $sql2);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $mem_ids = $row["mem_id"];
        $mem_names = $row["mem_name"];
    }else{
        $mem_ids = "";
        $mem_names = "";
    }
?>

<form class="form-horizontal" action="admin_submitted_add.php" method="post">
    <fieldset>

        <div class="form-group">
            <label class="col-md-3 control-label" for="name">รหัสสมาชิก</label>
            <div class="col-md-3">
            <input id="user_id_mem" name="mem_id" type="text" placeholder="MEM-ID" value="<?=$mem_ids?>" class="form-control" readonly></div>
        </div>

        <div class="form-group">
        <label class="col-md-3 control-label" for="name">ชื่อ-สกุลสมาชิก</label>
        <div class="col-md-3">
        <input id="countryname_1" name="mem_name" type="text" placeholder="NAME" value="<?=$mem_names?>" class="form-control" readonly></div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="name">จำนวนเงินที่ขอกู้</label>
            <div class="col-md-3 input-group">
            <input id="sub_moneyloan" name="sub_moneyloan" type="text" placeholder="MONEY" class="form-control has-success" required>
            <span id="result" class="input-group-addon"></span>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="detail">วัตถุประสงค์ในการกู้</label>
            <div class="col-md-4">
            <textarea class="form-control" id="sub_objective" name="sub_objective" placeholder="OBJECTIVE" rows="5"  required></textarea>
            </div>
        </div>

        <div class="form-group">
        <label class="col-md-3 control-label" for="birth">วันที่ยื่นกู้</label>
        <div class="col-md-3">
        <input type="date" id="datepicker" name="sub_date" class="form-control round-form"  placeholder="DATE"></div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="money">ชื่อผู้ค้ำคนที่ 1</label>
            <div class="col-md-3">
                <select class="form-control select2" name="name1" id="e1">
                    <option>--เลือก--</option>
                    <?php
                        $membersql1 ="SELECT * FROM member";
                        $resultmem1 = mysqli_query($link, $membersql1);
                        while ($row=mysqli_fetch_array($resultmem1)){
                    ?>
                    <option value="<?=$row['mem_id']?>"> <?=$row['mem_name']?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="money">ชื่อผู้ค้ำคนที่ 2</label>
            <div class="col-md-3">
                <select class="form-control select2" name="name2" id="e1">
                    <option>--เลือก--</option>
                    <?php
                        $membersql="SELECT * FROM member";
                        $resultmem2 = mysqli_query($link, $membersql);
                        while ($row=mysqli_fetch_array($resultmem2)){
                    ?>
                    <option value="<?=$row['mem_id']?>"> <?=$row['mem_name']?></option>
                    <?php } ?>
                </select>
            </div>
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
                    <?php } ?>
                </select>
              </div>
        </div>

        <div class="form-group">
            <div class="col-md-12 text-right">

                 <button type="submit" id="test" name="btnsubmit" value="send" class="btn btn-success">เพิ่ม</button>
            </div>
        </div>
    </fieldset>
</form>

<script type="text/javascript">

	$("#sub_moneyloan").change(function(){
		if(parseInt(this.value) > 50000){
			$('input[name=sub_moneyloan]').parent().removeClass("has-success");
            $('input[name=sub_moneyloan]').parent().addClass("has-error");
			$('#result').html('<strong>ขออภัย</strong>วงเงินกู้เกินจำนวน');
      $("#test").prop('disabled', true);
		} else {
			$('input[name=sub_moneyloan]').parent().removeClass("has-error");
            $('input[name=sub_moneyloan]').parent().addClass("has-success");
			$('#result').html('<strong>รอการอนุมัติ</strong>');
      $("#test").prop('disabled', false);
		}
	});
</script>
