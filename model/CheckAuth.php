<?php
session_start();

if(isset($_SESSION['Connected'])){
    if($_SESSION['Connected'] == true){
        
        die('true');
    }
} else{

    die('false');
}


?>