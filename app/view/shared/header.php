	<div id="header" class="clear">
    	<div class="wrapper">
            <a href="<?= Sees::url_to(''); ?>" class="name">
            	<span class="grey">Team</span><span>&nbsp;Kukkopilli</span>
                <img src="<?= Sees::file("images/lintu.png") ?>" alt="logo" />
            </a>
            <form method="post" action="haku.php" class="search">
            <p>
            	<label for="search"><span class="suurennuslasi"></span></label>
                <input type="text" name="search" id="search" />
                <input type="submit" value="Hae" class="button hidden" />
            </p>
            </form>
        </div>
	</div>