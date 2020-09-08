<?php
namespace Cogit\Models;

class UsersModel extends Model
{
    protected $idUser;
    protected $email;
    protected $psw;

    public function __construct()
    {
        $this->table = 'cogit_users';
    }
    /**
     * Récupérer un user à partir de son e-mail
     * @param string $email 
     * @return mixed 
     */
    public function findOneByEmail(string $email)
    {
        return $this->requete("SELECT * FROM {$this->table} WHERE email = ?", [$email])->fetch();
    }

    public function setSession(){
        $_SESSION['user'] = [
            'id' => $this->idUser,
            'email' => $this->email
        ];
    }

    /**
     * Obtenir la valeur de id
     */ 
    public function getIdUser():int
    {
        return $this->idUser;
    }

    /**
     * Définir la valeur de id
     *
     * @return  self
     */ 
    public function setIdUser(int $idUser):self
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Obtenir la valeur de email
     */ 
    public function getEmail():string
    {
        return $this->email;
    }

    /**
     * Définir la valeur de email
     *
     * @return  self
     */ 
    public function setEmail(string $email):self
    {
        $this->email = $email;

        return $this;
    }
    
    /**
     * Obtenir la valeur de psw
     */ 
    public function getPsw():string
    {
        return $this->psw;
    }

    /**
     * Définir la valeur de psw
     *
     * @return  self
     */ 
    public function setPsw(string $psw):self
    {
        $this->psw = $psw;

        return $this;
    }
}