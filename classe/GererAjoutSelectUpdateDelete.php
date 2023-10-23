<?php

    require_once('classe/CRUD.php');

    /**
     * La classe GererAjoutUpdate gère l'ajout et la mise à jour des données.
     */
    class GererAjoutSelectUpdateDelete {
        
        protected $instanceCrud; 
        protected $tableNom;

        /**
         * Constructeur de la classe GererAjoutUpdate.
         *
         * @param string $tableNom Le nom de la table.
         */
        public function __construct($tableNom) {
            $this->instanceCrud = new CRUD;
            $this->tableNom = $tableNom;
        }

        /**
         * Insère les données dans la table.
         *
         * @param array $data Tableau associatif de données à insérer.
         * @return mixed Retourne le résultat de l'opération d'insertion.
         */
        public function insertTable($data) {
            return $this->instanceCrud->insert($this->tableNom, $data);
        }

        /**
         * Affichage des données de la table.
         *
         * @param mixed $id Identifiant de la ligne à mettre à jour.
         * @return mixed Retourne le résultat de l'opération de mise à jour.
         */
        public function selectTable($id) {
            return $this->instanceCrud->selectId($this->tableNom, $id); 
        }

        /**
         * Mise à jour les données dans la table.
         *
         * @param array $data Tableau associatif de données.
         * @param mixed $id Identifiant de la ligne à mettre à jour.
         * @return mixed Retourne le résultat de l'opération de mise à jour.
         */
        public function updateTable($data, $id) {
            return $this->instanceCrud->update($this->tableNom, $data);
             
        }

        /**
         * Supprimer les données dans la table.
         *
         * @param mixed $id Identifiant de la ligne à mettre à jour.
         * @return mixed Retourne le résultat de l'opération de supression.
         */
        public function deleteTable($id) {
            return $this->instanceCrud->delete($this->tableNom, $id);
        }               

        /**
         * Vérifie la duplication de noms.
         *
         * @param string $field Le champ à vérifier.
         * @param mixed $value La valeur à vérifier.
         * @return bool Retourne true si la valeur est déjà présente, false sinon.
         */
        public function isDuplicate($field, $value) {
            $sql = "SELECT COUNT(*) FROM $this->tableNom WHERE $field = :value";
            
            $stmt = $this->instanceCrud->prepare($sql);
            $stmt->bindValue(':value', $value);
            $stmt->execute();
            return $stmt->fetchColumn() > 0;
        }
    }
?>