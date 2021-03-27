<?php 
session_start();
include_once('includes/connect.php');
include_once('includes/pejfunction.php');

$getmid=isset($_GET['mid'])? $_GET['mid']:$_POST['mid'];

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
.style2 {font-weight: bold}
-->
</style>
</head>
<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><?php include_once("headmenu.php"); ?></td>
  </tr>

  
   <tr>
     <td align="center"><img src="images/banner/Branch_S.jpg" /></td>
   </tr>
   
   <tr>
     <td align="center">
     
     
     <table width="1169" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="Topic">Branch Offices</td>
  </tr>
  
   <tr>
    <td style="padding:10px 20px;">
    
    <?
    $sqlC=mysql_query("select m_id,m_country,m_flag from m_branch  ");
while ($cc=mysql_fetch_array($sqlC)){
	 $m_id=$cc['m_id'];
	 $catename=$cc['m_country'];
	 $fl=(!empty($cc['m_flag']))?"<img src='upload/flag/".$cc['m_flag']."' style='border:1px solid #d7d7d7; width:35px;' border='0' />":"";
	 echo "<li style='float:left; list-style:none; margin-right:10px;'><a href='?mid=$m_id'>$fl</a></li>";
	}
	?>
    
    </td>
  </tr>
  <tr>
    <td style="padding:20px 0px;">
    
    
    <table width="1169" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
<?
if(!empty($getmid)){
	$sqlM=mysql_query("select m_id,m_country,m_name,m_map,m_mail,m_flag,m_pic,m_sorter,
	m_b1,m_b2,m_b3,m_b4,m_b5,m_b6,m_b7,m_b8,m_b9,m_b10,m_f1,m_f2,m_f3,m_f4,m_f5,m_f6,m_f7,m_f8,m_f9,m_f10
	 from m_branch"
	." where m_id=".$getmid 
	)or die(mysql_error());
	
	if(mysql_num_rows($sqlM)>0){
		list($m_id,$m_country,$m_name,$m_map,$m_mail,$m_flag,$m_pic,$m_sorter,
		$m_b1,$m_b2,$m_b3,$m_b4,$m_b5,$m_b6,$m_b7,$m_b8,$m_b9,$m_b10,$m_f1,$m_f2,$m_f3,$m_f4,$m_f5,$m_f6,$m_f7,$m_f8,$m_f9,$m_f10
		)=mysql_fetch_array($sqlM);
	}
	
	
	 $pic=(!empty($m_pic))?"<img src='upload/pic/".$m_pic."' style='border:1px solid #d7d7d7;' height='250' border='0' />":"";
}
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="3" align="left" style="padding:10px 20px; font-size:18px;">
          <strong><?=$m_name;?></strong>
        </td>
        </tr>
      <tr>
        <td width="25%" align="center" bgcolor="#97d9ee">          <strong><?=$m_country;?></strong>        </td>
        <td width="5%" bgcolor="#97D9EE"><?=$pic;?></td>
        <td width="75%" align="center" bgcolor="#ddf2fd" valign="top" style="padding:10px 0px;">
        
        
        <table width="95%" border="0" cellspacing="0" cellpadding="0">
          <? if(!empty($m_f1) && !empty($m_b1)){ ?>
          <tr>
            <td width="30%" align="left" style="border-bottom:1px #CCCCCC solid;"><strong><?=$m_f1;?></strong></td>
            <td width="70%" align="left" style="border-bottom:1px #CCCCCC solid;"><?=$m_b1;?></td>
          </tr>
          <? } else{}  if(!empty($m_f2) && !empty($m_b2)){ ?>
          <tr>
            <td width="30%" align="left" style="border-bottom:1px #CCCCCC solid;"><strong><?=$m_f2;?></strong></td>
            <td width="70%" align="left" style="border-bottom:1px #CCCCCC solid;"><?=$m_b2;?></td>
          </tr>
          <? } else{}  if(!empty($m_f3) && !empty($m_b3)){ ?>
          <tr>
            <td width="30%" align="left" style="border-bottom:1px #CCCCCC solid;"><strong><?=$m_f3;?></strong></td>
            <td width="70%" align="left" style="border-bottom:1px #CCCCCC solid;"><?=$m_b3;?></td>
          </tr>
          <? } else{}  if(!empty($m_f4) && !empty($m_b4)){ ?>
          <tr>
            <td width="30%" align="left" style="border-bottom:1px #CCCCCC solid;"><strong><?=$m_f4;?></strong></td>
            <td width="70%" align="left" style="border-bottom:1px #CCCCCC solid;"><?=$m_b4;?></td>
          </tr>
          <? } else{}  if(!empty($m_f5) && !empty($m_b5)){ ?>
          <tr>
            <td width="30%" align="left" style="border-bottom:1px #CCCCCC solid;"><strong><?=$m_f5;?></strong></td>
            <td width="70%" align="left" style="border-bottom:1px #CCCCCC solid;"><?=$m_b5;?></td>
          </tr>
          <? } else{}  if(!empty($m_f6) && !empty($m_b6)){ ?>
          <tr>
            <td width="30%" align="left" style="border-bottom:1px #CCCCCC solid;"><strong><?=$m_f6;?></strong></td>
            <td width="70%" align="left" style="border-bottom:1px #CCCCCC solid;"><?=$m_b6;?></td>
          </tr>
          <? } else{}  if(!empty($m_f7) && !empty($m_b7)){ ?>
          <tr>
            <td width="30%" align="left" style="border-bottom:1px #CCCCCC solid;"><strong><?=$m_f7;?></strong></td>
            <td width="70%" align="left" style="border-bottom:1px #CCCCCC solid;"><?=$m_b7;?></td>
          </tr>
          <? } else{}  if(!empty($m_f8) && !empty($m_b8)){ ?>
          <tr>
            <td width="30%" align="left" style="border-bottom:1px #CCCCCC solid;"><strong><?=$m_f8;?></strong></td>
            <td width="70%" align="left" style="border-bottom:1px #CCCCCC solid;"><?=$m_b8;?></td>
          </tr>
          <? } else{}  if(!empty($m_f9) && !empty($m_b9)){ ?>
          <tr>
            <td width="30%" align="left" style="border-bottom:1px #CCCCCC solid;"><strong><?=$m_f9;?></strong></td>
            <td width="70%" align="left" style="border-bottom:1px #CCCCCC solid;"><?=$m_b9;?></td>
          </tr>
          <? } else{}  if(!empty($m_f10) && !empty($m_b10)){ ?>
          <tr>
            <td width="30%" align="left" style="border-bottom:1px #CCCCCC solid;"><strong><?=$m_f10;?></strong></td>
            <td width="70%" align="left" style="border-bottom:1px #CCCCCC solid;"><?=$m_b10;?></td>
          </tr>
          <? } else{}  if(!empty($m_mail)){ ?>
          <tr>
            <td colspan="2" align="left" style="border-bottom:0px #CCCCCC solid;">
            <!--<strong><a href ="<?=$m_mail;?>" style="color:#060a27; text-decoration:none;"><i class="fa fa-envelope fa-1x"></i> Send E-mail</a></strong>-->
            
             <strong><a href ="mailto:info@gsk.com.sg" style="color:#060a27; text-decoration:none;"><i class="fa fa-envelope fa-1x"></i> Send E-mail<!-- : info@gsk.com.sg--></a></strong>
            
            </td>
            </tr>
          
          <? } else {} ?>
        </table>        </td>
      </tr>
    </table></td>
  </tr>
 
  <tr>
    <td>&nbsp;</td>
  </tr>
 
  <tr>
    <td>
    <? $m_map2=str_replace("&#34;"," \" ",$m_map); ?>
<?=(!empty($m_map2))?$m_map2:"";?>    </td>
  </tr>
   <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
    
    
    
    <div>
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
    
    
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
               <tr>
                <td align="left" valign="top">
				
				
				<? 

echo"<table cellspacing='0' border='0' align='left' style='margin:0px 0px;' >
<tr valign='top' align='left' >";
$a=0;




if(!empty($getmid)){
	$sqlS=mysql_query("select s_id,s_country,s_map,s_mail,s_flag,s_pic,s_sorter,main_id,
	s_b1,s_b2,s_b3,s_b4,s_b5,s_b6,s_b7,s_b8,s_b9,s_b10,s_f1,s_f2,s_f3,s_f4,s_f5,s_f6,s_f7,s_f8,s_f9,s_f10
	 from s_branch"
	." where main_id=".$m_id 
	)or die(mysql_error());
	
	
		while (list($s_id,$s_country,$s_map,$s_mail,$s_flag,$s_pic,$s_sorter,$main_id,
		$s_b1,$s_b2,$s_b3,$s_b4,$s_b5,$s_b6,$s_b7,$s_b8,$s_b9,$s_b10,$s_f1,$s_f2,$s_f3,$s_f4,$s_f5,$s_f6,$s_f7,$s_f8,$s_f9,$s_f10
		)=mysql_fetch_array($sqlS)){

	



	


	if(($a % 2) == 0 && $a != 0) echo "</tr><tr>";
	echo "<td valign='top' align='left'  style=' border-bottom:#CCCCCC 0px solid ;'>";


	

	
?>
			<table width="584" border="0" cellspacing="2" cellpadding="0" style="margin-right:0px; margin-bottom:20px;">
<tr>
            <td colspan="2" bgcolor="#97D9EE" style="border-bottom:1px #CCCCCC solid; padding-left:5px; font-size:16px;"><strong><?=$s_country;?></strong></td>
            </tr>
           <? if(!empty($s_map)){ ?>
           <tr>
            <td height="10" colspan="2" style="border-bottom:0px #CCCCCC solid;"></td>
            </tr>
           
          <tr>
            <td colspan="2" style="border-bottom:0px #CCCCCC solid;">
           
           <? $s_map2=str_replace("&#34;"," \" ",$s_map); ?>
<?=(!empty($s_map2))?$s_map2:"";?>           </td>
            </tr> 
              <tr>
            <td height="10" colspan="2" style="border-bottom:0px #CCCCCC solid;"></td>
            </tr>
            
          <? } else{} if(!empty($s_f1) && !empty($s_b1)){ ?>
          <tr>
            <td width="40%" style="border-bottom:1px #CCCCCC solid;"><strong><?=$s_f1;?></strong></td>
            <td width="60%" style="border-bottom:1px #CCCCCC solid;"><?=$s_b1;?></td>
          </tr>
          <? } else{}  if(!empty($s_f2) && !empty($s_b2)){ ?>
          <tr>
            <td width="40%" style="border-bottom:1px #CCCCCC solid;"><strong><?=$s_f2;?></strong></td>
            <td width="60%" style="border-bottom:1px #CCCCCC solid;"><?=$s_b2;?></td>
          </tr>
          <? } else{}  if(!empty($s_f3) && !empty($s_b3)){ ?>
          <tr>
            <td width="40%" style="border-bottom:1px #CCCCCC solid;"><strong><?=$s_f3;?></strong></td>
            <td width="60%" style="border-bottom:1px #CCCCCC solid;"><?=$s_b3;?></td>
          </tr>
          <? } else{}  if(!empty($s_f4) && !empty($s_b4)){ ?>
          <tr>
            <td width="40%" style="border-bottom:1px #CCCCCC solid;"><strong><?=$s_f4;?></strong></td>
            <td width="60%" style="border-bottom:1px #CCCCCC solid;"><?=$s_b4;?></td>
          </tr>
          <? } else{}  if(!empty($s_f5) && !empty($s_b5)){ ?>
          <tr>
            <td width="40%" style="border-bottom:1px #CCCCCC solid;"><strong><?=$s_f5;?></strong></td>
            <td width="60%" style="border-bottom:1px #CCCCCC solid;"><?=$s_b5;?></td>
          </tr>
          <? } else{}  if(!empty($s_f6) && !empty($s_b6)){ ?>
          <tr>
            <td width="40%" style="border-bottom:1px #CCCCCC solid;"><strong><?=$s_f6;?></strong></td>
            <td width="60%" style="border-bottom:1px #CCCCCC solid;"><?=$s_b6;?></td>
          </tr>
          <? } else{}  if(!empty($s_f7) && !empty($s_b7)){ ?>
          <tr>
            <td width="40%" style="border-bottom:1px #CCCCCC solid;"><strong><?=$s_f7;?></strong></td>
            <td width="60%" style="border-bottom:1px #CCCCCC solid;"><?=$s_b7;?></td>
          </tr>
          <? } else{}  if(!empty($s_f8) && !empty($s_b8)){ ?>
          <tr>
            <td width="40%" style="border-bottom:1px #CCCCCC solid;"><strong><?=$s_f8;?></strong></td>
            <td width="60%" style="border-bottom:1px #CCCCCC solid;"><?=$s_b8;?></td>
          </tr>
          <? } else{}  if(!empty($s_f9) && !empty($s_b9)){ ?>
          <tr>
            <td width="40%" style="border-bottom:1px #CCCCCC solid;"><strong><?=$s_f9;?></strong></td>
            <td width="60%" style="border-bottom:1px #CCCCCC solid;"><?=$s_b9;?></td>
          </tr>
          <? } else{}  if(!empty($s_f10) && !empty($s_b10)){ ?>
          <tr>
            <td width="40%" style="border-bottom:1px #CCCCCC solid;"><strong><?=$s_f10;?></strong></td>
            <td width="60%" style="border-bottom:1px #CCCCCC solid;"><?=$s_b10;?></td>
          </tr>
          <? } else{}  if(!empty($s_mail)){ ?>
          <tr>
            <td colspan="2" style="border-bottom:0px #CCCCCC solid;">
            <strong><a href ="<?=$s_mail;?>" style="color:#060a27; text-decoration:none;"><i class="fa fa-envelope fa-1x"></i> Send E-mail</a></strong></td>
            </tr>
            
            
          
          <? } else {} ?>
        </table>
				<?
	echo "</td>";
	$a++;
} }
echo"</tr></table>";
?></td>
              </tr>
              
              
          </table>
    
    </td>
  </tr>
</table>
          
</div>
    
    
    </td>
  </tr>

  
    <tr>
    <td>&nbsp;    </td>
  </tr>
  
    <tr>
    <td>
    
<!----------------  Start ----------------->    

<?
if(!empty($getmid)){
	$sqlEM=mysql_query("select id,titleTh,main_id from news where main_id='$getmid' order by sortder asc , id asc ") ;

	while ($em=mysql_fetch_array($sqlEM)){
	
	$titleTh=$em['titleTh'];
	$gid=$em['id'];
	
	// $pic=(!empty($m_pic))?"<img src='upload/pic/".$m_pic."' style='border:1px solid #d7d7d7; heigth:100px;' border='0' />":"";

?>


  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="font-weight:bold; height:35px; padding:0px 20px; background:#d8d7d5; border:0px #C7C7C7 solid;-moz-border-radius: 5px;-webkit-border-radius:5px; "><?=$titleTh;?></td>
  </tr>
  <tr>
    <td style="padding:10px 20px;">
    
    
    
    
    <div><!--สคริปGallery-->
                        <script type="text/javascript" src="lightbox/jquery-1.7.1.min.js"></script>
                        <script type="text/javascript" src="lightbox/jquery.lightbox-0.5.js"></script>
                        <link rel="stylesheet" type="text/css" href="lightbox/jquery.lightbox-0.5.css" media="screen" />
                        <script type="text/javascript">

    $(function() {

        $('#igallery a').lightBox();

    });

                  </script>
                        <!--สคริปGallery  End-->
                        <? 
					


echo"<table  cellspacing='0' border='0' align='left' >
<tr valign='top'>";
$a=0;
$sql="select * from gallery_news where promotion_id='$gid' order by sorter asc , id asc  ";
$q=mysql_query($sql);
//$res=mysql_query($q);
While($row=@mysql_fetch_array($q))
{

	 
			//	$topic=$row['p_name'];
	$emname=$row['em_name'];
	$emposition=$row['em_position'];			
			
				$p0=$row['picname'];
				//echo "+++++++++++++++++";
	$pic=(!empty($p0))?"$p0":"";	
//	$line=$row['line'];		
	
	if(($a % 5) == 0 && $a != 0) echo "</tr><tr valign='top' >";
	echo "<td valign='top'>";
	
	
	
?>
                        <table width="100%" border="0" cellpadding="0" cellspacing="2" style="margin:20px 0px 0 0px;">
                          <tr valign="top">
                            <td width="0"  height="0" align="center" valign="top"><div align="center" style="float:center; margin-top:0;" id="igallery">
                                <table width="200"  border="0" cellpadding="0" cellspacing="5" align="center" style="margin:auto 5px;">
                                  <tr valign="top">
                                    <td align="center" valign="top" style="padding:auto 10px;">
                                    
                    <!-- <a href="gengEM.php?filedir=login/news/gallery/<?=$pic;?>" rel="lightbox[roadtrip]" >-->
                     <img src="login/news/gallery/<?=$pic;?>" style="border:#CCCCCC 0px solid; width:120px; height:170px;" />
                    <!-- </a> -->  
                                     
                                    <center>
                                    <div style="width:200px; margin-top:20px;">
									<strong><?=$emname;?><br />
									<?=$emposition;?><br /></strong>
                                    </div>
                                    </center> 
                                                                      </td>
                                  </tr>
                                </table>
                            </div></td>
                          </tr>
                        </table>
                      <?
	echo "</td>";
	$a++;
}
echo"</tr></table>";
?>                    </div>    </td>
  </tr>
</table>

<? } }?>
<!----------------  End ----------------->    </td>
  </tr>
</table>


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













