<?php

require_once "basichtml.page.class.php";

class Webshop extends Basichtml {

    protected function bodyContent() {
        $this->showMenu();
        $this->showBodySection();
        $this->showFooter();
    }

    private function showMenu()// inlog menu nog toevoegen. 
     { 
        switch ($_SESSION['inlog']) {
            case "ingelogd":
                echo ' <ul> 
                    <li> <a href="index.php?page=home">Home</a></li>
                    <li><a href="index.php?page=about">About </a></li>
                    <li><a href="index.php?page=contact">Contact</a> </li>
                    <li><a href="index.php?page=cart">Winkelmand</a></li> 
                    <li><a href="index.php?page=webshop">Webshop</a></li>
                    <li><a href="index.php?page=magazijn">Magazijn</a></li>
                    <li><a href="index.php?page=uitgelogd">Log Uit ' . $_SESSION['naam'] . '</a></li> <br></ul>';
    break;

            default:
                echo '<ul>
                    <li> <a href="index.php?page=home">Home</a> </li>
                    <li> <a href="index.php?page=about">About </a></li>
                    <li> <a href="index.php?page=contact">Contact</a></li>
                    <li> <a href="index.php?page=login">Login</a></li>
                    <li><a href="index.php?page=webshop">Webshop</a><li>
                    <li>  <a href="index.php?page=registreer">Registreren</a></li><br>
        </ul>';
        }
    }

    private function showFooter() {
        echo '<footer><p> © 2019 Mark de Leeuw </p> </footer> ';
    }

    protected function showBodySection() {
        echo'test';
    }

}
