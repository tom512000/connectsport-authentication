<?php

namespace Entity\Collection;

use Database\MyPdo;
use Entity\Activity;

class ActivityCollection
{
    public static function findAll(): array
    {
        $stmt = MyPDO::getInstance()->prepare(
            <<<'SQL'
                SELECT DISTINCT *
                FROM Activite
                ORDER BY dateAct,heureDeb
            SQL
        );

        $stmt->setFetchMode(MyPdo::FETCH_CLASS, Activity::class);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function findByType(string $type): array
    {
        $stmt = MyPDO::getInstance()->prepare(
            <<<'SQL'
                SELECT DISTINCT a.*
                FROM Activite a JOIN Type_Activite ta on a.ID_activite=ta.ID_activite JOIN Type t on ta.ID_type=t.ID_type
                WHERE t.libelle= ?
                ORDER BY t.libelle,a.nomAct
            SQL
        );

        $stmt->setFetchMode(MyPdo::FETCH_CLASS, Activity::class);
        $stmt->execute([$type]);

        return $stmt->fetchAll();
    }
}
