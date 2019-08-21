<?php
// sommige functies zijn discusseerbaar of ze bij validatie horen, de reigistreer optie denk ik niet. 
// de rest vergelijken dingen wel met elkaar, in mijn hoofd is dat onderdeel van validatie. 
require_once 'variables.class.php';
require_once 'crud.php';

class Validator {
    public function validateRequest($page) {
        $result = array('page' => $page); // public maken 
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $content = new Content();
            $forminfo = $content->getVariables($result['page']);
            $postresult = $this-> checkFields($forminfo);
            $result = array_merge($result, $postresult);
            var_dump($result); {
                switch ($result['page']) {
                    case 'contact':
                        if ($result['check'] === true) {
                            $result['page'] = 'response';
                            $_SESSION['naam']=$result['FirstName'];
                            break;
                        } else {
                            $result['page'] = 'contact';
                            break;
                        }
                    case 'login':
                        $result =$this-> loginCheck($result);
                        if ($result['checkemail'] === true) {
                            $_SESSION['inlog'] = 'ingelogd';
                            $result['page'] = 'response';
                        } else {
                            $result['page'] = 'login';
                        }
                        break;
                    case 'registreer':
                        $result  = $this -> emailQry($result);
                        $result = $this -> checkWachtWoord($result);
                        if ($result['checkemail'] === true && $result['checkww'] === true) {
                            $this->writeUserData($result);
                            $result['page'] = 'response';
                            break;
                        } else {
                            $result['page'] = 'registreer';
                            break;
                        }
                        break;
                    case 'magazijn':
                        writeProductData($result);//nog mee bezig 
                        break;
                    case 'webshop':
                        addToShoppingCart();// ook nog niet af. 
                        $result['page'] = 'webshop';
                        break;
                }
            }
        }return $result;
    }

    protected function checkField($fieldname) {
        $result = array();
        if (isset($_POST[$fieldname])) {
            $value = $_POST[$fieldname];
            $value = trim($value);
            $value = stripslashes($value);
            $value = htmlspecialchars($value);
            if (empty($value)) {
                $result['check'] = false;
                $result[$fieldname . '_err'] = $fieldname . ' vereist';
            } else {
                $result['check'] = true;
                $result[$fieldname] = $value;
            }
        } else {
            $result[$fieldname . '_err'] = $fieldname . ' not found';
            $result['check'] = false;
        }
        return $result;
    }

    protected function checkFields($fieldname_arr) {
        $result = array();
        $result['check'] = true;
        foreach ($fieldname_arr as $fieldname => $fieldtype) {
            $resultTemp =$this->checkField($fieldname);
            if ($resultTemp['check'] === true) {
                $result[$fieldname] = $resultTemp[$fieldname];
            } else {
                $result['check'] = false;
                $result[$fieldname . '_err'] = $resultTemp[$fieldname . '_err'];
            }
        }
        return $result;
    }
    
    protected function loginCheck($result) {  // eventueel deze functie zo bouwen dat de waarden opgehaald worden. nu nog geen case waarvoor nodig. 
    {   $emailinvoer = $result['email'];
        $passinvoer = $result['Wachtwoord'];
        $table = "myusers"; 
        $column1 = "email";
        $column2 = "password"; 
        $crudlaag = new Crud();        
        $inlogcheck= $crudlaag -> readVariable("SELECT * from myusers WHERE email = '$emailinvoer' AND password = '$passinvoer' limit 1 "); 
        var_dump($inlogcheck);
        if ($inlogcheck == false) {
            $result['email_err'] = "combinatie email & wachtwoord is incorrect";
            $result['checkemail'] = false;
        } else {
            $result['checkemail'] = true;
            $naam = $inlogcheck;
            $_SESSION['naam'] = $naam["firstname"];
            return $result;
        } 
    }
    return $result;
}

    function emailQry($result) { 
    $emailinvoer = $result['email'];
    $crudlaag = new Crud();
    $emailcheck = $crudlaag ->readVariable("SELECT * from myusers WHERE email = '$emailinvoer'  limit 1 "); 
    var_dump($emailcheck);
    if (!empty($emailcheck)) {
        $result['checkemail'] = False;
        $result['email_err'] = "email is al in gebruik";
    } else {
        $result['checkemail'] = True;
     }return $result;
}

    function writeUserData($result) { { // probleem met eventueel generieker maken is dat je een loop moet bouwen voor het aantal in te voeren columns/items denk ik 
        $crudlaag = new Crud();
        $fnameQry = $result['FirstName'];
        $emailQry = $result['email'];
        $wwQry = $result['Wachtwoord'];
        $createstatus= $crudlaag -> Update("INSERT INTO myusers (firstname, email, password)
	VALUES ('$fnameQry', '$emailQry', '$wwQry')");
        if ($createstatus == True) {
            echo "new user created succesfully ";
            $_SESSION['naam'] = $fnameQry;
        } else {
            echo "Error creating table: " ;
        }
     } return $result;
}

    function checkWachtWoord($result) {
    if ($result['Wachtwoord'] == $result['WachtWoord2']) {
        $result['checkww'] = True;
    } else {
        $result['Wachtwoord_err'] = "wachtwoorden komen niet overeen";
    }
    return $result;
}
}
