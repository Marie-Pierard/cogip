<?php
namespace Cogit\Models;

class CountryModel extends Model
{
    protected $id;
    protected $country;

    public function __construct()
    {
        $this->table = 'cogit_country';
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
    public function getCountry():int
    {
        return $this->country;
    }

    //  * @return  self
    //  */ 
    public function setId(int $id):self
    {
        $this->id = $id;

        return $this;
    }
}