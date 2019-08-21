<?php

require "Variables.class.php";
require "Validator.php";

class Controller {

    public $page = "";
    public $artikel = "";
    public $requested_page = "";

    public function getRequestedPage() {
        $requested_type = $_SERVER['REQUEST_METHOD'];
        if ($requested_type === 'POST') {
            $requested_page = $this->getPostvar('page', 'home');
        } else {
            $requested_page = $this->getUrlVar('page', 'home');
        }
        return $requested_page; // ik weet dat dit niet correct is, maar zonder werkt het helemaal niet. ( al wel wat dingen geprobeerd maar nog niet geheel uit, iets in de syntax dat ik over het hoofd zie.  
    }

    private function getPostVar($key, $default = '') {
        return isset($_POST[$key]) ? $_POST[$key] : $default;
    }

    private function getUrlVar($key, $default = '') {
        return isset($_GET[$key]) ? $_GET[$key] : $default;
    }

    public function showClass() {
        $page = $this->getRequestedPage();
        $content = new Content();
        $artikel = $content->getVariables($page);
        $validator = new Validator;
        $result = $validator->validateRequest($page); // zodra post functionaliteit komt, gaat dit ook door een functie/class/validator class
        if (!empty($result['page'])) {
            $page = $result['page'];
        }
        switch ($page) {
            case "home":
                require_once "static.page.class.php";
                $htmlpage = new Statisch($artikel);
                break;
            case "about":
                require_once "static.page.class.php";
                $htmlpage = new Statisch($artikel);
                break;
            case "contact" :
                require_once "form.page.class.php";
                $htmlpage = new Form($artikel, $result);
                break;
            case "registreer" :
                require_once "form.page.class.php";
                $htmlpage = new Form($artikel, $result);
                break;
            case "login" :
                require_once "form.page.class.php";
                $htmlpage = new Form($artikel, $result);
                break;
            case "response";
                $artikel = $content->getVariables($page);// nog een keer omdat in mijn hoofd het opnieuw opgehaald moest worden, nog bedenken hoe te testen. 
                require_once "static.page.class.php";
                $htmlpage = new Statisch($artikel);
                break;
            case "webshop";
                require_once "shop.form.class.php";
                $htmlpage = new shop();
                break;
            default:
                require_once "static.page.class.php";
                $htmlpage = new Statisch($artikel);
                break;
        }
        $htmlpage->showHtmlPage();
        var_dump($result);
    }

}
