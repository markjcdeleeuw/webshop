<?php

require_once "webshop.page.class.php";
require_once 'crud.php';

class Shop extends Webshop {
// als alle variabelen straks uit de database komt, gaat deze waarschijnlijk de oude form vervangen. 
// //aangezien alleen het voornaamste verschil de manier waarop de data verkregen is is 
    protected function showBodySection() {
        $this->openForm();
        $this->showFields();
        $this->endForm();
    }

    private function openForm($method = "POST") {
        echo'<br> <form action="index.php" method="' . $method . '" >';
        echo'<input type="hidden" name="page" value="webshop" />';
    }

    protected function showFields() {
            $crudlaag = new Crud();
            $result = $crudlaag->readVariable("SELECT *  FROM Myproducts");
            if (mysqli_num_rows($result) > 0) {
                while ($productwaarden = mysqli_fetch_assoc($result)) {
                    echo'<img src=' . $productwaarden['url'] . ' class="prod_pic"> </img> <br> <br>';
                    echo '<label for="' . $productwaarden['product'] . '">' . $productwaarden['product'] . '</label>  <br>';
                    echo '<label for="' . $productwaarden ['prijs'] . '">Prijs: ' . $productwaarden['prijs'] . 'Euro</label> ';
                    echo ' aantal: <input type=number name="productCount_' . $productwaarden['id'] . '" >';
                    echo ' <input type=hidden  name="id" value="' . $productwaarden['id'] . '">';
                    echo ' <input type=hidden name="page" value="webshop">';
                    echo '<br> <br> <button type="submit" value="' . $productwaarden['id'] . '" name="bestelknop">"bestel"</button> <br><br><br>'; // de button moet enkel de bestelling naarhet winkelwagentje sturen 
                }
            }
        }
    
    private function endForm($submit_caption = "Verstuur") {
        //echo '<br> <br> <button type="submit" class="submit" value="submit">' . $submit_caption . '</button> <br>'; niet echt nodig als alle artikelen aparte knoppen krijgen ( huidig plan) 
        echo '</form>';
    }

}
