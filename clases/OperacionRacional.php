<?php

class OperacionRacional extends Operacion
{

    public function __construct(string $cadena)
    {
        parent::__construct($cadena);    //  Op1 "8/8"  op2 "7/8" operador "+"
        $this->op1 = new Racional($this->op1);   // 8/8
        $this->op2 = new Racional($this->op2);    //   7/8
    }

    public function calcula(){
        switch ($this->operador) {
            case '+':
                $resultado = $this->op1->sumar($this->op2);
                break;
            case '-':
                $resultado = $this->op1 - $this->op2;
                break;
            case '*':
                $resultado = $this->op1 * $this->op2;
                break;
            case '/':
                $resultado = $this->op1 / $this->op2;
                break;
        }
        return $resultado;
    }

}