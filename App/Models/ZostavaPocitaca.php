<?php

namespace App\Models;

use Framework\Core\Model;

class ZostavaPocitaca extends Model
{
    protected static ?string $tableName = 'zostava_pocitaca';

    protected ?int $id = null;
    protected int $pocitacId = 0;
    protected int $komponentId = 0;
    protected int $mnozstvo = 1;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPocitacId(): int
    {
        return $this->pocitacId;
    }

    public function setPocitacId(int $pocitacId): void
    {
        $this->pocitacId = $pocitacId;
    }

    public function getKomponentId(): int
    {
        return $this->komponentId;
    }

    public function setKomponentId(int $komponentId): void
    {
        $this->komponentId = $komponentId;
    }

    public function getMnozstvo(): int
    {
        return $this->mnozstvo;
    }

    public function setMnozstvo(int $mnozstvo): void
    {
        $this->mnozstvo = $mnozstvo;
    }

    public function getPocitac(): Pocitac
    {
        return $this->getOneRelated(Pocitac::class);
    }

    public function getKomponent(): Komponent
    {
        return $this->getOneRelated(Komponent::class);
    }
}