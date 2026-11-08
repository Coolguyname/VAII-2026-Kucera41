<?php

/** @var \App\Models\Pocitac[] $pocitace */
/** @var \Framework\Support\LinkGenerator $link */
?>

<section class="sprava">
    <div class="sprava-hlavicka">
        <h1>Správa počítačov</h1>
        <a href="<?= $link->url('pocitac.add') ?>" class="tlacidlo">+ Pridať počítač</a>
    </div>

    <?php if (count($pocitace) === 0) { ?>
        <p>Zatiaľ tu nie je žiadny počítač.</p>
    <?php } else { ?>
        <div class="tabulka-obal">
            <table class="tabulka">
                <thead>
                <tr>
                    <th>Názov</th>
                    <th class="stlpec-popis">Popis</th>
                    <th>Cena</th>
                    <th>Sklad</th>
                    <th>Akcie</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($pocitace as $pocitac) { ?>
                    <tr>
                        <td><?= e($pocitac->getNazov()) ?></td>
                        <td class="stlpec-popis"><?= e($pocitac->getPopis()) ?></td>
                        <td class="bez-zalomenia"><?= number_format($pocitac->getCena(), 2, ',', ' ') ?> €</td>
                        <td class="bez-zalomenia"><?= $pocitac->getSklad() ?> ks</td>
                        <td>
                            <div class="akcie">
                                <a href="<?= $link->url('pocitac.edit', ['id' => $pocitac->getId()]) ?>" class="tlacidlo tlacidlo-male">Upraviť</a>
                                <form method="post" action="<?= $link->url('pocitac.delete') ?>">
                                    <input type="hidden" name="id" value="<?= $pocitac->getId() ?>">
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