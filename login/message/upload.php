<? 
include_once("../../includes/connect.php");
$ds          = DIRECTORY_SEPARATOR;  //1
 
$storeFolder = '../../upload/customer';   //2



if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];          //3             
      
    $targetPath = dirname( __FILE__ ).$ds.$storeFolder.$ds;  //4
    $qry=mysql_query("select id from gallery_cust order by id desc limit 0,1");
	if($qry && mysql_num_rows($qry)>0){
		list($id)=mysql_fetch_array($qry);
		$gentName=++$id;
	}else{
		$gentName=1;
	}
	
	
	
	$gentName.="_".$_FILES['file']['name'];//$_FILES['file']['name'];
    $targetFile =  $targetPath.$gentName;//$_FILES['file']['name'];  //5
 
 

 
   $movetrue=move_uploaded_file($tempFile,$targetFile); //6
   
   
   
   
   if($movetrue){
   mysql_query("insert into gallery_cust(promotion_id,picname,sorter)values(".$_POST['proid'].",'".$gentName."','9999')");
	echo "successfully uploaded.\n";
   } else { echo "File upload failed"; }
     
}


?>