<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Code\Sistema\Entity;
use Doctrine\ORM\Mapping as ORM ;
/**
 * Description of Cupom
 *
 * @author isaac
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="cupom")
 */
class Cupom {
     /**
     *@ORM\Id
     *@ORM\Column(type="integer")
     *@ORM\GeneratedValue
     */
    private $id ;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $codigo;
     /**
     *@ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $valor;

    
    function getId() {
        return $this->id;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getValor() {
        return $this->valor;
    }

   
    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }


    
}
