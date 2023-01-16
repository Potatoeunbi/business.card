// 경기 결과 숫자만 입력 및 자동 양식 스크립트
function inputNumberFormat(obj) {
    obj.style.textAlign = "right";
    obj.style.width = "35px";
    if (obj.value.length == 0) {
        obj.style.textAlign = "left";
        obj.style.width = "auto";
    }

    if (obj.value.length == obj.maxLength) {
        obj.nextElementSibling.nextElementSibling.focus();
        //   console.log(obj.nextElementSibling)
    } else {
        obj.value = comma(uncomma(obj.value));
    }
}
function inputNumberFormat2(obj) {
    if (obj.value.length > 0) {
        obj.style.textAlign = "right";
        obj.style.width = "35px";
    } else {
        obj.style.textAlign = "left";
        obj.style.width = "auto";
    }
    obj.value = comma(uncomma(obj.value));
}
function comma(str) {
    str = String(str);
    return str.replace(/(\d)(?=(?:\d{3})+(?!\d))/g, "$1.");
}

function uncomma(str) {
    str = String(str);
    return str.replace(/[^\d]+/g, "");
}
