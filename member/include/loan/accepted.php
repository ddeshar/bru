
<?php
error_reporting( error_reporting() & ~E_NOTICE );
require_once('include/connect.php');


if (isset($s_login_mem_id)) {
  $sql = "SELECT * FROM member
      LEFT JOIN gender
      ON member.id_gender = gender.id_gender
      LEFT JOIN title
      ON member.id_title = title.id_title
      LEFT JOIN status
      ON member.id_status = status.id_status WHERE member.mem_id = '$s_login_mem_id'
      ORDER BY mem_id ASC";
  $result = mysqli_query($link, $sql);
  if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_array($result);
  $mem_id = $row["mem_id"];
  $mem_idcard = $row["mem_idcard"];
  $id_gender = $row["gender_name"];
  $id_title = $row["title"];
  $mem_name = $row["mem_name"];

  }else{
  $mem_id = "";
  $mem_idcard = "";
  $id_gender = "";
  $id_title = "";
  $mem_name = "";


  }
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
  }
  ?>




<h2><center>สามารถกู้ได้ เพราะคุณมีจำนวนเงินคือ<?=$budget?> <center></h2>

<form class="form-horizontal" action="member_submitted_add.php" method="post">
    <fieldset>
        <!-- Name input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="id">รหัสการยื่นกู้</label>
            <div class="col-md-3">
            <input id="sub_id" name="sub_id" type="text" placeholder="AUTO-ID" class="form-control" readonly></div>
        </div>

        <div class="form-group">
        <label class="col-md-3 control-label" for="id">รหัสสมาชิก</label>
        <div class="col-md-3">
        <input  name="mem_id" type="text" value="<?php echo "$mem_id"; ?>" class="form-control"readonly></div>
        </div>

        <div class="form-group">
        <label class="col-md-3 control-label" for="name">ชื่อ-สกุล</label>
        <div class="col-md-3">
        <input  name="mem_name" type="text" value="<?php echo "$mem_name"; ?>" class="form-control" readonly></div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="name">จำนวนเงินที่ขอกู้</label>
            <div class="col-md-3">
            <input id="sub_moneyloan" name="sub_moneyloan" type="text" placeholder="MONEY" class="form-control"  required></div>
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
                    <option value="<?=$row['mem_name']?>"> <?=$row['mem_name']?></option>
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
                    <option value="<?=$row['mem_name']?>"> <?=$row['mem_name']?></option>
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

                 <button type="submit" name="btnsubmit" value="send" class="btn btn-success">เพิ่ม</button>
            </div>
        </div>
    </fieldset>
</form>
