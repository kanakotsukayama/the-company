<?php
    include "../classes/User.php";

    #instantiate an object
    $user = new User;

    #calling the method
    $user->update($_POST, $_FILES);
?>