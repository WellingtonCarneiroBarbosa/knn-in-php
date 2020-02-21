<?php

    ///posição 0 do array é violência
    //posição 1 do array é ação
    //posição 2 do array é comédia
    //posição 3 do array é romance
    //classificação de 0 a 1 (%) 1 = 100% -> 0 = 0%
    $invocacaoDoMal = array( 0.9, 0.3, 0.0, 0.0);
    $genteGrande = array( 0.0, 0.1, 1.0, 0.2);
    $deadPool = array( 0.7, 0.4, 0.2, 0.1);


    /**Objetivo do algoritmo seja calcular qual dos dois filmes
     * recomendar após o usuário ter assistido invocação do mal
     */

     /**Método matemático a ser utilizado = "distância Euclidiana" */

     /**A distância euclidiana é responsável por calcular a distancia
      * entre dois pontos num gráfico
      É utilizado como base o teorema de pitágoras
      */

      /**Primeiro, é feito a subtração de todos os dados
       * de cada filme
       */

    $a = $invocacaoDoMal[0] - $genteGrande[0];
    $b = $invocacaoDoMal[1] - $genteGrande[1];
    $c = $invocacaoDoMal[2] - $genteGrande[2];
    $d = $invocacaoDoMal[3] - $genteGrande[3];

    $e = $invocacaoDoMal[0] - $deadPool[0];
    $f = $invocacaoDoMal[1] - $deadPool[1];
    $g = $invocacaoDoMal[2] - $deadPool[2];
    $h = $invocacaoDoMal[3] - $deadPool[3];

    function square($n1, $n2){
        return $n1 * $n2;
    }


    $a = square($a, $a);
    $b = square($b, $b);
    $c = square($c, $c);
    $d = square($d, $d);

    $e = square($e, $e);
    $f = square($f, $f);
    $g = square($g, $g);
    $h = square($h, $h);


    $somaDeTodosOsValores = $a + $b + $c + $d;

    $distanciaEuclidianaEntreInvocacaoDoMalEgenteGrande = sqrt($somaDeTodosOsValores);

    echo "DE entre IM e GG = ", $distanciaEuclidianaEntreInvocacaoDoMalEgenteGrande;

    $somaDeTodosOsValores02 = $e + $f + $g + $h;

    $distanciaEuclidianaEntreInvocacaoDoMalEdeadPool = sqrt($somaDeTodosOsValores02);

    echo "<br>";

    echo "DE entre IM e DP = ", $distanciaEuclidianaEntreInvocacaoDoMalEdeadPool;


    /**verificacao que determina filme a ser recomendado */
    if($distanciaEuclidianaEntreInvocacaoDoMalEgenteGrande < $distanciaEuclidianaEntreInvocacaoDoMalEdeadPool){
        echo "<br>";
        echo "<br>";
        
        echo "Filme a ser recomendado apos assistir Invocacao do mal: Gente grande";
    }else if($distanciaEuclidianaEntreInvocacaoDoMalEdeadPool < $distanciaEuclidianaEntreInvocacaoDoMalEgenteGrande){
        echo "<br>";
        echo "<br>";
    
        echo "Filme a ser recomendado apos assistir Invocacao do mal: DeadPool";
    }
?>