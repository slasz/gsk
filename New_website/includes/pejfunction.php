<?php 
function catename($cc) {
switch ($cc) {
case 1;
echo "LIVING";
break;
case 2;
echo "RUNNING BUSINESS";
break;
case 3;
echo "SERVICES";
break;
case 4;
echo "HELP";
break;
case 5;
echo "INFORMATION FROM THAILAND";
break;
}
}


function delete_dbN($id_array,$tbl,$path){
	foreach ($id_array as $ind=>$id)  
	  {
		//echo " Delete ID  = ".$id."<br>";
			$sql="select *  from $tbl where id=$id  "; 
			$result=mysql_query($sql);
			$row=mysql_fetch_array($result);
			$p[]=$row['picture'];
			$f[]=$row['filedownload'];
			
		
		}
	////////////////////////////////	
	for ($i=0;$i<count($id_array);$i++ ){
			$id = $id_array[$i];
			$datas.=($i==0)? "'$id'":",'$id'"; 
		
		$sql2="select *  from gallery_news where promotion_id = '$id'  "; 
			$result2=mysql_query($sql2);
			while ($row2=mysql_fetch_array($result2)) {
			$p0=$row2['picname'];
			
			
			@unlink ("news/gallery/$p0");  
			
		//echo $p0;
			
		}
			//	exit();
			
			if(mysql_query("delete from gallery_news where promotion_id in(".$datas.")")){
		
			
	}
			
	/*		
	echo $p0;
			exit();*/
		}
	////////////////////////////////	
	if(mysql_query("delete from $tbl where id in(".$datas.")")){
			foreach ($p as $ind=>$p0){
			//echo "<br/>$p0 => ".$f[$ind];
				@unlink ("$path/$p0");
				@unlink ("$path/thumb_".$p0);
				@unlink ("$path/".$f[$ind]);
	}
			 return true;
	}else{
			return false;
	}
	
}


function delete_db($id_array,$tbl,$path){
	foreach ($id_array as $ind=>$id)  
	  {
		//echo " Delete ID  = ".$id."<br>";
			$sql="select *  from $tbl where id=$id  "; 
			$result=mysql_query($sql);
			$row=mysql_fetch_array($result);
			$p[]=$row['picture'];
			$f[]=$row['filedownload'];
		}
	////////////////////////////////	
	for ($i=0;$i<count($id_array);$i++ ){
			$id = $id_array[$i];
			$datas.=($i==0)? "'$id'":",'$id'"; 
		}
	////////////////////////////////	
	if(mysql_query("delete from $tbl where id in(".$datas.")")){
			foreach ($p as $ind=>$p0){
			//echo "<br/>$p0 => ".$f[$ind];
				@unlink ("$path/$p0");
				@unlink ("$path/thumb_".$p0);
				@unlink ("$path/".$f[$ind]);
	}
			 return true;
	}else{
			return false;
	}
	
}

function update_db_display($display_array,$tbl){
	foreach ($display_array as $ind=>$id)  
		  {
			$datas .=($ind==0)? "'$id'":",'$id'";
			}
			
				mysql_query("update $tbl set display='n'");			
			if(mysql_query("update $tbl set display='y' where id in (".$datas.")  "))
				return true;
			else
				return false;
}

function update_db_multidisplay($display_array,$itemid,$tbl){
	
	foreach ($itemid as $i=>$v)  
		  {
			$initem .=($i==0)? "$v":",$v";
			}
	mysql_query("update $tbl set display='n' where id in (".$initem.")  ");
				
	if(sizeof($display_array)>0){
			foreach ($display_array as $ind=>$id)  
			  {
				$datas .=($ind==0)? "$id":",$id";
				}
				
				if(mysql_query("update $tbl set display='y' where id in (".$datas.")  "))
				return true;
				else
				return false;
	}
	
		return true;
}


function update_db_sort($sort_array,$tbl){
mysql_query("update $tbl set sortder=99999 ");		
	foreach ($sort_array as $ind=>$val)  
		  { 
		  	
			$datas ="update $tbl set sortder=".$val." where id='".$ind."' ; ";
			mysql_query($datas);
			}
			
			  	
			
				return true;
}			

function mkPage($page,$thispage,$ci){
//$thispage.="&assettype=$assettype&province=$province&assetid=$assetid";
if($page>5){


	 $fr=$page -5 ; 
	// if($fr==5) $fr=$page; 
	 $prev=$fr-1;

	 $ed=$fr+9 ;
	 if(($ed-$ci) >0) $ed= $ci; 
	 
 $epag.="<li class='mkPage'><div align='center' ><a href='$PHP_SELF?$thispage&amp;page=1' style='font-size:10px'><strong>«</strong></a></div></li>
<li class='mkPage'><div align='center'><a href='$PHP_SELF?$thispage&amp;page=$prev' style='font-size:10px'><strong>‹</strong></a></div></li>";	
 
}else{
 $fr=1;
 $ed=($ci>5)? 5:$ci;//$ci;
}


for($inxpag=$fr;$inxpag<=$ed;$inxpag++){

if($inxpag==$page) $pag_num="<div style='color:#000000;' align='center'><u>$inxpag</u></div>"; else $pag_num="<div align='center'>".$inxpag."</div>";

$epag.="<li class='mkPage' onmouseover=\"this.className='mkPage_hover';\" onmouseout=\"this.className='mkPage';\"><a href='$PHP_SELF?$thispage&amp;page=$inxpag'>$pag_num</a></li>";		
//	if($ci>5 and $inxpag==4){
//		$epag.="<li style='margin-left:2px' class='mkPage'><a href='$PHP_SELF?$thispage&amp;page=5'>...</a></li>
//		<li  class='mkPage'><a href='$PHP_SELF?$thispage&amp;page=$ci'>$ci</a></li>";
//	break;
//	}		

}
	if($ci>5  && $page != --$inxpag) {	
		$nxt=$inxpag+1;
		$epag.=($inxpag<=$ci)? "
		<li class='mkPage'><div align='center' ><a href='$PHP_SELF?$thispage&amp;page=$inxpag' style='font-size:10px'><strong>›</strong></a></div></li>
		<li class='mkPage'><div align='center' ><a href='$PHP_SELF?$thispage&amp;page=$ci' style='font-size:10px'><strong>»</strong></a></div></li>":"";
	}
	/*elseif($inxpag==$ci){ 
		$epag.="<li class='mkPage'><a href='$PHP_SELF?$thispage&amp;page=$ci'>$ci</a></li>";
	}*/

return "<ul style='list-style:none;padding:0;margin:0;'><li class='mkPage_Title'>".หน้าที่." : </li>".$epag."</ul>";
}

function showcontent($whr,$limit,$newsize){
$sqltxt="select p.id, p.itemcode, s.picture, p.titleTh, p.titleEn, ps.price, ps.discount, p.newrelease from products p"
." left join sales_pic s on p.id=s.main_id and s.picture like '%_0.%' "
." left join product_sizeprice ps on p.id=ps.itemcode"
." where ps.size='None' " ;
$sqltxt.=(!empty($whr))? " and ".$whr : "";
$sqltxt.=(!empty($limit))? " limit 0,".$limit : "";
$qry=mysql_query($sqltxt) or die(mysql_error());
if($qry && mysql_num_rows($qry)>0){
$result="<ul style='list-style:none;padding:0;margin:0 0 0 5px;'>";
	while(list($id,$itemcode,$pic,$titleTh,$titleEn,$price,$disc, $newrelease)=mysql_fetch_array($qry)){
		$title=($_SESSION['lang']=='th' && !empty($titleTh))? $titleTh : "";
		$title.=($_SESSION['lang']=='en' && !empty($titleEn))? $titleEn : "";
		//if(!empty($price) ){
			
			$price_title=(!empty($disc) && $disc>0)? 
			"<font style='text-decoration:line-through;font-size:11px'>".Title_PRICE."&nbsp;".$price."&nbsp;".Title_CURRENCY."</font>
			<br/><b style='color:red'>".Title_PRICE."&nbsp;". $disc."&nbsp;".Title_CURRENCY."</b>"
			:"<b style='color:red'>".Title_PRICE."&nbsp;".$price."&nbsp;".Title_CURRENCY."</b>";
		//}
		$iconnew=(!empty($newrelease) && $newrelease=='y')? " <img src='webboard/img/new.gif'/>":"";
		$result.=(!empty($pic))?"
		<li style='float:left;display:block;margin:5px;width:220px;border:solid 1px #dddddd; min-height:250px'>
		<center>
		<a href='product.php?id=".$id."'><img src='geng1.php?newsize=$newsize&filedir=login/product/images/".$pic."' width='$newsize' border='0' style='margin:5px' />
			<div align='left' style='margin:0 20px'>
				<strong>$itemcode</strong> $iconnew<br/>
				$title
				<br/>
				$price_title
			</div>
		</a>
		</center>
		
		<input type='button' value='หยิบใส่ตะกร้า' style='padding:2px;font-size:13px;font-weight:normal' onclick=\"Addtocart('$id',1,'$currentPrice','None','','addcart','".$_SESSION['lang']."');\"  >
		<input type='button' value='เพิ่มเติม' style='float:right;padding:2px;font-size:13px;font-weight:normal'  src='template/images/more.jpg' onclick=\"location='product.php?catid=$v_category&icat=$v_subcate&id=$id';\" style='margin:0 1px;float:right' border='0'>
		
		</li>":"";
	}
$result.="</ul>";
}
return "<div class='demo'>".$result."</div>";
}

function showNewrelease($whr,$newsize){
	$sqltxt="select p.id, s.picture, p.titleTh, p.detailTh from products p"
	." left join sales_pic s on p.id=s.main_id and s.picture like '%_0.%' ";
	$sqltxt.=(!empty($whr))? " where ".$whr : "";
	$sqltxt.=" order by rand() limit 0,1";
	$qry=mysql_query($sqltxt) or die(mysql_error());
	if($qry && mysql_num_rows($qry)>0){
	$result="<ul style='list-style:none;padding:0;margin:0 0 0 5px;'>";
	
	list($id,$pic,$title,$detail)=mysql_fetch_array($qry);
	$result.=(!empty($pic))?
	"<li style='float:left;display:block;margin:3px;'><a href='product.php?id=".$id."'><img src='geng1.php?newsize=$newsize&filedir=login/product/images/".$pic."' width='$newsize' height='$newsize' style='border:solid 1px #92B408'/></a></li>
	<li style='float:left;display:block;margin:3px;width:270px'><div><br/><br/><font class='txt2'><a href='product.php?id=".$id."' class='linkpack'>$title<br/><br/><img src='images/more.jpg' width='44' height='14' border='0'/></a></div></font></li>
	":"";
		
	$result.="</ul>";
	}
	return $result;
}

/*function subMenu($sql,$id,$field1,$field2,$field3,$sele){
$sqltxt=mysql_query($sql);
if($sqltxt && mysql_num_rows($sqltxt)>0){
$text="<ul style='padding:0 0 10px 0;margin:0;list-style:none;border-bottom:solid 0px #dddddd'>";

	while($r=mysql_fetch_array($sqltxt)){
		$title=($_SESSION['lang']=='th')?$r[$field1]:$r[$field2];
		
		$display_this=($r[$id]==$sele && !empty($sele))? "style='display:inline' " : " style='display:none' ";

		$cutUrl=explode("&",$_SESSION['QUERY_STRING']);
		if(sizeof($cutUrl)>0){
			foreach($cutUrl as $ind => $val){
				$urlpath.=($ind==0)?"":"&";
				$urlpath.=(strstr($val,"page=") || strstr($val,"start=")) ? "" : $val;
			}
		}
		
		$qryStr=$urlpath;
		
		$qryStr=(strstr($qryStr,"&icat"))?substr($qryStr,0,strpos($qryStr,"&icat")): $qryStr;
		$text.=(!empty($title))?"<li   style='height:25px; background:url(images/bgmenu.jpg);><a href='about.php?".$qryStr."&catid=".$r[$field3]."&icat=".$r[$id]."' ><img src='images/clear.gif' border='0' style='padding:0 15px'><img src='images/right_arrow.gif' width='10' $display_this> ".$title : "";
					//$text.=call_user_func("countrows","select id from products where category_id=".$r[$id]." and brand_id=".$r[$field3]);
		$text.="</a></li>";
	}
	$text.="</ul>";
}
return $text;
}*/
function subMenu($sql,$lang,$id,$field1,$field2,$field3,$sele,$sele1){
$sqltxt=mysql_query($sql)or die(mysql_error());
if($sqltxt && mysql_num_rows($sqltxt)>0){
$text="<ul style='list-style:none; padding:0; margin:0;'>";

	while($r=mysql_fetch_array($sqltxt)){
		$title=($lang=="th")? $r[$field1]: $r[$field2];
		
		$display_this=($r[$id]==$sele && !empty($sele))? "style='display:inline' " : " style='display:none' ";

		$cutUrl=explode("&",$_SESSION['QUERY_STRING']);
		if(sizeof($cutUrl)>0){
			foreach($cutUrl as $ind => $val){
				$urlpath.=($ind==0)?"":"&";
				$urlpath.=(strstr($val,"page=") || strstr($val,"start=")) ? "" : $val;
			}
		}
		
		$qryStr=$urlpath;
		
		$qryStr=(strstr($qryStr,"&icat"))?substr($qryStr,0,strpos($qryStr,"&icat")): $qryStr;
		$text.=(!empty($title))?"<li style='padding:2px 0 2px 30px;margin:0;border-bottom:solid 1px #efefef;background:#ffffff'><a href='products.php?".$qryStr."&amp;cat=".$r[$field3]."&amp;icat=".$r[$id]."&amp;".$sele1."' style='font-weight:normal'><img src='images/right_arrow.gif' border='0' width='10' $display_this>".$title : "";
					//$text.=call_user_func("countrows","select id from products where category_id=".$r[$id]." and brand_id=".$r[$field3]);
		$text.="</a></li>";
	}
	$text.="</ul>";
}
return $text;
}
function countrows($sql){
$sqltxt=mysql_query($sql);
	return " (".mysql_num_rows($sqltxt).")"; 
}

function show_Massage($sqltxt,$page,$get_id,$paged){
$result = mysql_query($sqltxt);  
$n_rows=@mysql_num_rows($result);	

		 $per_page = (strstr($_SERVER['PHP_SELF'],"index.php"))?4:6;

				  if(!$page)  
					  $page = 1;
				  $page_start = ($per_page * $page) - $per_page;
				  if($n_rows <= $per_page)   
					  $num_pages = 1;
				  elseif (($n_rows % $per_page) == 0)   
					  $num_pages = ($n_rows / $per_page);
				  else $num_pages = ($n_rows / $per_page) + 1;
				  $num_pages = (int)$num_pages;	
				  	   
//$sqltxt.=$sortTxt;
$sqltxt.=" limit $page_start,$per_page";
//echo $sqltxt;

$sql_promotion = mysql_query($sqltxt) or die(mysql_error()); 			 
if(empty($get_id)){			 
			 if($sql_promotion && mysql_num_rows($sql_promotion)>0){
			 $bodys="<ul class='ul_main'>";
			 $c=0;
			 while($r=mysql_fetch_array($sql_promotion)){
			 if($_SESSION['lang']=='th'){
			 	$titleTxt=mb_substr(strip_tags($r['titleTh']),0,25,'UTF-8');
				$detailTxt=mb_substr(strip_tags($r['detailTh']),0,100,'UTF-8');
			 }else{
			 	$titleTxt=mb_substr(strip_tags($r['titleEn']),0,25,'UTF-8');
				$detailTxt=mb_substr(strip_tags($r['detailEn']),0,100,'UTF-8');
			 }
			 $bodys.="
			 	<li>
					<a href='news.php?id=".$r[id]."&paged=".$page."'>
					<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0'>
                  <tr>
                    <td style='width:150px' valign='top'><img src='geng1.php?newsize=150&filedir=login/promotion/images/$r[picture]'  width='150' /></td>
                    <td  valign='top'><table width='90%' border='0' align='center' cellpadding='0' cellspacing='0' style='margin:0 10px'>
                      <tr>
                        <td  class='txt_01' valign='top'>".$titleTxt."</td>
                      </tr>
                      <tr>
                        <td class='txt_01_b' valign='top'>".$detailTxt."</td>
                      </tr>
                    </table></td>
                  </tr>
                </table>
				</a>
				</li>
			 ";
		if($c==1){
			$bodys.="<br style='clear:left;'/>
							<div style='height:1px;background:url(webboard/img/dot.gif);margin:10px 5px'></div>"; $c=0;
		}else{ 
			$c++;}
				}
			$bodys.="</ul>";
 }				
//**********************{ SEPARATE PAGE ************************
	$nn=$page+1;
	$ss= $num_pages;
	$thispage=(strpos($_SERVER['QUERY_STRING'],"age=$page")>0)?str_replace("&page=$page","",$_SERVER['QUERY_STRING']) : $_SERVER['QUERY_STRING'];
	$epag .= call_user_func("mkPage" ,$page,$thispage,$num_pages);
$bodys.=(!strstr($_SERVER['PHP_SELF'],"index.php"))? "<br style='clear:left'/><div style='font-size:13px;' ><div style='margin:10px;padding:10px;color:#ffffff' align='left'>หน้า : ".$epag."</div></div>" : "<br style='clear:both'/><a href='news.php' ><strong>".Title_READMORE."</strong></a><p>&nbsp;</p>";  
//**********************SEPARATE PAGE }************************				
 }else{
  if($sql_promotion && mysql_num_rows($sql_promotion)>0){
  	$r=mysql_fetch_array($sql_promotion);
		 if($_SESSION['lang']=='th'){
			 	$titleTxt=$r['titleTh'];
				$detailTxt=$r['detailTh'];
				$backpage="โปรโมชั่นอื่นๆ";
			 }else{
			 	$titleTxt=$r['titleEn'];
				$detailTxt=$r['detailEn'];
				$backpage="Previous page";
			 }
			 
 	$bodys.="<div style='width:100%;'> 
	<a href='".$_SERVER['PHP_SELF']."?page=".$paged."' class='href_back'><h3>".$backpage."</h3></a>
	<div align='left' style='color:#006600;margin:20px 0; padding:0 50px'><h3><u>".$titleTxt."</u></h3></div>
	<div style='color:#999999;font-size:13px;padding:0 50px'>".$detailTxt."</div>	
	</div>";
	}
 }
 return $bodys;

}

function FacebookLike($account){
 return "<div class='fb-like-box' data-href='".$account."' data-width='725' data-height='185' data-show-faces='true' data-border-color='#ffffff' data-stream='false' data-header='false'></div>";
}


?>