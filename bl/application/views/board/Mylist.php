<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <title>MyList</title>
    <script src="https://kit.fontawesome.com/1e25dcd7a8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="application\views\css\button.css">
    <link rel="stylesheet" href="application\views\css\left.css">
    <link rel="stylesheet" href="application\views\css\Create.css">
    <link rel="stylesheet" href="application\views\css\mypage.css">
    <link rel="stylesheet" href="application\views\css\slidebar.css">
    <link rel="stylesheet" href="application\views\css\UserInfo.css">
    <link rel="stylesheet" type="text/css" href="application\views\css\login.css" />
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <style>
    * {
        margin: 0;
    }

    body {
        background-color: #f1f2f4;
    }

    .container {
        margin: 0;
        width: 100%;
        display: flex;
        margin-top: 5%;
        -ms-overflow-style: none;
    }

    ::-webkit-scrollbar {
        display: none;
    }

    .blue {
        height: 100%;
        width: 100px;
        background-color: #00C0FF;
    }

    .Tcenter {
        height: 95%;
        width: 100%;
    }

    .mypag {
        border-collapse: collapse;
        text-align: left;
        line-height: 1.5;
        display: block;
    }


    /* 테이블 id로 줘서 수정하기 */
    table[id*="table_sample"] {
        border-collapse: collapse;
        width: 100%;
    }

    .table_top>th {
        text-align: center;
        padding: 10px;
        font-weight: bold;
        vertical-align: top;
        color: #70DBFA;
        font-size: 30px;
        border-bottom: 3px solid #9DD3EB;
    }

    .C {
        text-align: center;
        align: right;
        vertical-align: top;
        line-height: 50px;
        font-size: 17px;
    }

    .C>tr:nth-child(2n) {
        background-color: #EFEFEF;
    }

    .C>tr:nth-child(2n+1) {
        background-color: #F7F7F7;
    }

    thead[id*="D"] tr:nth-child(n+1) {
        background-color: #EFEFEF;
    }

    .table_top>th {
        width: 20%;
    }
    </style>
</head>

<body>
    <div class="container">
        <div>
            <div class="sidebar">
                <ul class="Menu">
                    <li onclick="location.href='board'">
                        <table>
                            <tr>
                                <td><i class="fa-brands fa-ethereum fa-6x"></i></td>
                                <td>
                                    <p>SmartContract</p>
                                </td>
                            </tr>
                        </table>
                    </li>
                    <li onclick="location.href='create'">
                        <table>
                            <tr>
                                <td><i class="fa-solid fa-folder-plus fa-4x"></i></td>
                                <td>
                                    <p>Create</p>
                                </td>
                            </tr>
                        </table>
                    </li>
                    <li onclick="location.href='trade'">
                        <table>
                            <tr>
                                <td><i class="fa-solid fa-money-bill-trend-up fa-4x"></i></td>
                                <td>
                                    <p>Trade</p>
                                </td>
                            </tr>
                        </table>
                    </li>
                    <li onclick="location.href=''">
                        <table>
                            <tr style="color:#00C0FF">
                                <td><i class="fa-solid fa-wallet fa-4x"></i></td>
                                <td>
                                    <p>My list</p>
                                </td>
                            </tr>
                        </table>
                    </li>
                </ul>
            </div>
        </div>
        <div class="right" style="padding-left:6%;">

            <div class="top">
                <h1 style="font-size:50px;">MyList</h1>
                <div id="UserInfoDiv">
                    <h1 class="User">&nbspUser Info</h1>
                    <i class="fa-solid fa-user fa-2x" id="UserInfo"></i>
                </div>
                <div id="UserInfoCard">
                    <table style="width:100%; text-align: center; height: 100%; color:white;">
                        <tr>
                            <td colspan="2"><i class="fa-solid fa-circle-user fa-5x"></i></td>
                        </tr>
                        <tr>
                            <td colspan="2">지갑</td>
                        </tr>
                        <tr>
                            <td colspan="2" id="infowallet" value="<?php echo $Wallet['message'] ?>">
                                <?php echo $Wallet['message'] ?></td>
                        </tr>
                        <tr>
                            <td>아이디</td>
                            <td>코인수</td>
                        </tr>
                        <tr>
                            <td id="infoid" value="<?php echo( $_SESSION['id']);?>">
                                <?php echo( $_SESSION['id']);?></td>
                            <td><?php echo $Account['message'] ?></td>
                        </tr>
                    </table>
                </div>


                <div class="center">
                    <div class="mypag" id="imypage" style="display: block; width: 100%;">
                        <div class="table_div"
                            style="height: 600px; width: 100%; overflow: scroll; border-radius: 30px; box-shadow: 5px 5px 20px grey;">
                            <table id="table_sample001" class="maintable">
                                <tr class="table_top" style="background-color: white;">
                                    <th>이름</th>
                                    <th>가격</th>
                                    <th>거래 일자</th>
                                    <th>내용</th>
                                    <th>상태</th>
                                    <th></th>
                                </tr>
                                <tbody>
                                    <?php for($i=1; $i<count($BlockCount); $i++){
                        if(strtolower($BlockCount['message'.$i]["addr"]) ==strtolower($Wallet['message'] )){  
              ?>
                                <tbody id="A" class="C">
                                    <tr>
                                        <td class="listname" value="<?php echo $BlockCount['message'.$i]["name"]?>">
                                            <?php echo $BlockCount['message'.$i]["name"]?></td>
                                        <td class="listcoin" value="<?php echo $BlockCount['message'.$i]["coin"]?>">
                                            <?php echo $BlockCount['message'.$i]["coin"]?></td>
                                        <td class="listtime" value="<?php echo $BlockCount['message'.$i]["time"]?>">
                                            <?php echo $BlockCount['message'.$i]["time"]?></td>
                                        <td class="listcontent"
                                            value="<?php echo $BlockCount['message'.$i]["content"]?>">
                                            <?php echo $BlockCount['message'.$i]["content"]?></td>
                                        <td class="listoption"
                                            value="<?php echo $BlockCount['message'.$i]["auction"] == 'true' ? 'true' : 'false'?>">
                                            <?php echo $BlockCount['message'.$i]["auction"] == 'true' ? 'true' : 'false'?>
                                        </td>
                                        <td><button id="btn" class="MDetails" type="button" name="button"
                                                value="$1">Details</button></td>
                                    </tr>
                                    <tr colspan="6">
                                        <td colspan="6">
                                            <div id="test1" class="test"
                                                style="display: none; height:300px; overflow:scroll;">
                                                <table id="table_b" style="width:100%; padding: 30px; border:0;">
                                                    <thead class="C" id="D">
                                                        <tr>
                                                            <th colspan="6" style="text-align:left;">거래 내역</th>
                                                        </tr>
                                                        <tr>
                                                            <td>거래일자</td>
                                                            <td>구매자</td>
                                                            <td>판매자</td>
                                                            <td>코인 수</td>
                                                        </tr>
                                                        <?php 
                                                            if(isset($list[$BlockCount['message'.$i]["name"]]["message1"])){
                                                            for($j=1;$j<count($list[$BlockCount['message'.$i]["name"]]);$j++){ ?>
                                    </tr>
                                    <td style="width: 17%;">
                                        <?php echo $list[$BlockCount['message'.$i]["name"]]['message'.$j]["time"];?>
                                    </td>
                                    <td style="width: 24%;">
                                        <?php echo $list[$BlockCount['message'.$i]["name"]]['message'.$j]["postaddr"];?>
                                    </td>
                                    <td><?php echo $list[$BlockCount['message'.$i]["name"]]['message'.$j]["getaddr"];?>
                                    </td>
                                    <td style="width: 18%;">
                                        <?php echo $list[$BlockCount['message'.$i]["name"]]['message'.$j]["coin"];?>
                                    </td>
                                    </tr>
                                    <?php }}?>
                                    <?php if($BlockCount['message'.$i]["auction"] == 'true') {?>
                                    <td colspan="6"><input type="button" class="mypageTbtn btn" name="button"
                                            value="판매 취소" id="btnOpen" style="cursor:pointer"><input class="mypageinput"
                                            type="hidden"></td>
                                    <?php }
                          else{?>
                                    <td colspan="6"><input type="button" class="mypageTbtn btn" name="button"
                                            value="판매 신청" id="btnOpen" style="cursor:pointer"><input class="mypageinput"
                                            type="number" id="mylistvalue" min="1" max="30"></td>

                                    <?php } ?>
                                    </thead>
                            </table>
                        </div>
                        </td>
                        </tr>
                        </tbody>
                        <?php }
            }?>
                        </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php if(!isset($_SESSION['id'])){ ?>
    <div class='modal' id='modal'>
        <div id='content'>
            <legend class="title">로그인</legend>
            <button type='button' class="close" id='btnClose'>X</button>
            <label>로그인 정보를 입력하세요</label>
            <form>
                <div class="inp_text">
                    <input type="text" style="vertical-align: 0px" id='id' name="id" class="id" placeholder="아이디">
                </div>

                <div class="inp_text">
                    <input type='password' name='pw' id='pw' placeholder="비밀번호" autoComplete="on">
                </div>
            </form>

            <input type="button" id='btnCheck' class="btn_login" value="로그인" style="text-align:center">
            <div class="bottomText" style="margin-top:10px">
                <label>계정이 없으신가요?</label>
                <a href="#" id="btnchangejoin" style="margin:5px">회원가입</a>
            </div>
        </div>
    </div>

    <div class='modal' id='modal'>
        <div id='content'>
            <legend class="title">회원가입</legend>
            <button type='button' class="close" id='btnClose'>X</button>
            <label>회원 정보를 입력하세요</label>
            <form>
                <div class="inp_text">
                    <input type="text" style="vertical-align: 0px" name="userid" id="uid" class="id" placeholder="아이디">
                </div>
                <input type="hidden" name="decide_id" id="decide_id">
                <p><span id="decide" style='color:red;font-size: 15px'> ID 중복 여부를 확인해주세요. </span>
                    <button type='button' style='font-size: 13px' class="username_button" id="check_button">중복
                        확인</button>
                <div class="inp_text">
                    <input type='password' name='pwd' id='pwd' placeholder="비밀번호" autoComplete="on">
                </div>

                <div class="inp_text">
                    <input type='password' id='Adpwd' placeholder="계좌 비밀번호" autoComplete="on">
                </div>

                <div class="inp_text">
                    <input type='text' id='loginName' placeholder="이름">
                </div>
                <div class="inp_text">
                    <input type='text' id='loginPhone' placeholder="전화번호">
                </div>

                <div class="inp_text">
                    <input type='text' id='Birth' placeholder="생년월일   ex) 2000-01-01">
                </div>
            </form>

            <button type="submit" id='btnJoin' class="btn_login">회원가입</button>
            <div class="bottomText" style="margin-top:10px">
                <label>이미 가입하셨나요?</label>
                <a href="#" id="btnlogin" style="margin:5px">로그인</a>
            </div>

        </div>
    </div>
    <?php }else{?>
    <div class='modal' id='modal'>
        <div id='content'>
            <legend class="title">신청</legend>
            <button type='button' class="close" id='btnClose'>X</button>
            <label>계좌 비밀번호를 입력하세요</label>
            <form>
                <div class="inp_text">
                    <input type='password' name='accpw' id='myaccpw' placeholder="계좌 비밀번호" autoComplete="on">
                </div>
            </form>
            <button type="submit" id='btnAuction' class="btn_login" style="cursor:pointer">확인</button>
        </div>
    </div>
    <?php } ?>


    <script src="application\views\js\MyListdetails.js"></script>
    <script type=text/javascript src="application\views\js\login.js"></script>
    <script type=text/javascript src="application\views\js\logincheck.js"></script>
    <script type=text/javascript src="application\views\js\join.js"></script>
    <script type=text/javascript src="application\views\js\idcheck.js"></script>
</body>

</html>