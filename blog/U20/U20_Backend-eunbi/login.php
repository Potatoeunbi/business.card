<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="fontawesome/css/all.min.css" />
    <script src="/fontawesome/js/all.min.js"></script>
    <title>login</title>
</head>

<body>
    <!-- contents 본문 내용 -->
    <div class="container">
        <div class="login">
            <a href="index.php"><img src="img/logo.png" alt="Logo" class="logo_img_login" /></a>
            <form method="post" action="auth/signIn.php">
                <div class="login_pannel">
                    <div class="login_pannel_inner">
                        <div class="id_pw_wrap">
                            <div class="input_row">
                                <input type="text" id="id" class="input_text" name="id" placeholder="아이디" required />
                            </div>
                            <div class="input_row">
                                <input type="password" id="pw" class="input_text" name="pw" placeholder="비밀번호"
                                    required />
                            </div>
                        </div>
                        <div class="keep"></div>
                        <button type="submit" class="btn_login" name="login">
                            <span class="btn_text">로그인</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>