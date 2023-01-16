$(document).ready(function () {
  btnCreate.addEventListener("click", () => {
    var Action = "/create/question";

    var uid = document.getElementById("infoid").innerHTML.trim();
    var accpw = document.getElementById("accpw").value;

    var nametitle = document.getElementById("nametitle").value;
    var content = document.getElementById("quizcontent").value;
    var coin = document.getElementById("SelectedCoin").innerHTML.trim();

    if (accpw) {
      $.ajax({
        url: Action,
        data: {
          PageID: uid,
          Pwd: accpw,
          Name: nametitle,
          Content: content,
          Coin: coin,
        },
        method: "POST",
        success: function (data) {
          console.log(data);
          if (data == "Success") {
            alert("문제 생성 완료");
            location.replace("/create");
          } else if (data == "Lack of Balance") {
            alert("계좌에 수수료가 부족합니다.");
          } else {
            alert("계좌 비밀번호가 다릅니다.");
          }
        },
        error: function (err) {
          alert(err);
        },
      });
    } else {
      alert("비밀번호를 입력하세요.");
    }
  });
});
