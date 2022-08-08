<?php
session_start();
session_destroy();
Header('Location:../pages/login.page.php');

?>