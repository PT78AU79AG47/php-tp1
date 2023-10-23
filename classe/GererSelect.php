<?php

    require_once('classe/GererAjoutSelectUpdateDelete.php');    

    /**
     * Classe GererSelect étend GererAjoutSelectUpdateDelete pour gérer la sélection des données.
     */
    class GererSelect extends GererAjoutSelectUpdateDelete  {

        /**
         * Constructeur de la classe GererSelect.
         *
         * @param string $tableNom Le nom de la table.
         */
        public function __construct($tableNom) {
            parent::__construct($tableNom);
        }

         /**
         * Sélection les données pour l'afichage.
         * 
         * @param mixed $id Identifiant de la ligne à mettre à jour.
         * @return array Retourne un tableau associatifs.
         */
        public function valideSelect($id) {
            return $this->selectTable($id);
        }
    }
?>