
  var check_button = document.getElementById('check_button');
  var Action = "/board/idcheck";

  if(check_button){
  check_button.addEventListener("click", () => {
  
  
        var userid = document.getElementById('uid').value;
        if(userid){
      
         $.ajax({
                     url: Action,
                     data: {
                         "uid": userid
                     },
                     method: "GET",
                     success: function(data){
                      if(data=='0'){
                            if(document.getElementById("decide").innerText=='ID 중복 여부를 확인해주세요. '){
                                    if(confirm(userid+"는 사용가능한 아이디입니다."))
                                    {
                                        document.getElementById("decide").innerHTML = "<span style='color:blue;'> 사용 가능한 아이디입니다. </span>"
                                        document.getElementById("decide_id").value = document.getElementById("uid").value
                                        document.getElementById("uid").disabled = true
                                        document.getElementById("btnJoin").disabled = false
                                        document.getElementById("check_button").innerText = "다른 ID로 변경"
            
            
                                    }else{ 
                                    document.getElementById("uid").value = ""
                                    document.getElementById("btnJoin").disabled = false;
            
                                    }
                            }else{
                                document.getElementById("decide").innerHTML = "<span style='color:red;'>ID 중복 여부를 확인해주세요. </span>"
                                document.getElementById("uid").disabled = false
                                document.getElementById("uid").value = ""
                                document.getElementById("btnJoin").disabled = true
                                document.getElementById("check_button").innerText = "중복확인"
                            }
                        
                       }else{
                         alert(userid+"는 중복된 아이디입니다.");
                         document.getElementById("uid").value = ""
                         document.getElementById("btnJoin").disabled = true
                       }
                  },
                  error: function(err){
                      alert(err);
                    }
                });
      
        }else{
          alert("아이디를 입력하세요");
        }
      
  
  });
  }