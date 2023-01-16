$(document).ready(function(){

    var btnJoin = document.getElementById('btnJoin');

btnJoin.addEventListener("click", () => {
        
var Action='./joincheck.php';

var uid = document.getElementById('uid').value;
var pwd = document.getElementById('pwd').value;
var Adpwd = document.getElementById('Adpwd').value;
var loginName = document.getElementById('loginName').value;
var loginPhone = document.getElementById('loginPhone').value;
var Birth = document.getElementById('Birth').value;

        $.ajax({
            url: Action,
            data: {
                "uid": uid,
                "pwd": pwd,
                "Adpwd": Adpwd,
                "loginName": loginName,
                "loginPhone": loginPhone,
                "Birth": Birth
            },
            method: "POST",
            success: function(data){

                    alert ("회원가입 완료"); 
                    //location.replace('/login.php');

            
            }, 
            error: function(err){
				alert(err);
            }
        });


    });

});
