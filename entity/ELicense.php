<?php

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity]
#[ORM\Table(name: 'license')]



 Class ELicense{

    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    protected $idLicense;

    #[ORM\Column(type: 'datetime')]
    protected DateTime $exp;


    #[ORM\OneToOne(targetEntity: EImage::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(name: 'photo_id', referencedColumnName: 'idImage', nullable: true)]
    protected EImage $photo;

    #[ORM\OneToOne(targetEntity: EUser::class)]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'idUser', nullable: true)]
    protected EUser $user_id;

    #[ORM\Column(type: 'boolean')]
    protected bool $checked = false;


    public function __construct(DateTime $date, EImage $image, EUser $user){
        $this->exp = $date;
        $this->photo = $image;
        $this->user_id = $user;
    }

    public function checkExpiration():bool {
        $user = $this->user_id;
        $now = new DateTime("now", new DateTimeZone("Europe/Rome"));

        if (($this->exp) > $now) return true;
        
        return false;


    }
    public function setChecked(bool $checked): void {
        $this->checked = $checked;
    }

    public function getChecked(): bool {
        return $this->checked;
    }

    public function getIdLicense(): int {

        return $this->idLicense;
    }

    public function getPhoto() {

        return $this->photo;
    }

    public function getUserId() {

        return $this->user_id;
    }

    public function getExp() {

        return $this->exp;
    }
}