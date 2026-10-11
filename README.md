# PCshop - internetový obchod s počítačmi

Adrián Kučera 

5ZYI33

## Stručný opis projektu
PCshop je webová aplikácia na predaj hotových počítačov. Pri každom počítači zobrazuje zoznam komponentov, z ktorých sa skladá (procesor, grafická karta, disk, ...). Komponenty sú zaradené do kategórii a podkategórií, napríklad operača pamäť typu DDR4 alebo DDR5, podľa ktorých sa dá ponuka filtorvať.

Aplikácia je určená zákazníkom, ktorí si chcú vybrať a objednať počítač podľa parametrov, a správcovi obchodu, ktorý spravuje ponuku a vybavuje objednávky.

## Role v projekte
- **Návštevník** - nepríhlasený používateľ, môže prehliadať ponuku a zaregistrovať sa.
- **Zákazník** - príhlasený používateľ, môže navyše vytvárať objednávky a prezerať si ich históriu.
- **Správca** - spravuje počítače, komponenty a kategórie a vie sledovať a meniť stav objednávok.

## Prípady použitia podľa rolí
**Návštevník**
- návštevník si prezrie a vyfiltruje ponuku počítačov,
- návštevník si zobrazí detail počítača s jeho komponentmi,
- návštevník sa zaregistruje a prihlási sa.

**Zákazník**
- zákazník vloží počítač do košíka,
- zákazník vytvorí objednávku,
- zákazník si prezrie svoje objednávky a ich stav.

**Správca**
- správca pridá, upraví alebo odstráni počítač a priradí mu komponenty,
- správca pridá, upraví alebo odstráni komponent alebo kategóriu,
- správca zmení stav objednávky.

## Plánované entity
- **Používateľ** - zákazník alebo správca. Atribúty: meno, priezvisko, email, heslo, rola.
- **Kategória** - triedi komponenty, môže mať nadradenú kategóriu (napr. Operačná pamäť a pod ňou DDR4, DDR5). Atribúty: názov, popis, nadradená kategória.
- **Komponent** - diel, z ktorého sa skladajú počítače. Atribúty: názov, výrobca, popis, kategória.
- **Počítač** - zostava ponúkaná na predaj. Atribúty: názov, popis, cena, počet kusov na sklade, obrázok.
- **Zostava počítača** - prepája počítač s komponentami. Atribúty: počítač, komponent, množstvo.
- **Objednávka** - nákup zákazníka. Atribúty: používateľ, dátum, stav, dodacia adresa.
- **Položka objednávky** - jeden počítač v objednávke. Atribúty: objednávka, počítač, množstvo, cena za kus.

## Vzťahy medzi entitami
- Používateľ - Objednávka (1:N): používateľ môže mať viac objednávok.
- Kategória - Kategória (1:N): kategória môže mať viac podkategórii.
- Kategória - Komponent (1:N): do kategórie patrí viac komponentov.
- Počítač - Komponent (M:N): počítač má viac komponentov a komponent môže byť vo viacerých počítačoch, prepojené je to cez Zostavu počítača.
- Objednávka - Položka objednávky (1:N): objednávka má jednu alebo viac položiek.
- Počítač - Položka objednávky (1:N): počítač môže byť vo viacerých objednávkach.

## Hlavné stránky aplikácie
- **Domovská stránka** - predstavenie obchodu a výber z ponuky.
- **Katalóg počítačov** - zoznam počítačov s filtrovaním.
- **Detail počítača** - popis, cena a zoznam komponentov.
- **Registrácia a prihlásenie** - formuláre na vytvorenie účtu a prihlásenie.
- **Košík a objednávka** - vybrané počítače a odoslanie objednávky.
- **Moje objednávky** - objednávky zákazníka a ich stav.
- **Administrácia** - správa počítačov, komponentov, kategórií a objednávok správcom.

## Rozdelenie funkcionality
**Základné funkcie**
- registrácia, prihlásenie a odhlásenie,
- katalóg a detail počítača s komponentmi,
- filtrovanie podľa ceny a kategórie komponentu,
- košík a vytvorenie objednávky,
- prehľad vlastných objednávok,
- správa počítačov, komponentov, kategórií a objednávok správcom.

**Rozširujúce funkcie**
- konfigurátor vlastnej zostavy s kontrolou kompatibility komponentov,
- hodnotenia a recenzie počítačov,
- porovnanie počítačov a ich výkonnosti.
