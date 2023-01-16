function checkid(){
	var userid = document.getElementById("id").value;
	if(userid)
	{
		url = "id_check.php?id="+userid;
		window.open(url,"chkid","width=300,height=100");
	}else{
		alert("아이디를 입력하세요");
	}
}