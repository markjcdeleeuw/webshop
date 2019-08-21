<?php

class Content {

    public $content = '';

    public function getVariables($page) {
        switch ($page) {
            case 'home':
                $content = "dit is die home pagina, waar het allemaal begint  ";
                break;
            case 'about':
                $content = '<br><br><br> <center><img src="pictures/austin.gif"></img></center><br>
                <p> De heer de leeuw is geboren in Teteringen  </p>  
		<p> Hij woont nu in nijmegen</P> 
		<p> er dient een extra paragraaf gevult te worden</p> 
		<p> ik vermoed dat een van de volgende lessen deze lelijke opmaak minder lelijk zla maken </p> 
		<p> bovenstaande paragraaf is blind getypt, vandaar dat zal als zla wordt gespeld</p>   ';
                break;
            case 'contact':
                $content = array(
                    'FirstName' => array(
                    'type' => 'text',
                    'name' => 'fname',
                    'label' => 'First Name'
                    ),
                    'Email' => array(
                    'type' => 'email',
                    'name' => 'email',
                    'label' => 'Email Adress'
                    ),
                    'Bericht' => array(
                    'type' => 'textarea',
                    'name' => 'bericht',
                    'label' => 'Message'
                    )
                );
                break;
            case 'login':
                $content = ['email' => array(
                    'type' => 'email',
                    'name' => 'email',
                    'label' => 'Email Adress'
                    ),
                    'Wachtwoord' => array(
                    'type' => 'text',
                    'name' => 'wachtwoord',
                    'label' => 'Wachtwoord',
                    ),
                    ];
                break;
            case 'registreer':
                $content = array
                    (
                    'FirstName' => array(
                    'type'  => 'text',
                    'name'  => 'fname',
                    'label' => 'First Name'
                    ),
                    'email' => array(
                    'type' => 'email',
                    'name'  => 'email',
                    'label' => 'Email Adress'
                    ),
                    'Wachtwoord' => array(
                    'type' => 'text',
                    'name' => 'wachtwoord',
                    'label' => 'Wachtwoord'
                    ),
                    'WachtWoord2' => array(
                    'type' => 'text',
                    'name' => 'wachtWoord2',
                    'label' => 'Herhaal Wachtwoord'
                    ),
                );
                break;
                case 'response':
                $content = 'Gefeliciteerd, ' . $_SESSION['naam'] . ' en welkom op de gereguleerde succes pagina. <br>
                Omdat het allemaal zo succesvol was, hier een worstelaar die dat fijn vind<br>
                <img width="420" height="420" src="pictures/yesh.gif" ></img>';
                break;
                case 'default':
                $content = " bladieblad";
                break;
        }
        return $content; // zelfde probleem
    }

}
