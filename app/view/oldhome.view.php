<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fi" lang="fi">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="shortcut icon" href="/www-julk/images/favicon.ico" type="image/x-icon" />
        <?= ELVI::stylesheet('tyyli') ?>
        <?= ELVI::javascript('jquery-1.4.4.min') ?>
        <?= ELVI::javascript('script') ?>
        <title><?= $title ?></title>
    </head>
    <body>
        <div id="header">
            <a href="<?= ELVI::url_to('') ?>" ><img src="/www-julk/images/logo.png" alt="logo" /></a>
            <h1 class="">Sivusto</h1>
        </div>
        <div id="yla" class="musta">
                    <div id="banneri">
                        <!--<img src="/www-julk/images/ajax-loader.gif" alt="ajax-loader" />-->
                    </div>
                    <div id="navbar">
                        <ul>
                            <li><a href="">Etusivu</a></li>
                            <li><a href="">Täh</a></li>
                            <li><a href="">Mitä</a></li>
                            <li><a href="">Milloin</a></li>
                            <li><a href="">Ota yhteyttä</a></li>
                        </ul>
                    </div>
        </div>
        <div id="wrapper">
            <div id="content">

                <div id="palstat" >
                    <div id="palsta1">
                        <p>Lorem ipsum dolor sit amet, <a href="">Linkki</a> consectetur adipiscing elit. Suspendisse nisl tortor, fermentum eu sodales ut, dictum luctus diam. Sed mauris tellus, viverra ac congue vel, faucibus vel tortor.</p>
                    </div>
                    <div id="palsta2">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse nisl tortor, fermentum eu sodales ut, dictum luctus diam. Sed mauris tellus, viverra ac congue vel, faucibus vel tortor.</p>
                    </div>
                    <div id="palsta3" class="musta">
                        <p>Lorem ipsum dolor sit amet, <a href="">Linkki</a> consectetur adipiscing elit. Suspendisse nisl tortor, fermentum eu sodales ut, dictum luctus diam. Sed mauris tellus, viverra ac congue vel, faucibus vel tortor.</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer">
            <img src="/www-julk/images/logo_pien.png" alt="logo" />
            <address class="right clear">
                Copyright &copy; 2011 <a href="mailto:aleksi.s.rautakoski@jyu.fi">Aleksi Rautakoski</a><br />
<!--
Skype 'My status' button
http://www.skype.com/go/skypebuttons
-->
                <script type="text/javascript" src="http://download.skype.com/share/skypebuttons/js/skypeCheck.js"></script>
                <a href="skype:rolexxi?chat"><img src="http://mystatus.skype.com/smallclassic/rolexxi" style="border: none;" width="114" height="20" alt="My status" /></a>
            </address>
        </div>
    </body>
</html>