<?php
    $grade = "B";

    switch ($grade){
        case "A":
            echo "you did great";
        case "B":
            echo "You did Good";
        case "C":
            echo "You did okay";
        case "D":
            echo "you did poorly";
        case "F":
            echo "You failed";
        default:
            echo "{$grade} is not valid";
    }
?>
