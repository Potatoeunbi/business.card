var modals = document.getElementsByClassName("modal");
var btnOpen = document.getElementsByClassName("btn");
var btnClose = document.getElementsByClassName("close");

var btnchangejoin = document.getElementById("btnchangejoin");
var btnLogin = document.getElementById("btnlogin");
var trade = document.getElementById("imypage");
var mypageTbtn = document.getElementsByClassName("mypageTbtn");

var funcs = [];
var i = 0;

function Modal(num) {
  return function () {
    if (trade) {
      btnOpen[num].onclick = function () {
        if (
          mylistvalue &&
          mypageinput[num].value == "" &&
          mypageTbtn[num].value != "판매 취소"
        ) {
        } else {
          modals[0].style.display = "block";
          i = num;
        }
      };

      btnClose[0].onclick = function () {
        modals[0].style.display = "none";
      };
    } else {
      // modal 창을 보여줌
      btnOpen[num].onclick = function () {
        modals[num].style.display = "block";
      };

      // modal 창을 감춤
      btnClose[num].onclick = function () {
        modals[num].style.display = "none";
      };
    }

    if (btnchangejoin && btnLogin) {
      btnchangejoin.onclick = function () {
        modals[num - 1].style.display = "none";
        modals[num].style.display = "block";
      };

      btnLogin.onclick = function () {
        modals[num].style.display = "none";
        modals[num - 1].style.display = "block";
      };
    }
  };
}

for (var i = 0; i < btnOpen.length; i++) {
  funcs[i] = Modal(i);
}

// 원하는 Modal 수만큼 funcs 함수를 호출합니다.
for (var j = 0; j < btnOpen.length; j++) {
  funcs[j]();
}

window.onclick = function (event) {
  if (event.target.className == "modal") {
    event.target.style.display = "none";
  }
};

var blockname = document.getElementsByClassName("blockname");
var blockaddr = document.getElementsByClassName("blockaddr");
var blockcoin = document.getElementsByClassName("blockcoin");
var blockcontent = document.getElementsByClassName("blockcontent");
var buyaccpw = document.getElementById("accpw");
var btnBuy = document.getElementById("btnBuy");

if (btnBuy) {
  btnBuy.addEventListener("click", () => {
    var Action = "/trade/buy";

    var uid = document.getElementById("infoid").innerHTML.trim();
    var accpwd = buyaccpw.value;
    var quizname = blockname[i].innerHTML.trim();
    var content = blockcontent[i].innerHTML.trim();
    var coin = blockcoin[i].innerHTML.trim();
    var toaddr = blockaddr[i].innerHTML.trim();

    var time = new Date(+new Date() + 3240 * 10000)
      .toISOString()
      .replace("T", " ")
      .replace(/\..*/, "");

    if (accpwd) {
      $.ajax({
        url: Action,
        data: {
          PageID: uid,
          Pwd: accpwd,
          Content: content,
          Coin: coin,
          toAddr: toaddr,
          Time: time,
          Name: quizname,
        },
        method: "POST",
        success: function (data) {
          console.log(data);
          if (data == "Success") {
            alert("구매 완료");
            location.replace("trade");
          } else if (data == "Password DisMatch") {
            alert("계좌 비밀번호가 다릅니다.");
          } else {
            alert("계좌의 잔액이 부족합니다.");
          }
        },
        error: function (err) {
          alert(err);
        },
      });
    } else {
      alert("비밀번호를 입력하세요.");
    }
  });
}
var mypageinput = document.getElementsByClassName("mypageinput");

var listname = document.getElementsByClassName("listname");
var mylistvalue = document.getElementById("mylistvalue");
var listcontent = document.getElementsByClassName("listcontent");
var listoption = document.getElementsByClassName("listoption");

var auctionaccpw = document.getElementById("myaccpw");
var btnAuction = document.getElementById("btnAuction");

if (btnAuction) {
  btnAuction.addEventListener("click", () => {
    var Action = "mylist/AuctionChange";
    var uid = document.getElementById("infoid").innerHTML.trim();
    var actpwd = auctionaccpw.value;
    var quizname = listname[i].innerHTML.trim();
    var content = listcontent[i].innerHTML.trim();
    var coin = mypageinput[i].value;
    var option = listoption[i].innerHTML.trim();
    var toaddr = document.getElementById("infowallet").innerHTML.trim();

    var time = new Date(+new Date() + 3240 * 10000)
      .toISOString()
      .replace("T", " ")
      .replace(/\..*/, "");

    if (option == "true") {
      option = "false";
    } else if (option == "false") {
      option = "true";
    }

    if (actpwd) {
      $.ajax({
        url: Action,
        data: {
          PageID: uid,
          Pwd: actpwd,
          Content: content,
          Coin: coin,
          toAddr: toaddr,
          Time: time,
          Name: quizname,
          Option: option,
        },
        method: "POST",
        success: function (data) {
          console.log(data);
          if (data == "Success") {
            alert("완료되었습니다.");
            location.replace("mylist");
          } else if (data == "Password DisMatch") {
            alert("계좌 비밀번호가 다릅니다.");
          } else {
            alert("계좌의 잔액이 부족합니다.");
          }
        },
        error: function (err) {
          alert(err);
        },
      });
    } else {
      alert("비밀번호를 입력하세요.");
    }
  });
}

("use strict");
var idInput = document.getElementById("id"),
  pwInput = document.getElementById("pw");
var loginBtn = document.getElementById("btnCheck");

if (loginBtn) {
  loginBtn.disabled = true;
}

var isActiveLogin = () => {
  var idValue = idInput.value;
  var pwValue = pwInput.value;

  if (idValue && pwValue && pwValue.length > 3) {
    loginBtn.disabled = false;
  } else {
    loginBtn.disabled = true;
  }
};

var uid = document.getElementById("uid"),
  pwd = document.getElementById("pwd"),
  Adpwd = document.getElementById("Adpwd"),
  loginName = document.getElementById("loginName"),
  loginPhone = document.getElementById("loginPhone"),
  Birth = document.getElementById("Birth");
var btnJoin = document.getElementById("btnJoin");

if (btnJoin) {
  btnJoin.disabled = true;
}
var isActiveJoin = () => {
  var uidValue = uid.value;
  var pwdValue = pwd.value;
  var AdpwdValue = Adpwd.value;
  var loginNameValue = loginName.value;
  var loginPhoneValue = loginPhone.value;
  var BirthValue = Birth.value;

  if (
    uidValue &&
    pwdValue &&
    AdpwdValue &&
    loginNameValue &&
    loginPhoneValue &&
    BirthValue
  ) {
    btnJoin.disabled = false;
  } else {
    btnJoin.disabled = true;
  }
};

if (idInput && pwInput) {
  idInput.addEventListener("input", isActiveLogin);
  pwInput.addEventListener("input", isActiveLogin);
}

if (uid && pwd && Adpwd & loginName && loginPhone && Birth) {
  uid.addEventListener("input", isActiveJoin);
  pwd.addEventListener("input", isActiveJoin);
  Adpwd.addEventListener("input", isActiveJoin);
  loginName.addEventListener("input", isActiveJoin);
  loginPhone.addEventListener("input", isActiveJoin);
  Birth.addEventListener("input", isActiveJoin);
}

if (document.getElementById("Logoutbt")) {
  var Logoutbt = document.getElementById("Logoutbt");

  Logoutbt.onclick = function () {
    var request = $.ajax({
      url: "/board/destroy",
      type: "GET",
    });

    request.done(function (msg) {
      location.reload();
      alert("로그아웃 되었습니다.");
    });

    request.fail(function (jqXHR, textStatus) {
      alert("Error on Logging Out");
    });
  };
}
