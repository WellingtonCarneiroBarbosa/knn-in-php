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

/**
 * Starts the object with the values
 * 
 * First param -> The item to compare
 * Second param -> The items to be compared
 * Third param ->  Number of indices in each item to be compared
 */
$knn = new Knn($defaultItem, $itemsToCompare, 4);

//Performs Euclidean distance calculation
$results = $knn->calculate();

/**
 * Returns the index of the item to be recommended
 * 
 * First param -> The results of Euclidean distance calculation for all compared items
 * 
 * If the second param is true, it will return an array of close results.
 * If false, it will return the first index found
 * 
 */
$recomendation = $knn->recomend($results, true);

$recomendation = $knn->recomend($results, false);
