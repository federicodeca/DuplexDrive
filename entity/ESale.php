<?php

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'sales')]

class ESale extends EOrder
{
    #[ORM\OneToOne(targetEntity: ECarForSale::class, inversedBy: 'saleOrder')]
    #[ORM\JoinColumn(name: 'car_id', referencedColumnName: 'idAuto', nullable: true)]
    private ECarForSale $carForSale;

    #[ORM\Column(type: 'integer')]
    private int $price;

    public function __construct(DateTime $orderDate, ECreditCard $method, EUser $user, ECarForSale $carForSale,int $price)
    {
        parent::__construct($orderDate, $method, $user);
        $this->price= $price;
        $this->carForSale = $carForSale;
    }
    public function getCarForSale(): ECarForSale
    {
        return $this->carForSale;
    }   
    public function setCarForSale(ECarForSale $carForSale): void
    {
        $this->carForSale = $carForSale;
    }
    public function getPrice(): int
    {
        return $this->price;
    }
    public function setPrice(int $price): void
    {
        $this->price = $price;  
    }
}
