<?php

$matrix = [
    ['C','B','B','B'],
    ['B','B','B','B'],
    ['B','B','B','B'],
    ['B','B','A','B'],
    ['B','B','B','B'],
];

class Steps
{
    public $matrix = [];

    public function __construct($matrix)
    {
        $this->matrix = $matrix;
    }

    public function steps()
    {
        /**
         * Suponiendo que la matriz siempre va a tener dimensiones internas iguales
         * cuento largo y ancho
         */
        $ys = count($this->matrix);
        $xs = count($this->matrix[0]);

        /**
         * Obtengo la posicion de la A y las Cs recorriendo
         */
        $cs = [];
        $a = [];
        foreach ($this->matrix as $y => $line) {
            $x = array_search('A', $line);
            if ($x !== false) {
                $a = [$x, $y];
            }

            $x = array_keys($line, 'C');
            if (!empty($x)) {
                foreach ($x as $index) {
                    if ($x !== false) {
                        $cs[] = [$index, $y];
                    }
                }
            }
        }
        /**
         * recorro las Cs y realizo comparaciones
         */
        $steps = 0;
        foreach($cs as $c) {
            /**
             * Obtengo pasos en horizontal
             */
            $movHorizonalDer = (int) abs($c[0] - $a[0]); // (posicion final-posicion inicial)
            $movHorizonalIzq = $xs - (int) abs($c[0] - $a[0]); // tamano linea - (posicion final-posicion inicial)
            $movHorizonal = $movHorizonalDer <= $movHorizonalIzq ? $movHorizonalDer : $movHorizonalIzq;
            /**
             * Obtengo pasos en vertical
             */
            $movVerticalArriba = (int) abs(($c[1] - $a[1])); // (posicion final-posicion inicial)
            $movVerticalAbajo = $ys - (int) abs($c[1] - $a[1]); // tamano columna - (posicion final-posicion inicial)
            $movVertical = $movVerticalArriba <= $movVerticalAbajo ? $movVerticalArriba : $movVerticalAbajo;

            $stepsC = ($movVertical + $movHorizonal);
            if($stepsC < $steps || $steps == 0) {
                $steps = $stepsC;
                if ($steps == 1)
                {
                    break;
                }
            }

        }
        return $steps;
    }
}

$objSteps = new Steps($matrix);
echo "Número de pasos: " . $objSteps->steps();