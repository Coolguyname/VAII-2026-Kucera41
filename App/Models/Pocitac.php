<?php

namespace App\Models;

use Framework\Core\Model;

class Pocitac extends Model
{
    protected static ?string $tableName = 'pocitace';
    protected static ?array $fillable = ['nazov', 'popis', 'cena', 'sklad', 'obrazok'];

    protected ?int $id = null;
    protected string $nazov = '';
    protected ?string $popis = null;
    protected float $cena = 0;
    protected int $sklad = 0;
    protected ?string $obrazok = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNazov(): string
    {
        return $this->nazov;
    }

    public function getPopis(): ?string
    {
        return $this->popis;
    }

    public function getCena(): float
    {
        return $this->cena;
    }

    public function getSklad(): int
    {
        return $this->sklad;
    }

    public function getObrazok(): ?string
    {
        return $this->obrazok;
    }
}