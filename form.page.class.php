<?php

require "webshop.page.class.php";

class Form extends Webshop {
    public $postresult = "";
    public $formfields = "";

    public function __construct ($formfields, $postresult){
        $this->formfields = $formfields; 
        $this->postresult = $postresult; 
    } 
    
    protected function showBodySection() {
        $this->openForm();
        $this->showFields($this->formfields, $this->postresult);
        $this->endForm();
    }

    private function openForm($method = "POST") {
        echo'<br> <form action="index.php" method="' . $method . '" >';
        echo'<input type="hidden" name="page" value="'.$this->postresult['page'].'" />';
    }

    private function showFields($formfields, $postresult) {
        foreach ($formfields as $fieldname => $fieldinfo) {
            switch ($fieldinfo['type']) {
                case "textarea" :
                    echo '<label for="' . $fieldname . '">' . $fieldinfo['label'] . '</label> ';
                    echo '<textarea name="' . $fieldname . '" class="form_ta" placeholder="' . $fieldinfo['label'] . '">'
                    . (isset($postresult[$fieldname]) ? $postresult[$fieldname] : '') . '</textarea> <br> <br><br> ';
                    break;
                default:
                    echo '<label for="' . $fieldname . '">' . $fieldinfo['label'] . '</label> ';
                    echo '<input type="' . $fieldinfo['type'] . '" name="' . $fieldname . '" placeholder="' . $fieldinfo['label'] . ' 
		    "value="' . (isset($postresult[$fieldname]) ? $postresult[$fieldname] : '') . '" /> <br> <br> ';
                    break;
            }
            if (isset($postresult[$fieldname . '_err'])) {
                echo '	<br> <center><span class="error">* ' . $postresult[$fieldname . '_err'] . '</span></center><br>';
            }
        }
    }
    
   private function endForm($submit_caption = "Verstuur") {
        echo '<br> <br> <button type="submit" class="submit" value="submit">' . $submit_caption . '</button> <br>';
        echo '</form>';
    }
} 