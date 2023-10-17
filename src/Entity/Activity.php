<?php

namespace Entity;

use Database\MyPdo;
use Entity\Exception\EntityNotFoundException;

class Activity
{
    private int $ID_activite;
    private int $ID_auteur;
    private string $nomAct;
    private int $duree;
    private int $nb_Place;
    private string $lieu;
    private string $dateAct;
    private float $HeureDeb;

    private function construct()
    {
    }

    public function getIDActivite(): int
    {
        return $this->ID_activite;
    }

    public function setIDActivite(int $ID_activite): void
    {
        $this->ID_activite = $ID_activite;
    }

    public function getIDAuteur(): int
    {
        return $this->ID_auteur;
    }

    public function setIDAuteur(int $ID_auteur): void
    {
        $this->ID_auteur = $ID_auteur;
    }

    public function getNomAct(): string
    {
        return $this->nomAct;
    }

    public function setNomAct(string $nomAct): void
    {
        $this->nomAct = $nomAct;
    }

    public function getDuree(): int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): void
    {
        $this->duree = $duree;
    }

    public function getNbPlace(): int
    {
        return $this->nb_Place;
    }

    public function setNbPlace(int $nb_Place): void
    {
        $this->nb_Place = $nb_Place;
    }

    public function getLieu(): string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): void
    {
        $this->lieu = $lieu;
    }

    public function getDateAct(): string
    {
        return $this->dateAct;
    }

    public function setDateAct(string $dateAct): void
    {
        $this->dateAct = $dateAct;
    }

    public function getHeureDeb(): float
    {
        return $this->HeureDeb;
    }

    public function setHeureDeb(float $HeureDeb): void
    {
        $this->HeureDeb = $HeureDeb;
    }

    /**
     * @throws EntityNotFoundException
     */
    public static function findById(int $id): Activity
    {
        $stmt = MyPDO::getInstance()->prepare(
            <<<'SQL'
        SELECT *
        FROM Activite
        WHERE ID_ctivite= ?
       SQL
        );
        $stmt->setFetchMode(MyPDO::FETCH_CLASS, Activity::class);
        $stmt->execute([$id]);
        if (!($movie = $stmt->fetch())) {
            throw new EntityNotFoundException('Id invalide');
        } else {
            return $movie;
        }
    }
}
