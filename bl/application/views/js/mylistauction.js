$(document).ready(function () {
  var btnAuction = document.getElementById("btnAuction");

  btnAuction.addEventListener("click", () => {
    var Action = "/trade/AuctionChange";

    var uid = document.getElementById("infoid").innerHTML.trim();
    var pwd = document.getElementById("pwd").value;
    var content = document.getElementById("content").value;
    var coin = document.getElementById("coin").value;
    var toaddr = document.getElementById("toaddr").value;
    var time = new Date(+new Date() + 3240 * 10000)
      .toISOString()
      .replace("T", " ")
      .replace(/\..*/, "");

    $.ajax({
      url: Action,
      data: {
        PageID: uid,
        Pwd: pwd,
        Content: content,
        Coin: coin,
        toAddr: toaddr,
        Time: time,
      },
      method: "POST",
      success: function (data) {
        console.log(data);
        if (data == "1") {
          alert("구매 완료");
          location.replace("trade");
        } else {
          alert("계좌 비밀번호가 다릅니다.");
        }
      },
      error: function (err) {
        alert(err);
      },
    });
  });
});
