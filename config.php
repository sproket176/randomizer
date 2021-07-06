<?php
/*

Randomizer bazodanowy - używany gdy zachodzi potrzeba uruchomienia instancji developerskiej mając tylko produkcyjną bazę danych, która zawiera dane osobowe klientów.
Rzeczywiste dane muszą zostać zamienione na testowe.

Projekt bez interfejsu graficznego, do użycia bezpośrednio w kodzie.
Przygotowany pod późniejsze wykorzystanie w innych projektach, które będą pobierały go composerem (z packagist lub bezpośrednio z repozytorium).

Dane wejściowe:
- dane do połączenia z bazą lub obiekt istniejącego połączenia PDO
- lista pól branych pod uwagę (np. name, last_name, phone, email, address, city) lub pary w postaci nazwa pola oraz string z warunkiem SQL np: ["meta_value", "meta_key = 'last_name'"]
- lista tabel branych pod uwagę (domyślnie wszystkie tabele istniejące w bazie)


Opis:
Mechanizm powinien zaktualizować wszystkie rekordy wg wytycznych, o losowe dane osobowe.
Dane mogą być wygenerowane przez bibliotekę FakerPHP. Do pozostałych czynności w miarę możliwości nie wykorzystywać zewnętrznych bibliotek.
Aplikacja powinna być zoptymalizowana pod kątem zawartości tabel po kilkaset tysięcy rekordów.
Napisać podstawowe testy jednostkowe.


Dane wyjściowe:
Tablica z podstawowymi statystykami przeprowadzonego procesu
 */
$config['db_host'] = 'localhost';
$config['db_name'] = 'randomizer_production';
$config['db_pass'] = '';

$config['db_host_dev'] = 'localhost';
$config['db_name_dev'] = 'randomizer_dev';
$config['db_pass_dev'] = '';