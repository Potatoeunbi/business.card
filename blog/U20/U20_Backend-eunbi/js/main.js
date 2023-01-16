const buttons = document.querySelectorAll(".menu_button");
buttons.forEach(function (button, index) {
  button.addEventListener("click", function (e) {
    e.preventDefault();
    this.parentNode.classList.toggle("active");
    this.childNodes[1].classList.toggle("fa-angle-right");
    this.childNodes[1].classList.toggle("fa-angle-down");
    buttons.forEach(function (button2, index2) {
      if (index !== index2) {
        button2.parentNode.classList.remove("active");
        button2.childNodes[1].classList.remove("fa-angle-down");
        button2.childNodes[1].classList.add("fa-angle-right");
      }
    });
  });
});

// 참가자 팝업
function createPopupWin(pageURL, pageTitle, popupWinWidth, popupWinHeight) {
  var left = (screen.width - popupWinWidth) / 2;
  var top = (screen.height - popupWinHeight) / 4;

  var myWindow = window.open(
    pageURL,
    pageTitle,
    "resizable=yes, width=" +
      popupWinWidth +
      ", height=" +
      popupWinHeight +
      ", top=" +
      top +
      ", left=" +
      left
  );
}
// 참가자 선택 토글
function toggle(box) {
  checkboxes = document.getElementsByName("checkAthlete");
  for (var i = 0, n = checkboxes.length; i < n; i++) {
    checkboxes[i].checked = box.checked;
  }
}
