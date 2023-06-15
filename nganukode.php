<?php

for ($i = 1; $i <= 264; $i++) {
    $biaya = '$biaya' . $i;
    ${$biaya} = $row['biaya' . $i];
}


echo $biaya1;
