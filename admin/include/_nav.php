<header class="header">
    <a href="index.php" class="logo">
        <img src="asset/img/logo2.png" alt="logo">
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <div>
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                <div class="responsive_nav"></div>
            </a>
        </div>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li class="dropdown messages-menu">
                    <?php
                        $countingm = "SELECT count(*) as total from submitted WHERE `id_sapp` = '0'";
                        $processm = mysqli_query($link, $countingm);
                        $datam = mysqli_fetch_assoc($processm);
                        $totalm = $datam['total'];
                    ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="livicon" data-name="money" data-loop="true" data-color="#42aaca" data-hovercolor="#42aaca" data-size="28"></i>
                        <span class="label label-success"><?=$totalm?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages pull-right">
                        <li class="dropdown-title">คุณมีการรออนุมัติเงินกู้ <?=$totalm?> คน</li>
                        <?php
                                $sql = "SELECT * FROM submitted left JOIN statusb_app ON submitted.id_sapp = statusb_app.id_sapp WHERE status_app = 'รออนุมัติ'";
                                $result = mysqli_query($link, $sql);
                                while ($row = mysqli_fetch_array($result)){
                                    $sub_id = $row["sub_id"];
                                    $mem_id = $row["mem_id"];
                                    $mem_name = $row["mem_name"];
                                    $sub_moneyloan = $row["sub_moneyloan"];
                                    $sub_date = $row["sub_date"];
                                    $id_sapp = $row["status_app"];
                            $ago1 = timeago($sub_date);
                        ?>
                        <li class="unread message">
                            <a href="admin_submitted_view.php?sub_id=<?=$sub_id?>" class="message"> <i class="pull-right" data-toggle="tooltip" data-placement="top" title="Mark as Read"><span class="pull-right ol livicon" data-n="adjust" data-s="10" data-c="#287b0b"></span></i>
                                <img data-src="holder.js/45x45/#000:#fff" class="img-responsive message-image" alt="icon">
                                <div class="message-body">
                                    <strong><?=$mem_name?></strong>
                                    <br><?=$sub_moneyloan?> ฿
                                    <br>
                                    <small><?=$ago1?></small>
                                </div>
                            </a>
                        </li>
                        <?php } ?>
                        <li class="footer">
                            <a href="http://localhost/suankrua14/admin/submitted.php">ดูทั้งหมด</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown messages-menu">
                    <?php
                        $counting = "SELECT count(*) as total from tbl_users WHERE `status` = '999'";
                        $process = mysqli_query($link, $counting);
                        $data = mysqli_fetch_assoc($process);
                        $total = $data['total'];
                    ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="livicon" data-name="users" data-loop="true" data-color="#42aaca" data-hovercolor="#42aaca" data-size="28"></i>
                        <span class="label label-success"><?=$total?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages pull-right">
                        <li class="dropdown-title">คุณมีสมาชิกใหม่ <?=$total?> คน</li>
                        <?php

                            $sql = "SELECT * FROM tbl_users LEFT JOIN member ON tbl_users.mem_id = member.mem_id WHERE `status` = '999' ORDER BY `user_id` DESC";
                            $result = mysqli_query($link, $sql);
                            while ($row = mysqli_fetch_array($result)){
                            $user_id = $row["user_id"];
                            $username = $row["username"];
                            $email = $row["email"];
                            $status = $row["status"];
                            $time = $row["mem_created_date"];
                            $ago = timeago($time);
                        ?>
                        <li class="unread message">
                            <a href="user_edit.php?user_id=<?=$user_id?>" class="message"> <i class="pull-right" data-toggle="tooltip" data-placement="top" title="Mark as Read"><span class="pull-right ol livicon" data-n="adjust" data-s="10" data-c="#287b0b"></span></i>
                                <img data-src="holder.js/45x45/#000:#fff" class="img-responsive message-image" alt="icon">
                                <div class="message-body">
                                    <strong><?=$username?></strong>
                                    <br><?=$email?>
                                    <br>
                                    <small><?=$ago?></small>
                                </div>
                            </a>
                        </li>
                        <?php } ?>
                        <li class="footer">
                            <a href="http://localhost/suankrua14/admin/user.php">ดูทั้งหมด</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img data-src="holder.js/35x35/#fff:#000" width="35" class="img-circle img-responsive pull-left" height="35" alt="riot">
                        <div class="riot">
                            <div>
                                <?=$s_login_username?>
                                <span>
                                    <i class="caret"></i>
                                </span>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header bg-light-blue">
                            <img data-src="holder.js/90x90/#fff:#000" class="img-responsive img-circle" alt="User Image">
                            <p class="topprofiletext"><?=$s_login_username?></p>
                        </li>
                        <!-- Menu Body -->
                        <li>
                            <a href="#">
                                <i class="livicon" data-name="user" data-s="18"></i>
                                My Profile
                            </a>
                        </li>
                        <li role="presentation"></li>
                        <li>
                            <a href="#">
                                <i class="livicon" data-name="gears" data-s="18"></i>
                                Account Settings
                            </a>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="lockscreen.php">
                                    <i class="livicon" data-name="lock" data-s="18"></i>
                                    Lock
                                </a>
                            </div>
                            <div class="pull-right">
                                <a href="logout.php">
                                    <i class="livicon" data-name="sign-out" data-s="18"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
