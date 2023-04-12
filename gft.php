<?php

/*
    code create by mamat
    kode ini dibuat dengan mumet dan mumet
    [jw] jadikan mumetmu ladang kreatifitas
    [id] jadikan pusingmu ladang kreatifitas
*/

// PARAMETER TO SEARCH
$par = $argv[2];
$lnk['src'] = file_get_contents($argv[1]);
$sh = $argv[3];
$tfl = 'tempegaret.txt';
$timenow = date("d F Y - h:i:s A");

// PAKEM LOOOORRRRRR - OJO DI RUBAH
$baket['str'] = 'var FB_PUBLIC_LOAD_DATA_ = ';
$baket['end'] = '</script><script id="base-js" src="https://www.gstatic.com/_/freebird/_/js/k';

// SELECTOR
$lnk['set'] = explode($baket['end'], $lnk['src']);
$lnk['set'] = explode($baket['str'], $lnk['set'][0]);
$lnk['set'] = $lnk['set'][1];

// TEMP FILES
$wrt = '<?php  $crawl = '.$lnk['set'].'  ?>';
file_put_contents($tfl, $wrt);

// READ TEMP FILES
include $tfl;

// CARI PARAMETER
$i = 0;
while ($crawl[1][1][$i][1] != $par) {
    $head = $i;
    $i++;
}
$head = $head + 1;

// CATAT HASIL
$has = [
    'src' => $crawl[1][1][$head][1],
    'res' => $crawl[1][1][$head][4][0][4][0][2][0]
];


// TAMPILAN
system('clear');

echo "\n";
echo "---------------------------------- \n\n";

echo "# title     :  ";
print_r($crawl[1][8]);
echo "\n";
echo "# time      :  ";
echo $timenow;
echo "\n\n";

echo "------------  RESULT  ------------ \n\n";

echo "# parameter :  ";
print_r($has['src']);

echo "\n";

echo "# result    :  ";
print_r($has['res']);

echo "\n\n";
echo "---------------------------------- \n";
echo "# author : mamakkudewe \n";
echo "# github : aku-afk \n";
echo "---------------------------------- \n";
echo "\n";

if ($sh == 1) {
    echo "CLICK [ CTRL + C ]  TO STOP";
    echo "\n\n";
    echo "---------------------------------- \n";
}

echo "\n\n";

// CLEANING
file_put_contents($tfl, "");

?>