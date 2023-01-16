<?php  
	include "../db.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="../js/idcheck.js?ver=123"></script>
	<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
	<meta charset="utf-8" />
	<title>회원가입</title>
</head>
<body>
	<form method="post" action="member_ok.php" name="memform">
		<h1>회원가입</h1>
			<fieldset>
				<legend>입력사항</legend>
					<table>
						<tr>
							<td>아이디</td>
							<td><input type="text" size="35" name="id" id="id" class="check" placeholder="아이디"  required></td>
							<td><input type="button" value="중복검사" onclick="checkid();" /></td>
							<input type="hidden" value="0" name="chs" />
							
						</tr>
						<tr>
							<td>비밀번호</td>
							<td><input type="password" size="35" name="pw" placeholder="비밀번호"></td>
						</tr>
						<tr>
							<td>이름</td>
							<td><input type="text" size="35" name="name" placeholder="이름"></td>
						</tr>
						<tr>
							<td>주소</td>
							<td><input type="text" size="35" name="address" placeholder="주소"></td>
						</tr>
						<tr>
							<td>성별</td>
							<td>남<input type="radio" name="sex" value="남"> 여<input type="radio" name="sex" value="여"></td>
						</tr>
						<tr>
							<td>이메일</td>
							<td><input type="text" name="email">@<select name="emaddress"><option value="naver.com">naver.com</option><option value="nate.com">nate.com</option>
							<option value="hanmail.com">hanmail.com</option></select></td>
						</tr>
					</table>

				<input type="submit" value="가입하기" /><input type="reset" value="다시쓰기" />
			
		</fieldset>
	</form>
</body>
</html>