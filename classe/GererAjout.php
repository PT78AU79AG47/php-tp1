<?php

    require_once('classe/GererAjoutSelectUpdateDelete.php');

    /**
     * Classe GererAjout étend GererAjoutSelectUpdateDelete pour gérer l'ajout des données.
     */
    class GererAjout extends GererAjoutSelectUpdateDelete  {
        private $field;
        private $lePost;

        /**
         * Constructeur de la classe GererAjout.
         *
         * @param string $tableNom Le nom de la table.
         * @param string $field Le nom du champ à vérifier pour éviter les doublons.
         * @param array $lePost Tableau de données envoyées via le formulaire.
         */
        public function __construct($tableNom, $field, $lePost) {
            parent::__construct($tableNom);
            $this->field = $field;
            $this->lePost = $lePost;
        }

        /**
         * Valide l'ajout d'une nouvelle entrée dans la table.
         *
         * @return string Retourne un message indiquant le résultat de l'ajout.
         */
        public function valideAjout() {
            $result = '';
            $leNom = $this->lePost[$this->field] ?? '';

            if (!empty($leNom)) {
                if ($this->isDuplicate($this->field, $leNom)) {
                    $result = "L'entrée est dupliquée, saisissez un autre choix.";
                } else {
                    $leInsert = $this->insertTable($this->lePost);
                    if ($leInsert) {
                        $result = "L'entrée est ajoutée avec succès.";
                    } else {
                        $result = "Une erreur s'est produite lors de l'ajout.";
                    }
                }
            } else {
                $result = "L'entrée est vide. Veuillez saisir un nom.";
            }
            return $result;
        }
    }
?>