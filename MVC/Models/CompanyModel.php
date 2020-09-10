<?php
namespace Cogit\Models;

class  CompanyModel extends Model
{
    protected $id;
    protected $idType;
    protected $idCountry;
    protected $name;
    protected $tva;
    protected $phone;

    public function __construct()
    {
        $this->table = 'cogit_Company';
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
    public function setId(int $id):self
    {
        $this->id = $id;

        return $this;
    }


    /**
     * Obtenir la valeur de idType
     */ 
    public function getIdType():int
    {
        return $this->idType;
    }

    /**
     * Définir la valeur de idType
     *
     * @return  self
     */ 
    public function setIdType(int $idType):self
    {
        $this->idType = $idType;

        return $this;
    }


    /**
     * Obtenir la valeur de idCountry
     */ 
    public function getIdCountry():int
    {
        return $this->idCountry;
    }

    /**
     * Définir la valeur de idCountry
     *
     * @return  self
     */ 
    public function setIdCountry(int $idCountry):self
    {
        $this->idCountry = $idCountry;

        return $this;
    }


    /**
     * Obtenir la valeur de Name
     */ 
    public function getName():string
    {
        return $this->name;
    }

    /**
     * Définir la valeur de Name
     *
     * @return  self
     */ 
    public function setName(string $name):self
    {
        $this->name = $name;

        return $this;
    }


    /**
     * Obtenir la valeur de tva
     */ 
    public function getTva():int
    {
        return $this->tva;
    }

    /**
     * Définir la valeur de tva
     *
     * @return  self
     */ 
    public function setTva(string $tva):self
    {
        $this->tva = $tva;

        return $this;
    }


    /**
     * Obtenir la valeur de id
     */ 
    public function getPhone():int
    {
        return $this->phone;
    }

    /**
     * Définir la valeur de id
     *
     * @return  self
     */ 
    public function setPhone(int $phone):self
    {
        $this->phone = $phone;

        return $this;
    }
}