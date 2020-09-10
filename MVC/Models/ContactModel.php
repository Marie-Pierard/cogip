<?php 
namespace Cogit\Models;

class ContactModel extends Model
{
    protected $id;
    protected $idCompany;
    protected $firstName;
    protected $LastName;
    protected $email;
    protected $phone;

    public function __construct()
    {
        $this->table = 'cogit_contact';
    }

    /**
     * Obtenir la valeur de id
     */ 
    public function getId():int
    {
        return $this->id;
    }

    /**
     * Définir la valeur de id
     *
     * @return  self
     */ 
    public function setIdCompany(int $idCompany):self
    {
        $this->idCompany = $idCompany;

        return $this;
    }

    /**
     * Obtenir la valeur de country
     */ 
    public function getidCompany():int
    {
        return $this->idCompany;
    }

    /**
     * Définir la valeur de country
     *
     * @return  self
     */ 
    public function setId(int $id):self
    {
        $this->id = $id;

        return $this;
    }
    public function setLastname(string $LastName):self
    {
        $this->LastName = $LastName;

        return $this;
    }
    public function getLastname():self
    {
        return $this->LastName;
    }
    public function setFirstName(string $firstName):self
    {
        $this->firstName = $firstName;

        return $this;
    }
    public function getFirstName():self
    {
        return $this->firstName;
    }
    public function setPhone(string $phone):self
    {
        $this->phone = $phone;

        return $this;
    }
    public function getPhone():self
    {
        return $this->phone;
    }
    public function setEmail(string $email):self
    {
        $this->email = $email;

        return $this;
    }
    public function getEmail():string
    {
        return $this->email;
    }
}