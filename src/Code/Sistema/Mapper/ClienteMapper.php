<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Code\Sistema\Mapper;
use Code\Sistema\Entity\Cliente;
use Doctrine\ORM\EntityManager;
/**
 * Description of ClienteMapper
 *
 * @author isaac
 */
class ClienteMapper {
    private $em;
    public function __construct(EntityManager $em) {
        $this->em =$em;
    }
    public function insert (Cliente $cliente) {
        $this->em->persist($cliente);
        $this->em->flush();
        return ['id'=>$cliente->getId(),'nome'=>$cliente->getNome(),'email'=>$cliente->getEmail()];
    }
    
     public function fetcAll () {
         $array[0]['nome']="isaac";
         $array[0]['email']="isaac@gmail.com";
         $array[1]['nome']="isaac";
         $array[1]['email']="isaac@gmail.com";
        return $array;
    }
}
