<?php
require_once('include/connect.php');

if (isset($_POST["submit"])) {
    $mem_id = $_POST["mem_id"];
    $mem_idcard = $_POST["mem_idcard"];
    $id_gender = $_POST["id_gender"];
    $id_title = $_POST["id_title"];
    $mem_name = $_POST["mem_name"];
    $mem_birthday = $_POST["mem_birthday"];
    $id_status = $_POST["id_status"];
    $mem_occupation = $_POST["mem_occupation"];
    $mem_address = $_POST["mem_address"];
    $mem_tel = $_POST["mem_tel"];
    $mem_email = $_POST["mem_email"];
    $mem_username = $_POST["mem_idcard"];
    $mem_password = $_POST["mem_password"];
    //$status_mem = $_POST["status_mem"];

    $salt = 'tikde78uj4ujuhlaoikiksakeidke';
    $hash_login_password = hash_hmac('sha256', $mem_password, $salt);

        $sql = "INSERT INTO member (mem_id,mem_idcard,id_gender,id_title,mem_name,mem_birthday,id_status,mem_occupation,mem_address,mem_tel,mem_email,mem_username,mem_password)VALUES('$mem_id','$mem_idcard','$id_gender','$id_title','$mem_name','$mem_birthday','$id_status','$mem_occupation','$mem_address','$mem_tel','$mem_email','$mem_username','$hash_login_password');
        SET @last_mem_id = LAST_INSERT_ID();
        INSERT INTO tbl_users (username,password,name,mem_id) VALUES ('$mem_username','$hash_login_password','$mem_name',@last_mem_id);";
        $result = mysqli_multi_query($link, $sql);
        if ($result) {
            echo "<script type='text/javascript'>";
            echo "alert('เพิมเสร็จแล้ว');";
            echo "window.location='index.php';";
            echo "</script>";
            //header('location: admin_product.php');
        }else{
            die("Query Failed" . mysqli_error($link));
            // echo "<font color='red'>SQL Error</font><hr>";
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>FROM MEMBER </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="asset/css/bootstrap.min.css" rel="stylesheet" />
    <link href="asset/vendors/iCheck/skins/minimal/blue.css" rel="stylesheet" />
</head>

<body>
    <section class="content">
        <!--main content-->
        <div class="row">
            <!--row starts-->
            <div class="col-lg-12">
                <!--lg-6 starts-->
                <!--basic form starts-->
                <div class="panel panel-primary" id="hidepanel1">
                                    <div class="panel-heading">
                                            <h3 class="panel-title"> <i class="livicon" data-name="plus" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                                    สมัครสมาชิก
                                            </h3>
                                        </div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="#" method="post">
                            <fieldset>
                                <!-- Name input-->
                                <div class="form-group">
                                <label class="col-md-3 control-label" for="id">รหัสสมาชิก</label>
                                <div class="col-md-3">
                                <input id="mem_id" name="mem_id" type="text" placeholder="AUTO-ID" class="form-control" readonly></div>
                                </div>

                                <div class="form-group">
                                <label class="col-md-3 control-label" for="name">เลขประจำตัวประชาชน</label>
                                <div class="col-md-3">
                                <input id="sessionNum" name="mem_idcard" type="text" onkeypress="return isNumberKey(event)" maxlength="13" placeholder="IDCARD" class="form-control" required></div>
                                                                <span style="color: red;">  <span id="sessionNum_counter">13</span> *โปรดระบุเลขที่บัตรประชาชนให้ถูกต้องเพื่อใช้เป็น Username </span>
                                                                </div>

                                                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="detail">เพศ</label>
                                    <div class="col-md-3">
                                                                            <select class="form-control" name="id_gender" id="id_gender">
                                                                                            <option>--เลือก--</option>
                                                                                            <?php
                                                                                                $sql="SELECT * FROM gender";
                                                                                                $result = mysqli_query($link, $sql);
                                                                                                while ($row=mysqli_fetch_array($result)){
                                                                                            ?>
                                                                                            <option value="<?=$row['id_gender']?>"> <?=$row['gender_name']?></option>
                                                                                            <?php
                                                                                                }
                                                                                            ?>
                                                                                            </select>
                                                                        </div>
                                                                        </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="detail">คำนำหน้าชื่อ</label>
                                    <div class="col-md-3">
                                                                        <select class="form-control" name="id_title" id="id_title">
                                                                                            <option>--เลือก--</option>
                                                                                            <?php
                                                                                                $sql="SELECT * FROM title";
                                                                                                $result = mysqli_query($link, $sql);
                                                                                                while ($row=mysqli_fetch_array($result)){
                                                                                            ?>
                                                                                            <option value="<?=$row['id_title']?>"> <?=$row['title']?></option>
                                                                                            <?php
                                                                                                }
                                                                                            ?>
                                                                        </select>
                                                                        </div>
                                                                        </div>

                                                                        <div class="form-group">
                                        <label class="col-md-3 control-label" for="name">ชื่อ-สกุล</label>
                                        <div class="col-md-3">
                                        <input id="mem_name" name="mem_name" type="text" placeholder="NAME" class="form-control"></div>
                                        </div>

                                                                                    <div class="form-group">
                                                <label class="col-md-3 control-label" for="birth">วันเกิด</label>
                                                <div class="col-md-3">
                                            <input type="date"name="mem_birthday" class="form-control round-form"  placeholder="DATE"></div>
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                            <label class="col-md-3 control-label" for="status">สถานภาพ</label>
                                                                                            <div class="col-md-3">
                                                                                                <select class="form-control" name="id_status" id="id_status">
                                                                                                                <option>--เลือก--</option>
                                                                                                                <?php
                                                                                                                    $sql="SELECT * FROM status";
                                                                                                                    $result = mysqli_query($link, $sql);
                                                                                                                    while ($row=mysqli_fetch_array($result)){
                                                                                                                ?>
                                                                                                                <option value="<?=$row['id_status']?>"> <?=$row['status_name']?></option>
                                                                                                                <?php
                                                                                                                    }
                                                                                                                ?>
                                                                                                                </select>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div class="form-group">
                                                                                            <label class="col-md-3 control-label" for="occupation">อาชีพ</label>
                                                                                            <div class="col-md-3">
                                                                                            <input id="mem_occupation" name="mem_occupation" type="text" placeholder="OCCUPATION" class="form-control"></div>
                                                                                            </div>

                                <div class="form-group">
                                <label class="col-md-3 control-label" for="address">ที่อยู่</label>
                                <div class="col-md-3">
                                <input id="mem_address" name="mem_address" type="text" placeholder="ADDRESS" class="form-control"></div>
                                </div>

                                                                <div class="form-group">
                                                                <label class="col-md-3 control-label" for="tel">เบอร์โทร</label>
                                                                <div class="col-md-3">
                                                                <input id="mem_tel" name="mem_tel" type="text" placeholder="TEL" class="form-control"></div>
                                                                </div>

                                                                <div class="form-group">
                                                                <label class="col-md-3 control-label" for="email">อีเมล</label>
                                                                <div class="col-md-3">
                                                                <input id="mem_email" name="mem_email" type="email" placeholder="example@domain.com" class="form-control"></div>
                                                                </div>

                                                                <!-- <div class="form-group">
                                                                <label class="col-md-3 control-label" for="user">ชื่อผู้ใช้</label>
                                                                <div class="col-md-3">
                                                                <input id="mem_username" name="mem_username" type="text" placeholder="USERNAME" class="form-control"></div>
                                                                <span style="color: red;">  *ชื่อผู้ใช้โปรดระบุเป็นเลขบัตรประจำตัวประชาชน </span>
                                                                </div> -->

                                                                <div class="form-group">
                                                                <label class="col-md-3 control-label" for="pass">รหัสผ่าน</label>
                                                                <div class="col-md-3">
                                                                <input id="mem_password" name="mem_password" type="text" placeholder="PASSWORD" class="form-control"></div>
                                                                <span style="color: red;">  *รหัสผ่านโปรดระบุเป็นวันเดือนปีเกิด เช่น 1 ม.ค. 2538 เป็น 01012538 </span>
                                                                </div>

                                                               <!-- <//?php if (isset($_SESSION['is_admin'])){ ?>
                                                                    <div class="form-group">
                                                                        <label class="col-lg-3 control-label" for="select">Status</label>
                                                                        <div class="col-lg-3">
                                                                            <select class="form-control" name="status_mem" id="select">
                                                                                <<option >--กรุณาเลือก--</option>
                                                                                <option value="publish" >สมาชิก</option>
                                                                                <option value="unpublish" >ยกเลิกเป็นสมาชิก</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                <//?php } ?>
                                <!-- Form actions -->
                                <div class="form-group">
                                    <div class="col-md-12 text-right">

                                         <button type="submit" name="submit" value="submit" class="btn btn-primary">สมัครสมาชิก</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>

        <!--main content ends-->
    </section>

        <script src="asset/js/jquery-1.11.1.min.js" type="text/javascript"></script>
        <script src="asset/js/bootstrap.min.js" type="text/javascript"></script>
        <!--livicons-->
        <script src="asset/vendors/livicons/minified/raphael-min.js" type="text/javascript"></script>
        <script src="asset/vendors/livicons/minified/livicons-1.4.min.js" type="text/javascript"></script>
        <!-- end of global js -->
        <!-- begining of page level js-->
        <script src="asset/js/TweenLite.min.js"></script>
        <script src="asset/vendors/iCheck/icheck.js" type="text/javascript"></script>
        <script type="text/javascript">
        $(document).ready(function() {
            $(document).mousemove(function(event) {
                TweenLite.to($('body'), .5, {css:{'background-position':parseInt(event.pageX/8) + "px "+parseInt(event.pageY/12)+"px, "+parseInt(event.pageX/15)+"px "+parseInt(event.pageY/15)+"px, "+parseInt(event.pageX/30)+"px "+parseInt(event.pageY/30)+"px"}});
            });

            //Flat red color scheme for iCheck
            $('input[type="checkbox"].minimal-blue').iCheck({
                checkboxClass: 'icheckbox_minimal-blue'
            });
        });
        </script>
        <!-- end of page level js-->
    </body>
    </html>

    <script>
      $(document).ready(function() {
        $("#datepicker").datepicker();
      });



    	$(document).ready(function(){
    		var maxChars = $("#sessionNum");
    		var max_length = maxChars.attr('maxlength');
    		if (max_length > 0) {
    		    maxChars.bind('keyup', function(e){
    		        length = new Number(maxChars.val().length);
    		        counter = max_length-length;
    		        $("#sessionNum_counter").text(counter);
    		    });
    		}
    		});


      </script>
