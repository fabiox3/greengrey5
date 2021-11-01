<?php

namespace App\Entity;

use App\Repository\OlivetoDetailsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OlivetoDetailsRepository::class)
 */
class OlivetoDetails
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Oliveto::class, inversedBy="olivetoDetails")
     * @ORM\JoinColumn(nullable=false)
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $categoria;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $note;

    /**
     * @ORM\Column(type="date")
     */
    private $data;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $rating;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?Oliveto
    {
        return $this->code;
    }

    public function setCode(?Oliveto $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getCategoria(): ?string
    {
        return $this->categoria;
    }

    public function setCategoria(string $categoria): self
    {
        $this->categoria = $categoria;

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

    public function getData(): ?\DateTimeInterface
    {
        return $this->data;
    }

    public function setData(\DateTimeInterface $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setRating(?int $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function __toString()
    {
        return $this->code;
    }
}
