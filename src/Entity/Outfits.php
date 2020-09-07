<?php


namespace App\Entity;

use App\Repository\OutfitsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * @ORM\Entity(repositoryClass=OutfitsRepository::class)
 * @Vich\Uploadable
 */
class Outfits
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $picture;

    /**
     * @Vich\UploadableField(mapping="outfits", fileNameProperty="picture")
     * @var File
     */
    private $pictureFile;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }



    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }



    public function setPictureFile(File $picture = null):Outfits
    {
        $this->pictureFile = $picture;
        return $this;
    }

    public function getPictureFile(): ?File
    {
        return $this->pictureFile;
    }
}
