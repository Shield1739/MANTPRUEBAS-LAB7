<?php

require_once (__DIR__.'/Calculadora.php');
use \PHPUnit\Framework\TestCase;

class CalculadoraTest extends TestCase
{
    public function testSumarProveedor()
    {
        return [
            'Caso 1' => [-1, -1, -2],
            'Caso 2' => [0, 0, 0],
            'Caso 3' => [0, -1, -1],
            'Caso 4' => [-1, 0, -1]
        ];
    }

    /**
     * @dataProvider testSumarProveedor
     */
    public function testSumar($numero1, $numero2, $resultado_esperado)
    {
        $calculadora = new Calculadora();
        $this->assertEquals($resultado_esperado, $calculadora->sumar($numero1, $numero2), "Error en suma");
        $this->assertSame($resultado_esperado, $calculadora->sumar($numero1, $numero2), "Error en suma (assert same)");
    }

    public function testRestarProveedor()
    {
        return [
            'Caso 1' => [-1, -1, 0],
            'Caso 2' => [0, 0, 0],
            'Caso 3' => [0, -1, 1],
            'Caso 4' => [-1, 0, -1]
        ];
    }

    /**
     * @dataProvider testRestarProveedor
     */
    public function testRestar($numero1, $numero2, $resultado_esperado)
    {
        $calculadora = new Calculadora();
        $this->assertEquals($resultado_esperado, $calculadora->restar($numero1, $numero2), "Error en resta");
    }

    public function testMultiplicarProveedor()
    {
        return [
            'Caso 1' => [-1, -1, 1],
            'Caso 2' => [0, 0, 0],
            'Caso 3' => [2, 3, 6],
            'Caso 4' => [-5, 2, -10]
        ];
    }

    /**
     * @dataProvider testMultiplicarProveedor
     */
    public function testMultiplicar($numero1, $numero2, $resultado_esperado)
    {
        $calculadora = new Calculadora();
        $this->assertEquals($resultado_esperado, $calculadora->multiplicar($numero1, $numero2), "Error en multiplicar");
    }

    public function testDividirProveedor()
    {
        return [
            'Caso 1' => [-27.3, 4.0, -6.825],
            'Caso 2' => [-5.0, 2.0, -2.5],
            'Caso 3' => [6.0, 2.0, 3.0],
            'Caso 4' => [25.0, 0.0, new Exception("Division entre 0")]
        ];
    }

    /**
     * @dataProvider testDividirProveedor
     */
    public function testDividir($numero1, $numero2, $resultado_esperado)
    {
        $calculadora = new Calculadora();
        $this->assertEqualsWithDelta($resultado_esperado, $calculadora->dividir($numero1, $numero2), 0.1, "Error en dividir");
    }

    public function testGenerarArreglo()
    {
        $calculadora = new Calculadora();
        //$this->assertContains(1, $calculadora->generarArreglo(), "error en generar arreglo");
        //$this->assertCount(5, $calculadora->generarArreglo(), "error en generar arreglo (assert count)");
        $this->assertEmpty($calculadora->generarArreglo(), "error en generar arreglo (assert empty)");
        $this->assertNotEmpty($calculadora->generarArreglo(), "error en generar arreglo (assert not empty)");
    }

    public function testCapturarEntradasPermutacion()
    {
        // Se crea el doble de prueba para la clase Calculadora, método 'capturarEntradasPermutacion'
        $stub = $this->createMock('Calculadora');
        $stub->method('capturarEntradasPermutacion')
            ->willReturn(array(5, 3));

        $this->assertSame(array(5, 3), $stub->capturarEntradasPermutacion());

    }

    public function testCalcularPermutacion()
    {
        /* Se crea un mock para la clase Calculadora.
         Solo se hace mock al método calcularFactorial*/
        $mock = $this->getMockBuilder('Calculadora')
            ->onlyMethods(array('calcularFactorial'))
            ->getMock();

        /* Se configuran las expectativas para el método calcularFactorial
                se llamará dos veces y devolverá 120 y 6, en cada ocasión, respectivamente. */
        $mock->expects($this->exactly(2))
            ->method('calcularFactorial')
            ->will($this->onConsecutiveCalls(120, 6));

        /* Se hace el assert. */
        $this->assertSame(20, $mock->calcularPermutacion(5, 2));
    }

    public function testComprobarLlamada()
    {
        $mock = $this->getMockBuilder('Calculadora')
            ->onlyMethods(array('calcularFactorial'))
            ->getMock();

        $mock->expects($this->exactly(2))
            ->method('calcularFactorial')
            ->withConsecutive([5], [3])
            ->will($this->onConsecutiveCalls(120, 6));

       $this->assertEquals(120, $mock->calcularFactorial(5));
       $this->assertEquals(6, $mock->calcularFactorial(3));
    }
}