<?php
    require 'include/connect.php';

    $login_username = mysqli_real_escape_string($link,$_POST['username']);
    $login_password = mysqli_real_escape_string($link,$_POST['password']);

    $salt = 'tikde78uj4ujuhlaoikiksakeidke';
    $hash_login_password = hash_hmac('sha256', $login_password, $salt);

    $sql = "SELECT * FROM tbl_users WHERE username=? AND password=?";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt,"ss", $login_username,$hash_login_password);
    mysqli_execute($stmt);
    $result_user = mysqli_stmt_get_result($stmt);

    if ($result_user->num_rows == 1) {
        session_start();
        $row_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);
        //ตรวจสอบ Status ใช้งาน
        $_SESSION['user_id'] = $row_user['user_id'];

        $session = session_id();
        $userid = $_SESSION['user_id'];
        $action = "1";
        $IP = getHostByName(php_uname('n'));

        if ($row_user['status'] == 500) {
          $_SESSION['is_admin'] = 500;
            mysqli_query($link, "INSERT INTO user_history (session,timein,timeout,user_id,action,ip ) VALUES ('$session',NOW(),'','$userid','$action','$IP')");
          header("Location: admin.php");

        }elseif ($row_user['status'] == 100) {
          $_SESSION['is_manager'] = 100;
            mysqli_query($link, "INSERT INTO user_history (session,timein,timeout,user_id,action,ip ) VALUES ('$session',NOW(),'','$userid','$action','$IP')");
          header("Location: ../manager/manager.php");

        }elseif ($row_user['status'] == 0) {
          $_SESSION['is_user'] = 0;
          $_SESSION['login_username'] = $row_user['login_username'];
            mysqli_query($link, "INSERT INTO user_history (session,timein,timeout,user_id,action,ip ) VALUES ('$session',NOW(),'','$userid','$action','$IP')");
          header("Location: ../member/mem.php");

        }else{
          $_SESSION['is_visitor'] = 999;
          header("Location: visitor.php");
        }
    } else{
      echo "sorry ผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
    }
