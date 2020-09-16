<?php

namespace Cogit\Core;

class Form
{
    private $formCode = '';
    private $defaultValues;

    public function __construct($defaultValues = [])
    {
        $this->defaultValues = $defaultValues;
    }

    /**
     * Générer le formulaire HTML
     * @return string 
     */
    public function create(){
        return $this->formCode;
    }

    /**
     * Valide si tous les champs proposés sont remplis
     * @param array $form Tableau contenant les champs à vérifier (en général issu de $_POST ou $_GET)
     * @param array $fields Tableau listant les champs à vérifier
     * @return bool 
     */
    public static function validate(array $form, array $fields){
        // On parcourt chaque champ
        foreach($fields as $field){
            // Si le champ est absent ou vide dans le tableau
            if(!isset($form[$field]) || empty($form[$field])){
                // On sort en retournant false
                return false;
            }
        }
        // Ici le formulaire est "valide"
        return true;
    }

    /**
     * Méthode interne d'ajout des attributs
     * @param array $attributs Tableau associatif des attributs
     * @return string 
     */
    private function ajoutAttributs(array $attributs) {
        // On initialise une chaîne de caractères
        $str = '';

        // On liste les attributs ne nécessitant pas de valeur (attributs courts)
        $courts = array('checked', 'disabled', 'readonly', 'multiple', 'required', 'autofocus', 'novalidate', 'formnovalidate');

        // On boucle sur le tableau
        foreach( $attributs as $attribut=>$valeur ) {
            // Si l'attribut est dans la liste des attributs courts
            if ( in_array($attribut, $courts) ) {
                // On ajoute l'attribut seul
                $str .= " $attribut";
            } else {
                // On ajoute attribut='valeur'
                $str .= " $attribut='$valeur'";
            }
        }
        // On retourne le code généré
        return $str;
    }

    /**
     * Ajout d'un label
     * @param string $for 
     * @param string $texte 
     * @param array $attributs 
     * @return $this 
     */
    function ajoutLabelFor(string $for, string $texte, $attributs = [] ) {
        // On ouvre la balise
        $this->formCode .= "<label for='$for'";

        // On ajoute les attributs
        if ($attributs) {
            $this->formCode .= $this->ajoutAttributs( $attributs );
        }

        // On ajoute le texte et on ferme la balise
        $this->formCode .= ">$texte</label>";

        // On retourne l'objet
        return $this;
    }

    /**
     * Balise d'ouverture du formulaire
     * @param string $methode Méthode du formulaire ('get' ou 'post')
     * @param string $action Action du formulaire
     * @param array $attributs Attributs à ajouter
     * @return self 
     */
    function debutForm(string $methode = 'post',string $action = '#', array $attributs = [] ):self
    {
        // On crée la balise et on ajoute l'action et la méthode
        $this->formCode .= "<form action='$action' method='$methode'";

        // Si on a des attributs, on les ajoute sinon on ferme la balise
        $this->formCode .= $attributs ? $this->ajoutAttributs( $attributs ) . '>': '>';

        // On retourne l'objet
        return $this;
    }

    /**
     * Balise de fermeture
     * @return $this 
     */
    function finForm() {
        $this->formCode .= "</form>";
        return $this;
    }

    /**
     * Ajout d'un champ input
     * @param string $type 
     * @param string $nom 
     * @param array $attributs 
     * @return $this 
     */
    function ajoutInput(string $type, string $nom, array $attributs = array() ) {
        // On crée la balise
        $this->formCode .= "<input type='$type' name='$nom' ";

        // On verifie s'il y as une valeur par défaut
        if(array_key_exists($nom, $this->defaultValues)){
            $attributs['value'] = $this->defaultValues[$nom];
        }

        // On ajoute les attributs
        if ($attributs) {
            $this->formCode .= $this->ajoutAttributs( $attributs );
        }

        // On ferme la balise
        $this->formCode .= '>';

        // On retourne l'objet
        return $this;
    }

    /**
     * Ajoute un champ textarea
     * @param string $nom Nom du champ
     * @param string $valeur Valeur du champ
     * @param array $attributs Attributs
     * @return $this Retourne l'objet
     */
    function ajoutTextarea(string $nom, string $valeur = '', $attributs = [] ) {
        // On ouvre la balise
        $this->formCode .= "<textarea name='$nom' ";

        // On verifie s'il y as une valeur par défaut
        $valeur = (array_key_exists($nom, $this->defaultValues)) ? $this->defaultValues[$nom] : '';

        // On ajoute les attributs
        if ($attributs) {
            $this->formCode .= $this->ajoutAttributs( $attributs );
        }

        // On ajoute la valeur et on ferme la balise
        $this->formCode .= ">$valeur</textarea>";

        // On retourne l'objet
        return $this;
    }

    /**
     * Liste déroulante
     * @param string $nom Nom du champ
     * @param array $options Liste des options (tableau associatif)
     * @param array $attributs 
     * @return $this 
     */
    function ajoutSelect(string $nom, array $options, array $attributs = [] )
    {
        // On crée le select
        $this->formCode .= "<select name='$nom'";

        // On verifie s'il y as une valeur par défaut
        $default = (array_key_exists($nom, $this->defaultValues)) ? $this->defaultValues[$nom] : null;

        // On ajoute les attributs
        if ($attributs) {
            $this->formCode .= $this->ajoutAttributs( $attributs );
        }

        // On ferme le select
        $this->formCode .= ">";

        // On ajoute les options
        foreach ( $options as $valeur => $texte ) {
            $selected = $default==$valeur? ' selected' : '';
            $this->formCode .= "<option value='$valeur'$selected>$texte</option>";
        }

        // On ferme le select
        $this->formCode .= "</select>";
        return $this;
    }

    /**
     * Ajoute un bouton
     * @param string $texte 
     * @param array $attributs 
     * @return $this 
     */
    function ajoutButton(string $texte, array $attributs = [] ) {
        $this->formCode .= "<button ";
        if ($attributs) {
            $this->formCode .= $this->ajoutAttributs( $attributs );
        }
        $this->formCode .= ">$texte</button>";
        return $this;
    }

}