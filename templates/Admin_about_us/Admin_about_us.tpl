<div>{$msg}</div>
<!--Child Menu-->
<div class="admin_block">
	
    <div class="menu_child paddingBottom10">
    	{foreach from=$arr_about_us name=item key=key item=item}
        <a {if $id == $key}style="color:red;"{/if} href="webadmin.php?main={$main}&id={$key}">{$item}</a> {if !$smarty.foreach.item.last}|{/if} 
        {/foreach}
    </div>
</div>    
<!--End Child Menu-->


<div class="admin_block">
	<div class="mod_title marginBottom10">{$cur_title}</div>    
    	<div>{$msg}</div>
    	<div class="clear paddingBottom5"></div>		
        <div style="text-align:center">
			<textarea name="des" style="width: 100%; height: 200px">{$des}</textarea>
        </div>   
        
        <div class="float_left marginRight10" style="width:35%;">&nbsp;</div>
        <div class="float_left"><input type="submit" value="Cập nhật" class="button"></div>
        <div class="clear"></div>  
</div>

</script>