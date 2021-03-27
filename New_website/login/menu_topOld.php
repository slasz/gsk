<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="../Ajax/dropdown.js"></script>



<div class="ui-widget" style="width:1050px;margin:auto"> <span class="ui-icon ui-icon-wrench" style="float: left; margin-right: .3em"></span><em style="color:#0033FF;font-size:14px">CONTROL PANEL</em>
    <div class="ui-state-highlight ui-corner-all" style="margin:0 0 3px 0; padding: 0 .7em;">
      <p style="margin:0;padding:0;height:16px">&nbsp; </p>
      <ul style="list-style:none;position:absolute;margin:-8px 0 0 0;width:1000px">
        <li  style="float:left;margin:-3px 0 0 -20px;font-weight:bold"><a href="?p=show_permission" ><font size='2'>เปลี่ยนรหัสผู้ดูแล</font></a></li>
        <li  style="float:left;margin:-3px 0 0 20px;font-weight:bold"><a href="?p=promotion/index" ><font size='2'>โปรโมชั่น</font></a></li>
        <li  style="float:left;margin:-3px 0 0 20px;font-weight:bold" id="category_link"><a href="javascript:" ><font size='2'>ร้านค้า</font></a>
            <div id='category_diabox' style='background:#d1f1fe;padding:10px;z-index:999;opacity:0.9;filter:alpha(opacity=90)'>
              <ul style="list-style:none;padding:0;margin:0;" >
                <li  style="margin:5px;font-weight:bold"><a href="?p=product/index" >จัดการบริการ</a></li>
                <li  style="margin:5px;font-weight:bold"><a href="?p=category/index" ><font size='2'>หมวดหมู่บริการ</font></a></li>
                <!--<li  style="margin:5px;font-weight:bold"><a href="?p=category/index" >หมวดหมู่ย่อย</a></li>
                            <li  style="margin:5px;font-weight:bold"><a href="?p=color/index" >Color</a></li>
                            <li  style="margin:5px;font-weight:bold"><a href="?p=size/index" >Size</a></li>-->
              </ul>
            </div>
        </li>
        <li  style="float:left;margin:-3px 0 0 30px;font-weight:bold"><a href="?p=branner/index" ><font size='2'>ภาพสไลด์</font></a></li>
       
        <li  style="float:right;font-weight:bold;margin:0 30px"><a href="?logout=yes"   ><font size='2'>ออกจากระบบ</font></a></li>
      </ul>
      </p>
    </div>
</div>

<div class="demo" >
<div id="tabs" style="width:1050px;margin:auto;padding:0 0 10px 0;font-size:14px">
<script type="text/javascript">
		at_attach("category_link", "category_diabox", "hovers", "y", "pointer");
		at_attach("issue_link", "issue_diabox", "hovers", "y", "pointer");

   </script>
