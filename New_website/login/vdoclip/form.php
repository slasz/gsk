<style>

div.product{font-family:Arial, Helvetica, sans-serif;font-size:15px;letter-spacing:0.05em;}

ul.product{	list-style	:none;}

.product li{margin:1px;}

.input_product{ width:400px;padding:0;font-size:13px;}

.red{color:#ff0000;}

.title{float:left;width:120px;}

.btninsert{width:80px;font-weight:bold;}

</style><?




	$cpid=(isset($_GET['cpid']))? $_GET['cpid']:"";
	$cpshow=(isset($_GET['cpshow']))? $_GET['cpshow']:"";
	
	
	
	$sqltxt=mysql_query("select id,vdo,category_id from vdoclip where id>0");

$r=mysql_fetch_array($sqltxt);



	
	$Category=mysql_query("select catid,th_name,
	en_name from category order by th_name")or die(mysql_error());
	if(mysql_num_rows($Category)>0){
	$x=0;
	$strCategory="<select name='category' id='category' style='margin:8px 0' onChange=\"getDataReturnText('product/subcate.php?subcat='+this.value,Show_Subcategory)\"><option value='0'>เลือกหมวดหมู่</option>";
		while(list($catid,$thname,$enname)=mysql_fetch_array($Category)){
		$sel=($catid==$cpshow)? "selected":"";
					$titleCat=(!empty($thname))? "$thname":"";
					$titleCat.=(!empty($enname))? " - ($enname)":"";
					$strCategory.="<option value='$catid' $sel>$titleCat </option>";
					$x++;				
		}
	$strCategory.="</select>";
	
	}

	$SubCategory=mysql_query("select subid,th_name,en_name from sub_category where catid=".$category_id);
	if(!empty($category_id) && $SubCategory && mysql_num_rows($SubCategory)>0){
		while(list($subid,$th,$en)=mysql_fetch_array($SubCategory)){
			$sel=($subid==$subcate_id)? "selected":"";
			$strSubcate.="<option value='".$subid."' $sel>$th - ($en)</option>";
		}
	}

$cpname=(!empty($cpid))?$r['vdo']:"";
?>

<form action="?p=vdoclip/index" method="post" >

<input type="hidden" name="clipid" value="<?=$cpid?>" />

<div class='product' style="background:#ffffff;padding:2px 8px;width:630px" align="left">

<h3>Clip VDO Code No. <?=$cpid;?></h3>

<label style="width:100px;display:block;float:left;margin-top:8px">หมวดหมู่: </label><?=$strCategory?>
<br>

<ul class="product">

	

    <li> <label class="title">Clip:</label><input type="text" id="vdo" name="vdo" class="input_product" maxlength="200" value="<?=$cpname;?>" />
    </li>
    <!--<li style="margin-left:10px;">
      <label class="title">แสดงหน้าแรก:</label>
      <input name="showindex" type="checkbox" id="showindex" class="input_product" value="y" <?=$chk;?> />
    </li>-->
    <li><p><label class="title">&nbsp;</label><input type="submit" class="btninsert" value="<?=(!empty($cpid))?"Edit":"Save";?>" name="btn1" /></p></li>
</ul>

   

</div>



</form>