<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Get;
use App\Repository\WorkRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: WorkRepository::class)]
#[Vich\Uploadable]
#[ApiResource(operations: [
    new Get(),
    new GetCollection(),
])]
class Work
{
    use Timestampable;
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $projectLink = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $codeLink = null;

    #[ORM\Column(length: 255)]
    private ?string $imgUrl = null;

    #[Vich\UploadableField(mapping: 'portfolio_images', fileNameProperty: 'imgUrl')]
    private ?File $imageFile = null;

    #[ORM\Column(type: Types::JSON, nullable: true)]
    private array $tags = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
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

    public function getProjectLink(): ?string
    {
        return $this->projectLink;
    }

    public function setProjectLink(?string $projectLink): self
    {
        $this->projectLink = $projectLink;

        return $this;
    }

    public function getCodeLink(): ?string
    {
        return $this->codeLink;
    }

    public function setCodeLink(?string $codeLink): self
    {
        $this->codeLink = $codeLink;

        return $this;
    }

    public function getImgUrl(): ?string
    {
        return $this->imgUrl;
    }

    public function setImgUrl(string $imgUrl): self
    {
        $this->imgUrl = $imgUrl;

        return $this;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageFile(?File $imageFile = null): self
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->createdAt = new \DateTimeImmutable();
            $this->updatedAt = new \DateTimeImmutable();
        }

        return $this;
    }

    public function getTags(): array
    {
        return $this->tags;
    }

    public function setTags(?array $tags): self
    {
        $this->tags = $tags;

        return $this;
    }

}
