<?php /* Smarty version 2.6.26, created on 2019-01-07 07:54:33
         compiled from D:%5CCODE%5Ccode%5Ccommunication.com%5Ctemplates/AdminMenu/AdminMenu.tpl */ ?>
    <div class="left">
    <?php if ($this->_tpl_vars['AccessMod']): ?>
    	<div class="adm_menu admin_block">
        	<div class="title padding5 marginBottom20">Bảng điều khiển của người quản trị </div>
            <div>
            <?php $_from = $this->_tpl_vars['AccessMod']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['items'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['items']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['items']):
        $this->_foreach['items']['iteration']++;
?>
                <div class="menu float_left marginLeft15"><a href="webadmin.php?main=<?php echo $this->_tpl_vars['items']['modkey']; ?>
<?php echo $this->_tpl_vars['items']['modlink']; ?>
"><img src="style/images/admin/<?php echo $this->_tpl_vars['items']['modkey']; ?>
.gif" border="0" /></a><br /><a href="webadmin.php?main=<?php echo $this->_tpl_vars['items']['modkey']; ?>
<?php echo $this->_tpl_vars['items']['modlink']; ?>
"><?php echo $this->_tpl_vars['items']['modname']; ?>
</a></div>
                <?php if ($this->_foreach['items']['iteration'] % 2 == 0 || ($this->_foreach['items']['iteration'] == $this->_foreach['items']['total'])): ?><div class="clear marginBottom20"></div><?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
            </div>
        </div>        
    <?php endif; ?>    
    </div>
    <div class="content">