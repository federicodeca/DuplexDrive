<?php


use Doctrine\ORM\Mapping as ORM;

// Specific table for Rental

#[ORM\Entity]
#[ORM\Table(name: 'rents')]
class ERent extends EOrder
{
   


    #[ORM\Column(type: 'float')]
    private float $totalPrice = 0.0; // crucial!

    #[ORM\OneToOne(targetEntity: EUnavailability::class)]
    #[ORM\JoinColumn(name: 'id_unavailability', referencedColumnName: 'idUnavailability', nullable: false)]
    protected EUnavailability $unavailability;

    #[ORM\ManyToOne(targetEntity: ECarForRent::class)]
    #[ORM\JoinColumn(name: 'id_auto', referencedColumnName: 'idAuto', nullable: false)]
    private ECarForRent $car;

    public function __construct(
        DateTime $orderDate,
        ECreditCard $method,
        EUser $user,
        EUnavailability $unavailability,
        ECarForRent $car
        
    ) {
        parent::__construct($orderDate, $method, $user);
        $this->unavailability = $unavailability;
        $this->car= $car;
        
     
    }

    public function getTotalPrice(): float
    {
        return $this->totalPrice;
    }
    public function setTotalPrice(float $totalPrice): void
    {
        $this->totalPrice = $totalPrice;
    }
    public function getUnavailability()
    {
        return $this->unavailability;
    }
    public function setUnavailability(EUnavailability $unavailability): void
    {
        $this->unavailability = $unavailability;
    }
    public function getAuto(): ECarForRent
    {
        return $this->car;
    }
    public function setIdAuto(ECarForRent $Auto): void
    {
        $this->car = $Auto;
    }
}

  

