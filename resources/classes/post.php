<?php

class Post {

    private $id;
    private $titolo;
    private $testo;
    private $data;

    public function __construct($i, $t, $te, $d) {
        $this->id = $i;
        $this->titolo = $t;
        $this->testo = $te;
        $this->data = $d;
    }

    public function get_id() {
        return $this->id;
    }

    public function get_titolo() {
        return $this->titolo;
    }

    public function get_data() {
        return $this->data;
    }

    public function get_testo() {
        return $this->testo;
    }

    public function get_text_ant() {
        $t = $this->testo;
        return (count($words = explode(' ', $t)) > 150) ? implode(' ', array_slice($words, 0, 150)) . "..." : $t;
    }

}

?>