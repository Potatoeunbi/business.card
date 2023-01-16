function accedit_submit() {
  var name = document.getElementById("name").value;

  if (name == "") {
    alert("관리자 이름이 입력되지 않았습니다.");
  } else {
    document.getElementById("accedit_form").submit();
  }
}

function pwedit_submit() {
  var pw = document.getElementById("pw").value;
  var pwck = document.getElementById("pwck").value;

  if (pw == "" || pwck == "") {
    alert("모두 입력되지 않았습니다.");
  } else if (pwck != pw) {
    alert("비밀번호와 비밀번호 확인이 일치하지 않습니다.");
  } else {
    document.getElementById("pwedit_form").submit();
  }
}
