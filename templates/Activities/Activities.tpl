
<div class="home fll">
	<div class="detail-news">
	<h2>Hoạt động</h2>
		{foreach from=$arrItem1 name=item item=item}
		<div class="noibo">
			 {if $item.image}<a href="{$item.href}"><img src="{insert name=getItemImage img=$item.image id=$item.id folder='action' type='150'}" width="248" height="165" border="0"   alt="{$item.title}" class="img-noibo fll" /></a>{/if}
			<h3>{$item.title}</h3>
			<p>{$item.brief}</p>
		</div>
	   <p class="chitiet flr"><a href="{$item.href}">Xem tiếp<img src="style/images/xemtiep.png" /></a></p>
	   {if !$smarty.foreach.item.last}
            <div class="news_dot"></div>
          {/if}
	   {/foreach}
		<div class="clb"></div>
		 <div style="border-bottom:1px dotted #000; margin:10px;"></div>
		 <div class="list-news">
			<ul>
			{foreach from=$arrItem name=item item=item}
				<li>
					 {if $item.image}<a href="{$item.href}"><img src="{insert name=getItemImage img=$item.image id=$item.id folder='action' type='150'}" class="img-news fll" width="100" height="76" border="0"   alt="{$item.title}"/></a>{/if}
					<h4>{$item.title}</h4>
					<p>{$item.brief}</p>
					<p class="chitiet flr"><a href="{$item.href}">Xem tiếp<img src="style/images/xemtiep.png" /></a></p>
				</li>
				{if $smarty.foreach.item.iteration % 2 == 0 && !$smarty.foreach.item.last}
				 <div class="clear"></div>
				{/if}
			 {/foreach} 
			</ul>
			<div class="phantrang flr">{$pagingData}</div>
		 </div>
		 
	</div>
	 <div class="clb"></div>
</div><!--end home-->
