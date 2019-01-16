<footer class="footer" data-aos="fade-up">
    <div class="container footer__container">
        <div class="nav__logo">
            <a href="#" target=""> <figure class="logo__figure" style="background-image: url('../assets/imgs/logo.png')"></figure></a>
        </div>
        <nav class="nav footer__nav">
            <ul class="footer__list">
            	{foreach from=$menuArr name=menu item=menu}
                	<li class="header__item">
                    	<li class="footer__item">
		                    <a class="link-menu {$menu.class}" href ="{$menu.href}" >{$menu.title}</a>
		                </li>
                	</li>
                {/foreach}
            </ul>
        </nav>
    </div>
    <div class="footer__center">
        <div class="container">
            <div class="footer__row">
                <div class="footer__col col-60">
                    <h5 class="footer__label label">ADDRESS</h5>
                    <div class="footer__description p-small">
                        {$address}
                    </div>
                </div>
                <div class="footer__col col-center">
                    <h5 class="footer__label label">CONTACT</h5>
                    <div class="footer__description p-small">
                        {$email} <br/>
                        {$hotline}
                    </div>
                </div>
                <div class="footer__col col-right">
                    <h5 class="footer__label label">FOLLOW US</h5>
                    <div class="footer__social">
                        <a href="{$facebooklink}" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="{$youtubelink}" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <div class="footer__notice">
                <p class="p-small">
                    {$copyright}
                </p>
            </div>
        </div>
    </div>
</footer>