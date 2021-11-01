<?php

namespace App\Entity;

use App\Repository\RaccoltaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RaccoltaRepository::class)
 */
class Raccolta
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $kg_olive;

    /**
     * @ORM\Column(type="integer")
     */
    private $kg_olio;

    /**
     * @ORM\Column(type="float")
     */
    private $resa_lt_qt;

    /**
     * @ORM\Column(type="float")
     */
    private $litri_teorici;

    /**
     * @ORM\Column(type="float")
     */
    private $litri_reali;

    /**
     * @ORM\Column(type="date")
     */
    private $data;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $spesa;

    /**
     * @ORM\Column(type="integer")
     */
    private $anno;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKgOlive(): ?float
    {
        return $this->kg_olive;
    }

    public function setKgOlive(float $kg_olive): self
    {
        $this->kg_olive = $kg_olive;

        return $this;
    }

    public function getKgOlio(): ?int
    {
        return $this->kg_olio;
    }

    public function setKgOlio(int $kg_olio = 0): self
    {
        $this->kg_olio = $kg_olio;

        return $this;
    }

    public function getResaLtQt(): ?float
    {
        return number_format(floatval($this->resa_lt_qt), 2);
    }

    public function setResaLtQt(float $resa_lt_qt = 0): self
    {
        $this->resa_lt_qt = (($this->getKgOlio()/$this->getKgOlive())*100);

        return $this;
    }

    public function getLitriTeorici(): ?float
    {
        return $this->litri_teorici;
    }

    public function setLitriTeorici(float $litri_teorici = 0): self
    {
        $this->litri_teorici = ($this->getKgOlio()*0.925);

        return $this;
    }

    public function getLitriReali(): ?float
    {
        return $this->litri_reali;
    }

    public function setLitriReali(float $litri_reali = 0): self
    {
        $this->litri_reali = $litri_reali;

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

    public function getSpesa(): ?int
    {
        return $this->spesa;
    }

    public function setSpesa(?int $spesa): self
    {
        $this->spesa = $spesa;

        return $this;
    }

    public function getAnno(): ?int
    {
        return $this->anno;
    }

    public function setAnno(int $anno): self
    {
        $this->anno = $anno;

        return $this;
    }
}
