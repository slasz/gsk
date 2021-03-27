<?php 
session_start();
include_once('includes/connect.php');
include_once('includes/pejfunction.php');


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo $keywords;?>">
<meta name="DESCRIPTION" content="<?php echo $description ;?>">
<title><?php echo $title ;?></title>
<link href="css/text.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!--<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />-->
<style type="text/css">
<!--
.boxW {
	width: 250px;
}
.style1 {color: #FF0000}
-->
</style>
</head>
<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><?php include_once("headmenu.php"); ?></td>
  </tr>

  
   <tr>
     <td align="center"><img src="images/banner/Contact.jpg" /></td>
   </tr>
   
   <tr>
     <td align="center">
     
     
     <table width="1169" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="Topic">Contact us</td>
  </tr>
  <tr>
    <td style="padding:20px 0px;">
    
    
    <table width="1169" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="padding:0px 20px;">

<div><script language="JavaScript" type="text/javascript">
<!-- Begin
function checkFields2() {
missinginfo = "";
if (document.ff.name.value == "") {
missinginfo += "\n - * ชื่อ";
}
if ((document.ff.mail.value == "") || 
(document.ff.mail.value.indexOf('@') == -1) || 
(document.ff.mail.value.indexOf('.') == -1)) {
missinginfo += "\n - * อีเมล์";
}
if (document.ff.comp.value == "") {
missinginfo += "\n - * บริษัท";
}
if (document.ff.tel.value == "") {
missinginfo += "\n - * เบอร์โทร";
}
if (document.ff.msg.value == "") {
missinginfo += "\n - * ข้อความ";
}
if (missinginfo != "") {
missinginfo ="_____________________________\n" +
"ท่านกรอกข้อมูลไม่ถูกต้องในช่องต่อไปนี้ :\n" +
missinginfo + "\n_____________________________" +
"\nกรุณากลับไปกรอกอีกครั้ง ";
alert(missinginfo);
return false;
}
else return true;
}
// End -->
                  </script>
                  <form id="ff" name="ff" method="post" action="send_contact.php" onSubmit="return checkFields2();">
                    <table width="90%" border="0" align="center" cellpadding="5" cellspacing="3" class="txtPinkD13">
              
                      
                      <tr>
                        <td colspan="3" align="left" valign="top" bgcolor="#97d9ee" style="font-size:16px;"><strong>Contact GSK</strong></td>
                        </tr>
                      <tr>
                        <td width="95" align="left" valign="top"><?=($_SESSION['lang']=='th')?"ชื่อ ":"Name";?>
                          <span class="style1">*</span></td>
                        <td width="2" align="left" valign="top">&nbsp;</td>
                        <td width="271" align="left" valign="top"><input name="name" type="text" class="boxW" id="name" size="30" /></td>
                      </tr>
                      
                      <tr>
                        <td align="left" valign="top"><?=($_SESSION['lang']=='th')?"อีเมล์ ":"E-Mail";?>
                          <span class="style1">*</span></td>
                        <td align="left" valign="top">&nbsp;</td>
                        <td align="left" valign="top"><input name="mail" type="text" class="boxW" id="mail" size="30" /></td>
                      </tr>
                      
                       <tr>
                        <td width="95" align="left" valign="top"><?=($_SESSION['lang']=='th')?"ชื่อบริษัท ":"Company Name";?>
                          <span class="style1">*</span></td>
                        <td width="2" align="left" valign="top">&nbsp;</td>
                        <td width="271" align="left" valign="top"><input name="comp" type="text" class="boxW" id="comp" size="30" /></td>
                      </tr>
                    
                      <tr>
                        <td align="left" valign="top"><?=($_SESSION['lang']=='th')?"เบอร์โทร ":"Phone No.";?>
                          <span class="style1">*</span></td>
                        <td align="left" valign="top">&nbsp;</td>
                        <td align="left" valign="top"><input name="tel" type="text" class="boxW" id="tel" size="30" /></td>
                      </tr>
                   
                      
                     
                      <tr>
                        <td align="left" valign="top"><?=($_SESSION['lang']=='th')?"ข้อความ ":"Comments";?></td>
                        <td align="left" valign="top">&nbsp;</td>
                        <td align="left" valign="top"><textarea name="msg" cols="30" rows="5" class="boxW" id="msg"></textarea></td>
                      </tr>
                    
                      <tr>
                        <td align="left" valign="top"><?=($_SESSION['lang']=='th')?"ป้องกันสแปมเมล์ ":"Anit-Spam mail";?></td>
                        <td align="left" valign="top">&nbsp;</td>
                        <td align="left" valign="top"><input name="antispamcode" type="text" id="antispamcode" size="6" maxlength="6" class="form" style="width:100px;" />
                          <img src="antispam.php" /></td>
                      </tr>
                      
                      <tr>
                        <td colspan="3" align="left" valign="top">Notes  :  Please note that you are required to fill in the fields marked with an asterisk (<span class="style1">*</span>).</td>
                      </tr>
                      <tr>
                        <td colspan="3" align="center" valign="top"><input name="Submit" type="submit" class=" itineraryTour send" id="Submit" value="Send" /></td>
                        </tr>
                    </table>
                  </form></div>


    </td>
  </tr>

</table>

    
    
    
    </td>
  </tr>
</table>

     
     
     </td>
   </tr>

   <tr>
     <td align="center"><?php include_once("footer.php"); ?></td>
  </tr>
</table>






<!--
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="images/Branch.jpg" /></td>
  </tr>
</table>-->



</body>






