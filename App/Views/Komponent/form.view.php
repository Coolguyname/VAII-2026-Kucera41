<?php

/** @var \App\Models\Komponent $komponent */
/** @var \App\Models\Pocitac[] $pocitace */
/** @var array $mnozstva */
/** @var \Framework\Support\LinkGenerator $link */
?>

<form method="post" action="<?= $link->url('komponent.save') ?>" class="formular">
    <input type="hidden" name="id" value="<?= $komponent->getId() ?>">

    <label for="nazov">Názov</label>
    <input type="text" id="nazov" name="nazov" maxlength="100" required value="<?= e($komponent->getNazov()) ?>">

    <label for="vyrobca">Výrobca</label>
    <input type="text" id="vyrobca" name="vyrobca" maxlength="100" required value="<?= e($komponent->getVyrobca()) ?>">

    <label for="popis">Popis</label>
    <input type="text" id="popis" name="popis" maxlength="255" value="<?= e($komponent->getPopis()) ?>">

    <fieldset>
        <legend>Použitý v počítačoch (počet kusov, 0 = nie je súčasťou)</legend>
        <?php foreach ($pocitace as $pocitac) { ?>
            <div class="mnozstvo-riadok">
                <label for="mnozstvo-<?= $pocitac->getId() ?>"><?= e($pocitac->getNazov()) ?></label>
                <input type="number" id="mnozstvo-<?= $pocitac->getId() ?>" name="mnozstvo[<?= $pocitac->getId() ?>]" min="0" max="10" step="1" value="<?= $mnozstva[$pocitac->getId()] ?? 0 ?>">
            </div>
        <?php } ?>
    </fieldset>

    <div class="formular-tlacidla">
        <a href="<?= $link->url('komponent.index') ?>" class="tlacidlo">Zrušiť</a>
        <button type="submit" class="tlacidlo">Uložiť</button>
    </div>
</form>