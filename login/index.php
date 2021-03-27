<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Control Panel</title>
	<? include_once("plugin.php"); ?>
		<script type="text/javascript">		
		function checkdata(){
		var user = document.getElementById("user_wb").value;
		var pwd = document.getElementById("passwd_wb").value;
		var error=0;
		var msg="";

		if(user==""){
			error=1;
			msg+="กรุณากรอก Username ด้วยค่ะ\n";
			document.login_form.user_wb.focus();           

		}else if(pwd==""){
			error=1;
			msg+="กรุณากรอก Password ด้วยค่ะ\n";
           document.login_form.passwd_wb.focus();           
		}
		
		if(error==1){
			alert(msg);
			return false;
		}
	}
		</script>

</head>

<body>
<form  method="post" action="administrator.php" name="login_form" onSubmit="return checkdata()">
        <div id="tabs" style="height:200px;width:350px;margin:auto">
        		
        		<ul>
					<li>
					  <h3 style="margin:0;padding:5px">Web Site Management System</h3>
					</li>
                </ul>
                
                    <ul style="list-style:none">
					<li><span style="color:#666666">Username</span></li>
                     <li><input size="50" type="text" id="user_wb" name="user_wb" maxlength=30 ></li>
                    <li><span style="color:#666666">Password </span></li>
                    <li><input size="50" type="password" id="passwd_wb" name="passwd_wb" maxlength=30 ></li>
                    <li>&nbsp;</li>
                    <li>
                    <input type="submit" value='Login' name="submit" class="button" style="height:30px">
                    <input type="reset" value='Reset' name="reset" class="button" style="height:30px"></li>
                    </ul>
                    </div>
</form>                    
                    
</body>
</html>
