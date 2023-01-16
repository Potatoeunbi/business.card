<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="fontawesome/css/all.min.css" />
    <script src="/fontawesome/js/all.min.js"></script>
    <title>mypage</title>
    <?php
        include_once "auth/config.php";
    ?>
</head>

<body>
    <!-- header -->
    <?php include 'header.php' ?>

    <!-- sidebar -->
    <?php include 'sidebar.php' ?>

    <?php
    $sql ="SELECT admin_account, admin_name, admin_level,admin_password_datetime from list_admin where admin_account='".$_SESSION['Id']."'";
    $result=$db->query($sql);
    $row = mysqli_fetch_array($result);
    ?>

    <!-- contents 본문 내용 -->
    <div class="container">
        <div class="contents something ptop--40">
            <div class="mypage">
                <h3>계정 정보</h3>
                <hr />

                <div class="mypage_box">
                    <span>아이디</span>
                    <span><?php echo htmlspecialchars($row["admin_account"]);?></span>
                </div>

                <div class="mypage_box">
                    <span>이름</span>
                    <span><?php echo htmlspecialchars($row["admin_name"]);?></span>
                </div>

                <div class="mypage_box">
                    <span>권한</span>
                    <span><?php echo htmlspecialchars($row["admin_level"]);?></span>
                </div>

                <div class="mypage_box">
                    <span>비밀번호 변경일 : </span>
                    <span><?php if($row["admin_password_datetime"]){echo htmlspecialchars($row["admin_password_datetime"]);}?></span>
                    <span>
                        <a href="account_change_pw.php">
                            비밀번호 변경
                            <i class="fa-solid fa-chevron-right"></i>
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php include 'footer.php'; ?>
    <script src="js/main.js"></script>
</body>

</html>