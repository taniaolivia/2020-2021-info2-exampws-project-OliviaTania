<?php

namespace App\Entity;

use App\Repository\VoyageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VoyageRepository::class)
 */
class Voyage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $Refvoyage;

    /**
     * @ORM\Column(type="date")
     */
    private $Datedepartvoyage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Resumevoyage;

    /**
     * @ORM\ManyToOne(targetEntity=Destination::class, inversedBy="voyages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Destination;

    /**
     * @ORM\ManyToMany(targetEntity=Participant::class)
     */
    private $Participant;

    public function __construct()
    {
        $this->Participant = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRefvoyage(): ?string
    {
        return $this->Refvoyage;
    }

    public function setRefvoyage(string $Refvoyage): self
    {
        $this->Refvoyage = $Refvoyage;

        return $this;
    }

    public function getDatedepartvoyage(): ?\DateTimeInterface
    {
        return $this->Datedepartvoyage;
    }

    public function setDatedepartvoyage(\DateTimeInterface $Datedepartvoyage): self
    {
        $this->Datedepartvoyage = $Datedepartvoyage;

        return $this;
    }

    public function getResumevoyage(): ?string
    {
        return $this->Resumevoyage;
    }

    public function setResumevoyage(string $Resumevoyage): self
    {
        $this->Resumevoyage = $Resumevoyage;

        return $this;
    }

    public function getDestination(): ?Destination
    {
        return $this->Destination;
    }

    public function setDestination(?Destination $Destination): self
    {
        $this->Destination = $Destination;

        return $this;
    }

    /**
     * @return Collection|Participant[]
     */
    public function getParticipant(): Collection
    {
        return $this->Participant;
    }

    public function addParticipant(Participant $participant): self
    {
        if (!$this->Participant->contains($participant)) {
            $this->Participant[] = $participant;
        }

        return $this;
    }

    public function removeParticipant(Participant $participant): self
    {
        $this->Participant->removeElement($participant);

        return $this;
    }
}
