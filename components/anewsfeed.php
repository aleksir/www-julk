<?php
/* 
 *  The MIT License
 * 
 *  Copyright (c) 2011 Aleksi Rautakoski.
 * 
 *  Permission is hereby granted, free of charge, to any person obtaining a copy
 *  of this software and associated documentation files (the "Software"), to deal
 *  in the Software without restriction, including without limitation the rights
 *  to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 *  copies of the Software, and to permit persons to whom the Software is
 *  furnished to do so, subject to the following conditions:
 * 
 *  The above copyright notice and this permission notice shall be included in
 *  all copies or substantial portions of the Software.
 * 
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 *  FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 *  AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 *  LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 *  OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 *  THE SOFTWARE.
*/

/**
 * Description of newsfeed
 *
 * @author Aleksi Rautakoski
 */
class ANewsFeed implements IComponent {
    public $max_lenght = 100;
    function render( $args = NULL ) {
        if ( count($args) == 0) return;

        foreach ( $args as $uutinen ) {
            ?>
<div class="feed">
    <h3><a href="<?= Sees::url_to('uutiset','uutinen', $uutinen->id ); ?>" class="linkki"><?= $uutinen->otsikko ?></a></h3>
    <p class="smaller"><?= date("j.n.Y - G:i",$uutinen->aika) ?></p>
    <p>
                    <?php
                    if ( count($uutinen->teksti) > $this->max_lenght ) {
                        echo substr($uutinen->teksti, 0 , 100) . "...";
                    }
                    else
                        echo $uutinen->teksti;
                    ?>
    </p>
</div>
            <?php
        }
    }
}
?>
