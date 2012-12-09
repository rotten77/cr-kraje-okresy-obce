-- změna okresu "Hlavní město Praha" na "Praha" - tak je to v databázi ČSÚ
UPDATE psc SET nazev_okres='Praha' WHERE nazev_okres LIKE 'Hlavní město Praha';
-- přiřazení okresu
UPDATE psc a, okres b SET a.okres_id=b.id WHERE a.nazev_okres=b.nazev;
-- přiřazení kraje
UPDATE psc a, okres b SET a.kraj_id=b.kraj_id;