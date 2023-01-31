$(document).ready(function () {
  var btnCheck = document.getElementById("btnCheck");
  if (btnCheck) {
    btnCheck.addEventListener("click", () => {
      var id = document.getElementById("id").value;
      var pw = document.getElementById("pw").value;

      if (id == "" || pw == "") {
        alert("아이디 혹은 비밀번호를 확인하세요.");
      }
    });
  }
});
