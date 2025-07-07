<?php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Query\Expr;



#[ORM\Entity]
#[ORM\Table(name: 'orders')]
#[ORM\InheritanceType("JOINED")]  //CTI joined table
#[ORM\DiscriminatorColumn(name: "type", type: "string")]
#[ORM\DiscriminatorMap(["rentals" => "ERent", "sales" => "ESale"])]

abstract class EOrder
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int $idOrder;

    #[ORM\Column(type: 'datetime')]
    private DateTime $orderDate;


    #[ORM\ManyToOne(targetEntity: ECreditCard::class)]
    #[ORM\JoinColumn(name: 'method_id', referencedColumnName: 'idCard', nullable: true)]
    protected ECreditCard $method;

    #[ORM\ManyToOne(targetEntity: EUser::class)]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'idUser', nullable: false)]
    protected EUser $user;

    public function __construct(DateTime $orderDate,  ECreditCard $method, EUser $user)
    {
        $this->orderDate = $orderDate;
        
        $this->method = $method;
        $this->user = $user;
    }
    public function getOrderId(): int
    {
        return $this->idOrder;
    }
    public function getOrderDate(): DateTime
    {
        return $this->orderDate;
    }
    public function setOrderDate(DateTime $orderDate): void
    {
        $this->orderDate = $orderDate;
    }



    public function setMethod(ECreditCard $method): void
    {
        $this->method = $method;
    }

    public function getMethod(): ECreditCard
    {
        return $this->method;
    }

    public function getUser(): EUser
    {
        return $this->user;
    }
    public function setUser(EUser $user): void
    {
        $this->$user = $user;
    }

    

}
