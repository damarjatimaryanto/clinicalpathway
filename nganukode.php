<?php
function generatePattern()
{
    for ($i = 1; $i <= 264; $i++) {
        $sessionVariable = 'biaya' . $i;
        echo "unset(\$_SESSION[\"$sessionVariable\"]);\n";
    }
}

generatePattern();
