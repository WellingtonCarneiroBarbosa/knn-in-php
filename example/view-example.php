<?php
/**
 * Open this file in your browser
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Example of Usage</title>
    <style>
        * {
            font-family: sans-serif;
        }
    </style>
</head>
<body>
        
<?php

    require_once(__DIR__ . '\..\vendor\autoload.php');
    
    use WellingtonBarbosa\Knn\Knn;

    //The item to compare (four indices)
    $defaultItem = [0.4, 0.2, 0.4, 1];

    //The items to be compared (four indices in each item)
    $itemsToCompare = [
        [
            0.2, 0.3, 0, 1
        ],
        [
            0.4, 0.2, 0.3, 1
        ],
        [
            0.4, 0.2, 0.4, 1
        ],
        [
            0.4, 0.2, 0.4, 1
        ]
    ];
    
    $knn = new Knn($defaultItem, $itemsToCompare, 4);

    //dd($defaultItem, $itemsToCompare, $knn->calculate());
    $result = $knn->calculate();

    $recomendation = $knn->recomend($result, true);

    echo "<h1>Values of item to compare</h1>";
    foreach($defaultItem as $item) {
        echo $item . " | ";
    }

    echo "<h1>Values of recomended items</h1>";

    echo "<p>If allowed to return multiple values</p>";
    foreach($recomendation as $key) {
        echo "Euclidian distances for item (" . $key . ") =>> "  . $result[$key];
        echo "<br>";
        foreach($itemsToCompare[$key] as $item) {
            echo $item . " | ";
        }
        echo "<hr>";
    }

    echo "<p>If allowed to return a single value</p>";
    $recomendation = $knn->recomend($result, false);

    echo "Recomended item: " . $recomendation;
    echo "<br>";
    foreach($itemsToCompare[$key] as $item) {
        echo $item . " | ";
    }
?>
</body>
</html>


