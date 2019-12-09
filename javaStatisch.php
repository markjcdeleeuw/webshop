<?php

require_once 'webshop.page.class.php';
require_once "crud.php"; 

class JavaStatisch extends Webshop {
   
    protected function createTable(){
    $crudlaag = new Crud();
    $createTable = $crudlaag -> create 
            (" CREATE TABLE item_rating (
        ratingId int(11) NOT NULL primary key,
        itemId int(11) NOT NULL,
        userId int(11) NOT NULL,
        ratingNumber int(11) NOT NULL,
        title varchar(255) COLLATE utf8_unicode_ci NOT NULL)");
    echo 'test';
    return $createTable; 
    }

    //public function __construct($artikel) {
      //  $this->artikel = $artikel;
   // }
    
    protected function showBodySection() {
        /*$createBool =$this -> createTable();
        if ($createBool ===true) {
            echo "Table  created successfully";
        } else {
            echo "Error creating table: " ;
        };  */
        Echo ' Gefeliciteerd,  en welkom op de gereguleerde succes pagina. <br>
                Omdat het allemaal zo succesvol was, hier een worstelaar die dat fijn vind<br>
                <img id="123"   src="pictures/yesh.gif" ><br>' ;
             echo '<button onclick="document.getElementById("123").src="pictures/contact.gif">ander plaatje</button>';      
} }
       /*echo'<div class="row">
        <div class="col-sm-12">
        <form id="ratingForm" method="POST">
        <div class="form-group">
        <h4>Rate this product</h4>
        <button type="button" class="btn btn-warning btn-sm rateButton" aria-label="Left Align">
        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
        </button>
        <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
        </button>
        <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
        </button>
        <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
        </button>
        <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
        </button>
        <input type="hidden" class="form-control" id="rating" name="rating" value="1">
        <input type="hidden" class="form-control" id="itemId" name="itemId" value="12345678">
        </div>
        <br>
        
        <div class="form-group">
        <label for="usr">Title*</label><br>
        <input type="text" class="form-control" id="title" name="title" required><br>
        </div>
        <div class="form-group"> <br> 
        <label for="comment">Comment*</label>
        <textarea class="form-control" rows="5" id="comment" name="comment" required></textarea>
        </div>
        <div class="form-group">
        <button type="submit" class="btn btn-info" id="saveReview">Save Review</button> <button type="button" class="btn btn-info" id="cancelReview">Cancel</button>
        </div>
        </form>
        </div>
        </div>';
}}
    
    
   <Script>  $('#ratingForm').on('submit', function(event){
event.preventDefault();
var formData = $(this).serialize();
$.ajax({
type : 'POST',
url : 'saveRating.php',
data : formData,
success:function(response){
$("#ratingForm")[0].reset();
window.setTimeout(function(){window.location.reload()},1000)
}
});
});
</Script> }*/ 
