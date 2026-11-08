<?php

/** @var \App\Models\Pocitac $pocitac */
/** @var \Framework\Support\LinkGenerator $link */
?>

<form method="post" action="<?= $link->url('pocitac.save') ?>" class="formular">
    <input type="hidden" name="id" value="<?= $pocitac->getId() ?>">

    <label for="nazov">Názov</label>
    <input type="text" id="nazov" name="nazov" maxlength="100" required value="<?= e($pocitac->getNazov()) ?>">

    <label for="popis">Popis (komponenty)</label>
    <input type="text" id="popis" name="popis" maxlength="255" value="<?= e($pocitac->getPopis()) ?>">

    <label for="cena">Cena (€)</label>
    <input type="number" id="cena" name="cena" min="0" step="0.01" required value="<?= $pocitac->getCena() ?>">

    <label for="sklad">Počet kusov na sklade</label>
    <input type="number" id="sklad" name="sklad" min="0" step="1" required value="<?= $pocitac->getSklad() ?>">

    <label for="obrazok">URL obrázka (nepovinné)</label>
    <input type="url" id="obrazok" name="obrazok" maxlength="300" value="<?= e($pocitac->getObrazok()) ?>">

    <div class="formular-tlacidla">
        <a href="<?= $link->url('pocitac.index') ?>" class="tlacidlo">Zrušiť</a>
        <button type="submit" class="tlacidlo">Uložiť</button>
    </div>
</form>