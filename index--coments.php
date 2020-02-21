<?php

/**X é meu ponto definido na reta ou gráfico */

/**Y e Z são os valores que compararei
 * a distância com X */

/**Ex: distancia euclidiana de x até y */

/**Imagine que cada indíce corresponde
 * a um gênero de filme (está explicado
 * em passo-a-passo.php)
 */

    /**Em seu banco de dados de filmes, cada 
    * filme deve ter uma taxa de cada gênero
    * Ex, dead pool têm 90% de ação, logo ação
    * deve receber 0.9
    */
    $x = array( 0.9, 0.3, 0.0, 0.0);
    $y = array( 0.0, 0.1, 1.0, 0.2);
    $z = array( 0.7, 0.4, 0.2, 0.1);

        /**função que retorna a raiz quadrada
        * de um número qualquer
        */
        function square($n1, $n2){
            return $n1 * $n2;
        }   

        /**O for realiza 
        * a subtração e quadrado de
        *cada índice
        */

        for($i = 0; $i != 4; $i++){

            $a[$i] =  $x[$i] - $y[$i];

            $a[$i] = square($a[$i], $a[$i]);

            $b[$i] = $x[$i] - $z[$i];

            $b[$i] = square($b[$i], $b[$i]);
        }


        /**realiza a somatória */
        $a = array_sum($a);

        $b = array_sum($b);

        /**tira a raiz quadrada 
        * da somatória
        */
        $a = sqrt($a);

        $b = sqrt($b);

        /**Exibe a D.E. */

        echo "Distancia euclidiana entre X e Y => ", " $a";

        echo "<br>";

        echo "Distancia euclidiana entre X e Z => ", " $b";

        echo "<br>";

        echo "Será recomendado >> ";

        /**Se a distância entre X e Y, que é representado por A
        * for menor que a distância entre X e Z, que é representado por
        * B, será recomendado Y.
        * Caso contrário, Z.
        */

        if($a < $b){
            echo "Y";
        }else{
            echo "Z";
        }
?>