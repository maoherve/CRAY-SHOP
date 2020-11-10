<?php


namespace App\Entity;

use App\Repository\OutfitsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @Vich\UploadableField(mapping="product_image", fileNameProperty="imageName")
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
     * @ORM\Column(type="float")
     */
    private $price;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $quantity;

    /**
     * @ORM\OneToMany(targetEntity=Declinaison::class, mappedBy="outfits")
     */
    private $declinaisons;

    public function __construct()
    {
        $this->declinaisons = new ArrayCollection();
    }

    /**
     * @return Collection|Declinaison[]
     */
    public function getDeclinaisons(): Collection
    {
        return $this->declinaisons;
    }


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

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }


    public function getQuantity(): ?string
    {
        return $this->quantity;
    }

    public function setQuantity(string $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }



    public function setRefArticles(string $refArticles): self
    {
        $this->declinaisons = $refArticles;

        return $this;
    }


    public function addDeclinaison(Declinaison $declinaison): self
    {
        if (!$this->declinaisons->contains($declinaison)) {
            $this->declinaisons[] = $declinaison;
            $declinaison->setOutfits($this);
        }

        return $this;
    }

    public function removeDeclinaison(Declinaison $declinaison): self
    {
        if ($this->declinaisons->contains($declinaison)) {
            $this->declinaisons->removeElement($declinaison);
            // set the owning side to null (unless already changed)
            if ($declinaison->getOutfits() === $this) {
                $declinaison->setOutfits(null);
            }
        }

        return $this;
    }
}
