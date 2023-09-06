<?php

/*
    Coding by mamat
    codingan ndeso ra pokro saksake pokoke
    wes ngono wae
*/

function gftu($SRC, $PAR)
{
    // CEK LINK
    $LINK = strpos($SRC, 'docs.google.com/forms/');
    $DEL = 0;

    switch ($LINK) {
        case true:
            // VARIABLE
            $src = file_get_contents($SRC);
            $par = $PAR;
            
            // GENERATE TEMP FILES
            $rand[0] = date("jznYGis");
            $rand[1] = rand(111, 999);
            $rand = $rand[0] * $rand[1];
            $rand = base64_encode($rand);
            $temp = './temp/'.$rand;

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

            // SAVE RESULT
            $TMP[0] = $raw;
            $TMP[1] = $raw[1][8];
            $TMP[2] = $raw[1][1][$pos][4][0][4][0][2][0];
            $TMP[3] = $raw[1][1][$pos][1];

            // DEL YES
            $DEL = 1;
            break;
        
        default:
            // ERROR MSG
            for ($i=0; $i < 4; $i++) { 
                $TMP[$i] = 'ERROR - BROKEN LINK';
            }
            break;
    }

    // RETURN RESULT
    $has['raw'] = $TMP[0];
    $has['title'] = $TMP[1];
    $has['params'] = $TMP[3];
    $has['content'] = $TMP[2];

    // CLEAR TEMP
    if ($DEL == 1) {
        unlink($temp);
    }

    return $has;
}

?>
