
<? 

	include_once("../includes/connect.php");

	$Event =@$_POST["Event"];

	function cktype($imgt,$pic){	

	if( filesize($pic) < 100000999 && filesize($pic) > 100 ){

	

		if($imgt=="image/jpg" || $imgt=="image/jpeg" || $imgt=="image/pjpeg") 

			{

				return ".jpg";

			}
		else if($imgt=="image/bmp" || $imgt=="image/bitmap" || $imgt=="image/BMP") 

			{

				return ".bmp";

			} 

		else if($imgt=="image/gif") 

			{

				return ".gif";

			} 

		else if($imgt=="image/png") 

			{

				return ".png";

			} 
				

		

	}	

	return false;

}



function update_pic($fd,$info_code,$piccode,$fileno,$fileorder,$filetype){

	$sql="select id,picture from sales_pic where main_id='".$info_code."' and picture like'%_$fileorder.%'";

	$sql=mysql_query($sql);

	list($id,$pic)=@mysql_fetch_array($sql);

	$url=$fd;

	$sourcefile=$url."".$pic;

	if(@file_exists($sourcefile))@unlink($sourcefile);

	list($picname,$pictype)=explode(".",$pic);

	list($one,$two)=explode("_",$picname);

	$one=(empty($one))? date("Ymdhis") : $one;

	$newimg=$one."_".$fileorder.$filetype;

	$destination=$url."/".$newimg;

	if(copy($fileno,$destination)){

		if(!empty($id)){
	
			$sql="update sales_pic set picture='$newimg' where id='$id' ";

		}else{

			$sql="insert into sales_pic(main_id, picture,folders) values ('$info_code','$newimg','$fd' )";

		}

		mysql_query($sql);

	}

}




function update_pic_cat($fd,$info_code,$piccode,$fileno,$fileorder,$filetype,$typecate){

	switch($fileorder){

						case 0 : $setpic="pic"; 

						break;

						case 1 : $setpic="pic2";

						break;

						case 2 : $setpic="pic3";

						break;
						case 3 : $setpic="pic4";

						break;
						case 4 : $setpic="pic5";

						break;
						case 5 : $setpic="pic6";

						break;
						case 6 : $setpic="pic7";

						break;
						case 7 : $setpic="pic8";

						break;
						case 8 : $setpic="pic9";

						break;
						case 9 : $setpic="pic10";

						break;
			
					}

	if($typecate=="Category"){

		$sql="select catid,".$setpic." from category where catid=".$info_code;

	}else if($typecate=="SubCategory"){

		$sql="select subid,pic from sub_category where subid=".$info_code;

	}

	$sql=mysql_query($sql);

	list($id,$pic)=@mysql_fetch_array($sql);

	$url=$fd;

	$sourcefile=$url."/".$pic;

	if(@file_exists($sourcefile))@unlink($sourcefile);

	list($picname,$pictype)=explode(".",$pic);

	list($one,$two)=explode("_",$picname);

	$one=(empty($one))? date("Ymdhis") : $one;

	$newimg=$one."_".$fileorder.$filetype;

	$destination=$url."/".$newimg;

	if(copy($fileno,$destination)){

		if(!empty($id)){

			if($typecate=="Category"){

				$sql="update category set ".$setpic."='$newimg' where catid=".$id;

			}else if($typecate=="SubCategory"){

				$sql="update sub_category set pic='$newimg' where subid=".$id;

			}

		}

		mysql_query($sql);

	}

}

function updateDB($s,$val,$whr){	

mysql_query("update products set ".$s."='".$val."'  $whr ");

}	



	if($Event=='Password'){

		//$cksql=mysql_query("select username,password from admin where username='".$username."' and password='".$oldpwd."'");

		//if(mysql_num_rows($cksql)>0){

		$username=@$_POST['username'];

		$newpwd=@$_POST['newpwd'];

			mysql_query("update admin set username='".$username."', password='".$newpwd."' ");

		//}

	

	

	}
	
	else if($Event=='Category'){
		$refer="administrator.php?p=category/index";//$_SERVER['HTTP_REFERER'];	
		$thcat=@$_POST['thcat'];
		$encat=@$_POST['encat'];
		$jpcat=@$_POST['jpcat'];
		$deth=@$_POST['deth'];
		$deen=@$_POST['deen'];
		$dejp=@$_POST['dejp'];
		$type=@$_POST['type'];
		$catid=(!empty($_POST['catid']))? $_POST['catid']:0;
		$eventsub=@$_POST['eventsub'];
		$subid=(!empty($_POST['subid']))? $_POST['subid']:0;
		$online=@$_POST['online'];
		$pic=$_FILES['pic'];
		
		
		if($eventsub=="no"){		
		//echo "1";
			if(empty($catid) || $catid==0  ){
				$qry1=mysql_query("insert into category(th_name,en_name , detailTh, detailEn,jp_name,detailJp,typeid) values('$thcat','$encat','$deth','$deen','$jpcat','$dejp','$type')");
			}else{
				$qry1=mysql_query("update category set th_name='".$thcat."' , en_name='".$encat."' , online='".$online."'  , detailTh='".$deth."' , detailEn='".$deen."' , jp_name='".$jpcat."' , detailJp='".$dejp."' , typeid='".$type."' where catid=".$catid);
			}
			$str=mysql_query("select catid from category order by  catid desc limit 0,1");
			if(mysql_num_rows($str)>0){
			list($codeid)=mysql_fetch_array($str);
			}
			if(empty($catid)){
				$codeid=(empty($codeid))? 1:$codeid++;
			}else{
				$codeid=$catid;
			}	
	}else{
		//echo "2";
			if(empty($subid) || $subid==0  ){
				$qry1=mysql_query("insert into sub_category(catid,th_name,en_name,sorter , detailTh, detailEn,jp_name,detailJp) values($catid,'$thcat','$encat','9999','$deth','$deen','$jpcat','$dejp')")or die(mysql_error());
			}else{			
				$qry1=mysql_query("update sub_category set  catid=".$catid.", th_name='".$thcat."', en_name='".$encat."'  , detailTh='".$deth."' , detailEn='".$deen."'  , jp_name='".$jpcat."' , detailJp='".$dejp."'where subid=".$subid);	
			}
			$str=mysql_query("select subid from sub_category order by  subid desc limit 0,1");
			if(mysql_num_rows($str)>0){
			list($codeid)=mysql_fetch_array($str);
			}
			if(empty($subid)){
				$codeid=(empty($codeid))? 1:$codeid++;
			}else{
				$codeid=$subid;
			}	

		}
	
	
	
	
$coderand=date("Ymdhis");
	if($qry1){
			####Save picture########
				for($i=0;$i<=0;$i++){
					$imgname=$coderand."_".$i;
					$fileno=$pic['tmp_name'][$i];
					//echo $fileno;
					if(!empty($fileno)){
					//echo "<br/>!empty_fileno($fileno)";
						$type = getimagesize($fileno);
						$type = $type['mime'];
						
						$nam=cktype($type,$fileno);
						 
						$imgname.=$nam;
						$picalbum="../upload/category/".$imgname;
					$piccode=$codeid."_".$i;
					
	if($eventsub=="no"){						
					
					if(!empty($catid)){
						//echo "<br/>call_user_func";
						call_user_func("update_pic_cat",'../upload/category',$codeid,$piccode,$fileno,$i,$nam,"Category");
					}else{	
						//echo "<br/>copy()";
						if(copy($fileno , $picalbum)) 
							mysql_query("update category set pic='".$imgname."' where catid=".$codeid);
					}		
	}else{
	
	
					if(!empty($subid)){
						//echo "<br/>call_user_func";
						call_user_func("update_pic_cat",'../upload/category',$codeid,$piccode,$fileno,$i,$nam,"SubCategory");
					}else{	
						//echo "<br/>copy()";
						if(copy($fileno , $picalbum)) 
							mysql_query("update sub_category set pic='".$imgname."' where subid=".$codeid);
					}		
	}						
							
					}elseif(!empty($del[$i])){
					//echo "<br/>!empty_del($del[$i])";
						$delpic=$del[$i];
						$unlink_file="../upload/category/".$delpic;
						if($eventsub=="no"){
							if(unlink($unlink_file)) mysql_query("update category set pic='' where catid=".$codeid);
						}else{
							if(unlink($unlink_file)) mysql_query("update sub_category set pic='' where subid=".$codeid);
						}
					}
				}	
		mysql_query("COMMIT");	
			echo "<center style='margin:300px 0'><h3>update complete</h3></center>";
			echo "<script>setTimeout(\"self.location='$refer';\",2000)</script>";
			exit();
			
	}else{
		mysql_query("ROLLBACK");
			echo "<center style='margin:300px 0'><h3>Error please contact admin</h3>".mysql_error()."</center>";
			echo "<script>setTimeout(\"self.location='$refer';\",5000)</script>";
			exit();
	
	}
	
	}
	
	else if($Event=='UpdateCatPage'){
		$catid=$_POST['catid'];
		$del=$_POST['del'];
		$online=$_POST['online'];
		$subid=$_POST['subid'];
		$delsub=$_POST['delsub'];
		$sorts=(isset($_POST['sorts']))?$_POST['sorts']:"9999";
		$sortss=(isset($_POST['sortss']))?$_POST['sortss']:"9999";
		 
		
		 
		
		if(!empty($catid) ){
		
		foreach($catid as $ind=>$val){

				$data_num=(empty($sorts[$ind]))? 9999 : $sorts[$ind];

				//echo $data_num;	
				mysql_query("update category set sorter=".$data_num." where catid=".$val);
				}
		
		
			foreach($catid as $ind=>$val){
				$data=($online[$ind]=="true")? "y":"n";
					mysql_query("update category set online='".$data."' where catid='".$val."' ");
				
			}
			
			foreach($catid as $ind=>$val){
				if($del[$ind]=="true"){
					$picsql=mysql_query("select pic from category where catid='".$val."' ");
					if($picsql && mysql_num_rows($picsql)>0){
						list($picname)=mysql_fetch_array($picsql);
						if(!empty($picname)) @unlink("category/images/".$picname);
					}
					mysql_query("delete from category where catid='".$val."' ");
					
					$picsql=mysql_query("select pic from sub_category where catid='".$val."' ");
					if($picsql && mysql_num_rows($picsql)>0){
						while(list($picname)=mysql_fetch_array($picsql)){
							if(!empty($picname)) @unlink("category/images/".$picname);
						}
					}
					mysql_query("delete from sub_category where catid='".$val."' ");
					
				}

			}
			
		}
		
		if(!empty($subid) ){
		
		foreach($subid as $ind=>$val){

				$data_num=(empty($sortss[$ind]))? 9999 : $sortss[$ind];

				//echo $data_num;	
				mysql_query("update sub_category set sorter=".$data_num." where subid=".$val);
				}

		
			
			foreach($subid as $ind=>$val){
			//echo "ind=$ind <> val=$val <br/>";
				if($delsub[$ind]=="true"){
					$picsql=mysql_query("select pic from sub_category where subid='".$val."' ");
					if($picsql && mysql_num_rows($picsql)>0){
						list($picname)=mysql_fetch_array($picsql);
						if(!empty($picname)) @unlink("category/images/".$picname);
					}
					
					mysql_query("delete from sub_category where subid='".$val."' ");
				}
				
			}
			
		}
		
		echo "<meta http-equiv='refresh' content='3;url=category/index.php'>";
	
	
	}
	
	else if($Event=='Product'){
		$del=$_POST['del'];
		$online='y';
		$hit=$_POST['hit'];
		$newrelease=$_POST['newrelease'];
		$productrate=isset($_POST['productrate'])? $_POST['productrate']:0;
		$command=$_POST['command'];
		$id=$_POST['pid'];
		$itemcode=(isset($_POST['itemcode']))? $_POST['itemcode']: "LED".$id;
		//$itemcode="AT".$id;
		$category=isset($_POST['category'])? $_POST['category']:0 ;
		$brand=isset($_POST['brand'])? $_POST['brand']:0 ;
		$type=isset($_POST['type'])? $_POST['type']:0 ;
		$subcate=isset($_POST['subcat'])? $_POST['subcat']:0 ;
		$color=$_POST['color'];
		$titleTh=str_replace('"',' &#34; ',$_POST['titleTh']);
		$titleEn=str_replace('"',' &#34; ',$_POST['titleEn']);
		$titleJp=str_replace('"',' &#34; ',$_POST['titleJp']);
		$topicTh=str_replace('"',' &#34; ',$_POST['topicTh']);
		$topicEn=str_replace('"',' &#34; ',$_POST['topicEn']);
		$topicJp=str_replace('"',' &#34; ',$_POST['topicJp']);
		$detailTh=str_replace('"',' &#34; ',$_POST['detailTh']);
		$detailEn=str_replace('"',' &#34; ',$_POST['detailEn']);
		$detailJp=str_replace('"',' &#34; ',$_POST['detailJp']);
		$size=$_POST['size'];
		$price=$_POST['price'];
		$disc=$_POST['discount'];
		$pic=$_FILES['pic'];
		$pdf=$_FILES['pdf'];
		$doctxt=$_FILES['doctxt'];
		$delfile=$_POST['delfile'];
		$line=$_POST['line'];
		$docname = $_POST['doc1']; 
		$olddoc=$_POST['olddoc'];
		$youtube=$_POST['youtube'];
		$youtube=str_replace('"',"'",$youtube);
		$del_d=$_POST['del_d'];
		$sorts=(isset($_POST['sorts']))?$_POST['sorts']:"9999";
		$link=$_POST['link'];
		$link=str_replace('"',"'",$link);
		$itemprice=$_POST['itemprice'];
		
		$file_name = $_FILES['fileN0']['name']; 
		$oldpic=(isset($_POST['oldpic']))? $_POST['oldpic']: "";
		$file_name1 = $_FILES['fileN1']['name']; 
		$oldpic1=(isset($_POST['oldpic1']))? $_POST['oldpic1']: "";
		
		$file = strtolower($_FILES["fileN0"]["name"]);
		$sizefile = $_FILES["fileN0"]["size"]; 
		$oldpic=(isset($_POST['oldpic']))? $_POST['oldpic']: "";
		
		$file2 = strtolower($_FILES["fileN1"]["name"]);
		$sizefile = $_FILES["fileN1"]["size"]; 
		$oldpic1=(isset($_POST['oldpic1']))? $_POST['oldpic1']: "";
		
		$refer="administrator.php?p=product/index";//$_SERVER['HTTP_REFERER'];	

	mysql_query("BEGIN");
	$coderand=date("Ymdhis");
	
	

	
	
	
if($file != ""){

				$uploads = '../upload/files'; // directory to upload to 						

				$fileOK = $uploads.'/'.$file;

				$ext = explode(".", $file);

				$re =$dir_name.date("Ymdhis");

				$fileRename0 = $re.".".$ext[1];
				
					

						if(!empty($oldpic)) {@unlink($uploads."/".$oldpic);}
						
						$copy=copy($_FILES['fileN0']['tmp_name'],$uploads.'/'.$fileRename0); 

				

				}else if($del_d=="y"){
		$sql="select *  from  products where id=$id  "; 
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	$d=$row['file_pdf'];
@unlink ("../upload/files/$d");
	$fileRename0="";
	}
	
	
				
				
				else{

						$fileRename0=$oldpic;

				}
				
if($file2 != ""){

//echo $file2."++";  exit(); 

				$uploads = '../upload/files'; // directory to upload to 						

				$fileOK = $uploads.'/'.$file2;

				$ext = explode(".", $file2);

				$re =$dir_name.date("Ymdhis");

				$fileRename1 = $re.".".$ext[1];
				
					

						if(!empty($oldpic1)) {@unlink($uploads."/".$oldpic1);}
						
						$copy=copy($_FILES['fileN1']['tmp_name'],$uploads.'/'.$fileRename1); 

				

				}else{

						$fileRename1=$oldpic1;

				}
				
				
			
if($command=='delete'){
			if(sizeof($id)>0){
			
			foreach($id as $ind=>$val){

				$data_num=(empty($sorts[$ind]))?9999:$sorts[$ind];

				echo $data_num;	
				$qry7=mysql_query("update products set sorter=".$data_num." where id=".$val);
				}
			
					foreach($id as $ind=>$val){
					//Loop Delete picture
						if($hit[$ind]=="true"){
							$qry5=mysql_query("update products set hit='y' where id='".$val."'");
						}else{
							$qry5=mysql_query("update products set hit='n' where id='".$val."'");
						}

						if($newrelease[$ind]=="true"){
							$qry6=mysql_query("update products set newrelease='y' where id='".$val."'");
						}else{
							$qry6=mysql_query("update products set newrelease='n' where id='".$val."'");
						}
					
							//$qry5=mysql_query("update products set rate=".$productrate[$ind]." where id='".$val."'");
					
						if($del[$ind]=="true"){
							$txt=mysql_query("select picture,folders from sales_pic where main_id='".$val."' ");
							if(mysql_num_rows($txt)>0){
								while(list($pic,$fold)=mysql_fetch_array($txt)){
									$url=$fold."/".$pic;
									if(file_exists($url)){
										if(unlink($url)){
											$qry1=mysql_query("delete from sales_pic where main_id='".$val."' and picture='".$pic."' ")or die(mysql_error());
										}
									}
								}
							}
//							echo $ind."->".$val."<br/>";
//							Delete Product item
							$qry2=mysql_query("delete from products where id='".$val."' ")or die(mysql_error());
//							Delete Size and Price
							$qry3=mysql_query("delete from product_sizeprice where itemcode='".$val."' ")or die(mysql_error());
						}
					}
			}		
					
			if($qry1 && $qry2 && $qry3){//&&$qry5
					mysql_query("COMMIT");	
					//echo "<center style='margin:0'><h3>update complete</h3></center>";
					echo "<script>setTimeout(\"self.location='$refer';\",2000)</script>";
					exit();
			}elseif($qry5 && $qry6){
					mysql_query("COMMIT");	
					//echo "<center style='margin:0'><h3>update complete</h3></center>";
					echo "<script>setTimeout(\"self.location='$refer';\",2000)</script>";
					exit();
					
			}elseif($qry7){
					mysql_query("COMMIT");	
					//echo "<center style='margin:0'><h3>update complete</h3></center>";
					echo "<script>setTimeout(\"self.location='$refer';\",2000)</script>";
					exit();
			}else{
					mysql_query("ROLLBACK");
					echo "<center style='margin:0'><h3>Error please contact admin</h3>".mysql_error()."</center>";
					echo "<script>setTimeout(\"self.location='$refer';\",2000)</script>";
					exit();

			}	
}else{

		$hit=($_POST['hit']!='y')? 'n' : 'y';
		$newrelease=($_POST['newrelease']!='y')? 'n' : 'y';

if(empty($id)){
	$str1="insert into products(itemcode,category_id,subcate_id,color_id,titleTh,titleEn,titleJp,topicTh,topicEn,topicJp,detailTh,detailEn,detailJp,lastupdate,online,hit,newrelease,rate,line,file_pdf,file_doc,youtube,link,brand_id,type_id,sorter,itemprice) values('".$itemcode."',".$category.",".$subcate.",'".$color."','".$titleTh."','".$titleEn."','".$titleJp."','".$topicTh."','".$topicEn."','".$topicJp."','".$detailTh."','".$detailEn."','".$detailJp."',sysdate(),'".$online."','".$hit."','".$newrelease."',".$productrate.",'".$line."','".$fileRename0."','".$fileRename1."','".$youtube."','".$link."','".$brand."','".$type."','9999','".$itemprice."')";
	
	$strM="insert into menu(catid,type_id) values('".$category."','".$type."')";
	

}else{
	$str1="update products set itemcode='".$itemcode."', category_id=".$category.", subcate_id=".$subcate.", color_id='".$color."', titleTh='".$titleTh."', titleEn='".$titleEn."', titleJp='".$titleJp."',topicTh='".$topicTh."',topicEn='".$topicEn."',topicJp='".$topicJp."', detailTh='".$detailTh."', detailEn='".$detailEn."', detailJp='".$detailJp."', lastupdate=sysdate(), online='".$online."', hit='".$hit."', newrelease='".$newrelease."', rate=".$productrate." ,line='".$line."',file_pdf='".$fileRename0."',file_doc='".$fileRename1."', youtube='".$youtube."', link='".$link."'  , brand_id='".$brand."', type_id='".$type."' , itemprice='".$itemprice."' where id=".$id;
	
	
	
	mysql_query("delete from product_sizeprice where itemcode=".$id);
	
	//$strM="insert into menu(id,catid,type_id) values('".$id."','".$category."','".$type."')";
	//$strM="update menu set catid='".$category."', type_id='".$type."' where id=".$id;
}	
	//echo $str1;
	
	$qry1=mysql_query($str1) or die(mysql_error());
	//$qryM=mysql_query($strM) or die(mysql_error());
	
	$str=mysql_query("select id, file_pdf, file_doc from products order by  id desc limit 0,1");
	if(mysql_num_rows($str)>0){
		list($codeid, $old_pdf, $old_doc)=mysql_fetch_array($str);
	}
	if(empty($id)){
		$codeid=(empty($codeid))? 1:$codeid++;
	}else{
		$codeid=$id;
	}

	if(!empty($size)){
 		$txt=mysql_query("select  size_id from size");
		$iba=mysql_num_rows($txt);
 		for($i=0;$i<$iba;$i++){
		
			if(!empty($size[$i])){
				$isad.=($f==0)? "":" , ";
				$isad.="('$codeid','".$size[$i]."',".$price[$i].",".$disc[$i].")";
				$f++;
			}	
		}
		
	}
	$str2="insert into product_sizeprice(itemcode, size, price, discount) values ".$isad;
	//echo $str2."<hr>";
	$qry2=mysql_query($str2);// or die("Error : ".mysql_error());

	
	
	
		if($qry1 /*&& $qry2*/){
			####Save picture########
				for($i=0;$i<=9;$i++){
					$imgname=$coderand."_".$i;
					$fileno=$pic['tmp_name'][$i];
					if(!empty($fileno)){
					//echo "<br/>!empty_fileno($fileno)";
						$type = getimagesize($fileno);
						$type = $type['mime'];
						$nam=cktype($type,$fileno);
						$imgname.=$nam;
						$picalbum="../upload/product/".$imgname;
					$piccode=$codeid."_".$i;
					if(!empty($itemcode) && !empty($id)){
						//echo "<br/>call_user_func";
						call_user_func("update_pic",'../upload/product/',$codeid,$piccode,$fileno,$i,$nam);
					}else{	
						//echo "<br/>copy()";
						if(copy($fileno , $picalbum)) 
							mysql_query("insert into sales_pic(main_id, picture,folders) values ('$codeid','$imgname','../upload/product/') ");
					}		
							
							
					}elseif(!empty($del[$i])){
					//echo "<br/>!empty_del($del[$i])";
						$delpic=$del[$i];
						$unlink_file="../upload/product//".$delpic;
						if(unlink($unlink_file)) mysql_query("delete from sales_pic where folders='../upload/product/' and picture='$delpic' ");
						
					}
				}


$randoms=str_pad((rand() * rand()),10,rand(0,9),"left" );

			####Save DOC&PDF########
if(!empty($delfile)){

			foreach($delfile as $ind=>$val){
				$sqlpic=mysql_query("select $val from products where id=".$codeid);
		
				if(mysql_num_rows($sqlpic)>0){
					list($filegoo)=mysql_fetch_array($sqlpic);
				
					
					$urlfilegoo="upload/files/".$filegoo;
					
					if(!empty($filegoo)){
						
						unlink($urlfilegoo);
						mysql_query("update products set ".$val."='' where id=".$codeid);
					}
				}
			}
			
	
}else{
					
			for($i=0;$i<=1;$i++){
		if(!empty($_FILES['fileN']['name'][$i])){
			$coderand=$randoms."_$i";
			$imgname=$coderand;
			$fileno=$_FILES['fileN']['tmp_name'][$i];
			if(!empty($fileno)){
				$type = $_FILES['fileN']['name'][$i];
				list($n,$nam)=explode(".",$type);
				
				$imgname.=".".$nam;
				$picalbum="upload/files/".$imgname;
				if(copy($fileno , $picalbum)){
						switch($i){
							case 0: $s="file_pdf"; 
							$old_files=$old_pdf;
							break;
							case 1: $s="file_doc"; 
							$old_files=$old_doc;
							break;
						}
					###### Delete files exists ######
					$file_exists="upload/files/".$old_files;
					if(!empty($old_files) && file_exists($file_exists)){
						unlink($file_exists);
						mysql_query("update products set $s='' where id=".$codeid);
					}
					###### And Update or Insert new
					$whr=" where id=".$codeid;
					call_user_func("updateDB",$s,$imgname,$whr);
				}	
			}
		}
	}
	
	}

	
		mysql_query("COMMIT");	
			echo "<center style='margin:0'><h3>update complete</h3></center>";
			echo "<script>setTimeout(\"self.location='$refer';\",2000);</script>";
			exit();
			
	}else{
		mysql_query("ROLLBACK");
			echo "<center style='margin:0'><h3>Error please contact admin</h3>".mysql_error()."</center>";
			echo "<script>setTimeout(\"self.location='$refer';\",5000);</script>";
			exit();
	
	}
		

}			
		
	
	
	}
	
	
	
	
	
	
	else if($Event=='M_Branch'){
		$del=$_POST['del'];
		
		$id=$_POST['mid'];
		$m_country=$_POST['m_country'];
		$m_name=$_POST['m_name'];
		$m_map=str_replace('"',' &#34; ',$_POST['m_map']);
		$m_mail=$_POST['m_mail'];
		$m_flag=$_FILES['m_flag'];
		$m_pic=$_FILES['m_pic'];
		
		$m_f1=$_POST['m_f1'];
		$m_f2=$_POST['m_f2'];
		$m_f3=$_POST['m_f3'];
		$m_f4=$_POST['m_f4'];
		$m_f5=$_POST['m_f5'];
		$m_f6=$_POST['m_f6'];
		$m_f7=$_POST['m_f7'];
		$m_f8=$_POST['m_f8'];
		$m_f9=$_POST['m_f9'];
		$m_f10=$_POST['m_f10'];
		
		$m_b1=$_POST['m_b1'];
		$m_b2=$_POST['m_b2'];
		$m_b3=$_POST['m_b3'];
		$m_b4=$_POST['m_b4'];
		$m_b5=$_POST['m_b5'];
		$m_b6=$_POST['m_b6'];
		$m_b7=$_POST['m_b7'];
		$m_b8=$_POST['m_b8'];
		$m_b9=$_POST['m_b9'];
		$m_b10=$_POST['m_b10'];
		
		$oldflag=$_POST['oldflag'];
		$oldpic=$_POST['oldpic'];
		$del_f=$_POST['del_f'];
		$del_p=$_POST['del_p'];
		$m_sorter=(isset($_POST['m_sorter']))?$_POST['m_sorter']:"9999";
		
		
		
		
		$f0 = $_FILES['fileN0']['name']; 
		$oldflag=(isset($_POST['oldflag']))? $_POST['oldflag']: "";
		$f1 = $_FILES['fileN1']['name']; 
		$oldpic=(isset($_POST['oldpic']))? $_POST['oldpic']: "";
		
		$command=$_POST['command'];
		
		$refer="administrator.php?p=product/index";//$_SERVER['HTTP_REFERER'];	

	mysql_query("BEGIN");
	$coderand=date("Ymdhis");
	
	

	
	
	
if($f0 != ""){

				$uploads = '../upload/flag'; // directory to upload to 						

				$fileOK = $uploads.'/'.$f0;

				$ext = explode(".", $f0);

				$re ="F".$dir_name.date("Ymdhis");

				$fileRename0 = $re.".".$ext[1];
				
					

						if(!empty($oldflag)) {@unlink($uploads."/".$oldflag);}
						
						$copy=copy($_FILES['fileN0']['tmp_name'],$uploads.'/'.$fileRename0); 

				

				}else if($del_f=="y"){
		$sql="select *  from  m_branch where m_id=$id  "; 
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	$f=$row['m_flag'];
@unlink ("../upload/flag/$f");
	$fileRename0="";
	}
	
	
				
				
				else{

						$fileRename0=$oldflag;

				}
				
if($f1 != ""){



				$uploads = '../upload/pic'; // directory to upload to 						

				$fileOK = $uploads.'/'.$f1;

				$ext = explode(".", $f1);

				$re ="P".$dir_name.date("Ymdhis");

				$fileRename1 = $re.".".$ext[1];
				
					

						if(!empty($oldpic)) {@unlink($uploads."/".$oldpic);}
						
						$copy=copy($_FILES['fileN1']['tmp_name'],$uploads.'/'.$fileRename1); 

				
				}else if($del_p=="y"){
				$sql="select *  from  m_branch where m_id=$id  "; 
				$result=mysql_query($sql);
				$row=mysql_fetch_array($result);
				$p=$row['m_pic'];
				@unlink ("../upload/pic/$p");
				$fileRename1="";
				}

				else{

						$fileRename1=$oldpic;

				}
				
				
			
if($command=='delete'){
			if(sizeof($id)>0){
			
			foreach($id as $ind=>$val){

				$data_num=(empty($m_sorter[$ind]))?9999:$m_sorter[$ind];

				
				$qry7=mysql_query("update m_branch set m_sorter=".$data_num." where m_id=".$val);
				}
			
					foreach($id as $ind=>$val){
					//Loop Delete picture
										
				
						if($del[$ind]=="true"){
						
//							Delete Product item
							$qry2=mysql_query("delete from m_branch where m_id='".$val."' ")or die(mysql_error());
//							
						}
					}
			}		
					
			if($qry1 && $qry2 && $qry3){//&&$qry5
					mysql_query("COMMIT");	
					//echo "<center style='margin:0'><h3>update complete</h3></center>";
					echo "<script>setTimeout(\"self.location='$refer';\",2000)</script>";
					exit();
			}elseif($qry5 && $qry6){
					mysql_query("COMMIT");	
					//echo "<center style='margin:0'><h3>update complete</h3></center>";
					echo "<script>setTimeout(\"self.location='$refer';\",2000)</script>";
					exit();
					
			}elseif($qry7){
					mysql_query("COMMIT");	
					//echo "<center style='margin:0'><h3>update complete</h3></center>";
					echo "<script>setTimeout(\"self.location='$refer';\",2000)</script>";
					exit();
			}else{
					mysql_query("ROLLBACK");
					echo "<center style='margin:0'><h3>Error please contact admin</h3>".mysql_error()."</center>";
					echo "<script>setTimeout(\"self.location='$refer';\",2000)</script>";
					exit();

			}	
}else{


if(empty($id)){
	$str1="insert into m_branch(m_country,m_name,m_map,m_mail,m_flag,m_pic,m_sorter,
	m_b1,m_b2,m_b3,m_b4,m_b5,m_b6,m_b7,m_b8,m_b9,m_b10,m_f1,m_f2,m_f3,m_f4,m_f5,m_f6,m_f7,m_f8,m_f9,m_f10) values('$m_country','$m_name','$m_map','$m_mail','$fileRename0','$fileRename1','9999',
	
	'$m_b1','$m_b2','$m_b3','$m_b4','$m_b5','$m_b6','$m_b7','$m_b8','$m_b9','$m_b10','$m_f1','$m_f2','$m_f3','$m_f4','$m_f5','$m_f6','$m_f7','$m_f8','$m_f9','$m_f10' )";
	
	

}else{
	$str1="update m_branch set 
	
	m_country='".$m_country."', m_name='".$m_name."' , m_map='".$m_map."', m_mail='".$m_mail."', m_flag='".$fileRename0."', m_pic='".$fileRename1."' ,
	
m_b1='".$m_b1."', m_b2='".$m_b2."', m_b3='".$m_b3."', m_b4='".$m_b4."', m_b5='".$m_b5."', m_b6='".$m_b6."', m_b7='".$m_b7."', m_b8='".$m_b8."', m_b9='".$m_b9."', m_b10='".$m_b10."',	

m_f1='".$m_f1."', m_f2='".$m_f2."', m_f3='".$m_f3."', m_f4='".$m_f4."', m_f5='".$m_f5."', m_f6='".$m_f6."', m_f7='".$m_f7."', m_f8='".$m_f8."', m_f9='".$m_f9."', m_f10='".$m_f10."'

	where m_id=".$id;
	

}	

	
	$qry1=mysql_query($str1) or die(mysql_error());
	
	
	
if($qry1){

	
		mysql_query("COMMIT");	
			echo "<center style='margin:0'><h3>update complete</h3></center>";
			echo "<script>setTimeout(\"self.location='$refer';\",2000);</script>";
			exit();
			
	}else{
		mysql_query("ROLLBACK");
			echo "<center style='margin:0'><h3>Error please contact admin</h3>".mysql_error()."</center>";
			echo "<script>setTimeout(\"self.location='$refer';\",5000);</script>";
			exit();
	
	}
		

}			
		
	
	
	}
	
	else if($Event=='S_Branch'){
		$del=$_POST['del'];
		
		$id=$_POST['sid'];
		$main_id=$_POST['main_id'];
		$s_country=$_POST['s_country'];
		$s_map=str_replace('"',' &#34; ',$_POST['s_map']);
		$s_mail=$_POST['s_mail'];
		$s_flag=$_FILES['s_flag'];
		$s_pic=$_FILES['s_pic'];
		
		$s_f1=$_POST['s_f1'];
		$s_f2=$_POST['s_f2'];
		$s_f3=$_POST['s_f3'];
		$s_f4=$_POST['s_f4'];
		$s_f5=$_POST['s_f5'];
		$s_f6=$_POST['s_f6'];
		$s_f7=$_POST['s_f7'];
		$s_f8=$_POST['s_f8'];
		$s_f9=$_POST['s_f9'];
		$s_f10=$_POST['s_f10'];
		
		$s_b1=$_POST['s_b1'];
		$s_b2=$_POST['s_b2'];
		$s_b3=$_POST['s_b3'];
		$s_b4=$_POST['s_b4'];
		$s_b5=$_POST['s_b5'];
		$s_b6=$_POST['s_b6'];
		$s_b7=$_POST['s_b7'];
		$s_b8=$_POST['s_b8'];
		$s_b9=$_POST['s_b9'];
		$s_b10=$_POST['s_b10'];
		
		$oldflag=$_POST['oldflag'];
		$oldpic=$_POST['oldpic'];
		$del_f=$_POST['del_f'];
		$del_p=$_POST['del_p'];
		$s_sorter=(isset($_POST['s_sorter']))?$_POST['s_sorter']:"9999";
		
		
		
		
		$f0 = $_FILES['fileN0']['name']; 
		$oldflag=(isset($_POST['oldflag']))? $_POST['oldflag']: "";
		$f1 = $_FILES['fileN1']['name']; 
		$oldpic=(isset($_POST['oldpic']))? $_POST['oldpic']: "";
		
		$ll=!empty($main_id)?"&mid=$main_id":"";
		$command=$_POST['command'];
		$refer="administrator.php?p=sub_product/index$ll";//$_SERVER['HTTP_REFERER'];	

	mysql_query("BEGIN");
	$coderand=date("Ymdhis");
	
	

				

				
				
			
if($command=='delete'){
			if(sizeof($id)>0){
			
			foreach($id as $ind=>$val){

				$data_num=(empty($s_sorter[$ind]))?9999:$s_sorter[$ind];

				//echo $data_num;	
				$qry7=mysql_query("update s_branch set s_sorter=".$data_num." where s_id=".$val);
				}
			
					foreach($id as $ind=>$val){
					//Loop Delete picture
										
					
						if($del[$ind]=="true"){
						
//							Delete Product item
							$qry2=mysql_query("delete from s_branch where s_id='".$val."' ")or die(mysql_error());
//							
						}
					}
			}		
					
			if($qry1 && $qry2 && $qry3){//&&$qry5
					mysql_query("COMMIT");	
					//echo "<center style='margin:0'><h3>update complete</h3></center>";
					echo "<script>setTimeout(\"self.location='$refer';\",2000)</script>";
					exit();
			}elseif($qry5 && $qry6){
					mysql_query("COMMIT");	
					//echo "<center style='margin:0'><h3>update complete</h3></center>";
					echo "<script>setTimeout(\"self.location='$refer';\",2000)</script>";
					exit();
					
			}elseif($qry7){
					mysql_query("COMMIT");	
					//echo "<center style='margin:0'><h3>update complete</h3></center>";
					echo "<script>setTimeout(\"self.location='$refer';\",2000)</script>";
					exit();
			}else{
					mysql_query("ROLLBACK");
					echo "<center style='margin:0'><h3>Error please contact admin</h3>".mysql_error()."</center>";
					echo "<script>setTimeout(\"self.location='$refer';\",2000)</script>";
					exit();

			}	
}else{


if(empty($id)){
	$str1="insert into s_branch(s_country,s_map,s_mail,s_flag,s_pic,s_sorter,main_id,s_b1,s_b2,s_b3,s_b4,s_b5,s_b6,s_b7,s_b8,s_b9,s_b10,s_f1,s_f2,s_f3,s_f4,s_f5,s_f6,s_f7,s_f8,s_f9,s_f10 ) values('$s_country','$s_map','$s_mail','$fileRename0','$fileRename1','9999','$main_id','$s_b1','$s_b2','$s_b3','$s_b4','$s_b5','$s_b6','$s_b7','$s_b8','$s_b9','$s_b10','$s_f1','$s_f2','$s_f3','$s_f4','$s_f5','$s_f6','$s_f7','$s_f8','$s_f9','$s_f10')";
	
	

}else{
	$str1="update s_branch set 
	
	s_country='".$s_country."', s_map='".$s_map."', s_mail='".$s_mail."', s_flag='".$fileRename0."', s_pic='".$fileRename1."', main_id='".$main_id."',
	
	s_b1='".$s_b1."', s_b2='".$s_b2."', s_b3='".$s_b3."', s_b4='".$s_b4."', s_b5='".$s_b5."', s_b6='".$s_b6."', s_b7='".$s_b7."', s_b8='".$s_b8."', s_b9='".$s_b9."', s_b10='".$s_b10."',	

s_f1='".$s_f1."', s_f2='".$s_f2."', s_f3='".$s_f3."', s_f4='".$s_f4."', s_f5='".$s_f5."', s_f6='".$s_f6."', s_f7='".$s_f7."', s_f8='".$s_f8."', s_f9='".$s_f9."', s_f10='".$s_f10."'
	
	where s_id=".$id;}	

	
	$qry1=mysql_query($str1) or die(mysql_error());
	
	
	
if($qry1){

	
		mysql_query("COMMIT");	
			echo "<center style='margin:0'><h3>update complete</h3></center>";
			echo "<script>setTimeout(\"self.location='$refer';\",2000);</script>";
			exit();
			
	}else{
		mysql_query("ROLLBACK");
			echo "<center style='margin:0'><h3>Error please contact admin</h3>".mysql_error()."</center>";
			echo "<script>setTimeout(\"self.location='$refer';\",5000);</script>";
			exit();
	
	}
		

}			
		
	
	
	}
	
	
	
	
	
	else if($Event=='Promotion'){

		$del=$_POST['del'];

		$numS=$_POST['numS'];

		$file_name = $_FILES['fileN0']['name']; 
			
		$oldpic=(isset($_POST['oldpic']))? $_POST['oldpic']: "";
		
		$file_name2 = $_FILES['fileN2']['name']; 
			
		$oldpic2=(isset($_POST['oldpic2']))? $_POST['oldpic2']: "";

		$command=$_POST['command'];

		$id=$_POST['pid'];
			
		$titleTh=addslashes($_POST['titleTh']);
		$titleEn=addslashes($_POST['titleEn']);
		$titleJp=addslashes($_POST['titleJp']);
		$topicTh=addslashes($_POST['topicTh']);
		$topicEn=addslashes($_POST['topicEn']);
		$topicJp=addslashes($_POST['topicJp']);
		$detailTh=addslashes($_POST['detailTh']);
		$detailEn=addslashes($_POST['detailEn']);
		$detailJp=addslashes($_POST['detailJp']);
		
		$status=$_POST['status'];
		
		$hot=$_POST['hot'];
		
		$showindex=$_POST['showindex'];
		
		$newsstatus=$_POST['newsstatus'];
		
		$n_date=date('d');
		$n_month=(isset($_POST['mount']))? $_POST['mount']: date('m');
		$n_year=(isset($_POST['year']))? $_POST['year']: date('Y');



if(!empty($newsstatus)){



				$qry1="update messageweb set news=".$newsstatus." where id='1' ";
				$result=mysql_query($qry1);
			
	
}

		
if($status=="l"){
		$refer="administrator.php?p=link/index&status=$status";//$_SERVER['HTTP_REFERER'];	
} else {
	$refer="administrator.php?p=promotion/index&status=$status";//$_SERVER['HTTP_REFERER'];	
	}
		$refer2="administrator.php?p=promotion/index";//$_SERVER['HTTP_REFERER'];	
		

if($command=="delete"){
					
		if(!empty($id) ){
			foreach($id as $ind=>$val){

				$data_num=(empty($numS[$ind]))? 9999 : $numS[$ind];

				//echo $data_num;	
				$qry1=mysql_query("update promotion set numS=".$data_num." where proid=".$val);
				}

			

				foreach($id as $ind=>$val){
//echo $val;
				if($del[$ind]=="true"){
$picsql=mysql_query("select p0 from promotion where proid='".$val."' ");
					if($picsql && mysql_num_rows($picsql)>0){
						list($picname)=mysql_fetch_array($picsql);
						if(!empty($picname)) @unlink("../upload/promotions/".$picname);
					}
			
					$qry1=mysql_query("delete from promotion where proid=".$val);
					}
				}
		}
					
					

			if($qry1){

					mysql_query("COMMIT");	

					echo "<center style='margin:300px 0'><h3>update complete</h3></center>";

					echo "<script>setTimeout(\"self.location='$refer';\",5000)</script>";

					exit();

			}else{

					mysql_query("ROLLBACK");

					echo "<center style='margin:300px 0'><h3>Error please contact admin</h3>".mysql_error()."</center>";

					echo "<script>setTimeout(\"self.location='$refer';\",10000)</script>";

					exit();



			}	

}else{

if($file_name != ""){

		

				$uploads = '../upload/promotions'; // directory to upload to 						

				$fileOK = $uploads.'/'.$file_name;

				$ext = explode(".", $file_name);

				$re = $dir_name.date("Ymdhis");

				$fileRename0 = $re.".".$ext[1];

					

						if(!empty($oldpic)) {@unlink($uploads."/".$oldpic);}

						$copy=copy($_FILES['fileN0']['tmp_name'],$uploads.'/'.$fileRename0); 

				

				}else{

						$fileRename0=$oldpic;

				}





if($file_name2 != ""){

		

				$uploads = '../upload/promotions'; // directory to upload to 						

				$fileOK = $uploads.'/'.$file_name2;

				$ext = explode(".", $file_name2);

				$re = $dir_name.date("Ymdhis");

				$fileRename2 = "C".$re.".".$ext[1];

					

						if(!empty($oldpic2)) {@unlink($uploads."/".$oldpic2);}

						$copy=copy($_FILES['fileN2']['tmp_name'],$uploads.'/'.$fileRename2); 

				

				}else{

						$fileRename2=$oldpic2;

				}



					

				

	if(empty($id) ){


	$str1="insert into promotion(titleTh,topicTh,detailTh,titleEn,topicEn,detailEn,titleJp,topicJp,detailJp,p0,p2,status,hot,showindex,n_date,n_month,n_year) values('".$titleTh."','".$topicTh."','".$detailTh."','".$titleEn."','".$topicEn."','".$detailEn."','".$titleJp."','".$topicJp."','".$detailJp."','".$fileRename0."','".$fileRename2."','".$status."','".$hot."','".$showindex."','".$n_date."','".$n_month."','".$n_year."')";

} else{

	$str1="update promotion set titleTh='".$titleTh."',topicTh='".$topicTh."', detailTh='".$detailTh."',titleEn='".$titleEn."',topicEn='".$topicEn."', detailEn='".$detailEn."',titleJp='".$titleJp."',topicJp='".$topicJp."', detailJp='".$detailJp."', p0='".$fileRename0."', p2='".$fileRename2."',status='".$status."',hot='".$hot."', showindex='".$showindex."' , n_month='".$n_month."', n_year='".$n_year."' where proid=".$id;

	mysql_query("delete from promotion where proid=".$del);

	
}	


	$qry1=mysql_query($str1) or die(mysql_error());

	

	if($qry1){

	


		mysql_query("COMMIT");	

			echo "<center style='margin:300px 0'><h3>update complete</h3></center>";

			echo "<script>setTimeout(\"self.location='$refer';\",2000)</script>";

			exit();

			

	

	}else{

		mysql_query("ROLLBACK");

			echo "<center style='margin:300px 0'><h3>Error please contact admin</h3>".mysql_error()."</center>";

			echo "<script>setTimeout(\"self.location='$refer';\",5000)</script>";

			exit();

	

	}

		



					

		
}
	

	

	

	}
	
	else if($Event=='Banner'){

		$refer="administrator.php?p=branner/index";

	////////////////////// รูป เล็ก  ///////////////

			$file_name = $_FILES['fileN0']['name']; 

			$name=(isset($_POST['name']))? $_POST['name']: "";
			
			$id=$_POST['id'];

			$link=(isset($_POST['link']))? $_POST['link']: "";
			
			$position=(isset($_POST['position']))? $_POST['position']: "";
			
			$position="1";

			$oldpic=(isset($_POST['oldpic']))? $_POST['oldpic']: "";
			

			if($file_name != ""){

		

				$uploads = '../upload/bannerright'; // directory to upload to 						

				$fileOK = $uploads.'/'.$file_name;

				$ext = explode(".", $file_name);

				$re = $dir_name.date("Ymdhis");

				$fileRename0 = $re.".".$ext[1];

					

						if(!empty($oldpic)) {@unlink($uploads."/".$oldpic);}

						$copy=copy($_FILES['fileN0']['tmp_name'],$uploads.'/'.$fileRename0); 

				

				}else{

						$fileRename0=$oldpic;

				}

					

				

	if(empty($id) ){

	

		

	

	

	$sql = "INSERT INTO banner (name,p0,link,position) VALUES ('$name','$fileRename0','$link','$position')";

		

	}else if(!empty($id)){

		$sql = "update banner set name='".$name."', p0='".$fileRename0."', link='".$link."',position='".$position."' where id=".$id;

		

	}

	

	 $result = mysql_query($sql);

	 		 if($result)

			  	{

			echo "<center style='margin:300px 0'><h3>update complete</h3></center>";

			echo "<script>setTimeout(\"self.location='$refer';\",1000)</script>";

			exit();

				}else if(!$result){

			echo "<center style='margin:0'><h3>Error please contact admin</h3>".mysql_error()."</center>";

			echo "<script>setTimeout(\"self.location='$refer';\",3000)</script>";

			exit();

				}	



	

	

	}
	
	
	
	else  if($Event=="News"){
	
	$pid=$_POST['nid'];
	
	$main_id=$_POST['main_id'];
	
	
	//$wm=($mark=="s")?"index&mark=s":"index"; 
	$refer="administrator.php?p=news/index&mid=$main_id";//$_SERVER['HTTP_REFERER'];	

	$titleTh=$_POST['titleTh'];
	
	
	$d0=$_POST['d0'];
	$fileN0=$_FILES["fileN0"]["tmp_name"]; 

	$delGallery=$_POST['delGallery'];
	$sorter=$_POST['sorter'];
	$em_name=$_POST['em_name'];	
	$em_position=$_POST['em_position'];	
		
	
	
	
	
	

	
	
		if(!empty($pid)){
		
$sql="update news set titleTh='".$titleTh."' , main_id='".$main_id."' WHERE id='$pid'";
	  $result = mysql_query($sql) or die(mysql_error());



if(sizeof($sorter)>0){
	foreach($sorter as $gind=>$gval){
	//echo "$gind=>$gval<br/>";
		if(!empty($gval) && $gval>0){
			mysql_query("update gallery_news set sorter=".$gval." where  id=".$gind);
		}
	}
}

if($em_name!=""){
	foreach($em_name as $gind=>$gval){
	//echo "$gind=>$gval<br/>";
			mysql_query("update gallery_news set em_name='".$gval."' where id='".$gind."'");
	
	}
}

if($em_position!=""){
	foreach($em_position as $gind=>$gval){
	//echo "$gind=>$gval<br/>";
			mysql_query("update gallery_news set em_position='".$gval."' where id='".$gind."'");
	
	}
}


		if(sizeof($delGallery)>0){
		
		
		
	
		
		
		
			foreach($delGallery as $gind=>$gval){
			//echo $gind."<=>".$gval."<br>";
			
			
						$strGallery=mysql_query("select id, picname from gallery_news where id=".$gval);
						if($strGallery && mysql_num_rows($strGallery)>0){
							while(list($gid,$gname)=mysql_fetch_array($strGallery)){
							
							
								if(unlink("news/gallery/".$gname)){
									
									$getDeleteGallery.= !empty($getDeleteGallery)? ",": "";
									$getDeleteGallery.=$gid;
									
								}
							}
							
							
							$QryDel=!empty($getDeleteGallery) ? mysql_query("delete from gallery_news where id in(".$getDeleteGallery.")") :exit();
							
						}
			}
		}		
			
		
		}else{
		
		$sql = "INSERT INTO news(titleTh,main_id,sortder) VALUES ('$titleTh','$main_id','9999')";
			//echo $sql;
			  $result = mysql_query($sql)or die(mysql_error());
		
		}
		
		 if($result)
			  	{
			echo "<center style='margin:300px 0'><h3>update complete</h3></center>";
			echo "<script>setTimeout(\"self.location='$refer';\",2000)</script>";
			exit();
				}else if(!$result){
			echo "<center style='margin:0'><h3>Error please contact admin</h3>".mysql_error()."</center>";
			echo "<script>setTimeout(\"self.location='$refer';\",5000)</script>";
			exit();
				}	
		
	
	
	
	}
	
	
	

 ?>

