<?php
namespace Cogip\Models;

class CountryModel extends Model
{
    protected $id;
    protected $country;

    public function __construct()
    {
        $this->table = 'cogip_country';
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
    public function setCountry(string $country):self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Obtenir la valeur de country
     */ 
    public function getCountry():string
    {
        return $this->country;
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
}