<?php
namespace Cogip\Models;

class InvoiceModel extends Model
{
    protected $id;
    protected $numberInvoice;
    protected $date;

    // foreign key ?
    protected $idCompany;
    protected $idContact;

    // Relation autre table
    protected $company;
    protected $contact;

    public function __construct()
    {
        $this->table = 'cogip_invoice';
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
    public function getDate():string
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
        $this->date = date_format(date_create($date),"d/m/Y");
        return $this;
    }
    // getter and setter for idCompany
    /**
     * Obtenir la valeur de idCompany
     */ 
    public function getIdCompany():int
    {
        return $this->idCompany;
    }
    /**
     * Définir la valeur de idCompany
     *
     * @return  self
     */ 
    public function setIdCompany(int $idCompany):self
    {
        $this->idCompany = $idCompany;

        return $this;
    }
        // getter and setter for idContact
    /**
     * Obtenir la valeur de idContact
     */ 
    public function getIdContact():int
    {
        return $this->idCompany;
    }
    /**
     * Définir la valeur de idContact
     *
     * @return  self
     */ 
    public function setIdContact(?int $idContact):self
    {
        $this->idContact = $idContact;

        return $this;
    }

    /**
     * Hydrate les variables des champs joint à la table
     *
     * @return self
     */
    public function join() : self
    {
        $company = new CompanyModel();
        $this->setCompany($company->hydrate($company->find($this->idCompany)));
        $this->company->join();
        
        if($this->idContact != null){
            $contact = new ContactModel();
            $this->setContact($contact->hydrate($contact->find($this->idContact)));
            $this->contact->join();
        } else {
            $this->setContact(null);
        }

        return $this;
    }

    public function setCompany($company)
    {
        $this->company = $company;
        return $this;
    }

    public function getCompany()
    {
        return $this->company;
    }

    public function setContact($contact)
    {
        $this->contact = $contact;
        return $this;
    }

    public function getContact()
    {
        return $this->contact;
    }
}