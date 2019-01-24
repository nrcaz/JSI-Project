<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity("email", message="Désolé mais cet email est déjà pris ({{ value }})")
 * @UniqueEntity("username", message="Désolé mais ce pseudo est déjà pris ({{ value }})")
 */
class User implements UserInterface 
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="8",minMessage="Votre message doit comporter au moins 8 caractères")
     * @Assert\EqualTo(propertyPath="confirm_password", message="Les mots de passe ne sont pas identiques")
     */
    private $password;

    public $confirm_password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $passwordKeyForget;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $passwordKeyForgetExpiration;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getPasswordKeyForget(): ?string
    {
        return $this->passwordKeyForget;
    }

    public function setPasswordKeyForget(?string $passwordKeyForget): self
    {
        $this->passwordKeyForget = $passwordKeyForget;

        return $this;
    }

    public function getPasswordKeyForgetExpiration(): ?string
    {
        return $this->passwordKeyForgetExpiration;
    }

    public function setPasswordKeyForgetExpiration(?string $passwordKeyForgetExpiration): self
    {
        $this->passwordKeyForgetExpiration = $passwordKeyForgetExpiration;

        return $this;
    }

    // Implémentation des fonctions de l'interface UserInterface
    public function getRoles() {
        return ['ROLE_ADMIN'];   
    }

    public function getSalt() {}

    public function eraseCredentials() {}
    
    /** @see Serializable::serialize() */
    // 2 METHODES POUR INTERFACE \Serializable
    // serialize
    // unserialize
    
    public function serialize()
    {
        // ATTENTION: AJOUTER LES INFOS A MEMORISER DANS LA SESSION
        
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            $this->email,
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            $this->email,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
    }
}
