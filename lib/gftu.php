<?php

function gftu($L, $P)
{
    $temp = "tempeg4ret.txt";
    $src = file_get_contents($L);
    $par = $P;

    // PATHOKAN
    $src = explode(';</script><script id="base-js" src="https://www.gstatic.com/_/freebird/_/js/k', $src);
    $src = explode('>var FB_PUBLIC_LOAD_DATA_ = ', $src[0]);
    $src = $src[1];

    // TEMP FILE
    $insert = '<?php $raw = '.$src.'; ?>';
    file_put_contents($temp, $insert);

    // READ TEMP
    include $temp;

    // SRC POSITION PARAMS
    $c = 0;
    while ($raw[1][1][$c][1] != $par) {
        $pos = $c + 1;
        $c++;
    }

    // RETURN RESULT
    $has['raw'] = $raw;
    $has['title'] = $raw[1][8];
    $has['params'] = $raw[1][1][$pos][1];
    $has['content'] = $raw[1][1][$pos][4][0][4][0][2][0];

    // CLEAR TEMP
    file_put_contents($temp, '');

    return $has;
}

?>
