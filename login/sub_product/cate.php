<? 
include_once('../../includes/connect.php');
$subid=(isset($_GET['mainmenu']))? $_GET['mainmenu']:$_POST['mainmenu'];

$sql=mysql_query("select catid,th_name,en_name from category where mainmenu='".$subid."'");
$onchange=($subid=="media")? "onChange=\"getDataReturnText('product/subcate.php?subcat='+this.value,Show_Subcategory)\"":"";
$result="<select name='category' style='margin-top:8px'  ".$onchange."><option value='0'>หมวดหลัก</option>";
if(!empty($subid) && $sql && mysql_num_rows($sql)>0){
	while(list($id,$th,$en)=mysql_fetch_array($sql)){
		$result.="<option value='".$id."'>$th - ($en)</option>";
	}
}
$result.="</select>";

echo  $result;
?>