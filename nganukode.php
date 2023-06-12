<?php
// function generateCode($start, $end, $sessionPrefix = '$_SESSION', $rowPrefix = '$row') {
//   $code = '';
//   for ($i = $start; $i <= $end; $i++) {
//     $code .= "\n\n";
//     if ($i % 12 == 0) {
//       $code .= "// Insert empty row\n";
//     }
//     $code .= "\$biaya{$i} = isset({$sessionPrefix}['biaya{$i}']) ? {$sessionPrefix}['biaya{$i}'] : {$rowPrefix}['biaya{$i}'];";
//   }
//   return $code;
// }

// // Generate the code from biaya138 to biaya264
// $start = 138;
// $end = 264;
// $generatedCode = generateCode($start, $end);

// // Output the generated code
// echo $generatedCode;

// function generateSessionCode($start, $end)
// {
//     $code = '';

//     for ($i = $start; $i <= $end; $i++) {
//         $sessionVariable = 'biaya' . $i;
//         $code .= "\$_SESSION['$sessionVariable'] = \$$sessionVariable;\n";
//     }

//     return $code;
// }

// $generatedCode = generateSessionCode(1, 264);
// echo $generatedCode;

function generateBiayaCode($start, $end)
{
    $code = "";
    for ($i = $start; $i <= $end; $i++) {
        $code .= "\$biaya{$i} = isset(\$_POST['biaya{$i}']) ? \$_POST['biaya{$i}'] : 0;\n";
    }
    return $code;
}
$generatedCode = generateBiayaCode(138, 264);
echo $generatedCode;
