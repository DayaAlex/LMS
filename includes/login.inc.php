<?php

    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $user = $_POST['librarian'];
        $pwd = $_POST['pwd'];
        
        try{
            require_once "dbh.inc.php";
            /*to do: check the credentials of the librarian and 
            if they are correct, redirect to lib_portal
            */
            
            header("Location: ../lib_portal.html" );
    

        }catch(PDOException$e)
        {
            echo "Error: ". $e->getMessage(). "<br>";
        
        }

    }else {
        header("Location: ../index.php");
    }