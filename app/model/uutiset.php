<?php
/* 
 *  Copyright (c) 2011 Aleksi Rautakoski.
*/

Sees::import("app/model/uutinen.php");

class Uutiset {
    protected $db;

    function  __construct() {
        $this->db = new DataBase();
    }

    public function get_uutinen_by_id($id) {
        $query = $this->db->prepare("SELECT * FROM {{uutiset}} WHERE id = ?");
        $query->execute(array($id));
        $result = $query->fetch();

        if ( !$result['id'] ) {
            return NULL;
        }

        $u = new Uutinen($result['otsikko'], $result['teksti'], $result['aika']);

        $query = $this->db->prepare("SELECT tagi FROM {{tagit}} WHERE id = ?");
        $query->execute(array($id));
        $result = $query->fetchAll();

        foreach ( $result as $row) {
            $u->add_tagi($row['tagi']);
        }

        return $u;
    }

    public function hae_uusimmat($lkm=5) {
        $query = $this->db->prepare("SELECT * FROM {{uutiset}} ORDER BY aika DESC LIMIT ?");
        $query->execute(array($lkm));
        $result = $query->fetchAll();

        if ( !$result[0]['id'] ) {
            return NULL;
        }

        $uutiset = array();
        $query = $this->db->prepare("SELECT tagi FROM tagit WHERE id = ?");

        foreach ( $result as $row ) {
            $u = new Uutinen($row['otsikko'], $row['teksti'], $row['aika']);
            $query->execute(array($row['id']));
            $result = $query->fetchAll();
            foreach ( $result as $row) {
                $u->add_tagi($row['tagi']);
            }

            array_push($uutiset, $u);
        }
        
        return $uutiset;
    }

    public function add_uutinen( $otsikko,$teksti,$tagit=array() ) {
        $this->db->beginTransaction();
        $query = $this->db->prepare("INSERT INTO uutiset (otsikko,teksti,aika) VALUES (?,?,?)");
        $query->execute(array( $otsikko, $teksti, time() ));

        print($this->db->lastInsertId());

        /*
        $query = $this->db->prepare("INSERT INTO tagit (id,tagi) VALUES (?,?)");
        foreach ( $tagit as $tagi ) {
            $query->execute(array());
        }
        */

        $this->db->commit();
    }

    /* Parametri pitää olla Uutinen */
    public function save( $uutinen ) {

    }
}

?>
