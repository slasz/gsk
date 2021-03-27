<div style="background:#ffffff;padding:10px;" align="center">
<table border="0" ><tr><td  valign="top" align="center">
<form action="" method="post" name="frm1">


<ul><li>Change user name or password</li></ul>
<div class='ui-state-default  ui-corner-all' style='margin:1px 0'>
    <br />
	<ul style="list-style:none;padding:0;margin:1px">
          <li style="width:130px;float:left;margin-right:10px" class="labelTd">Username : </li>
          <li><input type="text" id="username" name="username" maxlength="20"/></li>
    </ul>
    <ul style="list-style:none;padding:0;margin:1px">
          <li style="width:130px;float:left;margin-right:10px" class="labelTd">Password : </li>
          <li><input type="password" id="newpwd" name="newpwd" maxlength="20"/></li>
   </ul>
   
    <br />
    <div>
    <input type="button" value="Save" style="margin:0 150px" onClick="if(ckform(document.getElementById('username').value,document.getElementById('newpwd').value,'Password','saveform.php',displaymain)==true) reFresh('index.php','บันทึกเรียบร้อยค่ะ\nกรุณาเข้าสู่ระบบใหม่')"/>
    </div>
    <br />
 </div> 
</form>
</td></tr></table>
</div>