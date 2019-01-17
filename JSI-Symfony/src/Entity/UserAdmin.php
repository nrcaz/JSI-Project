<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserAdminRepository")
 */
class UserAdmin
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
    private $login;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $passwordKey;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $passwordExpirationKey;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

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

    public function getPasswordKey(): ?string
    {
        return $this->passwordKey;
    }

    public function setPasswordKey(?string $passwordKey): self
    {
        $this->passwordKey = $passwordKey;

        return $this;
    }

    public function getPasswordExpirationKey(): ?\DateTimeInterface
    {
        return $this->passwordExpirationKey;
    }

    public function setPasswordExpirationKey(?\DateTimeInterface $passwordExpirationKey): self
    {
        $this->passwordExpirationKey = $passwordExpirationKey;

        return $this;
    }
}
