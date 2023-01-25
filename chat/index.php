<?php
session_start();
require "conn.php";
require "counter.php";
if(!isset($_SESSION['Name'])){
   $conn->close();
   header('location:index/');
   exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" href="#">
    <title>Chat</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Salif Mehmed" />
    <link rel="stylesheet" type="text/css" href="/css/login.css" />
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/container.css">
    <link rel="stylesheet" href="/css/chatting.css">

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" /> -->
    <link rel="stylesheet" href="/chat/style.css" />




</head>

<body>

    <div class="container">
        <header id="flex" class="head" style="padding-top: 25px;height: 45px;">
            <div onclick="location.href='/index.php'" id="flex" class="h_left" style="cursor:pointer;">
                <h1 id="flex">비즈니스</h1>
                <p id="flex">.card</p>
            </div>
            <div id="flex" class="h_center" style="border-radius:3px">
                <form action="/cardCheck.php" method="post">
                    <input class="h_c_people" type="image" src="/img/people-icon.png" style="pointer-events: none;">
                    <input class="h_c_input" type="text" placeholder="회원 번호 입력" name="search" required="required">
                    <input class="h_c_search" type="image" src="/img/search-icon.png" name="" value=""
                        style=" margin-left:3px; ">
                </form>
            </div>
            <div id="flex" class=" h_right">
                <div id="flex">
                    <?php
        if(!isset($_SESSION['Email'])){ ?>
                    <input value=<?php $_SESSION['Name'] ?> class='btn' type='button' id='btnOpen'
                        style="background-color : transparent; text-align: center;  font-size: 12px;  border: none; cursor:pointer">
                    <p style="margin-top : 12px"> | </p>
                    <input type='button' class='btn' value='회원가입' id='btnOpen'
                        style="background-color : transparent; text-align: center; font-size: 12px;  border: none; cursor:pointer; margin-left:2px">

                    <?php }else{ ?>
                    <input value="마이페이지" class='btn' type='button' id='btnOpen'
                        style="background-color : transparent; text-align: center;  font-size: 12px;   border: none;  cursor:pointer">
                    <p style="margin-top : 12px"> | </p>
                    <input value="로그아웃" type='button' id='mypage'
                        style="background-color : transparent; text-align: center; font-size: 12px; border: none; cursor:pointer; margin-left:2px"
                        onClick="location.href='/logout.php'">

                    <?php }?>
                </div>
            </div>
        </header>

    </div>

    <div class="out">
        <div class="b" style="background: #f2f4f7;">
            <div class="chet"
                style="width:1280px; height : 550px; border: 1px solid #b6b5b0; margin-left: 153px; margin-top:25px; background:#ffff;">
                <!-- padding:30px 제거했음 -->
                <div class="chet_banner">
                    <div class="chet_b_t">
                        <div class="chet_b_t_name">
                            <h1 id=chet_b_t_name_id>내 팔로우</h1>
                        </div>
                    </div>
                    <div class="chet_b_c">
                        <div class="chet_b_c_friend">
                            <div class="chet_b_c_f_1">
                                <div class="friend_list">
                                    <div class="friend_list_d" id="listshow">
                                        <?php 
                                        $sql="SELECT u.* from followinfo AS f INNER JOIN userinfo AS u on follower_id = '".$_SESSION['num']."' AND f.followed_user_id=u.number";
                                        $result = $conn->query($sql);
                                        if($result->num_rows>0){
                                        while($row=$result->fetch_array()){
                                        $followedName=$row["Name"];?>
                                        <div class="cheting_list">
                                            <div class="cheting_list_d">
                                                <h2 class="chating_list_d_name" value="<?php echo $followedName; ?>">
                                                    <?php echo $followedName; ?></h2>
                                                <button class="unfollow_button"
                                                    onClick="location.href='/unfollow.php?number=<?php echo $row["number"]; ?>'">
                                                    팔로우 취소 </button>
                                                <button class="conversation_btn idfind"
                                                    value="<?php echo $row["number"]; ?>">
                                                    대화하기 </button>
                                            </div>
                                        </div>
                                        <?php }}?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="chet_banner">
                    <div class="chet_b_t">
                        <div class="chet_b_t_name">
                            <h1 id=chet_b_t_name_id>채팅</h1>
                        </div>
                    </div>
                    <div class="chet_b_c">
                        <div class="chet_b_c_friend">
                            <div class="chet_b_c_f_1">
                                <div class="friend_list">
                                    <div class="friend_list_d" id="listshow">
                                        <?php 
                                        $arr=array();
                                            $sql="SELECT * from chat as c inner join userinfo as u on  (c.username = u.number AND c.username ='".$_SESSION['num']."')  or (c.receivename=u.number and c.receivename = '".$_SESSION['num']."')  GROUP BY username, receivename ";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                               while( $chat = $result->fetch_array()){
                                                $sql1="SELECT distinct * from userinfo where (number = '".$chat["receivename"]."') or (number = '".$chat["username"]."') ";
                                                $result1 = $conn->query($sql1);
                                                
                                            while($receive=$result1->fetch_array()){
                                                
                                                $receivename=$receive["Name"];
                                                
                                    if(($receive["number"]!=$_SESSION['num']) && (array_search($receive["number"],$arr)==false) ){
                                        array_push($arr,$receive["number"]);?>

                                        <div class="cheting_list">

                                            <div class="cheting_list_d_c">
                                                <button style="cursor:pointer " class="cheting_p_btn idfind"
                                                    value="<?php echo $receive["number"]; ?>"><?php  echo $receivename; echo " ("; echo $receive['b_number']; echo ")";?></button>

                                                <div style="display:none" class="chating_list_d_name"
                                                    value="<?php echo $receive["Name"]; ?>">
                                                </div>
                                            </div>

                                        </div>



                                        <?php }}}}?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="chet_right">
                    <div class="chet_r_cheting">
                        <div class="chat-con bg-light text-dark">
                            <div id="chat-loader">
                            </div>
                            <ul id="chat-ul"></ul>
                        </div>
                    </div>
                    <div class="chat-ig">
                        <input class="form-control" placeholder="message..." id="chat-input"
                            style="width: 100%; border: 1px solid #b6b5b0;" />
                        <div class="input-group-append">
                            <input type="button" value="send" class="btn-primary" id="chat-button"
                                style="background: #663298; color:#ffff; border:0px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class='modal' id='modal'>
        <div id='content'>
            <legend class="title">비밀번호 입력</legend>
            <button type='button' class="close" id='btnClose'>X</button>
            <label>비밀번호를 입력하세요</label>
            <form method="post" action="/passCheck.php">
                <div class="inp_text">
                    <input type='password' name='accpw' id='accpw' placeholder="비밀번호" autoComplete="on">
                </div>

                <button type="submit" id='btnPass' class="btn_login" style="cursor:pointer">확인</button>
            </form>
        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/chat/script.js"></script>
    <script type=text/javascript src="/js/modalpass.js"></script>
    <script type=text/javascript src="/js/login.js"></script>
</body>

</html>