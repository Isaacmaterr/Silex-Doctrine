<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Code\Sistema\Entity;

use Doctrine\ORM\Mapping as ORM;
use \Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Code\Sistema\Entity\ClienteRepository")
   @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="clientes")
 */
class Cliente {
    function __construct() {
        $this->interesses = new ArrayCollection();
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\Column(type="string",length=255)
     */
    private $nome;

    /**
     * @ORM\Column(type="string",length=255)
     */
    private $email;

    /**
     * @ORM\OneToOne(targetEntity="Code\Sistema\Entity\ClienteProfile")
     * @ORM\JoinColumn(name="cliente_profile", referencedColumnName="id")
     */
    private $profile;

    /**
     * @ORM\ManyToOne(targetEntity="Code\Sistema\Entity\Cupom")
     * @ORM\JoinColumn(name="cupom_id", referencedColumnName="id")
     */
    private $cupom;

    /**
     *
     *
     * @ORM\ManyToMany(targetEntity="Code\Sistema\Entity\Interesses")
     * @ORM\JoinTable(name="clientes_interesses",
     *      joinColumns={@ORM\JoinColumn(name="cliente_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="interesse_id", referencedColumnName="id")}
     *      )
     */
    private $interesses;
    
    /** @ORM\Column(type="datetime") */
    private $createdAt;
    
    /** @ORM\PrePersist */
    public function preCreated()
    {
        $this->createdAt =  new \DateTime();
    }
    
    function getCreatedAt()
    {
        return $this->createdAt;
    }

  

    function getInteresses() {
        return $this->interesses;
    }

    function addInteresse($interesses) {
        $this->interesses->add($interesses);
    }

        function getCupom() {
        return $this->cupom;
    }

    function setCupom($cupom) {
        $this->cupom = $cupom;
    }

    function getProfile() {
        return $this->profile;
    }

    function setProfile($profile) {
        $this->profile = $profile;
    }

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

}
