<?php

class ManipuleCsv {

    private $strFichier;
    private $tabCsv;
    private $pointeur = 0;

    public function __construct($fichier) {
        if (is_file($fichier)) {
            $this->strFichier = $fichier;
            $this->chargeCsv();
        }
    }

    private function chargeCsv() {
        $this->tabCsv = array();
        if (file_exists($this->strFichier)) {
            if (($pointeurFichier = fopen($this->strFichier, "r")) !== FALSE) {
                while (( $tabLigne = fgetcsv($pointeurFichier, 1000, ";")) !== FALSE) {
                    $this->tabCsv[] = $tabLigne;
                }
                fclose($pointeurFichier);
                return $this->tabCsv;
            }
        } else {
            return false;
        }
    }

    public function enregistreCsv() {
        $pointeurFichier = fopen($this->strFichier, 'w');

        foreach ($this->tabCsv as $ligne) {
            fputcsv($pointeurFichier, $ligne, $delimiter = ";");
        }
        fclose($pointeurFichier);
    }

    public function getUneLigne() {
        $tabLigne = false;
        if (isset($this->tabCsv[$this->pointeur]))
            $tabLigne = $this->tabCsv[$this->pointeur];
        $this->pointeur++;
        return $tabLigne;
    }

    public function getLigneNumero($index) {
        if (isset($this->tabCsv[$index]))
            return $this->tabCsv[$index];
    }

    public function setPointeur($pointeur = 0) {
        $this->pointeur = (int) $pointeur;
    }

    public function setLigneNumero($tabLigne, $index) {
        if (is_int($index) && is_array($tabLigne))
            $this->tabCsv[$index] = $tabLigne;
    }

    public function addLigne($tabLigne) {
        if (is_array($tabLigne))
            $this->tabCsv[] = $tabLigne;
    }

    public function suppLigne($index) {
        if (is_int($index))
            unset($this->tabCsv[$index]);
    }

}
