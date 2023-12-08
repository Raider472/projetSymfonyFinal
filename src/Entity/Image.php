<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImageRepository::class)]
class Image
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $path = null;

    #[ORM\OneToOne(mappedBy: 'image', cascade: ['persist', 'remove'])]
    private ?Figurine $figurine = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): static
    {
        $this->path = $path;

        return $this;
    }

    public function getFigurine(): ?Figurine
    {
        return $this->figurine;
    }

    public function setFigurine(Figurine $figurine): static
    {
        // set the owning side of the relation if necessary
        if ($figurine->getImage() !== $this) {
            $figurine->setImage($this);
        }

        $this->figurine = $figurine;

        return $this;
    }
}
