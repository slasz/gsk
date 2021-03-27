<?
include_once("../../includes/connect.php");
$qrycate=mysql_query("select catid,th_name,en_name,online from category order by en_name")or die(mysql_error());
if($qrycate && mysql_num_rows($qrycate)>0){
		while(list($catid,$thname,$enname,$online)=mysql_fetch_array($qrycate)){
			$selcat[title]=empty($enname)? $thname: $thname." (".$enname.")";
			$selCate.="<option value='".$catid."'>".$selcat[title]."</option>";
		}
		
}

/*$qrybrand=mysql_query("select brand_id,brandTh,brandEn  from brand order by brand_id")or die(mysql_error());
if($qrybrand && mysql_num_rows($qrybrand)>0){
		while(list($brand_id,$thname,$enname)=mysql_fetch_array($qrybrand)){
			$selbrand[title]=empty($enname)? $thname: $thname." (".$enname.")";
			$selBrand.="<option value='".$brand_id."'>".$selbrand[title]."</option>";
		}
		
}*/
?>
<form method="post"  action="?p=product/index">

<h2 style="text-align:left">ค้นหาข้อมูลบริการ</h2>

<label style="float:left;width:80px;font-size:13px;margin:2px 0;text-align:right;">หมวดหมู่</label>
<select id="catid" name="catid" style="font-size:13px;margin:2px 0 0 10px;float:left;" ><option value="">ทั้งหมด</option>
<?=$selCate?>
</select><br style="clear:both"/>
<!--<label style="float:left;width:80px;font-size:13px;margin:2px 0;text-align:right;">ยี่ห้อ</label>
<select id="brand_id" name="brand_id" style="font-size:13px;margin:2px 0 0 10px;float:left;" ><option value="">ทั้งหมด</option>
<?=$selBrand?>
</select><br style="clear:both"/>-->
<label style="float:left;width:80px;font-size:13px;margin:2px 0;text-align:right;">รหัส</label><input type="text" name="search[code]" style="font-size:13px;margin:2px 0 0 10px;float:left;" /><br style="clear:both"/>
<label style="float:left;width:80px;font-size:13px;margin:2px 0;text-align:right;">ชื่อบริการ</label><input type="text" name="search[name]" style="font-size:13px;margin:2px 0 0 10px;float:left;" /><br style="clear:both"/>
<br />

<input type="submit" value="ค้นหา"/>
</form>