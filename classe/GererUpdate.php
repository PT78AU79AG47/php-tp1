<?php

    require_once('classe/GererAjoutSelectUpdateDelete.php');

    /**
     * Classe GererUpdate étend GererAjoutSelectUpdateDelete pour gérer la mise à jour des données.
     */
    class GererUpdate extends GererAjoutSelectUpdateDelete  {
        private $field;
        private $lePost;

        /**
         * Constructeur de la classe GererUpdate.
         *
         * @param string $tableNom Le nom de la table.
         * @param string $field Le champ à vérifier pour les doublons.
         * @param array $lePost Tableau de données envoyées via le formulaire.
         */
        public function __construct($tableNom, $field, $lePost) {
            parent::__construct($tableNom);
            $this->field = $field;
            $this->lePost = $lePost;
        }

        /**
         * Valide la mise à jour des données.
         *
         * @param mixed $id Identifiant de la ligne à mettre à jour.
         * @return string Retourne un message indiquant le résultat de la mise à jour.
         */
        public function valideUpdate($id) {
            $result = '';
            $leNom = $this->lePost[$this->field] ?? '';

            if (!empty($leNom)) {
                if ($this->isDuplicate($this->field, $leNom)) {
                    $result = "L'entrée est dupliquée, saisissez un autre choix.";
                } else {
                    $leUpdate = $this->updateTable($this->lePost, $id);
                    if ($leUpdate) {
                        $result = "L'entrée a été modifiée avec succès.";
                    } else {
                        $result = "Une erreur s'est produite lors de la modification.";
                    }
                }
            } else {
                $result = "L'entrée est vide. Veuillez saisir un nom.";
            }
            return $result;
        }
    }
?>