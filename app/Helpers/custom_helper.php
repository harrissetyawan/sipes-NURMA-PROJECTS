<?php

function getAge($date) {
    
    $dob = new DateTime($date);
    
    $now = new DateTime();
     
    $difference = $now->diff($dob);
     
    $age = $difference->y;
     
    return  $age;
}

?>