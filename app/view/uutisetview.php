<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fi" lang="fi">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="description" content="Kuvaus" />
        <meta name="author" content="Aleksi Rautakoski" />
        <title><?= $A['title'] ?> | TeamKukkopilli</title>
        <?= Sees::stylesheet('tyyli') ?>
        <?= Sees::javascript('jquery-1.4.4.min') ?>
        <?= Sees::javascript('script') ?>
    </head>
    <body>
        <div id="page">
            <h1 class="hidden"><?= $A['title'] ?></h1>
            <?php include('header.php'); ?>
            <div id="content" class="clear">
                <div class="wrapper shadow">
                    <div id="navbar">
                        <?php Sees::component('anavbar', 'uutiset' ); ?>
                        <ul class="right">
                            <li><a href="<?= Sees::url_to('kirjaudu'); ?>" class="smaller" id="kirjaudu">Kirjaudu</a></li>
                        </ul>
                        <div id="login_form" class="login_form hidden close_btn">
                            <form action="<?= Sees::url_to(''); ?>" method="post">
                                <fieldset>
                                    <legend>Kirjaudu sisään</legend>
                                    <label for="username">Käyttäjätunnus</label>
                                    <input type="text" name="username" id="username" />
                                    <label for="passu">Salasana</label>
                                    <input type="password" name="passu" id="passu" />
                                    <input type="submit" value="Kirjaudu" class="button" />
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <div id="main-box">
                        <?= $A['yield'] ?>
                        <?php Sees::component('AEditableText',array(1,1,3) ); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php include('footer.php') ?>
    </body>
</html>