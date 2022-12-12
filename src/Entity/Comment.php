<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentRepository::class)]
class Comment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Conference::class, inversedBy: 'comments')]
    #[ORM\JoinColumn(nullable: false)]
    private $conference;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $photoFilename;

    public function __toString(): string
    {
        return (string) $this->getPhotoFilename();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getConference(): ?Conference
    {
        return $this->conference;
    }

    public function setConference(?Conference $conference): self
    {
        $this->conference = $conference;

        return $this;
    }

    public function getPhotoFilename(): ?string
    {
        return $this->photoFilename;
    }

    public function setPhotoFilename(?string $photoFilename): self
    {
        $this->photoFilename = $photoFilename;

        return $this;
    }
}
