<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Code\Sistema\Service;

/**
 * Description of InterecessesService
 *
 * @author isaac
 */


use Code\Sistema\Entity\Interesses;
use Doctrine\ORM\EntityManager;
class InterecessesService {
 private $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    
    
     public function insert(array $data) {
        $interesses = new Interesses();
        
        $interesses->setNome($data['nome']);
      
        $this->em->persist($interesses);
        $this->em->flush();

        return ['sucesses'=>200       
            ];
    }
}
