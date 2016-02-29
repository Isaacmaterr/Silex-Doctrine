<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Code\Sistema\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * Description of ClienteRepository
 *
 * @author isaac
 */
class ClienteRepository extends EntityRepository {

    //put your code here
    public function getClientesOrdenados() {
        return $this
                        ->createQueryBuilder("c")
                        ->orderBy('c.nome', 'asc')
                        ->getQuery()
                        ->getResult();
    }

    public function getClientesEmail($email) {
       return  $this->createQueryBuilder("c")
               ->where('c.email = :email')
              ->setParameter(':email', $email)
        
      
        ->getQuery()
        ->getResult();
        
    }

}
