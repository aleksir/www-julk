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
 * Description of NewsInstaller
 *
 * @author Aleksi Rautakoski
 * @package news
 */
class NewsInstaller extends ComponentInstaller {


    private $classes = array(
            'news',
            'newsentity',
            'newsentities',
    );

    public function install() {
        $sql = 'DROP TABLE {{news}}; DROP TABLE {{tag}};
CREATE TABLE {{news}} (
    id          INTEGER         PRIMARY KEY,
    title       NVARCHAR(100)   NOT NULL,
    text        NTEXT           NOT NULL,
    time        INT             NOT NULL,
    description NVARCHAR(200)
);
CREATE TABLE {{tag}} (
    id          INT             NOT NULL,
    tag        NVARCHAR(50)    NOT NULL,
    PRIMARY KEY(id,tag),
    FOREIGN KEY(id) REFERENCES news(id)
        ON DELETE CASCADE
);';
    }

    public function remove() {
        $sql = 'DROP TABLE {{news}}; DROP TABLE {{tag}};';
    }
}
?>
