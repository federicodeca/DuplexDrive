<?php

use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity]
#[ORM\Table(name: 'reviews')]

class EReview
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'text')]
    private string $content;

    #[ORM\Column(type: 'integer')]
    private int $rating;

    #[ORM\OneToOne(targetEntity: EUser::class)]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'idUser', nullable: false)]
    private EUser $user;

    public function __construct(string $content, int $rating, EUser $user)
    {
        $this->content = $content;
        $this->rating = $rating;
        $this->user = $user;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getRating(): int
    {
        return $this->rating;
    }

    public function getUser(): EUser
    {
        return $this->user;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function setRating(int $rating): void
    {
        $this->rating = $rating;
    }
}
