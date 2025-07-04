<?php

use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity]
#[ORM\Table(name: 'surcharges')]

class ESurcharge
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int $idSurcharge;

    #[ORM\Column(type: 'datetime')]
    private DateTime $start;

    #[ORM\Column(type: 'datetime')]
    private DateTime $end;

    #[ORM\Column(type: 'float')]
    private float $price;
    
    #[ORM\ManyToOne(targetEntity: ECarForRent::class, inversedBy: 'surcharges')]
    #[ORM\JoinColumn(name: 'car_id', referencedColumnName: 'idAuto', nullable: false)]
    private ECarForRent $car;

    public function __construct(DateTime $start, DateTime $end, float $price, ECarForRent $car)
    {
        $this->start = $start;
        $this->end = $end;
        $this->price = $price;
        $this->car = $car;
    }
    public function getIdSurcharge(): int
    {
        return $this->idSurcharge;
    }
    public function getStart(): DateTime
    {
        return $this->start;
    }
    public function setStart(DateTime $start): void
    {
        $this->start = $start;
    }

    public function getEnd(): DateTime
    {
        return $this->end;
    }
    public function setEnd(DateTime $end): void
    {
        $this->end = $end;
    }
    public function getPrice(): float
    {
        return $this->price;
    }
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function getCar(): ECarForRent
    {
        return $this->car;
    }
    public function setCar(ECarForRent $car): void
    {
        $this->car = $car;
    }
    public function getIdCar(): int
    {
        return $this->car->getIdAuto();
    }
}
