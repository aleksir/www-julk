<?php
Sees::content_type();
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fi" lang="fi">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="description" content="Kuvaus" />
        <meta name="author" content="Aleksi Rautakoski" />
        <?= URL::stylesheet('tyyli') ?>
        <title>Hups</title>
    </head>
    <body>
        <div id="page">
        <div id="header" class="clear">
            <div class="wrapper">
                <a href="#" class="name">
                    <span class="grey">Team</span><span>&nbsp;Kukkopilli</span>
                    <img src="<?= URL::file("images/lintu.png") ?>" alt="logo" />
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
        <div id="content" class="clear">
            <div class="wrapper">
                <div id="main-box">
                    <h1>Hups, etsimääsi sivua ei löytynyt.</h1>
                    <p>Voit mennä etusivulle <a href="<?= URL::url_to('') ?>" class="linkki">tästä</a>.</p>
                </div>
            </div>
        </div>
        </div>
        <div id="footer" class="clear">
            <div class="wrapper">
                <div id="other">
                    <p></p>
                </div>
                <div id="author" >
                    <address class="clear">
                        &copy; 2011 <a href="mailto:aleksi.s.rautakoski@jyu.fi">Aleksi&nbsp;Rautakoski</a><br />
                        <a href="http://appro.mit.jyu.fi/www/">WWW-julkaiseminen</a> -kurssin harjoitustyö<br />
	            Päivitetty 23.2.2011
                    </address>
                </div>
            </div>
        </div>
    </body>
</html>