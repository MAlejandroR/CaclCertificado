<?php

abstract class Operacion
{


    protected $op1;
    protected $op2;
    protected  $operador;
    const REAL = 1;
    const RACIONAL = 2;
    const ERROR = 0;


    public static function tipo_operacion($cadena)
    {



        $entero = "[1-9][0-9]*";
        $op_racional = "[\-|\*|\+|\:]{1}";
        $op_real = "[\+|\-|\*|\/]{1}";
        $racional = "$entero\/$entero";
        $real = "[0-9]+(\.[0-9]+)?";


        $operacion_racional_1 = "$racional$op_racional$racional"; // 5/8 * 8/6
        $operacion_racional_2 = "$racional$op_racional$entero"; // 5/8 + 9
        $operacion_racional_3 = "$entero$op_racional$racional";// 5 - 8/8

        $operacion_real=   "$real$op_real$real";  //5+ 8





//$expresion_racional_2 = "$entero$expresion_operador_racional$expresion_racional";
//$expresion_racional_3 = "$expresion_racional$expresion_operador_racional$expresion_racional";
echo "<h1>Vamos a evaluar $cadena</h1>";
        if (preg_match("#^$operacion_racional_1$#", $cadena)) {
            echo "<h1>La $cadena cumple $operacion_racional_1  (5/8 + 9/8) </h1>";
            return self::RACIONAL;

        }
        if (preg_match("#^$operacion_racional_2$#", $cadena)) {
            echo "<h1>La $cadena cumple $operacion_racional_2  (5/8 + 9) </h1>";
            return self::RACIONAL;
        }
        if (preg_match("#^$operacion_racional_3$#", $cadena)) {
            echo "<h1>La $cadena cumple $operacion_racional_3  ( 9 + 8/8) </h1>";
            return self::RACIONAL;
        }
        if (preg_match("#^$operacion_real$#", $cadena)) {
            echo "<h1>La $cadena cumple $operacion_real  real  </h1>";
            return self::REAL;
        }
        return self::ERROR;
    }

    public function __construct(string $cadena)
    {
        $this->operador = $this->obtenerOperador($cadena);
        $this->op1 = $this->obtenerOp1($cadena);
        $this->op2 = $this->obtenerOp2($cadena);
    }

    private function obtenerOperador(string $cadena)
    {
        $operador = "";

        if (strpos($cadena, '+') !== false)
            $operador = '+';
        else if (strpos($cadena, '-') !== false)
            $operador = '-';
        else if (strpos($cadena, '*') !== false)
            $operador = '*';
        else if (strpos($cadena, ':') !== false)
            $operador = ':';
        else
            $operador = '/';
        return $operador;


//        switch(true){
//            case strpos( $cadena,'+'):
//                $operador='+';
//                break;
//            case strpos( $cadena,'-'):
//                $operador='-';
//                break;
//            case strpos($cadena,'*'):
//                $operador='*';
//                break;
//            case strpos( $cadena,':'):
//                $operador=':';
//                break;
//            default:
//                $operador='/';
//        }
//        return $operador; //(+,-,*,:,/)
//    }

    }

    private function obtenerOp1(string $cadena)
    {
        $pos = strpos($cadena, $this->operador);

        $op1 = substr($cadena, 0, $pos);
        return $op1;

    }

    private function obtenerOp2(string $cadena)
    {

        $pos = strpos($cadena, $this->operador);
        $op2 = substr($cadena, $pos + 1);


        return $op2;
    }

    public function __toString()
    {
        $resultado = "Operando 1 = $this->op1<br />";   // TODO: Implement __toString() method.
        $resultado .= "Operando 2 = $this->op2<br />";   // TODO: Implement __toString() method.
        $resultado .= "Operador  = $this->operador<br />";   // TODO: Implement __toString() method.
        return $resultado;
    }
    abstract public function calcula();

}