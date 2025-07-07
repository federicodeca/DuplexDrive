<?php

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'persons')]
#[ORM\InheritanceType("JOINED")] // STI single table inheritance
#[ORM\DiscriminatorColumn(name: "type", type: "string")]
#[ORM\DiscriminatorMap(["admin" => "EAdmin", "user" => "EUser", "owner" => "EOwner"])]

class EPerson {

    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    protected $idUser;

    #[ORM\Column(type: 'string')]
    protected $firstname;

    #[ORM\Column(type: 'string')]
    protected $surname;

    #[ORM\Column(type: 'string', unique: true)]
    protected $email;

    #[ORM\Column(type: 'string')]
    protected $password;

    #[ORM\Column(type: 'string', unique: true)]
    protected $username;



    protected static $entity = EPerson::class;

    public function __construct($firstname, $surname, $email, $password, $username)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $this->firstname = $firstname;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $hashedPassword;
        $this->username = $username;
       
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }
    public static function getEntity()
    {
        return self::$entity;
    }

    public function getId()
    {
        return $this->idUser;
    }
    public function getFirstname()
    {
        return $this->firstname;
    }
    public function getLastname()
    {
        return $this->surname;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getUsername()
    {
        return $this->username;
    }



    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    public function setLastname($surname)
    {   
        $this->surname = $surname;
    }

    public function setEmail($email)
    {
        $this->email = $email;      
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    
 
}


