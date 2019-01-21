<header class="header">
    <div class="container header__container">
        <div class="nav__logo">
            <a href="/" > <figure class="logo__figure" style="background-image: url('/uploads/{$logo.image}')"></figure></a>
        </div>
        {if $main !='home'}
            <div class="header__title header-title">{$head_title}</div>
        {/if}
        <div class="header__nav">
            <button class="button-header" ng-click="toggle = !toggle">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
        </div>
        <div class="header__menu">
            <ul class="header__list">
            	{foreach from=$menuArr name=menu item=menu}
                    
                    {if $smarty.foreach.menu.last} 
	                    <li class="header__item header__item--p">
                        	<a class="p {$menu.class}" href="{$menu.href}" >{$menu.title}</a>
                    	</li>
                    {else}
                    	<li class="header__item">
                        	<a class="sub-heading {$menu.class}" href="{$menu.href}" >{$menu.title}</a>
                    	</li>
                    {/if} 
                {/foreach}
                
                <li class="header__item header__item--social">
                    <a class="header__social" href="{$facebooklink}" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a class="header__social" href="{$youtubelink}" target="_blank"><i class="fa fa-youtube-play"></i></a>
                </li>
            </ul>
        </div>
    </div>
</header>