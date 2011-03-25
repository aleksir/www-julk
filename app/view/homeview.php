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
            <?php include('header.php') ?>
            <div id="content" class="clear">
                <div class="wrapper shadow">
                    <div id="navbar">
                        <?php Sees::component('anavbar', $A['title'] ); ?>
                        <ul class="right">
                            <li><a href="<?= Sees::url_to('kirjaudu'); ?>" class="smaller" id="kirjaudu"><?= Sees::string('Kirjaudu'); ?></a></li>
                        </ul>
                        <div id="login_form" class="login_form hidden close_btn">
                            <form action="<?= Sees::url_to(''); ?>" method="post">
                                <fieldset>
                                    <legend><?= Sees::string('Kirjaudu sisään') ?></legend>
                                    <label for="username"><?= Sees::string('Käyttäjätunnus') ?></label>
                                    <input type="text" name="username" id="username" />
                                    <label for="passu"><?= Sees::string('Salasana') ?></label>
                                    <input type="password" name="passu" id="passu" />
                                    <input type="submit" value="Kirjaudu" class="button" />
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <div id="left-content">
                        <div id="main-box">
                            <?php Sees::component( $A['text_1-1'] ); ?>
                        </div>
                        <div id="boxes">
                            <div class="box">
                                <h2>Hakemistorakenne</h2>
                                <ul class="filelist">
                                    <li>/
                                        <ul>
                                            <li>palvelut</li>
                                            <li>uutiset
                                                <ul>
                                                    <li>uutinen
                                                        <ul>
                                                            <li>1</li>
                                                            <li>2</li>
                                                            <li>3</li>  
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>referenssit</li>
                                            <li>yhteydenotot</li>
                                            <li>asiakkaille
                                                <ul>
                                                    <li>palaute</li>
                                                </ul>
                                            </li>
                                            <li>haku</li>
                                            <li>kirjaudu</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="box">
                                <?php Sees::component($A['text_1-3']); ?>
                            </div>
                        </div>
                    </div>
                    <div id="feeds">
                        <?php Session::$user_agent ?>
                        <h2><a href="<?= Sees::url_to('uutiset'); ?>" class="linkki"><?= Sees::string('Uutiset');?></a></h2>
                        <?php Sees::component('anewsfeed', $A['uutiset']) ?>
                    </div>
                </div>
            </div>
        </div>
        <?php include('footer.php') ?>
    </body>
</html>
