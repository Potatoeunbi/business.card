
function checkid(){
	var userid = document.getElementById("uid").value;
	if(userid)
	{
		url = "/member/id_check.php?userid="+userid;
		window.open(url,"chkid","width=400,height=100");
	}else{
		alert("아이디를 입력하세요");
	}
}



var modals = document.getElementsByClassName("modal");
var btnOpen  =document.getElementsByClassName("btn");
var btnClose = document.getElementsByClassName("close");
var btnJoin = document.getElementById('btnjoin');
var btnLogin = document.getElementById('btnlogin');
var funcs = [];

function Modal(num){

return function(){

// modal 창을 보여줌

 btnOpen[num].onclick = function(){
	modals[num].style.display="block";
};

// modal 창을 감춤
btnClose[num].onclick = function(){
	modals[num].style.display="none";
	
};

btnJoin.onclick=function(){
		modals[0].style.display="none"; //이거는 없에고
		modals[1].style.display="block";
};

btnlogin.onclick=function(){
		modals[1].style.display="none"; //이거는 없에고
		modals[0].style.display="block";
};
	}
}



for(var i = 0; i < btnOpen.length; i++) {
  funcs[i] = Modal(i);
}
 
// 원하는 Modal 수만큼 funcs 함수를 호출합니다.
for(var j = 0; j < btnOpen.length; j++) {
  funcs[j]();
}


window.onclick = function(event) {
  if (event.target.className == "modal") {
      event.target.style.display = "none";
  }};



'use strict';  

var idInput = document.getElementById('id'),
  pwInput = document.getElementById('pw');
var loginBtn = document.getElementById('btnCheck');


var isActiveLogin = () => {
    var idValue = idInput.value;
    var pwValue = pwInput.value;

    if(
        (idValue && pwValue) && (pwValue.length > 2)
    ) {
        loginBtn.disabled = false;
    }
    else {
        loginBtn.disabled = true;
    }
}

const init = () => {
  idInput.addEventListener('input', isActiveLogin);
  pwInput.addEventListener('input', isActiveLogin);
  idInput.addEventListener('keydown', isActiveLogin);
  pwInput.addEventListener('keydown', isActiveLogin);
}
init();