<?php
function new_line()
{
    echo "<br>";
}
// date()
// d - dzień
// m - miesiąc
// y - rok dwucyfrowy
// Y - rok czterocyfrowy
echo "dzień-miesiąc-Rok: " . date('d-m-Y');
new_line();
echo "dzień-miesiąc-rok: " . date('d-m-y');
new_line();
// F - cały miesiąc słownie
echo "dzień-miesiąc(słownie)-rok: " . date('d-F-y');
new_line();
// deklaracja polskich zmiennych lokalnych
setlocale(LC_ALL, 'PL');
echo "Dzień miesiąc rok (po polsku): " . strftime('%d %B %y');
new_line();
echo "Godzina (jedno lub dwucyfrowa), minuty i sekundy: " . date('G:i:s'); // 7:36:07
new_line();
?>

<script>
    // odświeżanie strony co 1000 sekund
    setTimeout(() => window.location.reload(), 1000);
</script>

<?php
echo "Godzina(dwucyfrowa), minuty i sekundy: " . date('H:i:s'); // 7:36:07
new_line();
echo "Godzina(dwucyfrowa), minuty i sekundy + am/pm: " . date('H:i:sa'); // 7:36:07
new_line();
$date = getdate();

echo "<pre>";
print_r($date);
// Array
// (
//     [seconds] => 12
//     [minutes] => 44
//     [hours] => 7
//     [mday] => 19
//     [wday] => 2
//     [mon] => 10
//     [year] => 2021
//     [yday] => 291
//     [weekday] => Tuesday
//     [month] => October
//     [0] => 1634622252
// )

echo "</pre>";
new_line();
echo "Dzień tygodnia: " . $date['weekday'];
new_line();
echo "Dzień roku: " . $date['yday'];
new_line();
echo "Czy rok jest przestępny: " . date("L");
new_line();
// operacje na datach - mktime
$today = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
echo "Dziś: " . $today;
new_line();
$year = $today / (60 * 60 * 24 * 365);
echo "Tyle lat upłynęło od 1970: " . (int)$year;
new_line();
$lastYear = mktime(0, 0, 0,0, 0, date('Y') - 1);
// echo "Ile sekund minęło od początku zeszłego roku: " . *
