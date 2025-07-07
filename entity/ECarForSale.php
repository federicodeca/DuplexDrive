<?php



use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity]
#[ORM\Table(name: 'cars_for_sale')]

class ECarForSale extends EAuto
{
    #[ORM\Column(type: 'integer')]
    protected int $price;

    #[ORM\Column(type: 'boolean')]
    protected bool $available = true;

    #[ORM\OneToOne(targetEntity: ESale::class, mappedBy: 'carForSale')]
    protected? ESale $saleOrder = null;

    #[ORM\Column(type: 'string', length: 10)]
    protected  string $Km0OrNew ;

    protected static $entity = ECarForSale::class;


    public function __construct(string $model, string $brand, string $color, int $horsepower, int $engineDisplacement, int $seats, string $fuelType,int $price, bool $available, string $condition)
    {
        parent::__construct($model, $brand, $color, $horsepower, $engineDisplacement, $seats, $fuelType);
        $this->price = $price;
        $this->available = $available;
        $this->Km0OrNew = $condition; // 'Km0' or 'New'
        $this->photo = new ArrayCollection(); // Initialize photo to null
    }

    public function getPrice(): int
    {
        return $this->price;
    }
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }
    public function isAvailable(): bool
    {
        return $this->available;
    }
    public function setAvailable(bool $available): void
    {
        $this->available = $available;
    }
    public function getSaleOrder(): ?ESale
    {
        return $this->saleOrder;
    }
    public function setSaleOrder(?ESale $saleOrder): void
    {
        $this->saleOrder = $saleOrder;
    }

    public function getKm0OrNew(): string  {
        return $this->Km0OrNew;
    }

    public function setKm0OrNew(string $condition): void {
       
            $this->Km0OrNew = $condition;
        
    }
    public static function getEntity() {
        return self::$entity;
    }



}
