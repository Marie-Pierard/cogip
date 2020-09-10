<?php 
namespace Cogit\Models;

class ContactModel extends Model
{
    protected $id;
    protected $contact;

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
        $this->contact = $idCompany;

        return $this;
    }

    /**
     * Obtenir la valeur de country
     */ 
    public function getidCompany():int
    {
        return $this->contact;
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
        $this->contact = $LastName;

        return $this;
    }
    public function getLastname():self
    {
        return $this->contact;
    }
    public function setFirstName(string $firstName):self
    {
        $this->contact = $firstName;

        return $this;
    }
    public function getFirstName():self
    {
        return $this->contact;
    }
    public function setPhone(string $phone):self
    {
        $this->contact = $phone;

        return $this;
    }
    public function getPhone():self
    {
        return $this->contact;
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