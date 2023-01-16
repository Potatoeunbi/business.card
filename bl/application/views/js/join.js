$(document).ready(function () {
  var btnJoin = document.getElementById("btnJoin");
  if (btnJoin) {
    btnJoin.addEventListener("click", () => {
      var Action = "/board/join";

      var uid = document.getElementById("uid").value;
      var pwd = document.getElementById("pwd").value;
      var Adpwd = document.getElementById("Adpwd").value;
      var loginName = document.getElementById("loginName").value;
      var loginPhone = document.getElementById("loginPhone").value;
      var Birth = document.getElementById("Birth").value;

      $.ajax({
        url: Action,
        data: {
          uid: uid,
          pwd: pwd,
          Adpwd: Adpwd,
          loginName: loginName,
          loginPhone: loginPhone,
          Birth: Birth,
        },
        method: "POST",
        success: function (data) {
          console.log(data);
          if (data == "1") {
            alert("회원가입 완료");
            location.replace("/index.php");
          } else {
            alert("모두 바르게 입력하세요.");
          }
        },
        error: function (err) {
          alert(err);
        },
      });
    });
  }
});
