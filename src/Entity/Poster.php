<?php

namespace App\Entity;

use App\Repository\PosterRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @ORM\Entity(repositoryClass=PosterRepository::class)
 * @Vich\Uploadable
 */
class Poster
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
    private $poster;

    /**
     * @Vich\UploadableField(mapping="product_image", fileNameProperty="posterName")
     * @var File
     */
    private $posterFile;


    /**
     * @ORM\Column(type="string")
     *
     * @var string|null
     */
    private $posterName;

    public function setPosterName(?string $posterName): void
    {
        $this->posterName = $posterName;
    }

    public function getPosterName(): ?string
    {
        return $this->posterName;
    }

    /**
     * @param File|UploadedFile|null $posterFile
     */
    public function setPosterFile(?File $posterFile = null): void
    {
        $this->posterFile = $posterFile;

        if (null !== $posterFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getPosterFile(): ?File
    {
        return $this->posterFile;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage(): ?string
    {
        return $this->poster;
    }

    public function setImage(string $poster): self
    {
        $this->poster = $poster;

        return $this;
    }
}
