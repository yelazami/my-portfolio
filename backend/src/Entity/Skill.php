<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Get;
use App\Repository\SkillRepository;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploadableField;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: SkillRepository::class)]
#[Vich\Uploadable]
#[ApiResource(operations: [
    new Get(),
    new GetCollection(),
])]
class Skill
{
    use Timestampable;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 70)]
    #[Assert\NotBlank]
    #[Assert\NotNull]
    #[Assert\Unique]
    private ?string $name = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $bgColor = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $icon = null;

    #[Vich\UploadableField(mapping: 'portfolio_images', fileNameProperty: 'icon')]
    private ?File $imageFile = null;

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

    public function getBgColor(): ?string
    {
        return $this->bgColor;
    }

    public function setBgColor(?string $bgColor): self
    {
        $this->bgColor = $bgColor;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(string $icon): self
    {
        $this->icon = $icon;

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
}
