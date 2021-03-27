<? 
include_once('../../includes/connect.php');
$subid=(isset($_GET['subcat']))? $_GET['subcat']:$_POST['subcat'];

$sql=mysql_query("select subid,th_name,en_name from sub_category where catid=".$subid);
$result="<select name='subcat'><option value='0'>เลือกหมวดย่อย</option>";
if(!empty($subid) && $sql && mysql_num_rows($sql)>0){
	while(list($id,$th,$en)=mysql_fetch_array($sql)){
		$result.="<option value='".$id."'>$th - ($en)</option>";
	}
}
$result.="</select>";

echo  $result;
?>