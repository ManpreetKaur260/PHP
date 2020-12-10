<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Algoritmos de Ordenación</title>
    </head>
    <body>
        <?php
        //Matriz para ordenar con el método Inserción
        $Arr = array(26, 46, 98, 2, 49, 64, 1, 10, 3);

        /**
         * funcion para ordenar el matriz con el método Insercion
         * @param array $Arr  matriz con los números ordenar
         * @return array   devolver matriz anterior ordenada
         */
        function insercion_sort(array $Arr) {

            $longitud = count($Arr);

            for ($i = 0; $i < $longitud; $i++) {
                $val = $Arr[$i];
                $j = $i - 1;

                while ($j >= 0 && $Arr[$j] > $val) {
                    $Arr[$j + 1] = $Arr[$j];
                    $j--;
                }
                $Arr[$j + 1] = $val;
            }
            return $Arr;
        }

        //$A nueve matriz para no confundir que es para el método Burbuja
        $A = array(16, 5, 13, 7, 19, 18, 1, 30, 45);

        /**
         *  funcion para ordenar el matriz con el método Burbuja
         * @param array $A  matriz con los números ordenar
         * @return array Devolver matriz anterior ordenada 
         */
        function burbuja_sort($A) {
            $size = count($A);
            $boundary = $size - 1;
            $comparisons = 0;
            do{
            for ($i = 0; $i < $size; $i++) {
                $swapped = false;
                $newBoundary = 0;
                for ($j = 0; $j < $size - 1; $j++) {
                    $comparisons++;             //copmaraciones hace durante la ordenación
                    if ($A [$j] > $A [$j + 1]) {
                        $tmp = $A [$j + 1];
                        $A [$j + 1] = $A [$j];
                        $A[$j] = $tmp;
                        $swapped = true;
                        $newBoundary = $j;
                    }
                }
                $boundary = $newBoundary;    
            }
            
            }while($swapped);
            return $A;
        }

        //matriz para busqueda de binaria
        $arr = array(1, 5, 40, 45, 58, 77, 80, 200, 250);
        /**
         * funcion para busqueda binaria
         * @param array $arr matriz para encontrar elemento
         * @param type $busqueda el posición del elemento que encuentra por el matriz
         * @return type devolver el elemento encuentra por el matriz
         */
        function busquedaBinaria(array &$arr, $busqueda) {
            $izquierda = 0;
            $derecha = count($arr) - 1;
            //Mientras el arr se pueda partir...
            while ($derecha >= $izquierda) {
                // Obtener el valor y elemento de la mitad del arr
                $average = floor(($izquierda + $derecha) / 2);
                $elementoMedio = $arr[$average];

                // tenemos que buscar el medio, regrasa el indice
                if ($busqueda === $elementoMedio) {
                    return $average;
                } else {
                    // Si no, partimos el arr dependiendo de la búsqueda
                    if ($busqueda > $elementoMedio) {
                        //Si está a la derecha, lo partimos desde el medio + 1 hasta el elemento dado por derecha
                        $izquierda = $average + 1;
                    } else {
                        //Si está a la izquierda, lo partimos desde el medio - 1 hasta el elemento dado por izquierda
                        $derecha = $average - 1;
                    }
                }
            }
            // Si llegamos a este punto es porque la búsqueda no se encuentra
            return -1;
        }
        ?>

        <div>
            <form method="post" style="font-size: 50px">
                <label style="border: 1px solid black;background-color: lightsteelblue">
                    <strong>Inserción :</strong>
                </label>
                <?php
                echo implode(" , ", $Arr);
                echo '<br>';
                echo '<strong>Antes de la ordenación de matriz con el método Inserción</strong><br>' . implode(', ', $Arr) . '<br>';
                $sorted_array = insercion_sort($Arr);
                echo '<strong>Después de la ordenación de matriz con el método Inserción</strong><br>' . implode(', ', $sorted_array);
                ?>
                <br>
                <label style="border: 1px solid black;background-color: lightsteelblue">
                    <strong>Burbuja :</strong>
                </label>
                <?php
                echo implode(" , ", $A);
                echo '<br>';
                echo '<strong>Antes de la ordenación de matriz con el método Burbuja</strong><br>' . implode(', ', $A) . '<br>';
                $sorted = burbuja_sort($A);
                echo '<strong>Después de la ordenación de matriz con el método Burbuja</strong><br>' . implode(', ', $sorted);
                ?>
                <br>
                <label style="border: 1px solid black;background-color: lightsteelblue">
                    <strong>Busqueda Binaria :</strong>
                </label>
                <?php
                $busqueda = 77;
                echo '<br>';
                $indice = busquedaBinaria($arr, $busqueda);
                echo "El elemento $busqueda está en el índice $indice.";
                ?>
            </form>
        </div>
    </body>
</html>
