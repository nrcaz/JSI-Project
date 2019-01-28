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

    // ON RAJOUTE UNE PROPRIETE QUI NOUS SERT A RECUPERER LE FICHIER UPLOADE DANS LE FORMULAIRE
    public $uploadArticleForm;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image1;
    // uploaded file
    public $image1Upload;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image2;
    // uploaded file
    public $image2Upload;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image3;
    // uploaded file
    public $image3Upload;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image4;
    // uploaded file
    public $image4Upload;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image5;
    // uploaded file
    public $image5Upload;
    
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

    public function getImage1(): ?string
    {
        return $this->image1;
    }

    public function setImage1(?string $image1): self
    {
        $this->image1 = $image1;

        return $this;
    }

    public function getImage2(): ?string
    {
        return $this->image2;
    }

    public function setImage2(?string $image2): self
    {
        $this->image2 = $image2;

        return $this;
    }

    public function getImage3(): ?string
    {
        return $this->image3;
    }

    public function setImage3(?string $image3): self
    {
        $this->image3 = $image3;

        return $this;
    }

    public function getImage4(): ?string
    {
        return $this->image4;
    }

    public function setImage4(?string $image4): self
    {
        $this->image4 = $image4;

        return $this;
    }

    public function getImage5(): ?string
    {
        return $this->image5;
    }

    public function setImage5(?string $image5): self
    {
        $this->image5 = $image5;

        return $this;
    }
}
