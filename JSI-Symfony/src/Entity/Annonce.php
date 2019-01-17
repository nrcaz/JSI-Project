<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AnnonceRepository")
 */
class Annonce
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
    private $titre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $equipement;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $images = [];

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lieu;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $surface;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $loyer;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $charges;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $disponibilite;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $bureaux;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $openSpace;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $salleReunion;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $espaceDetente;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $accueil;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateCreation;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $note;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getEquipement(): ?string
    {
        return $this->equipement;
    }

    public function setEquipement(?string $equipement): self
    {
        $this->equipement = $equipement;

        return $this;
    }

    public function getImages(): ?array
    {
        return $this->images;
    }

    public function setImages(?array $images): self
    {
        $this->images = $images;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(?string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getSurface(): ?int
    {
        return $this->surface;
    }

    public function setSurface(?int $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getLoyer(): ?int
    {
        return $this->loyer;
    }

    public function setLoyer(?int $loyer): self
    {
        $this->loyer = $loyer;

        return $this;
    }

    public function getCharges(): ?int
    {
        return $this->charges;
    }

    public function setCharges(?int $charges): self
    {
        $this->charges = $charges;

        return $this;
    }

    public function getDisponibilite(): ?string
    {
        return $this->disponibilite;
    }

    public function setDisponibilite(?string $disponibilite): self
    {
        $this->disponibilite = $disponibilite;

        return $this;
    }

    public function getBureaux(): ?int
    {
        return $this->bureaux;
    }

    public function setBureaux(?int $bureaux): self
    {
        $this->bureaux = $bureaux;

        return $this;
    }

    public function getOpenSpace(): ?int
    {
        return $this->openSpace;
    }

    public function setOpenSpace(?int $openSpace): self
    {
        $this->openSpace = $openSpace;

        return $this;
    }

    public function getSalleReunion(): ?int
    {
        return $this->salleReunion;
    }

    public function setSalleReunion(?int $salleReunion): self
    {
        $this->salleReunion = $salleReunion;

        return $this;
    }

    public function getEspaceDetente(): ?int
    {
        return $this->espaceDetente;
    }

    public function setEspaceDetente(?int $espaceDetente): self
    {
        $this->espaceDetente = $espaceDetente;

        return $this;
    }

    public function getAccueil(): ?string
    {
        return $this->accueil;
    }

    public function setAccueil(?string $accueil): self
    {
        $this->accueil = $accueil;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(?\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): self
    {
        $this->note = $note;

        return $this;
    }
}
