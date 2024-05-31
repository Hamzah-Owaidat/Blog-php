
<?php 
    require("../define.php");
    session_start();

    session_unset();
    
    session_destroy();
    
    header("Location: " . APPURL . "frontend/view.index.php");
    exit();


    