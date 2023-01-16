function logchk_submit() {
  var id = document.getElementById("id").value;
  var pw = document.getElementById("pw").value;

  if (id == "" || pw == "") {
    alert("아이디 또는 패스워드가 입력되지 않았습니다.");
  } else {
    document.getElementById("login_form").submit();
  }
}
