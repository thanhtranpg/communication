<h1>load media</h1>
{foreach from=$our_work_contents name=media item=media}
    <a href="javascript:voide(0);" onclick="media_play(this,'{$media.title}');" >{$media.title}</a> <br/>
    <img  src="{insert name=getItemImage img=$media.media id=$media.id folder='ourwork_image' type='610'}" width="50" />
    </br>
{/foreach}