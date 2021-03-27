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

<div>

<?

$name=$_POST['name'];
$comp=$_POST['comp'];
$tel=$_POST['tel'];
$mail=$_POST['mail'];
$msg=$_POST['msg'];


  
 @session_start(); // start session if not started yet
if ($_SESSION['AntiSpamImage'] != $_REQUEST['antispamcode'])
{
	$spamN="<center><h3>รหัสป้องกัน Spam ไม่ถูกต้อง</h3> <br>";
	echo $spamN."<a href=javascript:history.back(1)>:: คลิกที่นี่เพื่อกลับไปแก้ไขข้อมูล :: </a>";
	//exit();
}

else
{
	//echo '<center>รหัสป้องกัน Spam ถูกต้องแล้วครับ</center>';
	$_SESSION['AntiSpamImage'] = rand(1,9999999);
	require_once "Mail.php";
	
	$host = "ssl://smtp.gmail.com";   
	$username = "fon@monocreative.co.th";
	$password = "Mono1112";
	$port = "465";
	
	
	/*$host = "ssl://webmail.gsk.com.sg";   
	$username = "info@gsk.com.sg";
	$password = "8u8QBU@p$";
	$port = "25";*/
	
	
	$email=$username;  

		$to = $email  ;
		$from = "Support $title  <$username>";   
		$subject ="ขณะนี้มีข้อความติดต่อ จาก $title";

		 $headers["From"] = $from; // email ??????
		$headers["Sender"] = $from; // email ??????
		$headers["ReplyTo"] = $from;
		$headers["To"] = $to; // email ??????
		$headers["Subject"] = $subject; // ?????????
		$headers["Content-Type"] = "text/html; charset=utf-8";
		

		
		// include_once("confirm_body.php");
			$bodys.="


<b>Name :</b> $name<br>
<b>Email :</b> $mail<br>
<b>Company Name :</b> $comp<br>
<b>Phone No. :</b> $tel<br>

<b>Comments  :</b> $msg<br>";
		
		
		$body = $bodys;
	  
		$smtp = Mail::factory('smtp', array ('host' => $host, 'port' => $port , 'auth' => true, 'username' => $username, 'password' => $password)); 
		$mail = $smtp->send($to, $headers, $body); 
		if (PEAR::isError($mail)){
				$responseMail = "<h3>ระบบขัดข้องไม่สามารถส่งข้อความได้<br>Error System, Can not send messages</h3><script>setTimeout(\"location='contact.php'\",2000);</script> "; 
			}else{
				$responseMail="<h3>ระบบได้ทำการส่งข้อความเรียบร้อยแล้ว<br>Send a message Successfully</h3><script>setTimeout(\"location='contact.php'\",2000);</script> ";
		 } 
	echo (isset($responseMail))? $responseMail:"";//"<script>alert('".$responseMail."');<//script>":"";
	

	
} 
?>
</div>


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






