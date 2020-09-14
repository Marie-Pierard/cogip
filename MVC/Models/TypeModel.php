<?php
namespace Cogit\Models;

class TypeModel extends Model
{
    protected $id;
    protected $type;

    public function __construct()
    {
        $this->table = 'cogit_type';
    }

    /**
     * Obtenir la valeur de Id
     */ 
    public function getId():int
    {
        return $this->id;
    }

    /**
     * Définir la valeur de Id
     *
     * @return  self
     */ 
    public function setId(int $id):self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Obtenir la valeur de Type
     */ 
    public function getType():string
    {
        return $this->type;
    }

    /**
     * Définir la valeur de Type
     *
     * @return  self
     */ 
    public function setType(string $type):self
    {
        $this->type = $type;

        return $this;
    }
    
}