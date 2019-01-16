    <div class="left">
    {if $AccessMod}
    	<div class="adm_menu admin_block">
        	<div class="title padding5 marginBottom20">Bảng điều khiển của người quản trị </div>
            <div>
            {foreach from=$AccessMod name=items item=items}
                <div class="menu float_left marginLeft15"><a href="webadmin.php?main={$items.modkey}{$items.modlink}"><img src="style/images/admin/{$items.modkey}.gif" border="0" /></a><br /><a href="webadmin.php?main={$items.modkey}{$items.modlink}">{$items.modname}</a></div>
                {if $smarty.foreach.items.iteration % 2 == 0 || $smarty.foreach.items.last}<div class="clear marginBottom20"></div>{/if}
            {/foreach}
            </div>
        </div>        
    {/if}    
    </div>
    <div class="content">