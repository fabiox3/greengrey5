<?php

namespace App\Entity;

use App\Repository\OlivetoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\OliveTreesListApi;

/**
 * @ORM\Entity(repositoryClass=OlivetoRepository::class)
 * @ApiResource(
 *      itemOperations={
 *       "get",
 *       "get_all" = {
 *       "method" = "GET",
 *       "path" = "/olivetolistapi",
 *       "controller" = OliveTreesListApi::class,
 *       "read"=false,
 *     },
 *     }
 * )
 */
class Oliveto
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
    private $code;

    /**
     * @ORM\Column(type="float")
     */
    private $latitude;

    /**
     * @ORM\Column(type="float")
     */
    private $longitude;

    /**
     * @ORM\Column(type="string", length=6)
     */
    private $sector;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $link;

    /**
     * @ORM\Column(type="integer")
     */
    private $fieldrow;

    /**
     * @ORM\OneToMany(targetEntity=OlivetoDetails::class, mappedBy="code")
     */
    private $olivetoDetails;

    public function __construct()
    {
        $this->olivetoDetails = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getSector(): ?string
    {
        return $this->sector;
    }

    public function setSector(string $sector): self
    {
        $this->sector = $sector;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getFieldrow(): ?int
    {
        return $this->fieldrow;
    }

    public function setFieldrow(int $fieldrow): self
    {
        $this->fieldrow = $fieldrow;

        return $this;
    }

    /**
     * @return Collection|OlivetoDetails[]
     */
    public function getOlivetoDetails(): Collection
    {
        return $this->olivetoDetails;
    }

    public function addOlivetoDetail(OlivetoDetails $olivetoDetail): self
    {
        if (!$this->olivetoDetails->contains($olivetoDetail)) {
            $this->olivetoDetails[] = $olivetoDetail;
            $olivetoDetail->setCode($this);
        }

        return $this;
    }

    public function removeOlivetoDetail(OlivetoDetails $olivetoDetail): self
    {
        if ($this->olivetoDetails->removeElement($olivetoDetail)) {
            // set the owning side to null (unless already changed)
            if ($olivetoDetail->getCode() === $this) {
                $olivetoDetail->setCode(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->code;
    }
}
