

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="../Ajax/dropdown.js"></script>

<div class="ui-widget" style="width:999px;margin:auto">
<em style="color:#0033FF;font-size:14px"><a href="administrator.php">MAIN CONTROL PANEL</a></em>
<div class="ui-state-highlight ui-corner-all" style="margin:0 0 3px 0; padding: 0 .7em;"> 
				<p style="margin:0;padding:0;height:16px">
                
                
        
                
                
                <ul style="list-style:none;position:absolute;margin:-8px 0 0 0;width:949px">
                	<li  style="float:left;margin:-3px 0 0 -20px;font-weight:bold"><a href="?p=show_permission" ><font size='2'>เปลี่ยนพาสเวิร์ด</font></a></li>
                    
                    
                    
                     <li  style="float:left;margin:-3px 0 0 30px;font-weight:bold"><a href="?p=branner/index" ><font size='2'>ภาพสไลด์</font></a></li>   
                    
 <!--               <li  style="float:left;margin:-3px 0 0 30px;font-weight:bold"><a href="?p=category/index" ><font size='2'>ประเทศ</font></a></li>  
                
           <li  style="float:left;margin:-3px 0 0 30px;font-weight:bold"><a href="?p=product/index" ><font size='2'>สาขาใหญ่</font></a></li>            
          -->          
                      <li  style="float:left;margin:-3px 0 0 30px;font-weight:bold" id="category_link"><a href="javascript:" ><font size='2'>สาขา</font></a>
                         <div id='category_diabox' style='background:#d1f1fe;padding:10px;z-index:999;opacity:0.9;filter:alpha(opacity=90)'>
                            <ul style="list-style:none;padding:0;margin:0;">
                                <li  style="margin:5px;font-weight:bold"><a href="?p=product/index" ><font size='2'>สาขาใหญ่</font></a></li>
                                <li  style="margin:5px;font-weight:bold"><a href="?p=sub_product/index" ><font size='2'>สาขาย่อย</font></a></li>


<?
$cc=mysql_fetch_array(mysql_query("select m_id from m_branch order by m_sorter asc , m_id asc "));
$getmid=$cc['m_id'];
$ll=!empty($getmid)?"&mid=$getmid":"";

?>
   <li  style="margin:5px;font-weight:bold"><a href="?p=news/index<?=$ll;?>" ><font size='2'>ข้อมูลพนักงาน</font></a></li>

                               
                            </ul>
                         </div>
                    </li>
                    
                    
                    
                    
                    
                    
                    
                  <!--   <li  style="float:left;margin:-3px 0 0 30px;font-weight:bold"><a href="?p=news/index" ><font size='2'>ข้อมูลพนักงาน</font></a></li> -->
                     
               
                     
                     
      <!--          <li  style="float:left;margin:-3px 0 0 30px;font-weight:bold" id="list_link"><a href="javascript:" ><font size='2'>Reference</font></a>
                         <div id='list_diabox' style='background:#d1f1fe;padding:10px;z-index:999;opacity:0.9;filter:alpha(opacity=90)'>
                            <ul style="list-style:none;padding:0;margin:0;">
                                <li  style="margin:5px;font-weight:bold"><a href="?p=news/index" ><font size='2'>บทความละข่าวสาร</font></a></li>
                                <li  style="margin:5px;font-weight:bold"><a href="?p=cate_review/index" ><font size='2'>หมวดหมู่</font></a></li>
                                                        
                            </ul>
                         </div>
                    </li>-->
                    
                    
                     
                     <!--<li  style="float:left;margin:-3px 0 0 30px;font-weight:bold"><a href="?p=promotion/index&status=e" ><font size='2'>Review</font></a></li>
                     <li  style="float:left;margin:-3px 0 0 30px;font-weight:bold"><a href="?p=promotion/index&status=p" ><font size='2'>News & Promotion</font></a></li>  
-->                    <li  style="float:left;margin:-3px 0 0 30px;font-weight:bold"><a href="?p=promotion/index&status=n" ><font size='2'>News</font></a></li>  
                            
                  <!--  <li  style="float:left;margin:-3px 0 0 30px;font-weight:bold"><a href="?p=promotion/index&status=s" ><font size='2'>Service</font></a></li>   
                    <li  style="float:left;margin:-3px 0 0 30px;font-weight:bold"><a href="?p=contact/index" ><font size='2'>ใบเสนอราคา</font></a></li>-->
             	
                <!--  	<li  style="float:left;margin:-3px 0 0 30px;font-weight:bold"><a href="?p=clip/index" ><font size='2'>Clip</font></a></li>
                    
                    
                   
                          <li  style="float:left;margin:-3px 0 0 30px;font-weight:bold"><a href="?p=link/index&status=l" ><font size='2'>link</font></a></li>  
                    
               <li  style="float:left;margin:-3px 0 0 30px;font-weight:bold"><a href="?p=franchise/index" ><font size='2'>Franchise</font></a></li>-->
                    
                    
                    
                    <!--<li  style="float:left;margin:-3px 0 0 30px;font-weight:bold"><a href="?p=customer/index" ><font size='2'>ข่าวสารและกิจกรรม</font></a></li>-->
                    
                    
                  <!--  <li  style="float:left;margin:-3px 0 0 20px;font-weight:bold" id="gallery_link"><a href="javascript:" ><font size='2'>Gallery</font></a>
                      <div id='gallery_diabox' style='background:#d1f1fe;padding:10px;z-index:999;opacity:0.9;filter:alpha(opacity=90)'>
                        <ul style="list-style:none;padding:0;margin:0;" >
                          <li  style="margin:5px;font-weight:bold"><a href="?p=gallery/index" >จัดการรูปภาพ</a></li>
                          <li  style="margin:5px;font-weight:bold"><a href="?p=album/index" ><font size='2'>อัลบั้มภาพ</font></a></li>
                          </ul>
                      </div>
           	      </li>-->
                  
                  
                  
                <!--  <li  style="float:left;margin:-3px 0 0 30px;font-weight:bold" id="list_link"><a href="javascript:" ><font size='2'>สมัครงาน</font></a>
                         <div id='list_diabox' style='background:#d1f1fe;padding:10px;z-index:999;opacity:0.9;filter:alpha(opacity=90)'>
                            <ul style="list-style:none;padding:0;margin:0;">
                                <li  style="margin:5px;font-weight:bold"><a href="?p=section/index" ><font size='2'>ประกาศรับสมัครงาน</font></a></li>
                                <li  style="margin:5px;font-weight:bold"><a href="?p=career/resumelist" ><font size='2'>ผู้สมัครงาน</font></a></li>
                               
                            </ul>
                         </div>
                    </li>-->
                    
                    
            <!--   <li  style="float:left;margin:-3px 0 0 30px;font-weight:bold"><a href="?p=clip/index" ><font size='2'>Clip</font></a></li>   -->
                  
                  <!--<li  style="float:left;margin:-3px 0 0 20px;font-weight:bold" id="customer_link"><a href="javascript:" ><font size='2'>Customer Referent</font></a>
                      <div id='customer_diabox' style='background:#d1f1fe;padding:10px;z-index:999;opacity:0.9;filter:alpha(opacity=90)'>
                        <ul style="list-style:none;padding:0;margin:0;" >
                          <li  style="margin:5px;font-weight:bold"><a href="?p=gallery/index" >จัดการรูปภาพ</a></li>
                          <li  style="margin:5px;font-weight:bold"><a href="?p=album/index" ><font size='2'>อัลบั้มภาพ</font></a></li>
                          </ul>
                      </div>
           	      </li>-->
                    
                    
                	<li  style="float:right;font-weight:bold;margin:0 30px"><a href="?logout=yes"   ><font size='2'>Log out</font></a></li>
                </ul>
</p>
			</div>
</div>
<script type="text/javascript">
		at_attach("category_link", "category_diabox", "hover", "y", "pointer"); 	
		at_attach("list_link", "list_diabox", "hover", "y", "pointer");
		at_attach("gallery_link", "gallery_diabox", "hover", "y", "pointer");
		at_attach("customer_link", "customer_diabox", "hover", "y", "pointer");
		at_attach("issue_link", "issue_diabox", "hover", "y", "pointer");
		at_attach("picture_link", "picture_diabox", "hover", "y", "pointer");

   </script>
<div class="demo" >
	<div id="tabs" style="width:999px;margin:auto;padding:0 0 10px 0;font-size:14px">
