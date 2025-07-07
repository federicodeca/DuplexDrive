<?php





use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity]
#[ORM\Table(name: 'users')]

class EUser extends EPerson {

    protected string $description = "User";

    #[ORM\Column(type: 'string')]
    protected string $phone;

    #[ORM\Column(type: 'string')]
    protected string $city;

    #[ORM\Column(type: 'integer')]
    protected int $zipCode;

    #[ORM\Column(type: 'string')]
    protected string $address;

    #[ORM\Column(type: 'boolean')]
    protected bool $isVerified ;

     protected static $entity = EUser::class;

    

    public function __construct($name, $surname, $email, $phone, $userName, $password, $city, $zipCode, $address)
    {
        parent::__construct($name, $surname, $email,$password, $userName);
        $this->phone = $phone;  
        $this->city = $city;
        $this->zipCode = $zipCode;
        $this->address = $address;
        $this->isVerified = false; // Default value
        
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getPhone()
    {
        return $this->phone;
    }
    public function getCity()
    {
        return $this->city;
    }
    public function getZipCode()
    {
        return $this->zipCode;
    }
    public function getAddress()
    {
        return $this->address;
    }
    public function getIsVerified(): bool
    {
        return $this->isVerified;
    }
    public function setVerified(bool $isVerified): void
    {
        $this->isVerified = $isVerified;
    }

    public function verifyUserUsername(string $username): bool
    {
        return $this->getUserName() === $username;
    }

    public function verifyPassword($inputPassword): bool
    {
    return password_verify($inputPassword, $this->password);
    }
    public static function getEntity() {
        return self::$entity;
    }
}
