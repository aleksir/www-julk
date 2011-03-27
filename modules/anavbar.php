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
 * Description of ANavbar
 *
 * @author Aleksi Rautakoski
 */
class ANavbar extends Component {
    public function render( $args = NULL ) {

        if ( strtolower($args) == "etusivu" ) $args = '';

        $navlinks = array(
                '' => '<img src="'.URL::file("images/talo.png").'" alt="Etusivu" />',
                'palvelut' => I18n::t('Palvelut'),
                'uutiset' => I18n::t('Uutiset'),
                'referenssit' => I18n::t('Referenssit'),
                'yhteydenotot' => I18n::t('Ota yhteyttä'),
                'asikkaille' => I18n::t('Asiakkaille'),
        );

        echo "<ul>\n";

        foreach ($navlinks as $controller => $text) {
            $class = ($controller == strtolower($args)) ? ' class="current" ' : '';
            ?>
                <li<?= $class ?>><a href="<?= URL::url_to($controller); ?>"><?= $text ?></a></li>
            <?php
        }

        echo "</ul>\n"
        ?>
        <?php
    }
}
?>
