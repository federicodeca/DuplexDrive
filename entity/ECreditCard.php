<?php

use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity]
#[ORM\Table(name: 'credit_cards')]

class ECreditCard {  

    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int $idCard;

    #[ORM\Column(type: 'string')]
    private string $cardNumber;

    #[ORM\Column(type: 'datetime')]
    private DateTime $expirationDate;

    #[ORM\Column(type: 'string')]
    private string $cvv;
    

    #[ORM\ManyToOne(targetEntity: EUser::class)]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'idUser', nullable: false)]
    protected EUser $user;



    public function __construct(string $cardNumber, DateTime $expirationDate, string $cvv, EUser $user)
    {
        $this->cardNumber = $cardNumber;
        $this->expirationDate = $expirationDate;
        $this->cvv = $cvv;
        $this->user = $user;
    }
    public function getCardId(): int
    {
        return $this->idCard;
    }
    public function getCardNumber(): string
    {
        return $this->cardNumber;
    }
    public function setCardNumber(string $cardNumber): void
    {
        $this->cardNumber = $cardNumber;
    }
    public function getExpirationDate(): DateTime
    {
        return $this->expirationDate;
    }
    public function setExpirationDate(DateTime $expirationDate): void
    {
        $this->expirationDate = $expirationDate;
    }
    public function getCvv(): string
    {
        return $this->cvv;
    }
    public function setCvv(string $cvv): void
    {
        $this->cvv = $cvv;
    }
    public function getUser(): EUser
    {
        return $this->user;
    }
    public function setIdUser( EUser $user): void
    {
        $this->user = $user;
    }
    
}
