<?php
class Calculadora
{
    function sumar($numero1, $numero2)
    {
        return $numero1 + $numero2;
    }

    function restar($numero1, $numero2)
    {
        return $numero1 - $numero2;
    }

    function multiplicar($numero1, $numero2)
    {
        return $numero1 * $numero2;
    }

    function dividir($numero1, $numero2)
    {
        if ($numero2 == 0)
        {
            return new Exception("Division entre 0");
        }

        return $numero1 / $numero2;
    }

    function generarArreglo()
    {
        $nums = [];

        for ($i = 0; $i < 5; $i++)
        {
            $nums[$i] = rand(1, 10);
        }

        return $nums;
    }

    function capturarEntradasPermutacion()
    {

    }

    function calcularPermutacion($n, $r)
    {
        $top = $this->calcularFactorial($n);
        $bot = $this->calcularFactorial($n - $r);

        return $top/$bot;
    }

    function calcularFactorial($numero)
    {
        $factorial = 1;
        if($numero > 1){
            for($i = 2; $i <= $numero; $i++){
                $factorial *= $i;
            }
        }
        return $factorial;
    }
}