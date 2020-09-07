<?php


namespace App\Entity;

use App\Repository\OutfitsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
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
     * @Vich\UploadableField(mapping="product_image", fileNameProperty="imageName", size="imageSize")
     *
     * @var File|null
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string")
     *
     * @var string|null
     */
    private $imageName;

    /**
     * @ORM\Column(type="integer")
     *
     * @var int|null
     */
    private $imageSize;


    /**
     * @param File|UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageSize(?int $imageSize): void
    {
        $this->imageSize = $imageSize;
    }

    public function getImageSize(): ?int
    {
        return $this->imageSize;
    }

    public
    function getId(): ?int
    {
        return $this->id;
    }

    public
    function getName(): ?string
    {
        return $this->name;
    }

    public
    function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }


    public
    function getPicture(): ?string
    {
        return $this->picture;
    }

    public
    function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }


    public
    function setPictureFile(File $picture = null): ?Outfits
    {
        $this->pictureFile = $picture;
        return $this;
    }

    public
    function getPictureFile(): ?File
    {
        return $this->pictureFile;
    }
}
