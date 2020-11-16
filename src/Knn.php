<?php

namespace WellingtonBarbosa\Knn;

class Knn
{    
    /**
     * The item to compare
     *
     * @var array
     */
    private $defaultItem;

    /**
     * The items to be compared
     *
     * @var array
     */
    private $itemsToCompare;

    /**
     * Number of indices in each item to be compared
     *
     * @var integer
     */
    private $columns;

    /**
     * The constructor of Knn Class
     *
     * @param array $defaultItem The item to compare
     * @param array $itemsToCompare The items to be compared
     * @param integer $columns Number of indices in each item to be compared
     * 
     */
    public function __construct(array $defaultItem, array $itemsToCompare, int $columns)
    {
        $this->defaultItem = $defaultItem;
        $this->itemsToCompare = $itemsToCompare;
        $this->columns = $columns;
    }

    /**
     * Performs Euclidean distance calculation
     * 
     * For more refs, please visit [https://en.wikipedia.org/wiki/Euclidean_distance]
     *
     * @return array
     */
    public function calculate()
    {
        $results = [];

        foreach($this->itemsToCompare as $indexOfItemToCompare => $itemToCompare) {
            $results = $results + [
                $indexOfItemToCompare => []
            ];

            for($index = 0; $index != $this->columns; $index++){
                array_push($results[$indexOfItemToCompare],  $this->defaultItem[$index] - $itemToCompare[$index]);
                $results[$indexOfItemToCompare][$index] = static::square($results[$indexOfItemToCompare][$index]);
            }

        }

        $finalResults = [];

        foreach($results as $index => $value) {
            $finalResults = $finalResults + [
                $index => []
            ];

            array_push($finalResults[$index], array_sum($results[$index]));
            $finalResults[$index] = sqrt($finalResults[$index][0]);
        }
        
        return $finalResults;
    }

    /**
     * Returns the index of the item to be recommended
     *
     * @param array $results - The results of calculating the Euclidean distance
     * @param boolean $getMoreThanASingleResult - If true, it will return an array of close results. If false, it will return the first index found
     * @return array|int 
     */
    public function recomend(array $results, bool $getMoreThanASingleResult=false)
    {
        $shortestDistance = min($results);
        if($getMoreThanASingleResult)
            $recomendedItem = array_keys($results, $shortestDistance);
        else
            $recomendedItem = array_search($shortestDistance, $results);
        return $recomendedItem;
    }
    
    /**
     * Returns the square of a number
     *
     * @param $number Any number
     *
     * @return float
     */
    private static function square($number)
    {
        return (float) $number * (float) $number;
    }
}