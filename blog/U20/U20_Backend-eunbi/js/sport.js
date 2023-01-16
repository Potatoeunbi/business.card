function schaddchk_submit() {
  var type = document.getElementById("scheduleType").value;
  var name = document.getElementById("scheduleName").value;
  var gender = document.getElementById("scheduleGender").value;
  var round = document.getElementById("scheduleRound").value;
  var location = document.getElementById("scheduleLocation").value;
  var status = document.getElementById("scheduleStatus").value;
  var date = document.getElementById("scheduleDate").value;

  if (
    type == "" ||
    name == "" ||
    gender == "" ||
    round == "" ||
    location == "" ||
    status == "" ||
    date == ""
  ) {
    alert("모두 입력되지 않았습니다.");
  } else {
    document.getElementById("scheduleAdd_form").submit();
  }
}

function schupdatechk_submit() {
  var type = document.getElementById("scheduleType1").value;
  var name = document.getElementById("scheduleName1").value;
  var gender = document.getElementById("scheduleGender1").value;
  var round = document.getElementById("scheduleRound1").value;
  var location = document.getElementById("scheduleLocation1").value;
  var status = document.getElementById("scheduleStatus1").value;
  var date = document.getElementById("scheduleDate1").value;

  if (
    type == "" ||
    name == "" ||
    gender == "" ||
    round == "" ||
    location == "" ||
    status == "" ||
    date == ""
  ) {
    alert("모두 입력되지 않았습니다.");
  } else {
    document.getElementById("scheduleUpdate_form").submit();
  }
}

function countryaddchk_submit() {
  var code = document.getElementById("countryCode").value;
  var name = document.getElementById("countryName").value;
  var namekr = document.getElementById("countryNameKr").value;

  if (code == "" || name == "" || namekr == "") {
    alert("모두 입력되지 않았습니다.");
  } else {
    document.getElementById("countryAdd_form").submit();
  }
}

function countryupdatechk_submit() {
  var code = document.getElementById("countryCode1").value;
  var name = document.getElementById("countryName1").value;
  var namekr = document.getElementById("countryNameKr1").value;

  if (code == "" || name == "" || namekr == "") {
    alert("모두 입력되지 않았습니다.");
  } else {
    document.getElementById("countryUpdate_form").submit();
  }
}

function schdateupdatechk_submit() {
  var start = document.getElementById("scheduleStart2").value;
  var finish = document.getElementById("scheduleFinish2").value;

  if (start == "" || finish == "") {
    alert("모두 입력되지 않았습니다.");
  } else {
    document.getElementById("scheduledateUpdate_form").submit();
  }
}
