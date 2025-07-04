<?php


use Doctrine\ORM\Mapping as ORM;



#[ORM\Entity]
#[ORM\Table(name: 'unavailabilities')]

class EUnavailability {

    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int $idUnavailability;

    #[ORM\Column(type: 'datetime')]
    private DateTime $start;

    #[ORM\Column(type: 'datetime')]
    private DateTime $end;
    


    #[ORM\ManyToOne(targetEntity: ECarForRent::class, inversedBy: 'unavailabilities')]
    #[ORM\JoinColumn(name: 'car_id', referencedColumnName: 'idAuto', nullable: false)]
    private ECarForRent $car;

    public function __construct(DateTime $start, DateTime $end, ECarForRent $car)
    {
        $this->start = $start;
        $this->end = $end;
        $this->car = $car;
    }
    public function getIdUnav(): int
    {
        return $this->idUnavailability;
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
    public function isAvailable(): bool
    {
        return $this->available;
    }
    public function setAvailable(bool $available): void
    {
        $this->available = $available;
    }
    public function getIdAuto(): int
    {
        return $this->car->getidAuto();
    }
    public function setCar(ECarForRent $car): void
    {
        $this->car = $car;
    }
    public function getCar(): ECarForRent
    {
        return $this->car;
    }
}
