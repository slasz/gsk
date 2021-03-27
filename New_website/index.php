<?php 
session_start();
include_once('includes/connect.php');
include_once('includes/pejfunction.php');
/*$page="home";*/
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
     <td align="center"><?php include_once("slide.php"); ?></td>
   </tr>
   <tr>
     <td align="center">&nbsp;</td>
   </tr>
   <tr>
     <td >
     
     <table width="1169" border="0" align="center" cellpadding="0" cellspacing="0">
       <tr align="center" valign="top">
         <td><table width="100%" height="400" border="0" cellpadding="0" cellspacing="0" bgcolor="#00CCCC" class="BoxCurve1">
           <tr>
             <td class="TopicBox">ELECTRONICS DIVISION</td>
           </tr>
           <tr>
             <td align="left" valign="top"><p><a href="page.php?id=Electronics"><img src="images/home_03.jpg" width="100%" border="0" /></a></p>
               <p>Proud to be appointed as the authorized distributor of global leaders in 
                component manufacturing <br />
                <br />
               </p></td>
           </tr>
           <tr>
             <td align="center" valign="middle"><a href="page.php?id=Electronics"><img src="images/icon/more.png" width="131" height="30" border="0" /></a></td>
           </tr>
         </table></td>
         <td width="10">&nbsp;</td>
         <td><table width="100%" height="400" border="0" cellpadding="0" cellspacing="0" bgcolor="#00CCCC" class="BoxCurve1">
           <tr>
             <td class="TopicBox">IPO DIVISION</td>
           </tr>
           <tr>
             <td align="left" valign="top"><p><a href="page.php?id=IPO"><img src="images/home_05.jpg" width="100%" border="0" /></a></p>
               <p>IPO Division is dedicated to provide customers with efficient component outsourcing, thought an extensive network of Manufacturers and Suppliers. </p></td>
           </tr>
           <tr>
             <td align="center" valign="middle"><a href="page.php?id=IPO"><img src="images/icon/more.png" width="131" height="30" border="0" /></a></td>
           </tr>
         </table></td>
         <td width="10">&nbsp;</td>
         <td><table width="100%" height="400" border="0" cellpadding="0" cellspacing="0" bgcolor="#00CCCC" class="BoxCurve2">
           <tr>
             <td class="TopicBox">NEWS UPDATE</td>
           </tr>
           <tr>
             <td align="center" valign="top"><p><img src="images/home_07.jpg" width="100%" /></p>
               <table width="95%" border="0" cellspacing="0" cellpadding="0">
 
 <?
 $sqlN=mysql_query("select * from promotion where status='n' and showindex='y' limit 3 ");
 while($rN=mysql_fetch_array($sqlN))
 {
 $dd=$rN['n_date']."-".$rN['n_month']."-".$rN['n_year'];
 
	$id=$rN['proid'];
	$topicTh=$rN['topicTh'];
	$detailTh=$rN['detailTh'];
	$y=$rN['n_year'];

 ?>
  <tr>
    <td  style="border-bottom:1px #FFFFFF dashed; padding:3px 0px;">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                 <tr>
                   <td width="80" align="left" valign="top"><strong><?=$dd;?></strong></td>
                   <td align="left" valign="top"><a href="news.php?year=<?=$y;?>&id=<?=$id?>" style="text-decoration:none; color:#060a27;"><?=strip_tags($topicTh);?></a></td>
                 </tr>
               </table>
    
    </td>
  </tr>
  <? } ?>
  
  
  
</table><br />


                </td>
           </tr>
           <tr class="BoxCurve2">
             <td align="center" valign="middle"><a href="news.php"><img src="images/icon/more.png" width="131" height="30" border="0" /></a></td>
           </tr>
         </table></td>
         <td width="10">&nbsp;</td>
         <td><table width="100%" height="400" border="0" cellpadding="0" cellspacing="0" bgcolor="#00CCCC" class="BoxCurve2">
           <tr>
             <td class="TopicBox">AUTHORIZE DISTRIBUTOR LIST</td>
           </tr>
           <tr>
             <td  valign="top">
             <p>
             <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" align="left">
               <tr>
                 <td >
                 <ul style="list-style:none; margin-left:-30px; " class="Home1">
  <li  style="text-align:left; padding-left:80px;"><img src="images/icon/list3.png" />&nbsp;&nbsp;Essentra</li>
  <li  style="text-align:left; padding-left:80px;"><img src="images/icon/list3.png" />&nbsp;&nbsp;Fujitsu</li>
  <li  style="text-align:left; padding-left:80px;"><img src="images/icon/list3.png" />&nbsp;&nbsp;Honeywell</li>
   <li  style="text-align:left; padding-left:80px;"><img src="images/icon/list3.png" />&nbsp;&nbsp;JST</li>
   <li  style="text-align:left; padding-left:80px;"><img src="images/icon/list3.png" />&nbsp;&nbsp;Knitter-switch</li>
   <li  style="text-align:left; padding-left:80px;"><img src="images/icon/list3.png" />&nbsp;&nbsp;Littelfuse</li>
   <li  style="text-align:left; padding-left:80px;"><img src="images/icon/list3.png" />&nbsp;&nbsp;Schurter</li>
   <li  style="text-align:left; padding-left:80px;"><img src="images/icon/list3.png" />&nbsp;&nbsp;Taiyo Yuden</li>
   <li  style="text-align:left; padding-left:80px;"><img src="images/icon/list3.png" />&nbsp;&nbsp;Thinking</li>
   <li  style="text-align:left; padding-left:80px;"><img src="images/icon/list3.png" />&nbsp;&nbsp;Yageo<br>
  </li>
</ul></td>
               </tr>
             </table>  
             </p>
                    </td>
           </tr>
         
         </table></td>
       </tr>
     </table>
     
     </td>
   </tr>
   <tr>
     <td align="center"><?php include_once("footer.php"); ?></td>
  </tr>
</table>

</body>



