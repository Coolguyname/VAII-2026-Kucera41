<?php

/** @var \App\Models\Komponent[] $komponenty */
/** @var \Framework\Support\LinkGenerator $link */
?>

<section class="sprava">
    <div class="sprava-hlavicka">
        <h1>Komponenty</h1>
        <a href="<?= $link->url('komponent.add') ?>" class="tlacidlo">+ Pridať komponent</a>
    </div>

    <?php if (count($komponenty) === 0) { ?>
        <p>Zatiaľ tu nie je žiadny komponent.</p>
    <?php } else { ?>
        <div class="tabulka-obal">
            <table class="tabulka">
                <thead>
                <tr>
                    <th>Názov</th>
                    <th>Výrobca</th>
                    <th class="stlpec-popis">Popis</th>
                    <th>Použitý v</th>
                    <th>Akcie</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($komponenty as $komponent) { ?>
                    <tr>
                        <td><?= e($komponent->getNazov()) ?></td>
                        <td><?= e($komponent->getVyrobca()) ?></td>
                        <td class="stlpec-popis"><?= e($komponent->getPopis()) ?></td>
                        <td>
                            <?php foreach ($komponent->getZostavy() as $zostava) { ?>
                                <div><?= e($zostava->getPocitac()->getNazov()) ?> (<?= $zostava->getMnozstvo() ?>×)</div>
                            <?php } ?>
                        </td>
                        <td>
                            <div class="akcie">
                                <a href="<?= $link->url('komponent.edit', ['id' => $komponent->getId()]) ?>" class="tlacidlo tlacidlo-male">Upraviť</a>
                                <form method="post" action="<?= $link->url('komponent.delete') ?>">
                                    <input type="hidden" name="id" value="<?= $komponent->getId() ?>">
                                    <button type="submit" class="tlacidlo tlacidlo-male tlacidlo-zmazat">Zmazať</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } ?>
</section>