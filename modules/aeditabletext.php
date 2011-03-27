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
 * Description of AEditableText
 *
 * @author Aleksi Rautakoski
 */
class AEditableText implements IComponent {
    const TEXT = 1;
    const ACCESS = 2;
    const EDIT = 3;

    private $db;
    public $sivu;
    public $kohta;
    public $text;

    private $view = 1;

    public function __construct($db = NULL) {
        if ( empty($db) ) {
            $this->db = new DataBase();
        }
        else {
            $this->db = $db;
        }
    }

    public function  __get($name) {
        return $this->$name;
    }

    public function  __set($name,  $value) {
        if ( $name == 'db' ) {
            $this->db = $value;
        }
        elseif ( $name == 'view' ) {
            $this->view = ( 1 <= $value && $value <= 3) ? $value : 1;
        }
    }

    public function save( $text ) {
        $this->db->beginTransaction();
        $query = $this->db->prepare("UPDATE {{tekstit}} SET teksti = ? WHERE sivu = ? AND kohta = ?");
        $query->execute(array($text,$this->sivu,$this->kohta));
        if ($query->rowCount() == 0)
            $this->db->rollBack();
        else
            $this->db->commit();
    }

    /*
     * $args : array(view, sivu, kohta )
    */
    public function render ( $args = NULL ) {
        $this->view = empty($args[0]) ? $this->view : $args[0];
        $this->sivu = empty($args[1]) ? $this->sivu : $args[1];
        $this->kohta = empty($args[2]) ? $this->kohta : $args[2];

        $query = $this->db->prepare("SELECT * FROM {{tekstit}} WHERE sivu = ? AND kohta = ?");
        $query->execute(array( $this->sivu, $this->kohta ));
        $result = $query->fetch();

        $this->text = $result['teksti'];

        switch ($this->view) {
            case AEditableText::TEXT:
                $this->view_text();
                break;
            case AEditableText::ACCESS:
                $this->view_access();
                break;
            case AEditableText::EDIT:
                $this->view_edit();
                break;

            default:
                $this->view_text();
                break;
        }
    }

    private function view_text() {
        echo $this->text;
    }

    private function view_access() {
        echo $this->text;
        ?>
<div class="right-corner">
    <form method="POST" action="">
        <input type="hidden" name="sivu" value="<?= $this->sivu ?>" />
        <input type="hidden" name="kohta" value="<?= $this->kohta ?>" />
        <input type="submit" name="event_edit" value="<?=I18n::t("Muokkaa");?>" class="button" />
    </form>
</div>

        <?php
    }

    private function view_edit() {
        ?>
<form class="edit-text" method="POST" action="" accept-charset="UTF-8">
    <input type="hidden" name="sivu" value="<?= $this->sivu ?>" />
    <input type="hidden" name="kohta" value="<?= $this->kohta ?>" />
    <textarea rows="20" name="teksti">
                <?= htmlspecialchars($this->text) ?>
    </textarea>
    <input type="submit" name="event_save" value="<?=I18n::t("Tallenna");?>" class="button" />
    <input type="submit" name="event_cancel" value="<?=I18n::t("Peruuta");?>" class="button" />
</form>
        <?php
    }
}
?>
