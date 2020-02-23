<?php
/**Os valores do array podem ser quaisquer,
 * desde que estejam entre 0.0 (0%) ou 1.0 (100%) 
 */
    $x = array( 0.4, 0.2, 0.1, 0.2);
    $y = array( 0.8, 0.5, 0.4, 0.0);
    $z = array( 0.2, 0.0, 0.0, 0.0);

    function square($n1){
        return $n1 * $n1;
    }   

    for($i = 0; $i != 4; $i++){
        $a[$i] = $x[$i] - $y[$i];
        $a[$i] = square($a[$i]);
        $b[$i] = $x[$i] - $z[$i];
        $b[$i] = square($b[$i]);
    }

    $a = array_sum($a);
    $b = array_sum($b);
    
    $a = sqrt($a);
    $b = sqrt($b);

    echo "Distancia euclidiana entre X e Y => ", " $a";

    echo "<br>";

    echo "Distancia euclidiana entre X e Z => ", " $b";

    echo "<br>";

    echo "Será recomendado >> ";

    if($a < $b){
        echo "Y";
    }else{
        echo "Z";
    }
?>