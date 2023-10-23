<?php

    require_once('classe/GererAjoutSelectUpdateDelete.php');    

    /**
     * Classe GererSupression étend GererAjoutSelectUpdateDelete pour gérer la suppression des données.
     */
    class GererSupression extends GererAjoutSelectUpdateDelete  {

        /**
         * Constructeur de la classe GererSupression.
         *
         * @param string $tableNom Le nom de la table.
         */
        public function __construct($tableNom) {
            parent::__construct($tableNom);
        }

        /**
         * Valide la suppresion de données.
         *
         * @param mixed $id Identifiant de la ligne à mettre à jour.
         * @return string Retourne un message indiquant le résultat de la suppresion.
         */
        public function valideSupression($id) {
            $result = '';
            $leSupprimer = $this->deleteTable($id);
            if ($leSupprimer) {
                $result = "L'entrée à été supprimer.";
            } else {
                $result = "Une erreur s'est produite lors de l'ajout.";
            }
          
            return $result;
        }
    }
?>