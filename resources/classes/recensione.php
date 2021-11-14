<?php

class Recensione {

    private $id;
    private $autore;
    private $foto_autore;
    private $titolo;
    private $testo;
    private $punteggio;
    private $data;

    public function __construct($i, $a, $fa, $t, $te, $p, $d) {
        $this->id = $i;
        $this->autore = $a;
        $this->foto_autore = $fa;
        $this->titolo = $t;
        $this->testo = $te;
        $this->punteggio = $p;
        $this->data = $d;
    }

    public function get_id() {
        return $this->id;
    }

    public function get_autore() {
        return $this->autore != null ? $this->autore : "anonimo";
    }

    public function get_foto_autore() {
        return $this->foto_autore != null ? $this->foto_autore : "nullprofile.jpg";
    }

    public function get_titolo() {
        return $this->titolo;
    }

    public function get_punteggio() {
        return $this->punteggio;
    }

    public function get_data() {
        return $this->data;
    }

    public function get_testo() {
        return $this->testo;
    }

}

?>