<?

include_once("../includes/connect.php"); 

				

			

$id=(isset($_GET['id']))? $_GET['id']:"";

$sqltxt=(!empty($id))? "select id, name, p0, link, sorter , position from banner where id=".$id :"";

$qry=mysql_query($sqltxt);

if($qry && mysql_num_rows($qry)>0){

	list($id,$name,$p0,$link,$sorter,$position)=mysql_fetch_array($qry);
	
	$chk=($position=='1')?"checked":"";
	$chk2=($position=='2')?"checked":"";

}

?>

 <script type="text/javascript">
    function chk(){   
		var fty=new Array(".gif",".jpg",".jpeg",".png"); // ประเภทไฟล์ที่อนุญาตให้อัพโหลด   
        var a=document.Add.fileN0.value; //กำหนดค่าของไฟล์ใหกับตัวแปร a   
		var permiss=0; // เงื่อนไขไฟล์อนุญาต
		a=a.toLowerCase();    
		if(a !=""){
			for(i=0;i<fty.length;i++){ // วน Loop ตรวจสอบไฟล์ที่อนุญาต   
				if(a.lastIndexOf(fty[i])>=0){  // เงื่อนไขไฟล์ที่อนุญาต   
					permiss=1;
					break;
				}else{
					continue;
				}
			}  
			if(permiss==0){ 
				alert("อัพโหลดได้เฉพาะไฟล์ gif jpg jpeg png");     
				return false;   			
			} 		
		}        
    }   
</script>

<div class='product' style="background:#ffffff;padding:2px 8px">

<a href="?p=branner/index" style="position:relative;float:right;margin:-10px 10px" ><h4>หน้าก่อนนี้</h4></a>

<ul class="product" style="padding:5px;magin:0;height:20px">

    <li><h3 style="padding:0;margin:0;">หมวดหมู่ย่อย</h3></li>

</ul>

  <FORM METHOD="POST" ENCTYPE="multipart/form-data" name="Add" id="Add" ACTION="saveform.php" onsubmit="return chk();">

    <input type="hidden" id="id" name="id" value="<?=$id?>">

            <input type="hidden" id="Event" name="Event" value="Banner">

    <table width="600" border="0" align="center" cellpadding="3" class="txt1">

      <!-- <tr>

                  <td width="206" valign="top"><strong>ชื่อแบนเนอร์</strong></td>

                  <td width="376"><label>

                    <input name="name" type="text" id="name" value="<?//=$name?>" size="50" maxlength="150">

                  </label></td>

                </tr>-->

<tr >

                  <td><p>ลิงค์<br>

                  www.xxxx.com</p>                  </td>

                  <td><input name="link" type="text" id="link" value="<?=$link?>" size="70" maxlength="250"></td>
                </tr>

<tr>

                  <td><p>จัดลำดับ<br>

                  ใส่ตัวเลขไม่เกิน 4 หลัก</p>                  </td>

                  <td><input name="sorter" type="text" id="sorter" value="<?=( empty($sorter) || $sorter==0)? 9999 : $sorter ;?>" style="width:35px" maxlength="4"></td>
                </tr>

                <tr>

                  <td valign="top" nowrap>รูปแบรนด์เนอร์<br></td>

                  <td>

                    <p>
                    
                   


                    
                      <?=(!empty($p0))?"<img src='../upload/bannerright/".$p0."' width='480' height='102'><br/>":""?>
                      
                      <input name="fileN0" type="file" class="inputbox" id="fileN0"/>
                      
                      <input type="hidden" id="oldpic	" name="oldpic" value="<?=$p0?>">
                      
                      <br/>
                    </p>                  </td>
      </tr>
               <!-- <tr>
                  <td>ตำแหน่งการแสดง</td>
                  <td><input type="radio" name="position" id="radio" value="1" <?=$chk;?>/>
                    แสดงหน้าแรก
                      &nbsp;&nbsp;
                      <input type="radio" name="position" id="radio2" value="2" <?=$chk2;?>/>
                  แสดงหน้าใน</td>
                </tr>-->
                <tr>
                  <td>&nbsp;</td>
                  <td><p><font color="#FF0000">ขนาดภาพที่เหมาะสม &nbsp;&nbsp;1169*314  (อัพโหลดได้เฉพาะไฟล์ .gif .jpg .jpeg .png เท่านั้น )
                  <!--<br />
                  ขนาดภาพที่เหมาะสมหน้าใน &nbsp;&nbsp;&nbsp;&nbsp;950*150--></font></p>                  </td>
                </tr>
                <tr>

                  <td>&nbsp;</td>

                  <td><input type="submit" name="Add_news" value=" Save "  />

                      <label>

                      <input type="reset" name="Reset" value="Reset" />
                    </label></td>
                </tr>
              </table>

  </form>

   </div>   