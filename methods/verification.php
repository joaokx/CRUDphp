<?php
function verification($path)
{
    if(!$_SESSION['id']){
        header("Location: ".$path);
        exit;
    }
}


?>