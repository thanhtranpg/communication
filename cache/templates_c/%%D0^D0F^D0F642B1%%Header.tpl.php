<?php /* Smarty version 2.6.26, created on 2018-09-25 05:23:27
         compiled from D:%5CCODE%5Ccode%5Cthuocdongy%5Ctemplates/Header/Header.tpl */ ?>
<div id="divAdRight" style="DISPLAY: none; POSITION: absolute; TOP: 0px">  
 

  <?php if ($this->_tpl_vars['Banner_left']): ?>    
  <a href="<?php echo $this->_tpl_vars['Banner_left']['link']; ?>
"><img src="uploads/adv/<?php echo $this->_tpl_vars['Banner_left']['image']; ?>
" width="120" /></a>

<?php endif; ?>   
</div>      
<div id="divAdLeft" style="DISPLAY: none; POSITION: absolute; TOP: 0px">       
 <?php if ($this->_tpl_vars['Banner_right']): ?>    
<a href="<?php echo $this->_tpl_vars['Banner_right']['link']; ?>
"><img src="uploads/adv/<?php echo $this->_tpl_vars['Banner_right']['image']; ?>
" width="120" /></a>
<?php endif; ?>
</div> 
<?php echo '
    
<script>       
    function FloatTopDiv()      
    {      
        startLX = ((document.body.clientWidth -MainContentW)/2)-LeftBannerW-LeftAdjust , startLY = TopAdjust+80;      
        startRX = ((document.body.clientWidth -MainContentW)/2)+MainContentW+RightAdjust , startRY = TopAdjust+80;      
        var d = document;      
        function ml(id)      
        {      
            var el=d.getElementById?d.getElementById(id):d.all?d.all[id]:d.layers[id];      
            el.sP=function(x,y){this.style.left=x + \'px\';this.style.top=y + \'px\';};      
            el.x = startRX;      
            el.y = startRY;      
            return el;      
        }      
        function m2(id)      
        {      
            var e2=d.getElementById?d.getElementById(id):d.all?d.all[id]:d.layers[id];      
            e2.sP=function(x,y){this.style.left=x + \'px\';this.style.top=y + \'px\';};      
            e2.x = startLX;      
            e2.y = startLY;      
            return e2;      
        }      
        window.stayTopLeft=function()      
        {      
            if (document.documentElement && document.documentElement.scrollTop)      
                var pY =  document.documentElement.scrollTop;      
            else if (document.body)      
                var pY =  document.body.scrollTop;      
             if (document.body.scrollTop > 30){startLY = 3;startRY = 3;} else  {startLY = TopAdjust;startRY = TopAdjust;};      
            ftlObj.y += (pY+startRY-ftlObj.y)/16;      
            ftlObj.sP(ftlObj.x, ftlObj.y);      
            ftlObj2.y += (pY+startLY-ftlObj2.y)/16;      
            ftlObj2.sP(ftlObj2.x, ftlObj2.y);      
            setTimeout("stayTopLeft()", 1);      
        }      
        ftlObj = ml("divAdRight");      
        //stayTopLeft();      
        ftlObj2 = m2("divAdLeft");      
        stayTopLeft();      
    }      
    function ShowAdDiv()      
    {      
        var objAdDivRight = document.getElementById("divAdRight");      
        var objAdDivLeft = document.getElementById("divAdLeft");        
        if (document.body.clientWidth < 1020)      
        {      
            objAdDivRight.style.display = "none";      
            objAdDivLeft.style.display = "none";      
        }      
        else      
        {      
            objAdDivRight.style.display = "block";      
            objAdDivLeft.style.display = "block";      
            FloatTopDiv();      
        }      
    }  
</script>       
<script>       
document.write("<script type=\'text/javascript\' language=\'javascript\'>MainContentW = 1080;LeftBannerW = 140;RightBannerW = 125;LeftAdjust = 5;RightAdjust = 5;TopAdjust = 10;ShowAdDiv();window.onresize=ShowAdDiv;;<\\/script>");      
</script>
'; ?>










<div class="body_content img-rounded">


     <div class="container contant_header">
     <div class="row" >
      
      <div class="col-md-12 col-sm-12 text-right     ">  
      
          <div class="list h_padding">
          <div class="row" >
           <div class="col-md-12 col-sm-12  ">
           <a href="<?php echo $this->_tpl_vars['home_url']; ?>
"><img src="uploads/adv/<?php echo $this->_tpl_vars['Banner']['image']; ?>
" style="width:100%" class="img-wrap"></a>
          </div>
          
          </div>
          </div>
          
          <div class="clearfix"></div>
          <div class="box_search h_padding" >
        
         <div class="e_right">
          <a href="<?php echo $this->_tpl_vars['cart_href']; ?>
"><span style="font-size:24px"class="glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp;Giỏ Hàng <span style="color:red"><?php if ($this->_tpl_vars['number_product']): ?>(<?php echo $this->_tpl_vars['number_product']; ?>
) <?php endif; ?></span></a>
          </div>
          
           <div class="e_right">
            <div class="txtbox">
            <?php echo '
             <script language="javascript">
function btnSearch_onclick(){
    if(document.SearchFrom.keyword.value==\'\'){
        alert("Bạn hãy nhật từ khóa tìm kiếm");document.SearchFrom.keyword.focus();return false;
    }
    document.SearchFrom.submit();
    return true;
}
</script>
'; ?>

            <form name="SearchFrom" id="SearchFrom"  method="GET" action="<?php echo $this->_tpl_vars['home_url']; ?>
">
            <input type="hidden" name="main" value="product" />
        <input name="keyword" id="keyword" type="text" value="" placeholder="Nhập từ khóa tìm kiếm" id="top_txt_search" class="text_left" onfocus="clearText(this)" onblur="clearText(this)" />
        <input type="submit" name="btn_search" value="" onclick=" btnSearch_onclick()" id="top_btn_search" class="text_mid" />
     
        </form>
      </div>
          </div>
        </div>
                  <div class="clearfix"></div>
        
        
        
<?php if ($this->_tpl_vars['maintenace'] != 1): ?>  
    <!-- Navigation -->
    <nav class="navbar" role="navigation">
        <div class="row">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
            
                <a class="navbar-brand" href="<?php echo $this->_tpl_vars['home_url']; ?>
"><img src="images/mini_logo1.png" class="img-wrap"></a> 
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar">
                <?php $_from = $this->_tpl_vars['menuArr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['menu'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['menu']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['menu']):
        $this->_foreach['menu']['iteration']++;
?>
                  <?php if (! $this->_tpl_vars['menu']['sub_menu']): ?>
                    <li>
                        <a class="<?php echo $this->_tpl_vars['menu']['class']; ?>
" href="<?php echo $this->_tpl_vars['menu']['href']; ?>
"><?php echo $this->_tpl_vars['menu']['title']; ?>
 &nbsp;</a>
                    </li>
                    <?php else: ?>
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle <?php echo $this->_tpl_vars['menu']['class']; ?>
" data-toggle="dropdown"><?php echo $this->_tpl_vars['menu']['title']; ?>
 <b class="caret"></b>  &nbsp;</a>
                        <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                            <?php $_from = $this->_tpl_vars['menu']['sub_menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['level2'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['level2']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['level2']):
        $this->_foreach['level2']['iteration']++;
?>
                            <?php if (! $this->_tpl_vars['level2']['sub_menu_3']): ?>
                            <li >
                                <a href="<?php echo $this->_tpl_vars['level2']['href']; ?>
" class="<?php echo $this->_tpl_vars['menu']['class']; ?>
" ><?php echo $this->_tpl_vars['level2']['title']; ?>
 &nbsp;</a>
                            </li>
                            <?php else: ?>
                               <li class="dropdown-submenu" >
                                <a href="javascript:void(0)" tabindex="-1" onclick="show_menu(this)" class="dropdown-toggle <?php echo $this->_tpl_vars['menu']['class']; ?>
" data-toggle="dropdown"><?php echo $this->_tpl_vars['level2']['title']; ?>
</a>
                                <ul class="dropdown-menu" style="width:100%; padding-left:5px">
                                    <?php $_from = $this->_tpl_vars['level2']['sub_menu_3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['sub_menu_level_3'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['sub_menu_level_3']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['sub_menu_level_3']):
        $this->_foreach['sub_menu_level_3']['iteration']++;
?>
                                    <li><a tabindex="-1" href="<?php echo $this->_tpl_vars['sub_menu_level_3']['href']; ?>
" class="<?php echo $this->_tpl_vars['menu']['class']; ?>
" ><span class="glyphicon glyphicon-circle-arrow-right"></span> <?php echo $this->_tpl_vars['sub_menu_level_3']['title']; ?>
</a></li>
                                     <?php endforeach; endif; unset($_from); ?>  
                                </ul>
                               </li>
                            <?php endif; ?>
                            <?php endforeach; endif; unset($_from); ?>    
                        </ul>
                    </li>
                    <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>    
                
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<?php endif; ?>
    
         <?php echo '
         <script>
         $(\'ul.dropdown-menu [data-toggle=dropdown]\').on(\'click\', function(event) {
    // Avoid following the href location when clicking
    event.preventDefault(); 
    // Avoid having the menu to close when clicking
    event.stopPropagation(); 
    // Re-add .open to parent sub-menu item
    $(this).parent().addClass(\'open\');
    $(this).parent().find("ul").parent().find("li.dropdown").addClass(\'open\');
});
         
         
         function show_menu(a){
            $(this).parent().find(\'ul\').css(\'display\',\'block\');
         }
         </script>
         '; ?>

   </div>       
    </div>
    </div>