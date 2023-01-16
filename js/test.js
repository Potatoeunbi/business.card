$(document).ready(function(){

    var btnCheck = document.getElementById('btnCheck');

btnCheck.addEventListener("click", () => {
        
var Action='./login_check.php';

var id = document.getElementById('id').value;
var pw = document.getElementById('pw').value;


        $.ajax({
            url: Action,
            data: {
                "id": id,
                "pw": pw
            },
            method: "POST",
            success: function(data){
                //console.log(data);
              if(data=='1'){
                alert ("로그인되었습니다."); 
                location.replace('./page/main.php');
              }else{
                alert ("아이디 혹은 비밀번호를 확인하세요.");
              }
              
            }, 
            error: function(err){
				alert(err);
            }
        });


    });

});
