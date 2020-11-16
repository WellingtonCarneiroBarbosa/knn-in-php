# k-Nearest Neighbors in PHP
### **Php algorithm that is able to make recommendations on categorized items in your database**
<img src="https://scx1.b-cdn.net/csz/news/800/2019/howtoovercom.jpg">
<br>

## How does it work?
Imagine that you are building a movie application, such as Netflix.

You want to recommend a movie to the user when the movie ends, but it needs to be a movie that looks like the one he just watched.

Your films in the database must have a percentage of each category, for example: romance, action, adventure, fiction, etc.

For each film, you enter the percentage of each category

A silly example:
```
[
    "title" => "Robin Hood",
    "categories" => [
        "adventure" => "1" // 100%,
        "romance" => "0.2" // 20%,
        "action" => "0.6", // 60%,
        ...
    ]
]
```

The algorithm will use these percentages to perform the calculation

To understand how the euclidian calculation does work, please visit [this link](https://en.wikipedia.org/wiki/Euclidean_distance)

## Getting Started
1. Install on your project via composer
```
composer require wellingtonbarbosa/knn
```

2. Use the class in your php file

```
<?php
require_once(__DIR__ . '\..\vendor\autoload.php');

use WellingtonBarbosa\Knn\Knn;
```

3. Create some items to test <br>
<i>In our example, $defaultItem is the movie the user has just watched, and the $itemsToCompare are movies drawn from the database. Let's see which of these is more like what our user just watched? So let's go!</i>
```
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
```

<i>Note that all items have 4 indexes. This is a limitation of this algorithm because all items must have the same number of indexes, or it will not work :/</i>

4. Instantiate the class in a variable <br>
<i>The last parameter passed is the number of indexes that ALL items have.</i>
```
/**
 * Starts the object with the values
 * 
 * First param -> The item to compare
 * Second param -> The items to be compared
 * Third param ->  Number of indices in each item to be compared
 */
$knn = new Knn($defaultItem, $itemsToCompare, 4);
```

5. Performs Euclidean distance calculation for each item
```
//Performs Euclidean distance calculation
$results = $knn->calculate();
```

6. Finally, we will get index (or indexes) of the items to recommend to our user
<br>
<i>Note that in addition to the calculated results, there is a second parameter in the recommendation method.
This is because there may be equal results in the calculation. If you pass TRUE, the method will return the index
all results repeated. If you pass FALSE, the first one found will be returned</i>
```

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

```

7. Now, just look for the item that we will recommend
```
//Multiple items
    foreach($recomendation as $key) {
        echo "Euclidian distances for item (" . $key . ") =>> "  . $result[$key];
        echo "<br>";
        foreach($itemsToCompare[$key] as $item) {
            echo $item . " | ";
        }
        echo "<hr>";
    }

//Single item
echo "Recomended item: " . $recomendation;
echo "<br>";
foreach($itemsToCompare[$key] as $item) {
    echo $item . " | ";
}
```

**You can view this complete file [by clicking here](https://github.com/WellingtonCarneiroBarbosa/knn-em-php/blob/master/example/example.php)**

## Author 
<a href="https://github.com/wellingtoncarneirobarbosa" target="_blank">
<img src="https://github.com/WellingtonCarneiroBarbosa/laravel-chat/blob/master/public/readme-assets/autor.jpg?raw=true" width="80" height="80" alt="Wellington Carneiro Barbosa"> Wellington Barbosa
</a>
<br>
<a href="https://instagram.com/owellcarneiro" target="_blank">
Instagram
</a>
|
<a href="https://linkedin.com/in/wellingtoncarneirobarbosa" target="_blank">
LinkedIn
</a>
|
<a href="https://facebook.com/owellcarneiro" target="_blank">
Facebook
</a>

## License

This library is under the [MIT License](https://opensource.org/licenses/MIT).

Any issue, [tell me on github](https://github.com/WellingtonCarneiroBarbosa/knn-em-php/issues/new)! I will help you.
