<?php
namespace Cogit\Models;

class UsersModel extends Model
{
    protected $id;
    protected $login;
    protected $email;
    protected $psw;
    protected $role;

    public function __construct()
    {
        $this->table = 'cogit_users';
    }
    /**
     * Récupérer un user à partir de son login
     * @param string $login 
     * @return mixed 
     */
    public function findOneByLogin(string $login)
    {
        return $this->requete("SELECT * FROM {$this->table} WHERE login = ?", [$login])->fetch();
    }

    public function setSession(){
        $_SESSION['user'] = [
            'id' => $this->id,
            'login' => $this->login,
            'email' => $this->email,
            'role' => $this->role
        ];
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
     * Obtenir la valeur de login
     */ 
    public function getLogin():string
    {
        return $this->login;
    }

    /**
     * Définir la valeur de login
     *
     * @return  self
     */ 
    public function setLogin(string $login):self
    {
        $this->login = $login;

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

    /**
     * Obtenir la valeur de psw
     */ 
    public function getRole():string
    {
        return $this->role;
    }

    /**
     * Définir la valeur de psw
     *
     * @return  self
     */ 
    public function setRole(string $role):self
    {
        $this->role = $role;

        return $this;
    }
}