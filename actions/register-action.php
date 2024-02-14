<?php
 include "../classes/User.php";

 #intantiate an object
 $user = new User;

 #call the register method
 #note: the $_POST-> holds the data coming from the form(register.php)
 $user->store($_POST);
?>