<?php
namespace Cogit\Models;

class InvoiceModel extends Model
{
    protected $id;
    protected $numberInvoice;
    protected $date;

    // foreign key ?
    protected $idCompany;
    protected $idContact;

    public function __construct()
    {
        $this->table = 'cogit_Invoice';
    }
    // getter and setter for id
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
    // getter and setter for number invoice
    /**
     * Obtenir le numéro de la facture
     *
     * @param string $numberInvoice
     * @return string
     */
    public function getNumberInvoice():string
    {
        return $this->numberInvoice;
    }
    /**
     * Définir le numéro de la facture
     *
     * @return  self
     */ 
    public function setNumberInvoice(string $numberInvoice):self
    {
        $this->numberInvoice = $numberInvoice;
        return $this;
    }
    // getter and setter for date of the invoice
    /**
     * Obtenir la date de la facture
     *
     * @return date
     */
    public function getDate():date
    {
        return $this->date;
    }
    /**
     * Définir la date de la facture
     *
     * @return  self
     */ 
    public function setDate(string $date):self
    {
        $this->date = $date;
        return $this;
    }
    // getter and setter for idCompany
    /**
     * Obtenir la valeur de idCompany
     */ 
    public function getidCompany():int
    {
        return $this->idCompany;
    }
    /**
     * Définir la valeur de idCompany
     *
     * @return  self
     */ 
    public function setidCompany(int $idCompany):self
    {
        $this->id = $idCompany;

        return $this;
    }
        // getter and setter for idContact
    /**
     * Obtenir la valeur de idContact
     */ 
    public function getidContact():int
    {
        return $this->idCompany;
    }
    /**
     * Définir la valeur de idContact
     *
     * @return  self
     */ 
    public function setidContact(int $idContact):self
    {
        $this->id = $idContact;

        return $this;
    }

}