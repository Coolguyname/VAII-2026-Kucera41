<?php


namespace App\Models;

use Framework\Core\Model;

class Komponent extends Model
{
    protected static ?string $tableName = 'komponenty';
    protected static ?array $fillable = ['nazov', 'vyrobca', 'popis'];

    protected ?int $id = null;
    protected string $nazov = '';
    protected string $vyrobca = '';
    protected ?string $popis = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNazov(): string
    {
        return $this->nazov;
    }

    public function getVyrobca(): string
    {
        return $this->vyrobca;
    }

    public function getPopis(): ?string
    {
        return $this->popis;
    }

    public function getZostavy(): array
    {
        return $this->getAllRelated(ZostavaPocitaca::class);
    }
}