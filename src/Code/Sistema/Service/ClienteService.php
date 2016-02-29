<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Code\Sistema\Service;

/**
 * Description of ClienteService
 *
 * @author isaac
 */
use Code\Sistema\Entity\Cliente;
use Doctrine\ORM\EntityManager;
use Code\Sistema\Entity\ClienteProfile;
use Code\Sistema\Entity\Interesses;

class ClienteService {

    private $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    public function insert(array $data) {
        $cliente = new Cliente();
        
        $cliente->setNome($data['nome']);
        $cliente->setEmail($data['email']);
        if (isset($data['rg'])and isset($data['cpf'])) {
            $clientePro = new ClienteProfile();
            $clientePro->setCpf($data['cpf']);
            $clientePro->setRg($data['rg']);
            $this->em->persist($clientePro);
            $cliente->setProfile($clientePro);
        }
        
        if($data['intereceses']){
            $array = explode(",", $data['intereceses']);
            foreach ($array as $value) {
               
                $interesses = $this->em->getReference("Code\Sistema\Entity\Interesses", $value);
                $cliente->addInteresse($interesses);
            }
        }
        
        $this->em->persist($cliente);
        $this->em->flush();

        return ['rg' => $cliente->getProfile()->getRg(),
                'cpf'=>$cliente->getProfile()->getCpf(),        
            ];
    }

    public function update($id, array $array) {
        $cliente = $this->em->getReference("Code\Sistema\Entity\Cliente", $id);
        $cliente->setNome($array['nome'])
                ->setEmail($array['email']);
        $this->em->persist($cliente);
        $this->em->flush();
    }

    public function buscageral() {
        $cliente = $this->em->getRepository("Code\Sistema\Entity\Cliente");
        $result = $cliente->findAll();
        return $result;
    }

    public function buscaunico($id) {
        $cliente = $this->em->getRepository("Code\Sistema\Entity\Cliente");
        $result = $cliente->find($id);
        return $result;
    }

    public function buscaremail($email) {
        $cliente = $this->em->getRepository("Code\Sistema\Entity\Cliente");
        $result = $cliente->getClientesEmail($email);
        return $result;
    }

}
