<?php
/** @var \App\Models\Pocitac[] $pocitace */
/** @var \Framework\Support\LinkGenerator $link */
?>

<div class="katalog">

    <aside class="filtre">
        <h2>Filtre</h2>
        <form action="#">
            <fieldset>
                <legend>Cena €</legend>
                <div class="cena">
                    <input type="number" name="cena-od" placeholder="od" min="0" aria-label="Cena od">
                    <input type="number" name="cena-do" placeholder="do" min="0" aria-label="Cena do">
                </div>
            </fieldset>

            <fieldset>
                <legend>Procesor</legend>
                <label><input type="checkbox" name="procesor" value="intel"> Intel</label>
                <label><input type="checkbox" name="procesor" value="amd"> AMD</label>
            </fieldset>

            <fieldset>
                <legend>Operačná pamäť</legend>
                <label><input type="checkbox" name="pamat" value="ddr4"> DDR4</label>
                <label><input type="checkbox" name="pamat" value="ddr5"> DDR5</label>
            </fieldset>

            <fieldset>
                <legend>Grafická karta</legend>
                <label><input type="checkbox" name="grafika" value="nvidia"> NVIDIA</label>
                <label><input type="checkbox" name="grafika" value="amd"> AMD</label>
            </fieldset>

            <fieldset>
                <legend>Typ úložiska</legend>
                <label><input type="checkbox" name="uloziste" value="ssd"> SSD</label>
                <label><input type="checkbox" name="uloziste" value="hdd"> HDD</label>
                <label><input type="checkbox" name="uloziste" value="ssd-hdd"> SSD + HDD</label>
            </fieldset>

            <button type="submit" class="tlacidlo tlacidlo-filtrovat">Filtrovať</button>
        </form>
    </aside>

    <section class="zoznam">
        <div class="zoznam-hlavicka">
            <h1>Počítače <span class="pocet">(<?= count($pocitace) ?>)</span></h1>
            <label class="zoradenie">
                Zoradiť:
                <select name="zoradit">
                    <option>cena</option>
                    <option>názov</option>
                    <option>najnovšie</option>
                </select>
            </label>
        </div>

        <?php if (count($pocitace) === 0) { ?>
            <p>V ponuke momentálne nie je žiadny počítač.</p>
        <?php } ?>

        <div class="karty">
            <?php foreach ($pocitace as $pocitac) { ?>
                <article class="karta">
                    <?php if ($pocitac->getObrazok()) { ?>
                        <img src="<?= e($pocitac->getObrazok()) ?>" alt="<?= e($pocitac->getNazov()) ?>" class="karta-obrazok karta-foto">
                    <?php } else { ?>
                        <div class="karta-obrazok placeholder"><span class="placeholder-x">&times;</span></div>
                    <?php } ?>
                    <h2><?= e($pocitac->getNazov()) ?></h2>
                    <p class="karta-komponenty"><?= e($pocitac->getPopis()) ?></p>
                    <div class="karta-spodok">
                        <span class="cena-text"><?= number_format($pocitac->getCena(), 2, ',', ' ') ?> €</span>
                        <button class="tlacidlo tlacidlo-male">Do košíka</button>
                    </div>
                </article>
            <?php } ?>
        </div>

        <nav class="strankovanie" aria-label="Stránkovanie">
            <a href="#" class="tlacidlo">&lt;</a>
            <a href="#" class="tlacidlo aktivna">1</a>
            <a href="#" class="tlacidlo">2</a>
            <a href="#" class="tlacidlo">3</a>
            <a href="#" class="tlacidlo">&gt;</a>
        </nav>
    </section>

</div>