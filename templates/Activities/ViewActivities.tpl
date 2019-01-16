<div class="home fll">
	<div class="detail-news">
	<h2>Tin chi tiết</h2><a href="javascript:void();"> >> {$PageTitle}</a>		
		 <div class="details">
		 
		<h3> {$item.title}</h3>
		<div>
			<div class="viewnews_brief">{$item.brief}</div>
			 {if $item.image}<div class="viewnews_img"><img src="{insert name=getItemImage img=$item.image id=$item.id folder='item' type='150'}" width="280" border="0"  alt="{$item.title}"/></div>{/if}
		<div class="viewnews_des">{$item.des}</div>
				
		</div>
		<div class="tinkhc">
		{if $arrCourseest}
		<div class="viewnews_next"><b>Tin mới</b></div>
		{foreach from=$arrCourseest name=item item=item}        
		<div class="viewnews_nextitem"><a href="{$item.href}">{$item.title}</a> ({$item.time})</div>
		{/foreach}
		{/if}
		
		{if $arrOldCourse}
		<div class="viewnews_next marginTop10"><b>Tin cũ</b></div>
		{foreach from=$arrOldCourse name=item item=item}        
		<div class="viewnews_nextitem"><a href="{$item.href}">{$item.title}</a> ({$item.time})</div>
		{/foreach}
		 {/if}
		</div>
	 </div>
		 
	</div>
	 <div class="clb"></div>
</div><!--end home-->