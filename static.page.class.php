<?php

require_once 'webshop.page.class.php';

class Statisch extends Webshop {

    public function __construct($artikel) {
        $this->artikel = $artikel;
    }
    
    protected function showBodySection() {
        echo'' . $this->artikel . '';
    }
}
