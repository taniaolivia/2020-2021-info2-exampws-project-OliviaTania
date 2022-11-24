<?php

namespace App\Entity;

use App\Repository\ParticipantRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ParticipantRepository::class)
 */
class Participant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nompart;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Prenompart;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $AdressePart;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNompart(): ?string
    {
        return $this->Nompart;
    }

    public function setNompart(string $Nompart): self
    {
        $this->Nompart = $Nompart;

        return $this;
    }

    public function getPrenompart(): ?string
    {
        return $this->Prenompart;
    }

    public function setPrenompart(string $Prenompart): self
    {
        $this->Prenompart = $Prenompart;

        return $this;
    }

    public function getAdressePart(): ?string
    {
        return $this->AdressePart;
    }

    public function setAdressePart(string $AdressePart): self
    {
        $this->AdressePart = $AdressePart;

        return $this;
    }
}
