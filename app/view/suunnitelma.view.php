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
            <?php include('shared/header.php') ?>
            <div id="content" class="clear">
                <div class="wrapper">
                    <div id="navbar">
                        <ul>
                            <li class="current"><a href="<?= Sees::url_to(''); ?>"><img src="<?= Sees::file("images/talo.png") ?>" alt="Home" /></a></li>
                            <li><a href="<?= Sees::url_to('palvelut'); ?>">Palvelut</a></li>
                            <li><a href="<?= Sees::url_to('uutiset'); ?>">Uutiset</a></li>
                            <li><a href="<?= Sees::url_to('referenssit'); ?>">Referenssit</a></li>
                            <li><a href="<?= Sees::url_to('yhteydenotot'); ?>">Ota&nbsp;yhteyttä</a></li>
                            <li><a href="<?= Sees::url_to('asiakkaille'); ?>">Asiakkaille</a></li>
                        </ul>
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
                    <div id="left-content">
                        <div id="main-box">
                            <h2>Harjoitustyösuunnitelma</h2>
                            <h3>Tekijä</h3>
                            <p>Aleksi Rautakoski &lt;aleksi.s.rautakoski@jyu.fi&gt;</p>
                            <h3>Aihe</h3>
                            <p>Tavoitteena on luoda kuvitteelliselle ohjelmistokehittelypajalle sivusto.</p>
                            <h3>Sisältö</h3>
                            <p>Sivultolla esitellään yritys ja sen tarjoamia palveluita ja ohjelmia. Yritys tiedottaa toimintaansa Uutiset-palstalle. Yritys myös kertoo millaisia palveluita se on tuottanut (referenssit). Sivuston kautta voi potentiaalinen asiakas ottaa yhteyden yritykseen.</p>
                            <h3>Lomake</h3>
                            <p>Yhteydenottolomake täyttää laajemman lomakkeen vaatimukset.</p>
                            <h3>Suojattu sisältö</h3>
                            <p>Asiakkaan materiaali tulee suojatulle sivustolle. Siellä majailee vain asiakkaille tarkoitettuja dokumentteja (jotain ohjeita tms).</p>
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
                                <h2>Sommittelumalli</h2>
                                <p>Tässä työssä on käytetty laatikko-sommittelumallia hieman soveltaen, mutta pääosin samanlainen. Sommittelu vaihtelee hieman eri sivuilla.</p>
                            </div>
                        </div>
                    </div>
                    <div id="feeds">
                        <h2><a href="<?= Sees::url_to('uutiset'); ?>" class="linkki">Uutiset</a></h2>
                        <div class="feed">
                            <h3><a href="<?= Sees::url_to('uutiset','uutinen',1); ?>" class="linkki">Uutinen 1</a></h3>
                            <p>Jotain css3-määrityksiä saattaa olla, mutta miksipä ei opiskelisi myös niitä.</p>
                        </div>
                        <div class="feed">
                            <h3><a href="<?= Sees::url_to('uutiset','uutinen',2); ?>" class="linkki">Uutinen 2</a></h3>
                            <p>Grafiikkaa olisi tarkoitus laittaa enemmän sivuille kunhan saan vain piirrettyä.</p>
                        </div>
                        <div class="feed">
                            <h3><a href="<?= Sees::url_to('uutiset','uutinen',3); ?>" class="linkki">Uutinen 3</a></h3>
                            <p>
                            </p>
                        </div>
                        <div class="feed">
                            <h3><a href="<?= Sees::url_to('uutiset','uutinen',4); ?>" class="linkki">Uutinen 4</a></h3>
                            <p>Tähän tulee kaikenlaista uutisvirtaa mitä nyt sivustolla sattuu tapahtumaan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include('shared/footer.php') ?>
    </body>
</html>
