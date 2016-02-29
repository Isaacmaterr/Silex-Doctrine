<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Code\Sistema\Entity;
use Doctrine\ORM\Mapping as ORM ;

/**
 * Description of ClienteProfile
 *
 * @author isaac
 */
/**
 * @ORM\Entity
 * @ORM\Table(name="clientes_profile")
 */
class ClienteProfile {
    /**
     *@ORM\Id
     *@ORM\Column(type="integer")
     *@ORM\GeneratedValue
     */
    private $id;
    /**
     *@ORM\Column(type="string",length=15)
     */
    private $cpf ;
   /**
     *@ORM\Column(type="string",length=15)
     */
    private $rg;
    
    function getId() {
        return $this->id;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getRg() {
        return $this->rg;
    }

  

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setRg($rg) {
        $this->rg = $rg;
    }



}
