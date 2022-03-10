<?php

namespace App\Entity;

use App\Repository\PointRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PointRepository::class)]
class Point
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer', unique:true)]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $titre;

    #[ORM\Column(type: 'integer', unique:true)]
    private $pos;

    #[ORM\Column(type: 'string')]
    private $latitude;

    #[ORM\Column(type: 'string')]
    private $longitude;

    #[ORM\Column(type: 'text', nullable: true)]
    private $text;

    #[ORM\ManyToOne(targetEntity: Parcours::class, inversedBy: "id")]
    private $parcours;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPos(): ?int
    {
        return $this->pos;
    }

    public function setPos(int $pos): self
    {
        $this->pos = $pos;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(string $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(string $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return Collection|Parcours[]
     */
    public function getParcours(): ?Parcours
    {
        return $this->parcours;
    }

    function setParcours($parcours)
    {

        $this->parcours = $parcours;

        return $this;
    }

    public function addParcours(Parcours $parcours): self
    {
        if (!$this->parcours->contains($parcours)) {
            $this->parcours[] = $parcours;
        }

        return $this;
    }

    public function removeParcours(Parcours $parcours): self
    {
        $this->parcours->removeElement($parcours);

        return $this;
    }
}
