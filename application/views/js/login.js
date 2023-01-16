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
		modals[num-1].style.display="none"; 
		modals[num].style.display="block";
};

btnLogin.onclick=function(){
		modals[num].style.display="none"; 
		modals[num-1].style.display="block";
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
        (idValue && pwValue) && (pwValue.length > 3)
    ) {
        loginBtn.disabled = false;
    }
    else {
        loginBtn.disabled = true;
    }
}

function checkid(num){

  var userid = document.getElementById('uid').value;
  if(userid){

   $.ajax({
               url: Action,
               data: {
                   "uid": userid
               },
               method: "GET",
               success: function(data){
                console.log(document.getElementById("decide").innerText);
                if(data=='0'){
                    var result=confirm(userid+"는 사용가능한 아이디입니다.");
                      if(result)
                      {
                        decide();
                      }
                 }else{
                   alert(userid+"는 중복된 아이디입니다.");
                   change();
                 }
            },
            error: function(err){
                alert(err);
              }
          });

  }else{
    alert("아이디 입력");
  }
}

function decide(){

      document.getElementById("decide").innerHTML = "<span style='color:blue;'> 사용 가능한 아이디입니다. </span>"
      document.getElementById("decide_id").value = document.getElementById("uid").value
      document.getElementById("uid").disabled = true
      document.getElementById("btnJoin").disabled = false
      document.getElementById("check_button").innerText = "다른 ID로 변경"
      document.getElementById("check_button").setAttribute("onclick", "change()")
  

}

function change(){
  document.getElementById("decide").innerHTML = "<span style='color:red;'>ID 중복 여부를 확인해주세요. </span>"
  document.getElementById("uid").disabled = false
  document.getElementById("uid").value = ""
  document.getElementById("btnJoin").disabled = true
  document.getElementById("check_button").innerText = "중복확인"
  document.getElementById("check_button").setAttribute("onclick", "checkid()")
}




var check_button = document.getElementById('check_button');

 var Action = "/board/idcheck";

check_button.addEventListener("click", () => {


//console.log(document.getElementById("decide").innerText);
checkid();

});





var uid=document.getElementById('uid'),
pwd=document.getElementById('pwd'),
Adpwd=document.getElementById('Adpwd'),
loginName=document.getElementById('loginName');
var btnJoin=document.getElementById('btnJoin');

var isActiveJoin = () => {

  var uidValue=uid.value;
  var pwdValue=pwd.value;
  var AdpwdValue=Adpwd.value;
  var loginNameValue=loginName.value;

    if(uidValue && pwdValue && AdpwdValue && loginNameValue)  {
        btnJoin.disabled = false;
    }
    else {
        btnJoin.disabled = true;
    }
}

const init = () => {
  idInput.addEventListener('input', isActiveLogin);
  pwInput.addEventListener('input', isActiveLogin);
  idInput.addEventListener('keydown', isActiveLogin);
  pwInput.addEventListener('keydown', isActiveLogin);

  uid.addEventListener('input', isActiveJoin);
  pwd.addEventListener('input', isActiveJoin);
  Adpwd.addEventListener('input', isActiveJoin);
  loginName.addEventListener('input', isActiveJoin);
  uid.addEventListener('keydown', isActiveJoin);
  pwd.addEventListener('keydown', isActiveJoin);
  Adpwd.addEventListener('keydown', isActiveJoin);
  loginName.addEventListener('keydown', isActiveJoin);
}
init();



if(document.getElementById('Logoutbt')){
var Logoutbt = document.getElementById('Logoutbt');

Logoutbt.onclick=function() {
  var request = $.ajax({
      url: "/board/destroy",
      type: "GET"
  });

  request.done(function(msg) {
    location.reload();
    alert("로그아웃 되었습니다");
  });

  request.fail(function(jqXHR, textStatus) {
      alert("Error on Logging Out");
  });
};

}
