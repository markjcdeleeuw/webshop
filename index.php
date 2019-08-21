<?php


session_start();

require "controller.class.php";

$showpage = new Controller(); 
$page = $showpage -> getRequestedPage();
$showpage ->showClass($page);
