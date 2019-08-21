<?php

class Basichtml {

    public function showHtmlPage() {
        $this->beginDocument();
        $this->openHead();
        $this->showHead();
        $this->closeHead();
        $this->openBody();
        $this->bodyContent();
        $this->closeBody();
    }

    private function beginDocument() {
        echo '<!doctype html><html>';
    }

    private function openHead() {
        echo '<head>';
    }

    protected function showHead() {
        echo ' <title>test</title> <link rel="stylesheet" type="text/css" href="mystyle.css">';
    }

    private function closeHead() {
        echo'</head> ';
    }

    private function openBody() {
        echo '<body>';
    }

    protected function bodyContent() {
        echo' bla bla';
    }

    private function closeBody() {
        echo'</body>';
    }

}
