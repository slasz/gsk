<?php 
session_start();
include_once('includes/connect.php');
include_once('includes/pejfunction.php');
/*$page="home";*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
         <td><table width="100%" height="400" border="0" cellpadding="0" cellspacing="0" bgcolor="#00CCCC" class="BoxCurve1">
           <tr>
             <td class="TopicBox"><a href="youtube.php" class="TopicBox">YOUTUBE</a></td>
           </tr>
           <tr>
             <td align="left" valign="top">
             
               <link rel="stylesheet" href="colorbox/colorbox.css" />
	
		<script src="colorbox/jquery.colorbox.js"></script>
		<script>
			$(document).ready(function(){
				//Examples of how to assign the Colorbox event to elements
				$(".group1").colorbox({rel:'group1'});
				$(".group2").colorbox({rel:'group2', transition:"fade"});
				$(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
				$(".group4").colorbox({rel:'group4', slideshow:true});
				$(".ajax").colorbox();
				$(".youtube").colorbox({iframe:true, innerWidth:800, innerHeight:600});
				$(".vimeo").colorbox({iframe:true, innerWidth:500, innerHeight:409});
				$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
				$(".inline").colorbox({inline:true, width:"50%"});
				$(".callbacks").colorbox({
					onOpen:function(){ alert('onOpen: colorbox is about to open'); },
					onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
					onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
					onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
					onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
				});

				$('.non-retina').colorbox({rel:'group5', transition:'none'})
				$('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});
				
				//Example of preserving a JavaScript event for inline calls.
				$("#click").click(function(){ 
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
			});
		</script>
             
             
             
             <?
             $sqltxt="select id,clips,nameclip from clipvdo where id>0 and showindex='y'";



$sql=mysql_query($sqltxt)or die(mysql_error());


list($clipid,$clipname,$nameclip)=mysql_fetch_array($sql);
	
	
	$cname=substr($clipname,33,11);
			 ?>
             
             <p><a href="http://www.youtube.com/embed/<?=$cname;?>?rel=1" class="youtube">
             <img src="https://img.youtube.com/vi/<?=$cname;?>/0.jpg" style="width:100%;">
             <!--<img src="images/home_09.jpg" width="100%" border="0" />-->
             </a></p>
             
           
         
             
               <p><?=$nameclip;?></p>
               <!--<<p>&nbsp;</p>
               <p><br /></p>-->
               </td>
           </tr>
           <tr>
             <td align="center" valign="middle"><a href="youtube.php"><img src="images/icon/more.png" width="131" height="30" border="0" /></a></td>
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



