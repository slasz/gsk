<link rel="stylesheet" type="text/css" href="dropdown/pro_dropdown_2.css" />

<table width="90%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td align="left">
    
    
    
    
    
    
    
    


<span class="preload1"></span>
<span class="preload2"></span>

<?

$getT=$_GET['typeid'];
$getC=$_GET['catid'];
$getS=$_GET['subid'];


?>


<ul id="nav" class="preload1">
	<li class="top"><a href="index.php" id="index.php" class="top_link"><span>HOME</span></a></li>
    
<li class="top">|</li>    
    
	<li class="top"><a href="javascript:" id="about" class="top_link"><span>COMPANY PROFILE</span></a>
	<ul class="sub preload2">
	<li><a href="page.php?id=Greeting" >GREETING FROM PRESIDENT</a></li>
    <li><a href="page.php?id=Milestone" >MILESTONE</a></li>
	<li><a href="page.php?id=Sales">SALES TURNOVER</a></li>
    <li><a href="news.php">NEWS</a></li>
	</ul></li>
    
<li class="top">|</li>
    
	<li class="top"><a href="page.php?id=Electronics" id="surgery" class="top_link"><span class="down">ELECTRONICS DIVISION</span></a></li>
		
<li class="top">|</li>        
    
    <li class="top"><a href="page.php?id=IPO" id="promotion" class="top_link"><span class="down">IPO DIVISION</span></a></li>

<li class="top">|</li>    
    
	<li class="top"><a href="page.php?id=Branch" id="activities" class="top_link"><span class="down">BRANCH OFFICES</span></a>
<ul class="sub preload2">

<?
    $sqlC=mysql_query("select m_id,m_country,m_flag from m_branch  ");
while ($cc=mysql_fetch_array($sqlC)){
	 $m_id=$cc['m_id'];
	 $catename=$cc['m_country'];
	?>
	<li><a href="branch.php?mid=<?=$m_id;?>" ><?=$catename;?></a></li>
    <? } ?>
	</ul>
	</li>
	

<li class="top">|</li>

	<li class="top"><a href="contact.php" id="contact" class="top_link"><span class="down">CONTACT US</span></a></li>
    
    
    
    </li>
    </li>
    </ul>
    
    

    
    
    
    </td>
  </tr>
</table>
