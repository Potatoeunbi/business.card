var modals = document.getElementsByClassName("modal");
var btnOpen = document.getElementsByClassName("btn");
var btnClose = document.getElementsByClassName("close");

var btnchangejoin = document.getElementById("btnchangejoin");
var btnLogin = document.getElementById("btnlogin");
var mypage = document.getElementById("mypage");

var funcs = [];
var i = 0;

function Modal(num) {
  return function () {
    if (mypage) {
      btnClose[0].onclick = function () {
        modals[0].style.display = "none";
      };

      btnOpen[0].onclick = function () {
        modals[0].style.display = "block";
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
