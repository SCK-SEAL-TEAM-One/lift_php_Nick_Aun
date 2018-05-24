<?php

function isOverload ($weight){
    $max_weight = 1000;
    return ($weight > $max_weight);
}

function checkState ($current, $goto){
    if($current == $goto){
        return 0;
    }
    
    if($current > $goto){
        return -1;
    }
    
    if($current < $goto){
        return 1;
    }    
}

function stateToString($state) {
    switch ($state) {
        case 1: return "up";
        case 0: return "stop";
        case -1: return "down";
    }
}

function move ($goto){
    global $current;
    global $weight;

    while ($current != $goto) {
        if (isOverload($weight)) {
            echo "stop";
            return;
        }
        
        echo $current . " ";
        
        $state = checkState($current, $goto);
        $current += $state;
        
        echo stateToString($state) . "\n";
    }
    
    echo $goto . " stop";
}

$current = 5;
$goto = 1;
$weight = 100;
move($goto)
?>
