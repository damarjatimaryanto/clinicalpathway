<?php
// require_once 'auth.php';




session_start();

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect the user to the login page if not authenticated
    exit();
}
require_once 'db_connection.php';
$NOMR = $_GET["nomr"];
// Establish database connection
$host = '192.168.1.178';
$db   = 'simrs';
$user = 'root';
$pass = 'takonbudi';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Retrieve checkbox values from the database
// $stmt = $pdo->query("SELECT * FROM t_clinicalpathway WHERE nomr = $NOMR
//  LIMIT 1");
// $row = $stmt->fetch(PDO::FETCH_ASSOC);

// Retrieve checkbox values from the database
$stmt = $pdo->query("SELECT a.NAMA, a.NOMR, b.masukrs, b.keluarrs
FROM simrs2012.m_pasien a
LEFT JOIN simrs2012.t_admission b ON a.NOMR = b.NOMR
LEFT JOIN simrs2012.t_Sep c ON a.NOMR = c.NOMR
-- LEFT JOIN simrs.t_clinicalpathway d ON a.NOMR = d.NOMR
WHERE a.NOMR = $NOMR");
$row = $stmt->fetch(PDO::FETCH_ASSOC);




$biaya1 = isset($_SESSION['biaya1']) ? $_SESSION['biaya1'] : $row['biaya1'];
$biaya2 = isset($_SESSION['biaya2']) ? $_SESSION['biaya2'] : $row['biaya2'];
$biaya3 = isset($_SESSION['biaya3']) ? $_SESSION['biaya3'] : $row['biaya3'];
$biaya4 = isset($_SESSION['biaya4']) ? $_SESSION['biaya4'] : $row['biaya4'];
$biaya5 = isset($_SESSION['biaya5']) ? $_SESSION['biaya5'] : $row['biaya5'];
$biaya6 = isset($_SESSION['biaya6']) ? $_SESSION['biaya6'] : $row['biaya6'];
$biaya7 = isset($_SESSION['biaya7']) ? $_SESSION['biaya7'] : $row['biaya7'];
$biaya8 = isset($_SESSION['biaya8']) ? $_SESSION['biaya8'] : $row['biaya8'];
$biaya9 = isset($_SESSION['biaya9']) ? $_SESSION['biaya9'] : $row['biaya9'];
$biaya10 = isset($_SESSION['biaya10']) ? $_SESSION['biaya10'] : $row['biaya10'];
$biaya11 = isset($_SESSION['biaya11']) ? $_SESSION['biaya11'] : $row['biaya11'];
$biaya12 = isset($_SESSION['biaya12']) ? $_SESSION['biaya12'] : $row['biaya12'];

$biaya13 = isset($_SESSION['biaya13']) ? $_SESSION['biaya13'] : $row['biaya13'];
$biaya14 = isset($_SESSION['biaya14']) ? $_SESSION['biaya14'] : $row['biaya14'];
$biaya15 = isset($_SESSION['biaya15']) ? $_SESSION['biaya15'] : $row['biaya15'];
$biaya16 = isset($_SESSION['biaya16']) ? $_SESSION['biaya16'] : $row['biaya16'];
$biaya17 = isset($_SESSION['biaya17']) ? $_SESSION['biaya17'] : $row['biaya17'];
$biaya18 = isset($_SESSION['biaya18']) ? $_SESSION['biaya18'] : $row['biaya18'];
$biaya19 = isset($_SESSION['biaya19']) ? $_SESSION['biaya19'] : $row['biaya19'];
$biaya20 = isset($_SESSION['biaya20']) ? $_SESSION['biaya20'] : $row['biaya20'];
$biaya21 = isset($_SESSION['biaya21']) ? $_SESSION['biaya21'] : $row['biaya21'];
$biaya22 = isset($_SESSION['biaya22']) ? $_SESSION['biaya22'] : $row['biaya22'];
$biaya23 = isset($_SESSION['biaya23']) ? $_SESSION['biaya23'] : $row['biaya23'];
$biaya24 = isset($_SESSION['biaya24']) ? $_SESSION['biaya24'] : $row['biaya24'];

$biaya25 = isset($_SESSION['biaya25']) ? $_SESSION['biaya25'] : $row['biaya25'];
$biaya26 = isset($_SESSION['biaya26']) ? $_SESSION['biaya26'] : $row['biaya26'];
$biaya27 = isset($_SESSION['biaya27']) ? $_SESSION['biaya27'] : $row['biaya27'];
$biaya28 = isset($_SESSION['biaya28']) ? $_SESSION['biaya28'] : $row['biaya28'];
$biaya29 = isset($_SESSION['biaya29']) ? $_SESSION['biaya29'] : $row['biaya29'];
$biaya30 = isset($_SESSION['biaya30']) ? $_SESSION['biaya30'] : $row['biaya30'];
$biaya31 = isset($_SESSION['biaya31']) ? $_SESSION['biaya31'] : $row['biaya31'];
$biaya32 = isset($_SESSION['biaya32']) ? $_SESSION['biaya32'] : $row['biaya32'];
$biaya33 = isset($_SESSION['biaya33']) ? $_SESSION['biaya33'] : $row['biaya33'];
$biaya34 = isset($_SESSION['biaya34']) ? $_SESSION['biaya34'] : $row['biaya34'];
$biaya35 = isset($_SESSION['biaya35']) ? $_SESSION['biaya35'] : $row['biaya35'];
$biaya36 = isset($_SESSION['biaya36']) ? $_SESSION['biaya36'] : $row['biaya36'];

$biaya37 = isset($_SESSION['biaya37']) ? $_SESSION['biaya37'] : $row['biaya37'];
$biaya38 = isset($_SESSION['biaya38']) ? $_SESSION['biaya38'] : $row['biaya38'];
$biaya39 = isset($_SESSION['biaya39']) ? $_SESSION['biaya39'] : $row['biaya39'];
$biaya40 = isset($_SESSION['biaya40']) ? $_SESSION['biaya40'] : $row['biaya40'];
$biaya41 = isset($_SESSION['biaya41']) ? $_SESSION['biaya41'] : $row['biaya41'];
$biaya42 = isset($_SESSION['biaya42']) ? $_SESSION['biaya42'] : $row['biaya42'];
$biaya43 = isset($_SESSION['biaya43']) ? $_SESSION['biaya43'] : $row['biaya43'];
$biaya44 = isset($_SESSION['biaya44']) ? $_SESSION['biaya44'] : $row['biaya44'];
$biaya45 = isset($_SESSION['biaya45']) ? $_SESSION['biaya45'] : $row['biaya45'];
$biaya46 = isset($_SESSION['biaya46']) ? $_SESSION['biaya46'] : $row['biaya46'];
$biaya47 = isset($_SESSION['biaya47']) ? $_SESSION['biaya47'] : $row['biaya47'];
$biaya48 = isset($_SESSION['biaya48']) ? $_SESSION['biaya48'] : $row['biaya48'];

$biaya49 = isset($_SESSION['biaya49']) ? $_SESSION['biaya49'] : $row['biaya49'];
$biaya50 = isset($_SESSION['biaya50']) ? $_SESSION['biaya50'] : $row['biaya50'];
$biaya51 = isset($_SESSION['biaya51']) ? $_SESSION['biaya51'] : $row['biaya51'];
$biaya52 = isset($_SESSION['biaya52']) ? $_SESSION['biaya52'] : $row['biaya52'];
$biaya53 = isset($_SESSION['biaya53']) ? $_SESSION['biaya53'] : $row['biaya53'];
$biaya54 = isset($_SESSION['biaya54']) ? $_SESSION['biaya54'] : $row['biaya54'];
$biaya55 = isset($_SESSION['biaya55']) ? $_SESSION['biaya55'] : $row['biaya55'];
$biaya56 = isset($_SESSION['biaya56']) ? $_SESSION['biaya56'] : $row['biaya56'];
$biaya57 = isset($_SESSION['biaya57']) ? $_SESSION['biaya57'] : $row['biaya57'];
$biaya58 = isset($_SESSION['biaya58']) ? $_SESSION['biaya58'] : $row['biaya58'];
$biaya59 = isset($_SESSION['biaya59']) ? $_SESSION['biaya59'] : $row['biaya59'];
$biaya60 = isset($_SESSION['biaya60']) ? $_SESSION['biaya60'] : $row['biaya60'];

$biaya61 = isset($_SESSION['biaya61']) ? $_SESSION['biaya61'] : $row['biaya61'];
$biaya62 = isset($_SESSION['biaya62']) ? $_SESSION['biaya62'] : $row['biaya62'];
$biaya63 = isset($_SESSION['biaya63']) ? $_SESSION['biaya63'] : $row['biaya63'];
$biaya64 = isset($_SESSION['biaya64']) ? $_SESSION['biaya64'] : $row['biaya64'];
$biaya65 = isset($_SESSION['biaya65']) ? $_SESSION['biaya65'] : $row['biaya65'];
$biaya66 = isset($_SESSION['biaya66']) ? $_SESSION['biaya66'] : $row['biaya66'];
$biaya67 = isset($_SESSION['biaya67']) ? $_SESSION['biaya67'] : $row['biaya67'];
$biaya68 = isset($_SESSION['biaya68']) ? $_SESSION['biaya68'] : $row['biaya68'];
$biaya69 = isset($_SESSION['biaya69']) ? $_SESSION['biaya69'] : $row['biaya69'];
$biaya70 = isset($_SESSION['biaya70']) ? $_SESSION['biaya70'] : $row['biaya70'];
$biaya71 = isset($_SESSION['biaya71']) ? $_SESSION['biaya71'] : $row['biaya71'];
$biaya72 = isset($_SESSION['biaya72']) ? $_SESSION['biaya72'] : $row['biaya72'];

$biaya73 = isset($_SESSION['biaya73']) ? $_SESSION['biaya73'] : $row['biaya73'];
$biaya74 = isset($_SESSION['biaya74']) ? $_SESSION['biaya74'] : $row['biaya74'];
$biaya75 = isset($_SESSION['biaya75']) ? $_SESSION['biaya75'] : $row['biaya75'];
$biaya76 = isset($_SESSION['biaya76']) ? $_SESSION['biaya76'] : $row['biaya76'];
$biaya77 = isset($_SESSION['biaya77']) ? $_SESSION['biaya77'] : $row['biaya77'];
$biaya78 = isset($_SESSION['biaya78']) ? $_SESSION['biaya78'] : $row['biaya78'];
$biaya79 = isset($_SESSION['biaya79']) ? $_SESSION['biaya79'] : $row['biaya79'];
$biaya80 = isset($_SESSION['biaya80']) ? $_SESSION['biaya80'] : $row['biaya80'];
$biaya81 = isset($_SESSION['biaya81']) ? $_SESSION['biaya81'] : $row['biaya81'];
$biaya82 = isset($_SESSION['biaya82']) ? $_SESSION['biaya82'] : $row['biaya82'];
$biaya83 = isset($_SESSION['biaya83']) ? $_SESSION['biaya83'] : $row['biaya83'];
$biaya84 = isset($_SESSION['biaya84']) ? $_SESSION['biaya84'] : $row['biaya84'];

$biaya85 = isset($_SESSION['biaya85']) ? $_SESSION['biaya85'] : $row['biaya85'];
$biaya86 = isset($_SESSION['biaya86']) ? $_SESSION['biaya86'] : $row['biaya86'];
$biaya87 = isset($_SESSION['biaya87']) ? $_SESSION['biaya87'] : $row['biaya87'];
$biaya88 = isset($_SESSION['biaya88']) ? $_SESSION['biaya88'] : $row['biaya88'];
$biaya89 = isset($_SESSION['biaya89']) ? $_SESSION['biaya89'] : $row['biaya89'];
$biaya90 = isset($_SESSION['biaya90']) ? $_SESSION['biaya90'] : $row['biaya90'];
$biaya91 = isset($_SESSION['biaya91']) ? $_SESSION['biaya91'] : $row['biaya91'];
$biaya92 = isset($_SESSION['biaya92']) ? $_SESSION['biaya92'] : $row['biaya92'];
$biaya93 = isset($_SESSION['biaya93']) ? $_SESSION['biaya93'] : $row['biaya93'];
$biaya94 = isset($_SESSION['biaya94']) ? $_SESSION['biaya94'] : $row['biaya94'];
$biaya95 = isset($_SESSION['biaya95']) ? $_SESSION['biaya95'] : $row['biaya95'];
$biaya96 = isset($_SESSION['biaya96']) ? $_SESSION['biaya96'] : $row['biaya96'];

$biaya97 = isset($_SESSION['biaya97']) ? $_SESSION['biaya97'] : $row['biaya97'];
$biaya98 = isset($_SESSION['biaya98']) ? $_SESSION['biaya98'] : $row['biaya98'];
$biaya99 = isset($_SESSION['biaya99']) ? $_SESSION['biaya99'] : $row['biaya99'];
$biaya100 = isset($_SESSION['biaya100']) ? $_SESSION['biaya100'] : $row['biaya100'];
$biaya101 = isset($_SESSION['biaya101']) ? $_SESSION['biaya101'] : $row['biaya101'];
$biaya102 = isset($_SESSION['biaya102']) ? $_SESSION['biaya102'] : $row['biaya102'];
$biaya103 = isset($_SESSION['biaya103']) ? $_SESSION['biaya103'] : $row['biaya103'];
$biaya104 = isset($_SESSION['biaya104']) ? $_SESSION['biaya104'] : $row['biaya104'];
$biaya105 = isset($_SESSION['biaya105']) ? $_SESSION['biaya105'] : $row['biaya105'];
$biaya106 = isset($_SESSION['biaya106']) ? $_SESSION['biaya106'] : $row['biaya106'];
$biaya107 = isset($_SESSION['biaya107']) ? $_SESSION['biaya107'] : $row['biaya107'];
$biaya108 = isset($_SESSION['biaya108']) ? $_SESSION['biaya108'] : $row['biaya108'];

$biaya109 = isset($_SESSION['biaya109']) ? $_SESSION['biaya109'] : $row['biaya109'];
$biaya110 = isset($_SESSION['biaya110']) ? $_SESSION['biaya110'] : $row['biaya110'];
$biaya111 = isset($_SESSION['biaya111']) ? $_SESSION['biaya111'] : $row['biaya111'];
$biaya112 = isset($_SESSION['biaya112']) ? $_SESSION['biaya112'] : $row['biaya112'];
$biaya113 = isset($_SESSION['biaya113']) ? $_SESSION['biaya113'] : $row['biaya113'];
$biaya114 = isset($_SESSION['biaya114']) ? $_SESSION['biaya114'] : $row['biaya114'];
$biaya115 = isset($_SESSION['biaya115']) ? $_SESSION['biaya115'] : $row['biaya115'];
$biaya116 = isset($_SESSION['biaya116']) ? $_SESSION['biaya116'] : $row['biaya116'];
$biaya117 = isset($_SESSION['biaya117']) ? $_SESSION['biaya117'] : $row['biaya117'];
$biaya118 = isset($_SESSION['biaya118']) ? $_SESSION['biaya118'] : $row['biaya118'];
$biaya119 = isset($_SESSION['biaya119']) ? $_SESSION['biaya119'] : $row['biaya119'];
$biaya120 = isset($_SESSION['biaya120']) ? $_SESSION['biaya120'] : $row['biaya120'];

$biaya121 = isset($_SESSION['biaya121']) ? $_SESSION['biaya121'] : $row['biaya121'];
$biaya122 = isset($_SESSION['biaya122']) ? $_SESSION['biaya122'] : $row['biaya122'];
$biaya123 = isset($_SESSION['biaya123']) ? $_SESSION['biaya123'] : $row['biaya123'];
$biaya124 = isset($_SESSION['biaya124']) ? $_SESSION['biaya124'] : $row['biaya124'];
$biaya125 = isset($_SESSION['biaya125']) ? $_SESSION['biaya125'] : $row['biaya125'];
$biaya126 = isset($_SESSION['biaya126']) ? $_SESSION['biaya126'] : $row['biaya126'];
$biaya127 = isset($_SESSION['biaya127']) ? $_SESSION['biaya127'] : $row['biaya127'];
$biaya128 = isset($_SESSION['biaya128']) ? $_SESSION['biaya128'] : $row['biaya128'];
$biaya129 = isset($_SESSION['biaya129']) ? $_SESSION['biaya129'] : $row['biaya129'];
$biaya130 = isset($_SESSION['biaya130']) ? $_SESSION['biaya130'] : $row['biaya130'];

$biaya131 = isset($_SESSION['biaya131']) ? $_SESSION['biaya131'] : $row['biaya131'];
$biaya132 = isset($_SESSION['biaya132']) ? $_SESSION['biaya132'] : $row['biaya132'];
$biaya133 = isset($_SESSION['biaya133']) ? $_SESSION['biaya133'] : $row['biaya133'];
$biaya134 = isset($_SESSION['biaya134']) ? $_SESSION['biaya134'] : $row['biaya134'];
$biaya135 = isset($_SESSION['biaya135']) ? $_SESSION['biaya135'] : $row['biaya135'];
$biaya136 = isset($_SESSION['biaya136']) ? $_SESSION['biaya136'] : $row['biaya136'];
$biaya137 = isset($_SESSION['biaya137']) ? $_SESSION['biaya137'] : $row['biaya137'];
$biaya138 = isset($_SESSION['biaya138']) ? $_SESSION['biaya138'] : $row['biaya138'];
$biaya139 = isset($_SESSION['biaya139']) ? $_SESSION['biaya139'] : $row['biaya139'];
$biaya140 = isset($_SESSION['biaya140']) ? $_SESSION['biaya140'] : $row['biaya140'];

$biaya141 = isset($_SESSION['biaya141']) ? $_SESSION['biaya141'] : $row['biaya141'];
$biaya142 = isset($_SESSION['biaya142']) ? $_SESSION['biaya142'] : $row['biaya142'];
$biaya143 = isset($_SESSION['biaya143']) ? $_SESSION['biaya143'] : $row['biaya143'];
$biaya144 = isset($_SESSION['biaya144']) ? $_SESSION['biaya144'] : $row['biaya144'];
$biaya145 = isset($_SESSION['biaya145']) ? $_SESSION['biaya145'] : $row['biaya145'];
$biaya146 = isset($_SESSION['biaya146']) ? $_SESSION['biaya146'] : $row['biaya146'];
$biaya147 = isset($_SESSION['biaya147']) ? $_SESSION['biaya147'] : $row['biaya147'];
$biaya148 = isset($_SESSION['biaya148']) ? $_SESSION['biaya148'] : $row['biaya148'];
$biaya149 = isset($_SESSION['biaya149']) ? $_SESSION['biaya149'] : $row['biaya149'];
$biaya150 = isset($_SESSION['biaya150']) ? $_SESSION['biaya150'] : $row['biaya150'];
$biaya151 = isset($_SESSION['biaya151']) ? $_SESSION['biaya151'] : $row['biaya151'];
$biaya152 = isset($_SESSION['biaya152']) ? $_SESSION['biaya152'] : $row['biaya152'];
$biaya153 = isset($_SESSION['biaya153']) ? $_SESSION['biaya153'] : $row['biaya153'];
$biaya154 = isset($_SESSION['biaya154']) ? $_SESSION['biaya154'] : $row['biaya154'];
$biaya155 = isset($_SESSION['biaya155']) ? $_SESSION['biaya155'] : $row['biaya155'];
$biaya156 = isset($_SESSION['biaya156']) ? $_SESSION['biaya156'] : $row['biaya156'];
$biaya157 = isset($_SESSION['biaya157']) ? $_SESSION['biaya157'] : $row['biaya157'];
$biaya158 = isset($_SESSION['biaya158']) ? $_SESSION['biaya158'] : $row['biaya158'];
$biaya159 = isset($_SESSION['biaya159']) ? $_SESSION['biaya159'] : $row['biaya159'];
$biaya160 = isset($_SESSION['biaya160']) ? $_SESSION['biaya160'] : $row['biaya160'];
$biaya161 = isset($_SESSION['biaya161']) ? $_SESSION['biaya161'] : $row['biaya161'];
$biaya162 = isset($_SESSION['biaya162']) ? $_SESSION['biaya162'] : $row['biaya162'];
$biaya163 = isset($_SESSION['biaya163']) ? $_SESSION['biaya163'] : $row['biaya163'];
$biaya164 = isset($_SESSION['biaya164']) ? $_SESSION['biaya164'] : $row['biaya164'];
$biaya165 = isset($_SESSION['biaya165']) ? $_SESSION['biaya165'] : $row['biaya165'];
$biaya166 = isset($_SESSION['biaya166']) ? $_SESSION['biaya166'] : $row['biaya166'];
$biaya167 = isset($_SESSION['biaya167']) ? $_SESSION['biaya167'] : $row['biaya167'];
$biaya168 = isset($_SESSION['biaya168']) ? $_SESSION['biaya168'] : $row['biaya168'];
$biaya169 = isset($_SESSION['biaya169']) ? $_SESSION['biaya169'] : $row['biaya169'];
$biaya170 = isset($_SESSION['biaya170']) ? $_SESSION['biaya170'] : $row['biaya170'];
$biaya171 = isset($_SESSION['biaya171']) ? $_SESSION['biaya171'] : $row['biaya171'];
$biaya172 = isset($_SESSION['biaya172']) ? $_SESSION['biaya172'] : $row['biaya172'];
$biaya173 = isset($_SESSION['biaya173']) ? $_SESSION['biaya173'] : $row['biaya173'];
$biaya174 = isset($_SESSION['biaya174']) ? $_SESSION['biaya174'] : $row['biaya174'];
$biaya175 = isset($_SESSION['biaya175']) ? $_SESSION['biaya175'] : $row['biaya175'];
$biaya176 = isset($_SESSION['biaya176']) ? $_SESSION['biaya176'] : $row['biaya176'];
$biaya177 = isset($_SESSION['biaya177']) ? $_SESSION['biaya177'] : $row['biaya177'];
$biaya178 = isset($_SESSION['biaya178']) ? $_SESSION['biaya178'] : $row['biaya178'];
$biaya179 = isset($_SESSION['biaya179']) ? $_SESSION['biaya179'] : $row['biaya179'];
$biaya180 = isset($_SESSION['biaya180']) ? $_SESSION['biaya180'] : $row['biaya180'];
$biaya181 = isset($_SESSION['biaya181']) ? $_SESSION['biaya181'] : $row['biaya181'];
$biaya182 = isset($_SESSION['biaya182']) ? $_SESSION['biaya182'] : $row['biaya182'];
$biaya183 = isset($_SESSION['biaya183']) ? $_SESSION['biaya183'] : $row['biaya183'];
$biaya184 = isset($_SESSION['biaya184']) ? $_SESSION['biaya184'] : $row['biaya184'];
$biaya185 = isset($_SESSION['biaya185']) ? $_SESSION['biaya185'] : $row['biaya185'];
$biaya186 = isset($_SESSION['biaya186']) ? $_SESSION['biaya186'] : $row['biaya186'];
$biaya187 = isset($_SESSION['biaya187']) ? $_SESSION['biaya187'] : $row['biaya187'];
$biaya188 = isset($_SESSION['biaya188']) ? $_SESSION['biaya188'] : $row['biaya188'];
$biaya189 = isset($_SESSION['biaya189']) ? $_SESSION['biaya189'] : $row['biaya189'];
$biaya190 = isset($_SESSION['biaya190']) ? $_SESSION['biaya190'] : $row['biaya190'];
$biaya191 = isset($_SESSION['biaya191']) ? $_SESSION['biaya191'] : $row['biaya191'];
$biaya192 = isset($_SESSION['biaya192']) ? $_SESSION['biaya192'] : $row['biaya192'];
$biaya193 = isset($_SESSION['biaya193']) ? $_SESSION['biaya193'] : $row['biaya193'];
$biaya194 = isset($_SESSION['biaya194']) ? $_SESSION['biaya194'] : $row['biaya194'];
$biaya195 = isset($_SESSION['biaya195']) ? $_SESSION['biaya195'] : $row['biaya195'];
$biaya196 = isset($_SESSION['biaya196']) ? $_SESSION['biaya196'] : $row['biaya196'];
$biaya197 = isset($_SESSION['biaya197']) ? $_SESSION['biaya197'] : $row['biaya197'];
$biaya198 = isset($_SESSION['biaya198']) ? $_SESSION['biaya198'] : $row['biaya198'];
$biaya199 = isset($_SESSION['biaya199']) ? $_SESSION['biaya199'] : $row['biaya199'];
$biaya200 = isset($_SESSION['biaya200']) ? $_SESSION['biaya200'] : $row['biaya200'];
$biaya201 = isset($_SESSION['biaya201']) ? $_SESSION['biaya201'] : $row['biaya201'];
$biaya202 = isset($_SESSION['biaya202']) ? $_SESSION['biaya202'] : $row['biaya202'];
$biaya203 = isset($_SESSION['biaya203']) ? $_SESSION['biaya203'] : $row['biaya203'];
$biaya204 = isset($_SESSION['biaya204']) ? $_SESSION['biaya204'] : $row['biaya204'];
$biaya205 = isset($_SESSION['biaya205']) ? $_SESSION['biaya205'] : $row['biaya205'];
$biaya206 = isset($_SESSION['biaya206']) ? $_SESSION['biaya206'] : $row['biaya206'];
$biaya207 = isset($_SESSION['biaya207']) ? $_SESSION['biaya207'] : $row['biaya207'];
$biaya208 = isset($_SESSION['biaya208']) ? $_SESSION['biaya208'] : $row['biaya208'];
$biaya209 = isset($_SESSION['biaya209']) ? $_SESSION['biaya209'] : $row['biaya209'];
$biaya210 = isset($_SESSION['biaya210']) ? $_SESSION['biaya210'] : $row['biaya210'];
$biaya211 = isset($_SESSION['biaya211']) ? $_SESSION['biaya211'] : $row['biaya211'];
$biaya212 = isset($_SESSION['biaya212']) ? $_SESSION['biaya212'] : $row['biaya212'];
$biaya213 = isset($_SESSION['biaya213']) ? $_SESSION['biaya213'] : $row['biaya213'];
$biaya214 = isset($_SESSION['biaya214']) ? $_SESSION['biaya214'] : $row['biaya214'];
$biaya215 = isset($_SESSION['biaya215']) ? $_SESSION['biaya215'] : $row['biaya215'];
$biaya216 = isset($_SESSION['biaya216']) ? $_SESSION['biaya216'] : $row['biaya216'];
$biaya217 = isset($_SESSION['biaya217']) ? $_SESSION['biaya217'] : $row['biaya217'];
$biaya218 = isset($_SESSION['biaya218']) ? $_SESSION['biaya218'] : $row['biaya218'];
$biaya219 = isset($_SESSION['biaya219']) ? $_SESSION['biaya219'] : $row['biaya219'];
$biaya220 = isset($_SESSION['biaya220']) ? $_SESSION['biaya220'] : $row['biaya220'];
$biaya221 = isset($_SESSION['biaya221']) ? $_SESSION['biaya221'] : $row['biaya221'];
$biaya222 = isset($_SESSION['biaya222']) ? $_SESSION['biaya222'] : $row['biaya222'];
$biaya223 = isset($_SESSION['biaya223']) ? $_SESSION['biaya223'] : $row['biaya223'];
$biaya224 = isset($_SESSION['biaya224']) ? $_SESSION['biaya224'] : $row['biaya224'];
$biaya225 = isset($_SESSION['biaya225']) ? $_SESSION['biaya225'] : $row['biaya225'];
$biaya226 = isset($_SESSION['biaya226']) ? $_SESSION['biaya226'] : $row['biaya226'];
$biaya227 = isset($_SESSION['biaya227']) ? $_SESSION['biaya227'] : $row['biaya227'];
$biaya228 = isset($_SESSION['biaya228']) ? $_SESSION['biaya228'] : $row['biaya228'];
$biaya229 = isset($_SESSION['biaya229']) ? $_SESSION['biaya229'] : $row['biaya229'];
$biaya230 = isset($_SESSION['biaya230']) ? $_SESSION['biaya230'] : $row['biaya230'];
$biaya231 = isset($_SESSION['biaya231']) ? $_SESSION['biaya231'] : $row['biaya231'];
$biaya232 = isset($_SESSION['biaya232']) ? $_SESSION['biaya232'] : $row['biaya232'];
$biaya233 = isset($_SESSION['biaya233']) ? $_SESSION['biaya233'] : $row['biaya233'];
$biaya234 = isset($_SESSION['biaya234']) ? $_SESSION['biaya234'] : $row['biaya234'];
$biaya235 = isset($_SESSION['biaya235']) ? $_SESSION['biaya235'] : $row['biaya235'];
$biaya236 = isset($_SESSION['biaya236']) ? $_SESSION['biaya236'] : $row['biaya236'];
$biaya237 = isset($_SESSION['biaya237']) ? $_SESSION['biaya237'] : $row['biaya237'];
$biaya238 = isset($_SESSION['biaya238']) ? $_SESSION['biaya238'] : $row['biaya238'];
$biaya239 = isset($_SESSION['biaya239']) ? $_SESSION['biaya239'] : $row['biaya239'];
$biaya240 = isset($_SESSION['biaya240']) ? $_SESSION['biaya240'] : $row['biaya240'];
$biaya241 = isset($_SESSION['biaya241']) ? $_SESSION['biaya241'] : $row['biaya241'];
$biaya242 = isset($_SESSION['biaya242']) ? $_SESSION['biaya242'] : $row['biaya242'];
$biaya243 = isset($_SESSION['biaya243']) ? $_SESSION['biaya243'] : $row['biaya243'];
$biaya244 = isset($_SESSION['biaya244']) ? $_SESSION['biaya244'] : $row['biaya244'];
$biaya245 = isset($_SESSION['biaya245']) ? $_SESSION['biaya245'] : $row['biaya245'];
$biaya246 = isset($_SESSION['biaya246']) ? $_SESSION['biaya246'] : $row['biaya246'];
$biaya247 = isset($_SESSION['biaya247']) ? $_SESSION['biaya247'] : $row['biaya247'];
$biaya248 = isset($_SESSION['biaya248']) ? $_SESSION['biaya248'] : $row['biaya248'];
$biaya249 = isset($_SESSION['biaya249']) ? $_SESSION['biaya249'] : $row['biaya249'];
$biaya250 = isset($_SESSION['biaya250']) ? $_SESSION['biaya250'] : $row['biaya250'];
$biaya251 = isset($_SESSION['biaya251']) ? $_SESSION['biaya251'] : $row['biaya251'];
$biaya252 = isset($_SESSION['biaya252']) ? $_SESSION['biaya252'] : $row['biaya252'];
$biaya253 = isset($_SESSION['biaya253']) ? $_SESSION['biaya253'] : $row['biaya253'];
$biaya254 = isset($_SESSION['biaya254']) ? $_SESSION['biaya254'] : $row['biaya254'];
$biaya255 = isset($_SESSION['biaya255']) ? $_SESSION['biaya255'] : $row['biaya255'];
$biaya256 = isset($_SESSION['biaya256']) ? $_SESSION['biaya256'] : $row['biaya256'];
$biaya257 = isset($_SESSION['biaya257']) ? $_SESSION['biaya257'] : $row['biaya257'];
$biaya258 = isset($_SESSION['biaya258']) ? $_SESSION['biaya258'] : $row['biaya258'];
$biaya259 = isset($_SESSION['biaya259']) ? $_SESSION['biaya259'] : $row['biaya259'];
$biaya260 = isset($_SESSION['biaya260']) ? $_SESSION['biaya260'] : $row['biaya260'];
$biaya261 = isset($_SESSION['biaya261']) ? $_SESSION['biaya261'] : $row['biaya261'];
$biaya262 = isset($_SESSION['biaya262']) ? $_SESSION['biaya262'] : $row['biaya262'];
$biaya263 = isset($_SESSION['biaya263']) ? $_SESSION['biaya263'] : $row['biaya263'];
$biaya264 = isset($_SESSION['biaya264']) ? $_SESSION['biaya264'] : $row['biaya264'];




// Update checkbox values when the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // $NOMR = $_GET["nomr"];

    $biaya1 = isset($_POST['biaya1']) ? $_POST['biaya1'] : 0;
    $biaya2 = isset($_POST['biaya2']) ? $_POST['biaya2'] : 0;
    $biaya3 = isset($_POST['biaya3']) ? $_POST['biaya3'] : 0;
    $biaya4 = isset($_POST['biaya4']) ? $_POST['biaya4'] : 0;
    $biaya5 = isset($_POST['biaya5']) ? $_POST['biaya5'] : 0;
    $biaya6 = isset($_POST['biaya6']) ? $_POST['biaya6'] : 0;
    $biaya7 = isset($_POST['biaya7']) ? $_POST['biaya7'] : 0;
    $biaya8 = isset($_POST['biaya8']) ? $_POST['biaya8'] : 0;
    $biaya9 = isset($_POST['biaya9']) ? $_POST['biaya9'] : 0;
    $biaya10 = isset($_POST['biaya10']) ? $_POST['biaya10'] : 0;
    $biaya11 = isset($_POST['biaya11']) ? $_POST['biaya11'] : 0;
    $biaya12 = isset($_POST['biaya12']) ? $_POST['biaya12'] : 0;
    $biaya13 = isset($_POST['biaya13']) ? $_POST['biaya13'] : 0;
    $biaya14 = isset($_POST['biaya14']) ? $_POST['biaya14'] : 0;
    $biaya15 = isset($_POST['biaya15']) ? $_POST['biaya15'] : 0;
    $biaya16 = isset($_POST['biaya16']) ? $_POST['biaya16'] : 0;
    $biaya17 = isset($_POST['biaya17']) ? $_POST['biaya17'] : 0;
    $biaya18 = isset($_POST['biaya18']) ? $_POST['biaya18'] : 0;
    $biaya19 = isset($_POST['biaya19']) ? $_POST['biaya19'] : 0;
    $biaya20 = isset($_POST['biaya20']) ? $_POST['biaya20'] : 0;
    $biaya21 = isset($_POST['biaya21']) ? $_POST['biaya21'] : 0;
    $biaya22 = isset($_POST['biaya22']) ? $_POST['biaya22'] : 0;
    $biaya23 = isset($_POST['biaya23']) ? $_POST['biaya23'] : 0;
    $biaya24 = isset($_POST['biaya24']) ? $_POST['biaya24'] : 0;
    $biaya25 = isset($_POST['biaya25']) ? $_POST['biaya25'] : 0;
    $biaya26 = isset($_POST['biaya26']) ? $_POST['biaya26'] : 0;
    $biaya27 = isset($_POST['biaya27']) ? $_POST['biaya27'] : 0;
    $biaya28 = isset($_POST['biaya28']) ? $_POST['biaya28'] : 0;
    $biaya29 = isset($_POST['biaya29']) ? $_POST['biaya29'] : 0;
    $biaya30 = isset($_POST['biaya30']) ? $_POST['biaya30'] : 0;
    $biaya31 = isset($_POST['biaya31']) ? $_POST['biaya31'] : 0;
    $biaya32 = isset($_POST['biaya32']) ? $_POST['biaya32'] : 0;
    $biaya33 = isset($_POST['biaya33']) ? $_POST['biaya33'] : 0;
    $biaya34 = isset($_POST['biaya34']) ? $_POST['biaya34'] : 0;
    $biaya35 = isset($_POST['biaya35']) ? $_POST['biaya35'] : 0;
    $biaya36 = isset($_POST['biaya36']) ? $_POST['biaya36'] : 0;
    $biaya37 = isset($_POST['biaya37']) ? $_POST['biaya37'] : 0;
    $biaya38 = isset($_POST['biaya38']) ? $_POST['biaya38'] : 0;
    $biaya39 = isset($_POST['biaya39']) ? $_POST['biaya39'] : 0;
    $biaya40 = isset($_POST['biaya40']) ? $_POST['biaya40'] : 0;
    $biaya41 = isset($_POST['biaya41']) ? $_POST['biaya41'] : 0;
    $biaya42 = isset($_POST['biaya42']) ? $_POST['biaya42'] : 0;
    $biaya43 = isset($_POST['biaya43']) ? $_POST['biaya43'] : 0;
    $biaya44 = isset($_POST['biaya44']) ? $_POST['biaya44'] : 0;
    $biaya45 = isset($_POST['biaya45']) ? $_POST['biaya45'] : 0;
    $biaya46 = isset($_POST['biaya46']) ? $_POST['biaya46'] : 0;
    $biaya47 = isset($_POST['biaya47']) ? $_POST['biaya47'] : 0;
    $biaya48 = isset($_POST['biaya48']) ? $_POST['biaya48'] : 0;
    $biaya49 = isset($_POST['biaya49']) ? $_POST['biaya49'] : 0;
    $biaya50 = isset($_POST['biaya50']) ? $_POST['biaya50'] : 0;
    $biaya51 = isset($_POST['biaya51']) ? $_POST['biaya51'] : 0;
    $biaya52 = isset($_POST['biaya52']) ? $_POST['biaya52'] : 0;
    $biaya53 = isset($_POST['biaya53']) ? $_POST['biaya53'] : 0;
    $biaya54 = isset($_POST['biaya54']) ? $_POST['biaya54'] : 0;
    $biaya55 = isset($_POST['biaya55']) ? $_POST['biaya55'] : 0;
    $biaya56 = isset($_POST['biaya56']) ? $_POST['biaya56'] : 0;
    $biaya57 = isset($_POST['biaya57']) ? $_POST['biaya57'] : 0;
    $biaya58 = isset($_POST['biaya58']) ? $_POST['biaya58'] : 0;
    $biaya59 = isset($_POST['biaya59']) ? $_POST['biaya59'] : 0;
    $biaya60 = isset($_POST['biaya60']) ? $_POST['biaya60'] : 0;
    $biaya61 = isset($_POST['biaya61']) ? $_POST['biaya61'] : 0;
    $biaya62 = isset($_POST['biaya62']) ? $_POST['biaya62'] : 0;
    $biaya63 = isset($_POST['biaya63']) ? $_POST['biaya63'] : 0;
    $biaya64 = isset($_POST['biaya64']) ? $_POST['biaya64'] : 0;
    $biaya65 = isset($_POST['biaya65']) ? $_POST['biaya65'] : 0;
    $biaya66 = isset($_POST['biaya66']) ? $_POST['biaya66'] : 0;
    $biaya67 = isset($_POST['biaya67']) ? $_POST['biaya67'] : 0;
    $biaya68 = isset($_POST['biaya68']) ? $_POST['biaya68'] : 0;
    $biaya69 = isset($_POST['biaya69']) ? $_POST['biaya69'] : 0;
    $biaya70 = isset($_POST['biaya70']) ? $_POST['biaya70'] : 0;
    $biaya71 = isset($_POST['biaya71']) ? $_POST['biaya71'] : 0;
    $biaya72 = isset($_POST['biaya72']) ? $_POST['biaya72'] : 0;
    $biaya73 = isset($_POST['biaya73']) ? $_POST['biaya73'] : 0;
    $biaya74 = isset($_POST['biaya74']) ? $_POST['biaya74'] : 0;
    $biaya75 = isset($_POST['biaya75']) ? $_POST['biaya75'] : 0;
    $biaya76 = isset($_POST['biaya76']) ? $_POST['biaya76'] : 0;
    $biaya77 = isset($_POST['biaya77']) ? $_POST['biaya77'] : 0;
    $biaya78 = isset($_POST['biaya78']) ? $_POST['biaya78'] : 0;
    $biaya79 = isset($_POST['biaya79']) ? $_POST['biaya79'] : 0;
    $biaya80 = isset($_POST['biaya80']) ? $_POST['biaya80'] : 0;
    $biaya81 = isset($_POST['biaya81']) ? $_POST['biaya81'] : 0;
    $biaya82 = isset($_POST['biaya82']) ? $_POST['biaya82'] : 0;
    $biaya83 = isset($_POST['biaya83']) ? $_POST['biaya83'] : 0;
    $biaya84 = isset($_POST['biaya84']) ? $_POST['biaya84'] : 0;
    $biaya85 = isset($_POST['biaya85']) ? $_POST['biaya85'] : 0;
    $biaya86 = isset($_POST['biaya86']) ? $_POST['biaya86'] : 0;
    $biaya87 = isset($_POST['biaya87']) ? $_POST['biaya87'] : 0;
    $biaya88 = isset($_POST['biaya88']) ? $_POST['biaya88'] : 0;
    $biaya89 = isset($_POST['biaya89']) ? $_POST['biaya89'] : 0;
    $biaya90 = isset($_POST['biaya90']) ? $_POST['biaya90'] : 0;
    $biaya91 = isset($_POST['biaya91']) ? $_POST['biaya91'] : 0;
    $biaya92 = isset($_POST['biaya92']) ? $_POST['biaya92'] : 0;
    $biaya93 = isset($_POST['biaya93']) ? $_POST['biaya93'] : 0;
    $biaya94 = isset($_POST['biaya94']) ? $_POST['biaya94'] : 0;
    $biaya95 = isset($_POST['biaya95']) ? $_POST['biaya95'] : 0;
    $biaya96 = isset($_POST['biaya96']) ? $_POST['biaya96'] : 0;
    $biaya97 = isset($_POST['biaya97']) ? $_POST['biaya97'] : 0;
    $biaya98 = isset($_POST['biaya98']) ? $_POST['biaya98'] : 0;
    $biaya99 = isset($_POST['biaya99']) ? $_POST['biaya99'] : 0;
    $biaya100 = isset($_POST['biaya100']) ? $_POST['biaya100'] : 0;
    $biaya101 = isset($_POST['biaya101']) ? $_POST['biaya101'] : 0;
    $biaya102 = isset($_POST['biaya102']) ? $_POST['biaya102'] : 0;
    $biaya103 = isset($_POST['biaya103']) ? $_POST['biaya103'] : 0;
    $biaya104 = isset($_POST['biaya104']) ? $_POST['biaya104'] : 0;
    $biaya105 = isset($_POST['biaya105']) ? $_POST['biaya105'] : 0;
    $biaya106 = isset($_POST['biaya106']) ? $_POST['biaya106'] : 0;
    $biaya107 = isset($_POST['biaya107']) ? $_POST['biaya107'] : 0;
    $biaya108 = isset($_POST['biaya108']) ? $_POST['biaya108'] : 0;
    $biaya109 = isset($_POST['biaya109']) ? $_POST['biaya109'] : 0;
    $biaya110 = isset($_POST['biaya110']) ? $_POST['biaya110'] : 0;
    $biaya111 = isset($_POST['biaya111']) ? $_POST['biaya111'] : 0;
    $biaya112 = isset($_POST['biaya112']) ? $_POST['biaya112'] : 0;
    $biaya113 = isset($_POST['biaya113']) ? $_POST['biaya113'] : 0;
    $biaya114 = isset($_POST['biaya114']) ? $_POST['biaya114'] : 0;
    $biaya115 = isset($_POST['biaya115']) ? $_POST['biaya115'] : 0;
    $biaya116 = isset($_POST['biaya116']) ? $_POST['biaya116'] : 0;
    $biaya117 = isset($_POST['biaya117']) ? $_POST['biaya117'] : 0;
    $biaya118 = isset($_POST['biaya118']) ? $_POST['biaya118'] : 0;
    $biaya119 = isset($_POST['biaya119']) ? $_POST['biaya119'] : 0;
    $biaya117 = isset($_POST['biaya117']) ? $_POST['biaya117'] : 0;
    $biaya118 = isset($_POST['biaya118']) ? $_POST['biaya118'] : 0;
    $biaya119 = isset($_POST['biaya119']) ? $_POST['biaya119'] : 0;
    $biaya120 = isset($_POST['biaya120']) ? $_POST['biaya120'] : 0;
    $biaya121 = isset($_POST['biaya121']) ? $_POST['biaya121'] : 0;
    $biaya122 = isset($_POST['biaya122']) ? $_POST['biaya122'] : 0;
    $biaya123 = isset($_POST['biaya123']) ? $_POST['biaya123'] : 0;
    $biaya124 = isset($_POST['biaya124']) ? $_POST['biaya124'] : 0;
    $biaya125 = isset($_POST['biaya125']) ? $_POST['biaya125'] : 0;
    $biaya126 = isset($_POST['biaya126']) ? $_POST['biaya126'] : 0;
    $biaya127 = isset($_POST['biaya127']) ? $_POST['biaya127'] : 0;
    $biaya128 = isset($_POST['biaya128']) ? $_POST['biaya128'] : 0;
    $biaya129 = isset($_POST['biaya129']) ? $_POST['biaya129'] : 0;
    $biaya130 = isset($_POST['biaya130']) ? $_POST['biaya130'] : 0;
    $biaya131 = isset($_POST['biaya131']) ? $_POST['biaya131'] : 0;
    $biaya132 = isset($_POST['biaya132']) ? $_POST['biaya132'] : 0;
    $biaya133 = isset($_POST['biaya133']) ? $_POST['biaya133'] : 0;
    $biaya134 = isset($_POST['biaya134']) ? $_POST['biaya134'] : 0;
    $biaya135 = isset($_POST['biaya135']) ? $_POST['biaya135'] : 0;
    $biaya136 = isset($_POST['biaya136']) ? $_POST['biaya136'] : 0;
    $biaya137 = isset($_POST['biaya137']) ? $_POST['biaya137'] : 0;
    $biaya138 = isset($_POST['biaya138']) ? $_POST['biaya138'] : 0;
    $biaya139 = isset($_POST['biaya139']) ? $_POST['biaya139'] : 0;
    $biaya140 = isset($_POST['biaya140']) ? $_POST['biaya140'] : 0;
    $biaya141 = isset($_POST['biaya141']) ? $_POST['biaya141'] : 0;
    $biaya142 = isset($_POST['biaya142']) ? $_POST['biaya142'] : 0;
    $biaya143 = isset($_POST['biaya143']) ? $_POST['biaya143'] : 0;
    $biaya144 = isset($_POST['biaya144']) ? $_POST['biaya144'] : 0;
    $biaya145 = isset($_POST['biaya145']) ? $_POST['biaya145'] : 0;
    $biaya146 = isset($_POST['biaya146']) ? $_POST['biaya146'] : 0;
    $biaya147 = isset($_POST['biaya147']) ? $_POST['biaya147'] : 0;
    $biaya148 = isset($_POST['biaya148']) ? $_POST['biaya148'] : 0;
    $biaya149 = isset($_POST['biaya149']) ? $_POST['biaya149'] : 0;
    $biaya150 = isset($_POST['biaya150']) ? $_POST['biaya150'] : 0;
    $biaya151 = isset($_POST['biaya151']) ? $_POST['biaya151'] : 0;
    $biaya152 = isset($_POST['biaya152']) ? $_POST['biaya152'] : 0;
    $biaya153 = isset($_POST['biaya153']) ? $_POST['biaya153'] : 0;
    $biaya154 = isset($_POST['biaya154']) ? $_POST['biaya154'] : 0;
    $biaya155 = isset($_POST['biaya155']) ? $_POST['biaya155'] : 0;
    $biaya156 = isset($_POST['biaya156']) ? $_POST['biaya156'] : 0;
    $biaya157 = isset($_POST['biaya157']) ? $_POST['biaya157'] : 0;
    $biaya158 = isset($_POST['biaya158']) ? $_POST['biaya158'] : 0;
    $biaya159 = isset($_POST['biaya159']) ? $_POST['biaya159'] : 0;
    $biaya160 = isset($_POST['biaya160']) ? $_POST['biaya160'] : 0;
    $biaya161 = isset($_POST['biaya161']) ? $_POST['biaya161'] : 0;
    $biaya162 = isset($_POST['biaya162']) ? $_POST['biaya162'] : 0;
    $biaya163 = isset($_POST['biaya163']) ? $_POST['biaya163'] : 0;
    $biaya164 = isset($_POST['biaya164']) ? $_POST['biaya164'] : 0;
    $biaya165 = isset($_POST['biaya165']) ? $_POST['biaya165'] : 0;
    $biaya166 = isset($_POST['biaya166']) ? $_POST['biaya166'] : 0;
    $biaya167 = isset($_POST['biaya167']) ? $_POST['biaya167'] : 0;
    $biaya168 = isset($_POST['biaya168']) ? $_POST['biaya168'] : 0;
    $biaya169 = isset($_POST['biaya169']) ? $_POST['biaya169'] : 0;
    $biaya170 = isset($_POST['biaya170']) ? $_POST['biaya170'] : 0;
    $biaya171 = isset($_POST['biaya171']) ? $_POST['biaya171'] : 0;
    $biaya172 = isset($_POST['biaya172']) ? $_POST['biaya172'] : 0;
    $biaya173 = isset($_POST['biaya173']) ? $_POST['biaya173'] : 0;
    $biaya174 = isset($_POST['biaya174']) ? $_POST['biaya174'] : 0;
    $biaya175 = isset($_POST['biaya175']) ? $_POST['biaya175'] : 0;
    $biaya176 = isset($_POST['biaya176']) ? $_POST['biaya176'] : 0;
    $biaya177 = isset($_POST['biaya177']) ? $_POST['biaya177'] : 0;
    $biaya178 = isset($_POST['biaya178']) ? $_POST['biaya178'] : 0;
    $biaya179 = isset($_POST['biaya179']) ? $_POST['biaya179'] : 0;
    $biaya180 = isset($_POST['biaya180']) ? $_POST['biaya180'] : 0;
    $biaya181 = isset($_POST['biaya181']) ? $_POST['biaya181'] : 0;
    $biaya182 = isset($_POST['biaya182']) ? $_POST['biaya182'] : 0;
    $biaya183 = isset($_POST['biaya183']) ? $_POST['biaya183'] : 0;
    $biaya184 = isset($_POST['biaya184']) ? $_POST['biaya184'] : 0;
    $biaya185 = isset($_POST['biaya185']) ? $_POST['biaya185'] : 0;
    $biaya186 = isset($_POST['biaya186']) ? $_POST['biaya186'] : 0;
    $biaya187 = isset($_POST['biaya187']) ? $_POST['biaya187'] : 0;
    $biaya188 = isset($_POST['biaya188']) ? $_POST['biaya188'] : 0;
    $biaya189 = isset($_POST['biaya189']) ? $_POST['biaya189'] : 0;
    $biaya190 = isset($_POST['biaya190']) ? $_POST['biaya190'] : 0;
    $biaya191 = isset($_POST['biaya191']) ? $_POST['biaya191'] : 0;
    $biaya192 = isset($_POST['biaya192']) ? $_POST['biaya192'] : 0;
    $biaya193 = isset($_POST['biaya193']) ? $_POST['biaya193'] : 0;
    $biaya194 = isset($_POST['biaya194']) ? $_POST['biaya194'] : 0;
    $biaya195 = isset($_POST['biaya195']) ? $_POST['biaya195'] : 0;
    $biaya196 = isset($_POST['biaya196']) ? $_POST['biaya196'] : 0;
    $biaya197 = isset($_POST['biaya197']) ? $_POST['biaya197'] : 0;
    $biaya198 = isset($_POST['biaya198']) ? $_POST['biaya198'] : 0;
    $biaya199 = isset($_POST['biaya199']) ? $_POST['biaya199'] : 0;
    $biaya200 = isset($_POST['biaya200']) ? $_POST['biaya200'] : 0;
    $biaya201 = isset($_POST['biaya201']) ? $_POST['biaya201'] : 0;
    $biaya202 = isset($_POST['biaya202']) ? $_POST['biaya202'] : 0;
    $biaya203 = isset($_POST['biaya203']) ? $_POST['biaya203'] : 0;
    $biaya204 = isset($_POST['biaya204']) ? $_POST['biaya204'] : 0;
    $biaya205 = isset($_POST['biaya205']) ? $_POST['biaya205'] : 0;
    $biaya206 = isset($_POST['biaya206']) ? $_POST['biaya206'] : 0;
    $biaya207 = isset($_POST['biaya207']) ? $_POST['biaya207'] : 0;
    $biaya208 = isset($_POST['biaya208']) ? $_POST['biaya208'] : 0;
    $biaya209 = isset($_POST['biaya209']) ? $_POST['biaya209'] : 0;
    $biaya210 = isset($_POST['biaya210']) ? $_POST['biaya210'] : 0;
    $biaya211 = isset($_POST['biaya211']) ? $_POST['biaya211'] : 0;
    $biaya212 = isset($_POST['biaya212']) ? $_POST['biaya212'] : 0;
    $biaya213 = isset($_POST['biaya213']) ? $_POST['biaya213'] : 0;
    $biaya214 = isset($_POST['biaya214']) ? $_POST['biaya214'] : 0;
    $biaya215 = isset($_POST['biaya215']) ? $_POST['biaya215'] : 0;
    $biaya216 = isset($_POST['biaya216']) ? $_POST['biaya216'] : 0;
    $biaya217 = isset($_POST['biaya217']) ? $_POST['biaya217'] : 0;
    $biaya218 = isset($_POST['biaya218']) ? $_POST['biaya218'] : 0;
    $biaya219 = isset($_POST['biaya219']) ? $_POST['biaya219'] : 0;
    $biaya220 = isset($_POST['biaya220']) ? $_POST['biaya220'] : 0;
    $biaya221 = isset($_POST['biaya221']) ? $_POST['biaya221'] : 0;
    $biaya222 = isset($_POST['biaya222']) ? $_POST['biaya222'] : 0;
    $biaya223 = isset($_POST['biaya223']) ? $_POST['biaya223'] : 0;
    $biaya224 = isset($_POST['biaya224']) ? $_POST['biaya224'] : 0;
    $biaya225 = isset($_POST['biaya225']) ? $_POST['biaya225'] : 0;
    $biaya226 = isset($_POST['biaya226']) ? $_POST['biaya226'] : 0;
    $biaya227 = isset($_POST['biaya227']) ? $_POST['biaya227'] : 0;
    $biaya228 = isset($_POST['biaya228']) ? $_POST['biaya228'] : 0;
    $biaya229 = isset($_POST['biaya229']) ? $_POST['biaya229'] : 0;
    $biaya230 = isset($_POST['biaya230']) ? $_POST['biaya230'] : 0;
    $biaya231 = isset($_POST['biaya231']) ? $_POST['biaya231'] : 0;
    $biaya232 = isset($_POST['biaya232']) ? $_POST['biaya232'] : 0;
    $biaya233 = isset($_POST['biaya233']) ? $_POST['biaya233'] : 0;
    $biaya234 = isset($_POST['biaya234']) ? $_POST['biaya234'] : 0;
    $biaya235 = isset($_POST['biaya235']) ? $_POST['biaya235'] : 0;
    $biaya236 = isset($_POST['biaya236']) ? $_POST['biaya236'] : 0;
    $biaya237 = isset($_POST['biaya237']) ? $_POST['biaya237'] : 0;
    $biaya238 = isset($_POST['biaya238']) ? $_POST['biaya238'] : 0;
    $biaya239 = isset($_POST['biaya239']) ? $_POST['biaya239'] : 0;
    $biaya240 = isset($_POST['biaya240']) ? $_POST['biaya240'] : 0;
    $biaya241 = isset($_POST['biaya241']) ? $_POST['biaya241'] : 0;
    $biaya242 = isset($_POST['biaya242']) ? $_POST['biaya242'] : 0;
    $biaya243 = isset($_POST['biaya243']) ? $_POST['biaya243'] : 0;
    $biaya244 = isset($_POST['biaya244']) ? $_POST['biaya244'] : 0;
    $biaya245 = isset($_POST['biaya245']) ? $_POST['biaya245'] : 0;
    $biaya246 = isset($_POST['biaya246']) ? $_POST['biaya246'] : 0;
    $biaya247 = isset($_POST['biaya247']) ? $_POST['biaya247'] : 0;
    $biaya248 = isset($_POST['biaya248']) ? $_POST['biaya248'] : 0;
    $biaya249 = isset($_POST['biaya249']) ? $_POST['biaya249'] : 0;
    $biaya250 = isset($_POST['biaya250']) ? $_POST['biaya250'] : 0;
    $biaya251 = isset($_POST['biaya251']) ? $_POST['biaya251'] : 0;
    $biaya252 = isset($_POST['biaya252']) ? $_POST['biaya252'] : 0;
    $biaya253 = isset($_POST['biaya253']) ? $_POST['biaya253'] : 0;
    $biaya254 = isset($_POST['biaya254']) ? $_POST['biaya254'] : 0;
    $biaya255 = isset($_POST['biaya255']) ? $_POST['biaya255'] : 0;
    $biaya256 = isset($_POST['biaya256']) ? $_POST['biaya256'] : 0;
    $biaya257 = isset($_POST['biaya257']) ? $_POST['biaya257'] : 0;
    $biaya258 = isset($_POST['biaya258']) ? $_POST['biaya258'] : 0;
    $biaya259 = isset($_POST['biaya259']) ? $_POST['biaya259'] : 0;
    $biaya260 = isset($_POST['biaya260']) ? $_POST['biaya260'] : 0;
    $biaya261 = isset($_POST['biaya261']) ? $_POST['biaya261'] : 0;
    $biaya262 = isset($_POST['biaya262']) ? $_POST['biaya262'] : 0;
    $biaya263 = isset($_POST['biaya263']) ? $_POST['biaya263'] : 0;
    $biaya264 = isset($_POST['biaya264']) ? $_POST['biaya264'] : 0;

    // Update session variables with checkbox values
    $_SESSION['biaya1'] = $biaya1;
    $_SESSION['biaya2'] = $biaya2;
    $_SESSION['biaya3'] = $biaya3;
    $_SESSION['biaya4'] = $biaya4;
    $_SESSION['biaya5'] = $biaya5;
    $_SESSION['biaya6'] = $biaya6;
    $_SESSION['biaya7'] = $biaya7;
    $_SESSION['biaya8'] = $biaya8;
    $_SESSION['biaya9'] = $biaya9;
    $_SESSION['biaya10'] = $biaya10;
    $_SESSION['biaya11'] = $biaya11;
    $_SESSION['biaya12'] = $biaya12;
    $_SESSION['biaya13'] = $biaya13;
    $_SESSION['biaya14'] = $biaya14;
    $_SESSION['biaya15'] = $biaya15;
    $_SESSION['biaya16'] = $biaya16;
    $_SESSION['biaya17'] = $biaya17;
    $_SESSION['biaya18'] = $biaya18;
    $_SESSION['biaya19'] = $biaya19;
    $_SESSION['biaya20'] = $biaya20;
    $_SESSION['biaya21'] = $biaya21;
    $_SESSION['biaya22'] = $biaya22;
    $_SESSION['biaya23'] = $biaya23;
    $_SESSION['biaya24'] = $biaya24;
    $_SESSION['biaya25'] = $biaya25;
    $_SESSION['biaya26'] = $biaya26;
    $_SESSION['biaya27'] = $biaya27;
    $_SESSION['biaya28'] = $biaya28;
    $_SESSION['biaya29'] = $biaya29;
    $_SESSION['biaya30'] = $biaya30;
    $_SESSION['biaya31'] = $biaya31;
    $_SESSION['biaya32'] = $biaya32;
    $_SESSION['biaya33'] = $biaya33;
    $_SESSION['biaya34'] = $biaya34;
    $_SESSION['biaya35'] = $biaya35;
    $_SESSION['biaya36'] = $biaya36;
    $_SESSION['biaya37'] = $biaya37;
    $_SESSION['biaya38'] = $biaya38;
    $_SESSION['biaya39'] = $biaya39;
    $_SESSION['biaya40'] = $biaya40;
    $_SESSION['biaya41'] = $biaya41;
    $_SESSION['biaya42'] = $biaya42;
    $_SESSION['biaya43'] = $biaya43;
    $_SESSION['biaya44'] = $biaya44;
    $_SESSION['biaya45'] = $biaya45;
    $_SESSION['biaya46'] = $biaya46;
    $_SESSION['biaya47'] = $biaya47;
    $_SESSION['biaya48'] = $biaya48;
    $_SESSION['biaya49'] = $biaya49;
    $_SESSION['biaya50'] = $biaya50;
    $_SESSION['biaya51'] = $biaya51;
    $_SESSION['biaya52'] = $biaya52;
    $_SESSION['biaya53'] = $biaya53;
    $_SESSION['biaya54'] = $biaya54;
    $_SESSION['biaya55'] = $biaya55;
    $_SESSION['biaya56'] = $biaya56;
    $_SESSION['biaya57'] = $biaya57;
    $_SESSION['biaya58'] = $biaya58;
    $_SESSION['biaya59'] = $biaya59;
    $_SESSION['biaya60'] = $biaya60;
    $_SESSION['biaya61'] = $biaya61;
    $_SESSION['biaya62'] = $biaya62;
    $_SESSION['biaya63'] = $biaya63;
    $_SESSION['biaya64'] = $biaya64;
    $_SESSION['biaya65'] = $biaya65;
    $_SESSION['biaya66'] = $biaya66;
    $_SESSION['biaya67'] = $biaya67;
    $_SESSION['biaya68'] = $biaya68;
    $_SESSION['biaya69'] = $biaya69;
    $_SESSION['biaya70'] = $biaya70;
    $_SESSION['biaya71'] = $biaya71;
    $_SESSION['biaya72'] = $biaya72;
    $_SESSION['biaya73'] = $biaya73;
    $_SESSION['biaya74'] = $biaya74;
    $_SESSION['biaya75'] = $biaya75;
    $_SESSION['biaya76'] = $biaya76;
    $_SESSION['biaya77'] = $biaya77;
    $_SESSION['biaya78'] = $biaya78;
    $_SESSION['biaya79'] = $biaya79;
    $_SESSION['biaya80'] = $biaya80;
    $_SESSION['biaya81'] = $biaya81;
    $_SESSION['biaya82'] = $biaya82;
    $_SESSION['biaya83'] = $biaya83;
    $_SESSION['biaya84'] = $biaya84;
    $_SESSION['biaya85'] = $biaya85;
    $_SESSION['biaya86'] = $biaya86;
    $_SESSION['biaya87'] = $biaya87;
    $_SESSION['biaya88'] = $biaya88;
    $_SESSION['biaya89'] = $biaya89;
    $_SESSION['biaya90'] = $biaya90;
    $_SESSION['biaya91'] = $biaya91;
    $_SESSION['biaya92'] = $biaya92;
    $_SESSION['biaya93'] = $biaya93;
    $_SESSION['biaya94'] = $biaya94;
    $_SESSION['biaya95'] = $biaya95;
    $_SESSION['biaya96'] = $biaya96;
    $_SESSION['biaya97'] = $biaya97;
    $_SESSION['biaya98'] = $biaya98;
    $_SESSION['biaya99'] = $biaya99;
    $_SESSION['biaya100'] = $biaya100;
    $_SESSION['biaya101'] = $biaya101;
    $_SESSION['biaya102'] = $biaya102;
    $_SESSION['biaya103'] = $biaya103;
    $_SESSION['biaya104'] = $biaya104;
    $_SESSION['biaya105'] = $biaya105;
    $_SESSION['biaya106'] = $biaya106;
    $_SESSION['biaya107'] = $biaya107;
    $_SESSION['biaya108'] = $biaya108;
    $_SESSION['biaya109'] = $biaya109;
    $_SESSION['biaya110'] = $biaya110;
    $_SESSION['biaya111'] = $biaya111;
    $_SESSION['biaya112'] = $biaya112;
    $_SESSION['biaya113'] = $biaya113;
    $_SESSION['biaya114'] = $biaya114;
    $_SESSION['biaya115'] = $biaya115;
    $_SESSION['biaya116'] = $biaya116;
    $_SESSION['biaya117'] = $biaya117;
    $_SESSION['biaya118'] = $biaya118;
    $_SESSION['biaya119'] = $biaya119;
    $_SESSION['biaya120'] = $biaya120;
    $_SESSION['biaya121'] = $biaya121;
    $_SESSION['biaya122'] = $biaya122;
    $_SESSION['biaya123'] = $biaya123;
    $_SESSION['biaya124'] = $biaya124;
    $_SESSION['biaya125'] = $biaya125;
    $_SESSION['biaya126'] = $biaya126;
    $_SESSION['biaya127'] = $biaya127;
    $_SESSION['biaya128'] = $biaya128;
    $_SESSION['biaya129'] = $biaya129;
    $_SESSION['biaya130'] = $biaya130;
    $_SESSION['biaya131'] = $biaya131;
    $_SESSION['biaya132'] = $biaya132;
    $_SESSION['biaya133'] = $biaya133;
    $_SESSION['biaya134'] = $biaya134;
    $_SESSION['biaya135'] = $biaya135;
    $_SESSION['biaya136'] = $biaya136;
    $_SESSION['biaya137'] = $biaya137;
    $_SESSION['biaya138'] = $biaya138;
    $_SESSION['biaya139'] = $biaya139;
    $_SESSION['biaya140'] = $biaya140;
    $_SESSION['biaya141'] = $biaya141;
    $_SESSION['biaya142'] = $biaya142;
    $_SESSION['biaya143'] = $biaya143;
    $_SESSION['biaya144'] = $biaya144;
    $_SESSION['biaya145'] = $biaya145;
    $_SESSION['biaya146'] = $biaya146;
    $_SESSION['biaya147'] = $biaya147;
    $_SESSION['biaya148'] = $biaya148;
    $_SESSION['biaya149'] = $biaya149;
    $_SESSION['biaya150'] = $biaya150;
    $_SESSION['biaya151'] = $biaya151;
    $_SESSION['biaya152'] = $biaya152;
    $_SESSION['biaya153'] = $biaya153;
    $_SESSION['biaya154'] = $biaya154;
    $_SESSION['biaya155'] = $biaya155;
    $_SESSION['biaya156'] = $biaya156;
    $_SESSION['biaya157'] = $biaya157;
    $_SESSION['biaya158'] = $biaya158;
    $_SESSION['biaya159'] = $biaya159;
    $_SESSION['biaya160'] = $biaya160;
    $_SESSION['biaya161'] = $biaya161;
    $_SESSION['biaya162'] = $biaya162;
    $_SESSION['biaya163'] = $biaya163;
    $_SESSION['biaya164'] = $biaya164;
    $_SESSION['biaya165'] = $biaya165;
    $_SESSION['biaya166'] = $biaya166;
    $_SESSION['biaya167'] = $biaya167;
    $_SESSION['biaya168'] = $biaya168;
    $_SESSION['biaya169'] = $biaya169;
    $_SESSION['biaya170'] = $biaya170;
    $_SESSION['biaya171'] = $biaya171;
    $_SESSION['biaya172'] = $biaya172;
    $_SESSION['biaya173'] = $biaya173;
    $_SESSION['biaya174'] = $biaya174;
    $_SESSION['biaya175'] = $biaya175;
    $_SESSION['biaya176'] = $biaya176;
    $_SESSION['biaya177'] = $biaya177;
    $_SESSION['biaya178'] = $biaya178;
    $_SESSION['biaya179'] = $biaya179;
    $_SESSION['biaya180'] = $biaya180;
    $_SESSION['biaya181'] = $biaya181;
    $_SESSION['biaya182'] = $biaya182;
    $_SESSION['biaya183'] = $biaya183;
    $_SESSION['biaya184'] = $biaya184;
    $_SESSION['biaya185'] = $biaya185;
    $_SESSION['biaya186'] = $biaya186;
    $_SESSION['biaya187'] = $biaya187;
    $_SESSION['biaya188'] = $biaya188;
    $_SESSION['biaya189'] = $biaya189;
    $_SESSION['biaya190'] = $biaya190;
    $_SESSION['biaya191'] = $biaya191;
    $_SESSION['biaya192'] = $biaya192;
    $_SESSION['biaya193'] = $biaya193;
    $_SESSION['biaya194'] = $biaya194;
    $_SESSION['biaya195'] = $biaya195;
    $_SESSION['biaya196'] = $biaya196;
    $_SESSION['biaya197'] = $biaya197;
    $_SESSION['biaya198'] = $biaya198;
    $_SESSION['biaya199'] = $biaya199;
    $_SESSION['biaya200'] = $biaya200;
    $_SESSION['biaya201'] = $biaya201;
    $_SESSION['biaya202'] = $biaya202;
    $_SESSION['biaya203'] = $biaya203;
    $_SESSION['biaya204'] = $biaya204;
    $_SESSION['biaya205'] = $biaya205;
    $_SESSION['biaya206'] = $biaya206;
    $_SESSION['biaya207'] = $biaya207;
    $_SESSION['biaya208'] = $biaya208;
    $_SESSION['biaya209'] = $biaya209;
    $_SESSION['biaya210'] = $biaya210;
    $_SESSION['biaya211'] = $biaya211;
    $_SESSION['biaya212'] = $biaya212;
    $_SESSION['biaya213'] = $biaya213;
    $_SESSION['biaya214'] = $biaya214;
    $_SESSION['biaya215'] = $biaya215;
    $_SESSION['biaya216'] = $biaya216;
    $_SESSION['biaya217'] = $biaya217;
    $_SESSION['biaya218'] = $biaya218;
    $_SESSION['biaya219'] = $biaya219;
    $_SESSION['biaya220'] = $biaya220;
    $_SESSION['biaya221'] = $biaya221;
    $_SESSION['biaya222'] = $biaya222;
    $_SESSION['biaya223'] = $biaya223;
    $_SESSION['biaya224'] = $biaya224;
    $_SESSION['biaya225'] = $biaya225;
    $_SESSION['biaya226'] = $biaya226;
    $_SESSION['biaya227'] = $biaya227;
    $_SESSION['biaya228'] = $biaya228;
    $_SESSION['biaya229'] = $biaya229;
    $_SESSION['biaya230'] = $biaya230;
    $_SESSION['biaya231'] = $biaya231;
    $_SESSION['biaya232'] = $biaya232;
    $_SESSION['biaya233'] = $biaya233;
    $_SESSION['biaya234'] = $biaya234;
    $_SESSION['biaya235'] = $biaya235;
    $_SESSION['biaya236'] = $biaya236;
    $_SESSION['biaya237'] = $biaya237;
    $_SESSION['biaya238'] = $biaya238;
    $_SESSION['biaya239'] = $biaya239;
    $_SESSION['biaya240'] = $biaya240;
    $_SESSION['biaya241'] = $biaya241;
    $_SESSION['biaya242'] = $biaya242;
    $_SESSION['biaya243'] = $biaya243;
    $_SESSION['biaya244'] = $biaya244;
    $_SESSION['biaya245'] = $biaya245;
    $_SESSION['biaya246'] = $biaya246;
    $_SESSION['biaya247'] = $biaya247;
    $_SESSION['biaya248'] = $biaya248;
    $_SESSION['biaya249'] = $biaya249;
    $_SESSION['biaya250'] = $biaya250;
    $_SESSION['biaya251'] = $biaya251;
    $_SESSION['biaya252'] = $biaya252;
    $_SESSION['biaya253'] = $biaya253;
    $_SESSION['biaya254'] = $biaya254;
    $_SESSION['biaya255'] = $biaya255;
    $_SESSION['biaya256'] = $biaya256;
    $_SESSION['biaya257'] = $biaya257;
    $_SESSION['biaya258'] = $biaya258;
    $_SESSION['biaya259'] = $biaya259;
    $_SESSION['biaya260'] = $biaya260;
    $_SESSION['biaya261'] = $biaya261;
    $_SESSION['biaya262'] = $biaya262;
    $_SESSION['biaya263'] = $biaya263;
    $_SESSION['biaya264'] = $biaya264;

    if ($row) {
        // Prepare and execute an SQL statement to update the checkbox values
        $stmt = $pdo->prepare("UPDATE t_clinicalpathway SET 
        biaya1 = ?, biaya2 = ?, biaya3 = ?, biaya4 = ?, biaya5 = ?, biaya6 = ?, biaya7 = ?, biaya8 = ?, biaya9 = ?, biaya10 = ?, biaya11 = ?, biaya12 = ?,
        biaya13 = ?, biaya14 = ?, biaya15 = ?, biaya16 = ?, biaya17 = ?, biaya18 = ?, biaya19 = ?, biaya20 = ?, biaya21 = ?, biaya22 = ?, biaya23 = ?, biaya24 = ?,
        biaya25 = ?, biaya26 = ?, biaya27 = ?, biaya28 = ?, biaya29 = ?, biaya30 = ?, biaya31 = ?, biaya32 = ?, biaya33 = ?, biaya34 = ?, biaya35 = ?, biaya36 = ?,
        biaya37 = ?, biaya38 = ?, biaya39 = ?, biaya40 = ?, biaya41 = ?, biaya42 = ?, biaya43 = ?, biaya44 = ?, biaya45 = ?, biaya46 = ?, biaya47 = ?, biaya48 = ?,
        biaya49 = ?, biaya50 = ?, biaya51 = ?, biaya52 = ?, biaya53 = ?, biaya54 = ?, biaya55 = ?, biaya56 = ?, biaya57 = ?, biaya58 = ?, biaya59 = ?, biaya60 = ?,
        biaya61 = ?, biaya62 = ?, biaya63 = ?, biaya64 = ?, biaya65 = ?, biaya66 = ?, biaya67 = ?, biaya68 = ?, biaya69 = ?, biaya70 = ?, biaya71 = ?, biaya72 = ?,
        biaya73 = ?, biaya74 = ?, biaya75 = ?, biaya76 = ?, biaya77 = ?, biaya78 = ?, biaya79 = ?, biaya80 = ?, biaya81 = ?, biaya82 = ?, biaya83 = ?, biaya84 = ?,
        biaya85 = ?, biaya86 = ?, biaya87 = ?, biaya88 = ?, biaya89 = ?, biaya90 = ?, biaya91 = ?, biaya92 = ?, biaya93 = ?, biaya94 = ?, biaya95 = ?, biaya96 = ?,
        biaya97 = ?, biaya98 = ?, biaya99 = ?, biaya100 = ?, biaya101 = ?, biaya102 = ?, biaya103 = ?, biaya104 = ?, biaya105 = ?, biaya106 = ?, biaya107 = ?, biaya108 = ?,
        biaya109 = ?, biaya110 = ?, biaya111 = ?, biaya112 = ?, biaya113 = ?, biaya114 = ?, biaya115 = ?, biaya116 = ?, biaya117 = ?, biaya118 = ?, biaya119 = ?, biaya120 = ?,
        biaya121 = ?, biaya122 = ?, biaya123 = ?, biaya124 = ?, biaya125 = ?, biaya126 = ?, biaya127 = ?, biaya128 = ?, biaya129 = ?, biaya130 = ?, biaya131 = ?, biaya132 = ?,
        biaya133 = ?, biaya134 = ?, biaya135 = ?, biaya136 = ?, biaya137 = ?, biaya138 = ?, biaya139 = ?, biaya140 = ?, biaya141 = ?, biaya142 = ?, biaya143 = ?, biaya144 = ?,
        biaya145 = ?, biaya146 = ?, biaya147 = ?, biaya148 = ?, biaya149 = ?, biaya150 = ?, biaya151 = ?, biaya152 = ?, biaya153 = ?, biaya154 = ?, biaya155 = ?, biaya156 = ?,
        biaya157 = ?, biaya158 = ?, biaya159 = ?, biaya160 = ?, biaya161 = ?, biaya162 = ?, biaya163 = ?, biaya164 = ?, biaya165 = ?, biaya166 = ?, biaya167 = ?, biaya168 = ?,
        biaya169 = ?, biaya170 = ?, biaya171 = ?, biaya172 = ?, biaya173 = ?, biaya174 = ?, biaya175 = ?, biaya176 = ?, biaya177 = ?, biaya178 = ?, biaya179 = ?, biaya180 = ?,
        biaya181 = ?, biaya182 = ?, biaya183 = ?, biaya184 = ?, biaya185 = ?, biaya186 = ?, biaya187 = ?, biaya188 = ?, biaya189 = ?, biaya190 = ?, biaya191 = ?, biaya192 = ?,
        biaya193 = ?, biaya194 = ?, biaya195 = ?, biaya196 = ?, biaya197 = ?, biaya198 = ?, biaya199 = ?, biaya200 = ?, biaya201 = ?, biaya202 = ?, biaya203 = ?, biaya204 = ?,
        biaya205 = ?, biaya206 = ?, biaya207 = ?, biaya208 = ?, biaya209 = ?, biaya210 = ?, biaya211 = ?, biaya212 = ?, biaya213 = ?, biaya214 = ?, biaya215 = ?, biaya216 = ?,
        biaya217 = ?, biaya218 = ?, biaya219 = ?, biaya220 = ?, biaya221 = ?, biaya222 = ?, biaya223 = ?, biaya224 = ?, biaya225 = ?, biaya226 = ?, biaya227 = ?, biaya228 = ?,
        biaya229 = ?, biaya230 = ?, biaya231 = ?, biaya232 = ?, biaya233 = ?, biaya234 = ?, biaya235 = ?, biaya236 = ?, biaya237 = ?, biaya238 = ?, biaya239 = ?, biaya240 = ?,
        biaya241 = ?, biaya242 = ?, biaya243 = ?, biaya244 = ?, biaya245 = ?, biaya246 = ?, biaya247 = ?, biaya248 = ?, biaya249 = ?, biaya250 = ?, biaya251 = ?, biaya252 = ?,
        biaya253 = ?, biaya254 = ?, biaya255 = ?, biaya256 = ?, biaya257 = ?, biaya258 = ?, biaya259 = ?, biaya260 = ?, biaya261 = ?, biaya262 = ?, biaya263 = ?, biaya264 = ?
        where nomr = $NOMR ");
        $stmt->execute([
            $biaya1, $biaya2, $biaya3, $biaya4, $biaya5, $biaya6, $biaya7, $biaya8, $biaya9, $biaya10, $biaya11, $biaya12,
            $biaya13, $biaya14, $biaya15, $biaya16, $biaya17, $biaya18, $biaya19, $biaya20, $biaya21, $biaya22, $biaya23, $biaya24,
            $biaya25, $biaya26, $biaya27, $biaya28, $biaya29, $biaya30, $biaya31, $biaya32, $biaya33, $biaya34, $biaya35, $biaya36,
            $biaya37, $biaya38, $biaya39, $biaya40, $biaya41, $biaya42, $biaya43, $biaya44, $biaya45, $biaya46, $biaya47, $biaya48,
            $biaya49, $biaya50, $biaya51, $biaya52, $biaya53, $biaya54, $biaya55, $biaya56, $biaya57, $biaya58, $biaya59, $biaya60,
            $biaya61, $biaya62, $biaya63, $biaya64, $biaya65, $biaya66, $biaya67, $biaya68, $biaya69, $biaya70, $biaya71, $biaya72,
            $biaya73, $biaya74, $biaya75, $biaya76, $biaya77, $biaya78, $biaya79, $biaya80, $biaya81, $biaya82, $biaya83, $biaya84,
            $biaya85, $biaya86, $biaya87, $biaya88, $biaya89, $biaya90, $biaya91, $biaya92, $biaya93, $biaya94, $biaya95, $biaya96,
            $biaya97, $biaya98, $biaya99, $biaya100, $biaya101, $biaya102, $biaya103, $biaya104, $biaya105, $biaya106, $biaya107, $biaya108,
            $biaya109, $biaya110, $biaya111, $biaya112, $biaya113, $biaya114, $biaya115, $biaya116, $biaya117, $biaya118, $biaya119, $biaya120,
            $biaya121, $biaya122, $biaya123, $biaya124, $biaya125, $biaya126, $biaya127, $biaya128, $biaya129, $biaya130, $biaya131, $biaya132,
            $biaya133, $biaya134, $biaya135, $biaya136, $biaya137, $biaya138, $biaya139, $biaya140, $biaya141, $biaya142, $biaya143, $biaya144,
            $biaya145, $biaya146, $biaya147, $biaya148, $biaya149, $biaya150, $biaya151, $biaya152, $biaya153, $biaya154, $biaya155, $biaya156,
            $biaya157, $biaya158, $biaya159, $biaya160, $biaya161, $biaya162, $biaya163, $biaya164, $biaya165, $biaya166, $biaya167, $biaya168,
            $biaya169, $biaya170, $biaya171, $biaya172, $biaya173, $biaya174, $biaya175, $biaya176, $biaya177, $biaya178, $biaya179, $biaya180,
            $biaya181, $biaya182, $biaya183, $biaya184, $biaya185, $biaya186, $biaya187, $biaya188, $biaya189, $biaya190, $biaya191, $biaya192,
            $biaya193, $biaya194, $biaya195, $biaya196, $biaya197, $biaya198, $biaya199, $biaya200, $biaya201, $biaya202, $biaya203, $biaya204,
            $biaya205, $biaya206, $biaya207, $biaya208, $biaya209, $biaya210, $biaya211, $biaya212, $biaya213, $biaya214, $biaya215, $biaya216,
            $biaya217, $biaya218, $biaya219, $biaya220, $biaya221, $biaya222, $biaya223, $biaya224, $biaya225, $biaya226, $biaya227, $biaya228,
            $biaya229, $biaya230, $biaya231, $biaya232, $biaya233, $biaya234, $biaya235, $biaya236, $biaya237, $biaya238, $biaya239, $biaya240,
            $biaya241, $biaya242, $biaya243, $biaya244, $biaya245, $biaya246, $biaya247, $biaya248, $biaya249, $biaya250, $biaya251, $biaya252,
            $biaya253, $biaya254, $biaya255, $biaya256, $biaya257, $biaya258, $biaya259, $biaya260, $biaya261, $biaya262, $biaya263, $biaya264

        ]);
    } else {
        // Prepare and execute an SQL statement to insert the checkbox values
        $stmt = $pdo->prepare("INSERT INTO t_clinicalpathway
            biaya1, biaya2, biaya3, biaya4, biaya5, biaya6, biaya7, biaya8, biaya9, biaya10, biaya11, biaya12,
            biaya13, biaya14, biaya15, biaya16, biaya17, biaya18, biaya19, biaya20, biaya21, biaya22, biaya23, biaya24,
            biaya25, biaya26, biaya27, biaya28, biaya29, biaya30, biaya31, biaya32, biaya33, biaya34, biaya35, biaya36,
            biaya37, biaya38, biaya39, biaya40, biaya41, biaya42, biaya43, biaya44, biaya45, biaya46, biaya47, biaya48,
            biaya49, biaya50, biaya51, biaya52, biaya53, biaya54, biaya55, biaya56, biaya57, biaya58, biaya59, biaya60,
            biaya61, biaya62, biaya63, biaya64, biaya65, biaya66, biaya67, biaya68, biaya69, biaya70, biaya71, biaya72,
            biaya73, biaya74, biaya75, biaya76, biaya77, biaya78, biaya79, biaya80, biaya81, biaya82, biaya83, biaya84,
            biaya85, biaya86, biaya87, biaya88, biaya89, biaya90, biaya91, biaya92, biaya93, biaya94, biaya95, biaya96,
            biaya97, biaya98, biaya99, biaya100, biaya101, biaya102, biaya103, biaya104, biaya105, biaya106, biaya107, biaya108,
            biaya109, biaya110, biaya111, biaya112, biaya113, biaya114, biaya115, biaya116, biaya117, biaya118, biaya119, biaya120,
            biaya121, biaya122, biaya123, biaya124, biaya125, biaya126, biaya127, biaya128, biaya129, biaya130, biaya131, biaya132,
            biaya133, biaya134, biaya135, biaya136, biaya137, biaya138, biaya139, biaya140, biaya141, biaya142, biaya143, biaya144,
            biaya145, biaya146, biaya147, biaya148, biaya149, biaya150, biaya151, biaya152, biaya153, biaya154, biaya155, biaya156,
            biaya157, biaya158, biaya159, biaya160, biaya161, biaya162, biaya163, biaya164, biaya165, biaya166, biaya167, biaya168,
            biaya169, biaya170, biaya171, biaya172, biaya173, biaya174, biaya175, biaya176, biaya177, biaya178, biaya179, biaya180,
            biaya181, biaya182, biaya183, biaya184, biaya185, biaya186, biaya187, biaya188, biaya189, biaya190, biaya191, biaya192,
            biaya193, biaya194, biaya195, biaya196, biaya197, biaya198, biaya199, biaya200, biaya201, biaya202, biaya203, biaya204,
            biaya205, biaya206, biaya207, biaya208, biaya209, biaya210, biaya211, biaya212, biaya213, biaya214, biaya215, biaya216,
            biaya217, biaya218, biaya219, biaya220, biaya221, biaya222, biaya223, biaya224, biaya225, biaya226, biaya227, biaya228,
            biaya229, biaya230, biaya231, biaya232, biaya233, biaya234, biaya235, biaya236, biaya237, biaya238, biaya239, biaya240,
            biaya241, biaya242, biaya243, biaya244, biaya245, biaya246, biaya247, biaya248, biaya249, biaya250, biaya251, biaya252,
            biaya253, biaya254, biaya255, biaya256, biaya257, biaya258, biaya259, biaya260, biaya261, biaya262, biaya263, biaya264
            ) VALUES (
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,? ,?,
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,? ,?,
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,? ,?,
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,? ,?,
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,? ,?,
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,? ,?,
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,? ,?,
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,? ,?,
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,? ,?,
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,? ,?,
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,? ,?,
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,? ,?,
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,? ,?,
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,? ,?,
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,? ,?,
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,? ,?,
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,? ,?,
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,? ,?,
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,? ,?,
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,? ,?,
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,? ,?,
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,? ,?
                )");
        $stmt->execute([
            $biaya1, $biaya2, $biaya3, $biaya4, $biaya5, $biaya6, $biaya7, $biaya8, $biaya9, $biaya10, $biaya11, $biaya12,
            $biaya13, $biaya14, $biaya15, $biaya16, $biaya17, $biaya18, $biaya19, $biaya20, $biaya21, $biaya22, $biaya23, $biaya24,
            $biaya25, $biaya26, $biaya27, $biaya28, $biaya29, $biaya30, $biaya31, $biaya32, $biaya33, $biaya34, $biaya35, $biaya36,
            $biaya37, $biaya38, $biaya39, $biaya40, $biaya41, $biaya42, $biaya43, $biaya44, $biaya45, $biaya46, $biaya47, $biaya48,
            $biaya49, $biaya50, $biaya51, $biaya52, $biaya53, $biaya54, $biaya55, $biaya56, $biaya57, $biaya58, $biaya59, $biaya60,
            $biaya61, $biaya62, $biaya63, $biaya64, $biaya65, $biaya66, $biaya67, $biaya68, $biaya69, $biaya70, $biaya71, $biaya72,
            $biaya73, $biaya74, $biaya75, $biaya76, $biaya77, $biaya78, $biaya79, $biaya80, $biaya81, $biaya82, $biaya83, $biaya84,
            $biaya85, $biaya86, $biaya87, $biaya88, $biaya89, $biaya90, $biaya91, $biaya92, $biaya93, $biaya94, $biaya95, $biaya96,
            $biaya97, $biaya98, $biaya99, $biaya100, $biaya101, $biaya102, $biaya103, $biaya104, $biaya105, $biaya106, $biaya107, $biaya108,
            $biaya109, $biaya110, $biaya111, $biaya112, $biaya113, $biaya114, $biaya115, $biaya116, $biaya117, $biaya118, $biaya119, $biaya120,
            $biaya121, $biaya122, $biaya123, $biaya124, $biaya125, $biaya126, $biaya127, $biaya128, $biaya129, $biaya130, $biaya131, $biaya132,
            $biaya133, $biaya134, $biaya135, $biaya136, $biaya137, $biaya138, $biaya139, $biaya140, $biaya141, $biaya142, $biaya143, $biaya144,
            $biaya145, $biaya146, $biaya147, $biaya148, $biaya149, $biaya150, $biaya151, $biaya152, $biaya153, $biaya154, $biaya155, $biaya156,
            $biaya157, $biaya158, $biaya159, $biaya160, $biaya161, $biaya162, $biaya163, $biaya164, $biaya165, $biaya166, $biaya167, $biaya168,
            $biaya169, $biaya170, $biaya171, $biaya172, $biaya173, $biaya174, $biaya175, $biaya176, $biaya177, $biaya178, $biaya179, $biaya180,
            $biaya181, $biaya182, $biaya183, $biaya184, $biaya185, $biaya186, $biaya187, $biaya188, $biaya189, $biaya190, $biaya191, $biaya192,
            $biaya193, $biaya194, $biaya195, $biaya196, $biaya197, $biaya198, $biaya199, $biaya200, $biaya201, $biaya202, $biaya203, $biaya204,
            $biaya205, $biaya206, $biaya207, $biaya208, $biaya209, $biaya210, $biaya211, $biaya212, $biaya213, $biaya214, $biaya215, $biaya216,
            $biaya217, $biaya218, $biaya219, $biaya220, $biaya221, $biaya222, $biaya223, $biaya224, $biaya225, $biaya226, $biaya227, $biaya228,
            $biaya229, $biaya230, $biaya231, $biaya232, $biaya233, $biaya234, $biaya235, $biaya236, $biaya237, $biaya238, $biaya239, $biaya240,
            $biaya241, $biaya242, $biaya243, $biaya244, $biaya245, $biaya246, $biaya247, $biaya248, $biaya249, $biaya250, $biaya251, $biaya252,
            $biaya253, $biaya254, $biaya255, $biaya256, $biaya257, $biaya258, $biaya259, $biaya260, $biaya261, $biaya262, $biaya263, $biaya264
        ]);
    }

    // Redirect back to index.php
    echo "<script>alert('data berhasil disimpan');</script>";
    header("Location: detailkelas1.php?nomr=$NOMR");
    // header("Location: kelas1.php");


    exit();
} elseif (!$row) {
    // If no checkbox data is found in the database, insert default values
    $stmt = $pdo->prepare("INSERT INTO t_clinicalpathway (
        biaya1, biaya2, biaya3, biaya4, biaya5, biaya6, biaya7, biaya8, biaya9, biaya10, biaya11, biaya12,
        biaya13, biaya14, biaya15, biaya16, biaya17, biaya18, biaya19, biaya20, biaya21, biaya22, biaya23, biaya24,
            biaya25, biaya26, biaya27, biaya28, biaya29, biaya30, biaya31, biaya32, biaya33, biaya34, biaya35, biaya36,
            biaya37, biaya38, biaya39, biaya40, biaya41, biaya42, biaya43, biaya44, biaya45, biaya46, biaya47, biaya48,
            biaya49, biaya50, biaya51, biaya52, biaya53, biaya54, biaya55, biaya56, biaya57, biaya58, biaya59, biaya60,
            biaya61, biaya62, biaya63, biaya64, biaya65, biaya66, biaya67, biaya68, biaya69, biaya70, biaya71, biaya72,
            biaya73, biaya74, biaya75, biaya76, biaya77, biaya78, biaya79, biaya80, biaya81, biaya82, biaya83, biaya84,
            biaya85, biaya86, biaya87, biaya88, biaya89, biaya90, biaya91, biaya92, biaya93, biaya94, biaya95, biaya96,
            biaya97, biaya98, biaya99, biaya100, biaya101, biaya102, biaya103, biaya104, biaya105, biaya106, biaya107, biaya108,
            biaya109, biaya110, biaya111, biaya112, biaya113, biaya114, biaya115, biaya116, biaya117, biaya118, biaya119, biaya120,
            biaya121, biaya122, biaya123, biaya124, biaya125, biaya126, biaya127, biaya128, biaya129, biaya130, biaya131, biaya132,
            biaya133, biaya134, biaya135, biaya136, biaya137, biaya138, biaya139, biaya140, biaya141, biaya142, biaya143, biaya144,
            biaya145, biaya146, biaya147, biaya148, biaya149, biaya150, biaya151, biaya152, biaya153, biaya154, biaya155, biaya156,
            biaya157, biaya158, biaya159, biaya160, biaya161, biaya162, biaya163, biaya164, biaya165, biaya166, biaya167, biaya168,
            biaya169, biaya170, biaya171, biaya172, biaya173, biaya174, biaya175, biaya176, biaya177, biaya178, biaya179, biaya180,
            biaya181, biaya182, biaya183, biaya184, biaya185, biaya186, biaya187, biaya188, biaya189, biaya190, biaya191, biaya192,
            biaya193, biaya194, biaya195, biaya196, biaya197, biaya198, biaya199, biaya200, biaya201, biaya202, biaya203, biaya204,
            biaya205, biaya206, biaya207, biaya208, biaya209, biaya210, biaya211, biaya212, biaya213, biaya214, biaya215, biaya216,
            biaya217, biaya218, biaya219, biaya220, biaya221, biaya222, biaya223, biaya224, biaya225, biaya226, biaya227, biaya228,
            biaya229, biaya230, biaya231, biaya232, biaya233, biaya234, biaya235, biaya236, biaya237, biaya238, biaya239, biaya240,
            biaya241, biaya242, biaya243, biaya244, biaya245, biaya246, biaya247, biaya248, biaya249, biaya250, biaya251, biaya252,
            biaya253, biaya254, biaya255, biaya256, biaya257, biaya258, biaya259, biaya260, biaya261, biaya262, biaya263, biaya264
        ) VALUES (
            0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
            0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
            0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
            0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
            0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
            0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
            0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
            0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
            0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
            0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
            0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
            0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
            0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
            0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
            0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
            0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
            0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
            0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
            0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
            0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
            0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
            0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0
            )");
    $stmt->execute();
}


?>

<!DOCTYPE html>
<html lang="en">

<script>
    function formatRupiah(angka) {
        var bilangan = angka.toString().replace(/[^,\d]/g, '');
        var split = bilangan.split(',');
        var sisa = split[0].length % 3;
        var rupiah = split[0].substr(0, sisa);
        var ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
        return 'Rp' + rupiah;
    }

    function unformat(value) {
        // Remove non-numeric characters from the value
        var unformattedValue = value.replace(/[^\d.-]/g, '');

        // Convert the unformatted value to a numeric value
        var numericValue = parseFloat(unformattedValue);

        return numericValue;
    }


    function hitungTotal() {
        var checkboxes = document.getElementsByTagName("input");

        var total = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya1" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total += biaya;
            }
            if (checkboxes[i].name === "biaya2" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total += biaya;
            }
            if (checkboxes[i].name === "biaya3" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total += biaya;
            }
            if (checkboxes[i].name === "biaya4" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total += biaya;
            }
            if (checkboxes[i].name === "biaya5" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total += biaya;
            }
            if (checkboxes[i].name === "biaya6" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total += biaya;
            }
        }

        var totalRupiah = formatRupiah(total);
        document.getElementById("total").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal2() {
        var checkboxes = document.getElementsByTagName("input");

        var total2 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya7" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total2 += biaya;
            }
            if (checkboxes[i].name === "biaya8" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total2 += biaya;
            }
            if (checkboxes[i].name === "biaya9" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total2 += biaya;
            }
            if (checkboxes[i].name === "biaya10" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total2 += biaya;
            }
            if (checkboxes[i].name === "biaya11" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total2 += biaya;
            }
            if (checkboxes[i].name === "biaya12" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total2 += biaya;
            }
        }

        var totalRupiah = formatRupiah(total2);
        document.getElementById("total2").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal3() {
        var checkboxes = document.getElementsByTagName("input");

        var total3 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya13" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total3 += biaya;
            }
            if (checkboxes[i].name === "biaya14" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total3 += biaya;
            }
            if (checkboxes[i].name === "biaya15" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total3 += biaya;
            }
            if (checkboxes[i].name === "biaya16" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total3 += biaya;
            }
            if (checkboxes[i].name === "biaya17" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total3 += biaya;
            }
            if (checkboxes[i].name === "biaya18" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total3 += biaya;
            }
        }

        var totalRupiah = formatRupiah(total3);
        document.getElementById("total3").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal4() {
        var checkboxes = document.getElementsByTagName("input");

        var total4 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya19" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total4 += biaya;
            }
            if (checkboxes[i].name === "biaya20" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total4 += biaya;
            }
            if (checkboxes[i].name === "biaya21" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total4 += biaya;
            }
            if (checkboxes[i].name === "biaya22" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total4 += biaya;
            }
            if (checkboxes[i].name === "biaya23" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total4 += biaya;
            }
            if (checkboxes[i].name === "biaya24" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total4 += biaya;
            }
        }

        var totalRupiah = formatRupiah(total4);
        document.getElementById("total4").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal5() {
        var checkboxes = document.getElementsByTagName("input");

        var total5 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya25" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total5 += biaya;
            }
            if (checkboxes[i].name === "biaya26" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total5 += biaya;
            }
            if (checkboxes[i].name === "biaya27" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total5 += biaya;
            }
            if (checkboxes[i].name === "biaya28" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total5 += biaya;
            }
            if (checkboxes[i].name === "biaya29" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total5 += biaya;
            }
            if (checkboxes[i].name === "biaya30" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total5 += biaya;
            }
        }

        var totalRupiah = formatRupiah(total5);
        document.getElementById("total5").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal6() {
        var checkboxes = document.getElementsByTagName("input");

        var total6 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya31" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total6 += biaya;
            }
            if (checkboxes[i].name === "biaya32" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total6 += biaya;
            }
            if (checkboxes[i].name === "biaya33" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total6 += biaya;
            }
            if (checkboxes[i].name === "biaya34" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total6 += biaya;
            }
            if (checkboxes[i].name === "biaya35" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total6 += biaya;
            }
            if (checkboxes[i].name === "biaya36" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total6 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total6);
        document.getElementById("total6").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal7() {
        var checkboxes = document.getElementsByTagName("input");

        var total7 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya37" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total7 += biaya;
            }
            if (checkboxes[i].name === "biaya38" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total7 += biaya;
            }
            if (checkboxes[i].name === "biaya39" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total7 += biaya;
            }
            if (checkboxes[i].name === "biaya40" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total7 += biaya;
            }
            if (checkboxes[i].name === "biaya41" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total7 += biaya;
            }
            if (checkboxes[i].name === "biaya42" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total7 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total7);
        document.getElementById("total7").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal8() {
        var checkboxes = document.getElementsByTagName("input");

        var total8 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya43" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total8 += biaya;
            }
            if (checkboxes[i].name === "biaya44" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total8 += biaya;
            }
            if (checkboxes[i].name === "biaya45" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total8 += biaya;
            }
            if (checkboxes[i].name === "biaya46" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total8 += biaya;
            }
            if (checkboxes[i].name === "biaya47" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total8 += biaya;
            }
            if (checkboxes[i].name === "biaya48" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total8 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total8);
        document.getElementById("total8").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal9() {
        var checkboxes = document.getElementsByTagName("input");

        var total9 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya49" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total9 += biaya;
            }
            if (checkboxes[i].name === "biaya50" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total9 += biaya;
            }
            if (checkboxes[i].name === "biaya51" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total9 += biaya;
            }
            if (checkboxes[i].name === "biaya52" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total9 += biaya;
            }
            if (checkboxes[i].name === "biaya53" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total9 += biaya;
            }
            if (checkboxes[i].name === "biaya54" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total9 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total9);
        document.getElementById("total9").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal10() {
        var checkboxes = document.getElementsByTagName("input");

        var total10 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya55" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total10 += biaya;
            }
            if (checkboxes[i].name === "biaya56" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total10 += biaya;
            }
            if (checkboxes[i].name === "biaya57" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total10 += biaya;
            }
            if (checkboxes[i].name === "biaya58" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total10 += biaya;
            }
            if (checkboxes[i].name === "biaya59" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total10 += biaya;
            }
            if (checkboxes[i].name === "biaya60" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total10 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total10);
        document.getElementById("total10").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal11() {
        var checkboxes = document.getElementsByTagName("input");

        var total11 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya61" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total11 += biaya;
            }
            if (checkboxes[i].name === "biaya62" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total11 += biaya;
            }
            if (checkboxes[i].name === "biaya63" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total11 += biaya;
            }
            if (checkboxes[i].name === "biaya64" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total11 += biaya;
            }
            if (checkboxes[i].name === "biaya65" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total11 += biaya;
            }
            if (checkboxes[i].name === "biaya66" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total11 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total11);
        document.getElementById("total11").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal12() {
        var checkboxes = document.getElementsByTagName("input");

        var total12 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya67" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total12 += biaya;
            }
            if (checkboxes[i].name === "biaya68" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total12 += biaya;
            }
            if (checkboxes[i].name === "biaya69" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total12 += biaya;
            }
            if (checkboxes[i].name === "biaya70" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total12 += biaya;
            }
            if (checkboxes[i].name === "biaya71" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total12 += biaya;
            }
            if (checkboxes[i].name === "biaya72" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total12 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total12);
        document.getElementById("total12").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal13() {
        var checkboxes = document.getElementsByTagName("input");

        var total13 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya73" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total13 += biaya;
            }
            if (checkboxes[i].name === "biaya74" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total13 += biaya;
            }
            if (checkboxes[i].name === "biaya75" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total13 += biaya;
            }
            if (checkboxes[i].name === "biaya76" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total13 += biaya;
            }
            if (checkboxes[i].name === "biaya77" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total13 += biaya;
            }
            if (checkboxes[i].name === "biaya78" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total13 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total13);
        document.getElementById("total13").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal14() {
        var checkboxes = document.getElementsByTagName("input");

        var total14 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya79" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total14 += biaya;
            }
            if (checkboxes[i].name === "biaya80" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total14 += biaya;
            }
            if (checkboxes[i].name === "biaya81" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total14 += biaya;
            }
            if (checkboxes[i].name === "biaya82" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total14 += biaya;
            }
            if (checkboxes[i].name === "biaya83" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total14 += biaya;
            }
            if (checkboxes[i].name === "biaya84" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total14 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total14);
        document.getElementById("total14").innerHTML = "" + totalRupiah;

        calculateSum();
    }


    function hitungTotal15() {
        var checkboxes = document.getElementsByTagName("input");

        var total15 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya85" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total15 += biaya;
            }
            if (checkboxes[i].name === "biaya86" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total15 += biaya;
            }
            if (checkboxes[i].name === "biaya87" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total15 += biaya;
            }
            if (checkboxes[i].name === "biaya88" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total15 += biaya;
            }
            if (checkboxes[i].name === "biaya89" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total15 += biaya;
            }
            if (checkboxes[i].name === "biaya90" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total15 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total15);
        document.getElementById("total15").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal16() {
        var checkboxes = document.getElementsByTagName("input");

        var total16 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya91" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total16 += biaya;
            }
            if (checkboxes[i].name === "biaya92" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total16 += biaya;
            }
            if (checkboxes[i].name === "biaya93" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total16 += biaya;
            }
            if (checkboxes[i].name === "biaya94" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total16 += biaya;
            }
            if (checkboxes[i].name === "biaya95" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total16 += biaya;
            }
            if (checkboxes[i].name === "biaya96" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total16 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total16);
        document.getElementById("total16").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal17() {
        var checkboxes = document.getElementsByTagName("input");

        var total17 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya97" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total17 += biaya;
            }
            if (checkboxes[i].name === "biaya98" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total17 += biaya;
            }
            if (checkboxes[i].name === "biaya99" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total17 += biaya;
            }
            if (checkboxes[i].name === "biaya100" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total17 += biaya;
            }
            if (checkboxes[i].name === "biaya101" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total17 += biaya;
            }
            if (checkboxes[i].name === "biaya102" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total17 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total17);
        document.getElementById("total17").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal18() {
        var checkboxes = document.getElementsByTagName("input");

        var total18 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya103" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total18 += biaya;
            }
            if (checkboxes[i].name === "biaya104" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total18 += biaya;
            }
            if (checkboxes[i].name === "biaya105" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total18 += biaya;
            }
            if (checkboxes[i].name === "biaya106" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total18 += biaya;
            }
            if (checkboxes[i].name === "biaya107" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total18 += biaya;
            }
            if (checkboxes[i].name === "biaya108" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total18 += biaya;
            }
            if (checkboxes[i].name === "biaya109" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total18 += biaya;
            }
            if (checkboxes[i].name === "biaya110" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total18 += biaya;
            }
            if (checkboxes[i].name === "biaya111" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total18 += biaya;
            }
            if (checkboxes[i].name === "biaya112" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total18 += biaya;
            }
            if (checkboxes[i].name === "biaya113" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total18 += biaya;
            }
            if (checkboxes[i].name === "biaya114" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total18 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total18);
        document.getElementById("total18").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal19() {
        var checkboxes = document.getElementsByTagName("input");

        var total19 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya115" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total19 += biaya;
            }
            if (checkboxes[i].name === "biaya116" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total19 += biaya;
            }
            if (checkboxes[i].name === "biaya117" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total19 += biaya;
            }
            if (checkboxes[i].name === "biaya118" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total19 += biaya;
            }
            if (checkboxes[i].name === "biaya119" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total19 += biaya;
            }
            if (checkboxes[i].name === "biaya120" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total19 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total19);
        document.getElementById("total19").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal20() {
        var checkboxes = document.getElementsByTagName("input");

        var total20 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya121" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total20 += biaya;
            }
            if (checkboxes[i].name === "biaya122" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total20 += biaya;
            }
            if (checkboxes[i].name === "biaya123" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total20 += biaya;
            }
            if (checkboxes[i].name === "biaya124" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total20 += biaya;
            }
            if (checkboxes[i].name === "biaya125" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total20 += biaya;
            }
            if (checkboxes[i].name === "biaya126" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total20 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total20);
        document.getElementById("total20").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal21() {
        var checkboxes = document.getElementsByTagName("input");

        var total21 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya127" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total21 += biaya;
            }
            if (checkboxes[i].name === "biaya128" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total21 += biaya;
            }
            if (checkboxes[i].name === "biaya129" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total21 += biaya;
            }
            if (checkboxes[i].name === "biaya130" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total21 += biaya;
            }
            if (checkboxes[i].name === "biaya131" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total21 += biaya;
            }
            if (checkboxes[i].name === "biaya132" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total21 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total21);
        document.getElementById("total21").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal22() {
        var checkboxes = document.getElementsByTagName("input");

        var total22 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya133" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total22 += biaya;
            }
            if (checkboxes[i].name === "biaya134" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total22 += biaya;
            }
            if (checkboxes[i].name === "biaya135" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total22 += biaya;
            }
            if (checkboxes[i].name === "biaya136" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total22 += biaya;
            }
            if (checkboxes[i].name === "biaya137" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total22 += biaya;
            }
            if (checkboxes[i].name === "biaya138" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total22 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total22);
        document.getElementById("total22").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal23() {
        var checkboxes = document.getElementsByTagName("input");

        var total23 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya139" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total23 += biaya;
            }
            if (checkboxes[i].name === "biaya140" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total23 += biaya;
            }
            if (checkboxes[i].name === "biaya141" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total23 += biaya;
            }
            if (checkboxes[i].name === "biaya142" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total23 += biaya;
            }
            if (checkboxes[i].name === "biaya143" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total23 += biaya;
            }
            if (checkboxes[i].name === "biaya144" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total23 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total23);
        document.getElementById("total23").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal24() {
        var checkboxes = document.getElementsByTagName("input");

        var total24 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya145" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total24 += biaya;
            }
            if (checkboxes[i].name === "biaya146" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total24 += biaya;
            }
            if (checkboxes[i].name === "biaya147" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total24 += biaya;
            }
            if (checkboxes[i].name === "biaya148" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total24 += biaya;
            }
            if (checkboxes[i].name === "biaya149" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total24 += biaya;
            }
            if (checkboxes[i].name === "biaya150" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total24 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total24);
        document.getElementById("total24").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal25() {
        var checkboxes = document.getElementsByTagName("input");

        var total25 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya151" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total25 += biaya;
            }
            if (checkboxes[i].name === "biaya152" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total25 += biaya;
            }
            if (checkboxes[i].name === "biaya153" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total25 += biaya;
            }
            if (checkboxes[i].name === "biaya154" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total25 += biaya;
            }
            if (checkboxes[i].name === "biaya155" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total25 += biaya;
            }
            if (checkboxes[i].name === "biaya156" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total25 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total25);
        document.getElementById("total25").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal26() {
        var checkboxes = document.getElementsByTagName("input");

        var total26 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya157" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total26 += biaya;
            }
            if (checkboxes[i].name === "biaya158" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total26 += biaya;
            }
            if (checkboxes[i].name === "biaya159" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total26 += biaya;
            }
            if (checkboxes[i].name === "biaya160" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total26 += biaya;
            }
            if (checkboxes[i].name === "biaya161" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total26 += biaya;
            }
            if (checkboxes[i].name === "biaya162" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total26 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total26);
        document.getElementById("total26").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal27() {
        var checkboxes = document.getElementsByTagName("input");

        var total27 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya163" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total27 += biaya;
            }
            if (checkboxes[i].name === "biaya164" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total27 += biaya;
            }
            if (checkboxes[i].name === "biaya165" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total27 += biaya;
            }
            if (checkboxes[i].name === "biaya166" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total27 += biaya;
            }
            if (checkboxes[i].name === "biaya167" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total27 += biaya;
            }
            if (checkboxes[i].name === "biaya168" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total27 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total27);
        document.getElementById("total27").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal28() {
        var checkboxes = document.getElementsByTagName("input");

        var total28 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya169" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total28 += biaya;
            }
            if (checkboxes[i].name === "biaya170" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total28 += biaya;
            }
            if (checkboxes[i].name === "biaya171" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total28 += biaya;
            }
            if (checkboxes[i].name === "biaya172" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total28 += biaya;
            }
            if (checkboxes[i].name === "biaya173" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total28 += biaya;
            }
            if (checkboxes[i].name === "biaya174" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total28 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total28);
        document.getElementById("total28").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal29() {
        var checkboxes = document.getElementsByTagName("input");

        var total29 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya175" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total29 += biaya;
            }
            if (checkboxes[i].name === "biaya176" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total29 += biaya;
            }
            if (checkboxes[i].name === "biaya177" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total29 += biaya;
            }
            if (checkboxes[i].name === "biaya178" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total29 += biaya;
            }
            if (checkboxes[i].name === "biaya179" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total29 += biaya;
            }
            if (checkboxes[i].name === "biaya180" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total29 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total29);
        document.getElementById("total29").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal30() {
        var checkboxes = document.getElementsByTagName("input");

        var total30 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya181" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total30 += biaya;
            }
            if (checkboxes[i].name === "biaya182" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total30 += biaya;
            }
            if (checkboxes[i].name === "biaya183" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total30 += biaya;
            }
            if (checkboxes[i].name === "biaya184" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total30 += biaya;
            }
            if (checkboxes[i].name === "biaya185" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total30 += biaya;
            }
            if (checkboxes[i].name === "biaya186" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total30 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total30);
        document.getElementById("total30").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal31() {
        var checkboxes = document.getElementsByTagName("input");

        var total31 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya187" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total31 += biaya;
            }
            if (checkboxes[i].name === "biaya188" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total31 += biaya;
            }
            if (checkboxes[i].name === "biaya189" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total31 += biaya;
            }
            if (checkboxes[i].name === "biaya190" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total31 += biaya;
            }
            if (checkboxes[i].name === "biaya191" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total31 += biaya;
            }
            if (checkboxes[i].name === "biaya192" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total31 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total31);
        document.getElementById("total31").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal32() {
        var checkboxes = document.getElementsByTagName("input");

        var total32 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya193" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total32 += biaya;
            }
            if (checkboxes[i].name === "biaya194" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total32 += biaya;
            }
            if (checkboxes[i].name === "biaya195" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total32 += biaya;
            }
            if (checkboxes[i].name === "biaya196" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total32 += biaya;
            }
            if (checkboxes[i].name === "biaya197" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total32 += biaya;
            }
            if (checkboxes[i].name === "biaya198" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total32 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total32);
        document.getElementById("total32").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal33() {
        var checkboxes = document.getElementsByTagName("input");

        var total33 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya199" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total33 += biaya;
            }
            if (checkboxes[i].name === "biaya200" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total33 += biaya;
            }
            if (checkboxes[i].name === "biaya201" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total33 += biaya;
            }
            if (checkboxes[i].name === "biaya202" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total33 += biaya;
            }
            if (checkboxes[i].name === "biaya203" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total33 += biaya;
            }
            if (checkboxes[i].name === "biaya204" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total33 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total33);
        document.getElementById("total33").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal34() {
        var checkboxes = document.getElementsByTagName("input");

        var total34 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya205" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total34 += biaya;
            }
            if (checkboxes[i].name === "biaya206" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total34 += biaya;
            }
            if (checkboxes[i].name === "biaya207" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total34 += biaya;
            }
            if (checkboxes[i].name === "biaya208" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total34 += biaya;
            }
            if (checkboxes[i].name === "biaya209" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total34 += biaya;
            }
            if (checkboxes[i].name === "biaya210" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total34 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total34);
        document.getElementById("total34").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal35() {
        var checkboxes = document.getElementsByTagName("input");

        var total35 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya211" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total35 += biaya;
            }
            if (checkboxes[i].name === "biaya212" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total35 += biaya;
            }
            if (checkboxes[i].name === "biaya213" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total35 += biaya;
            }
            if (checkboxes[i].name === "biaya214" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total35 += biaya;
            }
            if (checkboxes[i].name === "biaya215" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total35 += biaya;
            }
            if (checkboxes[i].name === "biaya216" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total35 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total35);
        document.getElementById("total35").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal36() {
        var checkboxes = document.getElementsByTagName("input");

        var total36 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya217" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total36 += biaya;
            }
            if (checkboxes[i].name === "biaya218" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total36 += biaya;
            }
            if (checkboxes[i].name === "biaya219" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total36 += biaya;
            }
            if (checkboxes[i].name === "biaya220" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total36 += biaya;
            }
            if (checkboxes[i].name === "biaya221" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total36 += biaya;
            }
            if (checkboxes[i].name === "biaya222" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total36 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total36);
        document.getElementById("total36").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal37() {
        var checkboxes = document.getElementsByTagName("input");

        var total37 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya223" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total37 += biaya;
            }
            if (checkboxes[i].name === "biaya224" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total37 += biaya;
            }
            if (checkboxes[i].name === "biaya225" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total37 += biaya;
            }
            if (checkboxes[i].name === "biaya226" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total37 += biaya;
            }
            if (checkboxes[i].name === "biaya227" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total37 += biaya;
            }
            if (checkboxes[i].name === "biaya228" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total37 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total37);
        document.getElementById("total37").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal38() {
        var checkboxes = document.getElementsByTagName("input");

        var total38 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya229" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total38 += biaya;
            }
            if (checkboxes[i].name === "biaya230" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total38 += biaya;
            }
            if (checkboxes[i].name === "biaya231" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total38 += biaya;
            }
            if (checkboxes[i].name === "biaya232" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total38 += biaya;
            }
            if (checkboxes[i].name === "biaya233" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total38 += biaya;
            }
            if (checkboxes[i].name === "biaya234" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total38 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total38);
        document.getElementById("total38").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal39() {
        var checkboxes = document.getElementsByTagName("input");

        var total39 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya235" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total39 += biaya;
            }
            if (checkboxes[i].name === "biaya236" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total39 += biaya;
            }
            if (checkboxes[i].name === "biaya237" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total39 += biaya;
            }
            if (checkboxes[i].name === "biaya238" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total39 += biaya;
            }
            if (checkboxes[i].name === "biaya239" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total39 += biaya;
            }
            if (checkboxes[i].name === "biaya240" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total39 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total39);
        document.getElementById("total39").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal40() {
        var checkboxes = document.getElementsByTagName("input");

        var total40 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya241" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total40 += biaya;
            }
            if (checkboxes[i].name === "biaya242" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total40 += biaya;
            }
            if (checkboxes[i].name === "biaya243" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total40 += biaya;
            }
            if (checkboxes[i].name === "biaya244" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total40 += biaya;
            }
            if (checkboxes[i].name === "biaya245" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total40 += biaya;
            }
            if (checkboxes[i].name === "biaya246" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total40 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total40);
        document.getElementById("total40").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal41() {
        var checkboxes = document.getElementsByTagName("input");

        var total41 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya247" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total41 += biaya;
            }
            if (checkboxes[i].name === "biaya248" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total41 += biaya;
            }
            if (checkboxes[i].name === "biaya249" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total41 += biaya;
            }
            if (checkboxes[i].name === "biaya250" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total41 += biaya;
            }
            if (checkboxes[i].name === "biaya251" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total41 += biaya;
            }
            if (checkboxes[i].name === "biaya252" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total41 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total41);
        document.getElementById("total41").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal42() {
        var checkboxes = document.getElementsByTagName("input");

        var total42 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya253" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total42 += biaya;
            }
            if (checkboxes[i].name === "biaya254" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total42 += biaya;
            }
            if (checkboxes[i].name === "biaya255" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total42 += biaya;
            }
            if (checkboxes[i].name === "biaya256" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total42 += biaya;
            }
            if (checkboxes[i].name === "biaya257" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total42 += biaya;
            }
            if (checkboxes[i].name === "biaya258" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total42 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total42);
        document.getElementById("total42").innerHTML = "" + totalRupiah;

        calculateSum();
    }

    function hitungTotal43() {
        var checkboxes = document.getElementsByTagName("input");

        var total43 = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].name === "biaya259" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total43 += biaya;
            }
            if (checkboxes[i].name === "biaya260" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total43 += biaya;
            }
            if (checkboxes[i].name === "biaya261" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total43 += biaya;
            }
            if (checkboxes[i].name === "biaya262" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total43 += biaya;
            }
            if (checkboxes[i].name === "biaya263" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total43 += biaya;
            }
            if (checkboxes[i].name === "biaya264" && checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                total43 += biaya;
            }


        }

        var totalRupiah = formatRupiah(total43);
        document.getElementById("total43").innerHTML = "" + totalRupiah;

        calculateSum();
    }


    function calculateSum() {
        var checkboxes = document.getElementsByTagName("input");
        var totalSum = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                var biaya = parseInt(checkboxes[i].value);
                totalSum += biaya;
            }
        }

        totalSum -= 2; // Subtract 2 from totalSum //sementara hasil -2 xixixi


        var totalRupiah = formatRupiah(totalSum);

        document.getElementById("totalSum").innerHTML = "" + totalRupiah;

        // if (totalSum >= 5000000) {
        //     alert("Total sum has reached 5000000!");
        // }
    }


    // $(document).ready(function() {
    //   $('#customCheckbox1a11').change(function() {
    //     var isChecked = $(this).is(':checked');

    //     $.ajax({
    //       url: 'save_checkbox_state.php',
    //       method: 'POST',
    //       data: { isChecked: isChecked },
    //       success: function(response) {
    //         // Optional success callback
    //       }
    //     });
    //   });
    // });

    // $(window).on('load', function() {
    //   $.ajax({
    //     url: 'get_checkbox_state.php',
    //     method: 'GET',
    //     success: function(response) {
    //       var isChecked = response === 'true';
    //       $('#customCheckbox1a11').prop('checked', isChecked);
    //     }
    //   });
    // });
</script>





<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SINAPS</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#customCheckbox1a11').change(function() {
                var isChecked = $(this).is(':checked');

                $.ajax({
                    url: 'save_checkbox_state.php',
                    method: 'POST',
                    data: {
                        isChecked: isChecked
                    },
                    success: function(response) {
                        // Optional success callback
                    }
                });
            });
        });

        $(window).on('load', function() {
            $.ajax({
                url: 'get_checkbox_state.php',
                method: 'GET',
                success: function(response) {
                    var isChecked = response === 'true';
                    $('#customCheckbox1a11').prop('checked', isChecked);
                }
            });
        });
    </script>

</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="logout.php" class="nav-link">Logout</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="assets/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="assets/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="assets/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="assets/index3.html" class="brand-link">
                <img src="img/Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SINAPS</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">User</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="assets/index.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="assets/index2.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="assets/index3.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v3</p>
                                    </a>
                                </li>
                            </ul>
                        </li> -->

                        <!-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Widgets
                                    <span class="right badge badge-danger">New</span>
                                </p>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a href="kelas1.php" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Pasien Kelas I

                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="kelas2.php" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Pasien Kelas II

                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="kelas3.php" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Pasien Kelas III

                                </p>
                            </a>
                        </li>







                    </ul>

                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>DataTables</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">DataTables</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Data Pasien</h3>

                                    <div class="card-tools">

                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;">Nama Pasien</th>
                                                <th style="text-align:center;">No. RM</th>
                                                <th style="text-align:center;">Tgl. Masuk</th>
                                                <th style="text-align:center;">Tgl. Keluar</th>
                                                <th style="text-align:center;">DX Medis Utama</th>
                                                <th style="text-align:center;">DX Medis Sekunder</th>
                                                <th style="text-align:center;">ICD 10</th>
                                                <th style="text-align:center;">ICD 9</th>
                                                <th style="text-align:center;">Kelas BPJS</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $nomr = $_GET["nomr"];
                                            // Assuming you have established a database connection
                                            $sql = mysqli_query($conn, "SELECT * FROM simrs2012.m_pasien a
                                            left join simrs2012.t_admission b
                                            ON simrs2012.a.NOMR = simrs2012.b.NOMR
                                            left join simrs2012.t_Sep c ON simrs2012.a.NOMR = simrs2012.c.NOMR
                                            where simrs2012.a.NOMR='$nomr'");
                                            $result = mysqli_fetch_array($sql);

                                            $nama = $result["NAMA"];
                                            $nomr = $result["NOMR"];
                                            $alamat = $result["ALAMAT"];
                                            $tanggalmasuk = $result["masukrs"];
                                            $tanggalkeluar = $result["keluarrs"];
                                            $dxmedis = $result["kode_diagnosaawal"]

                                            // Check if there are any rows returned from the query
                                            // print_r($result);
                                            ?>
                                            <tr>
                                                <td style="text-align:center;"><?php echo $nama; ?></td>
                                                <td style="text-align:center;"><?php echo $nomr; ?></td>
                                                <td style="text-align:center;"><?php echo $tanggalmasuk; ?></td>
                                                <td style="text-align:center;"><?php echo $tanggalkeluar; ?></td>
                                                <td style="text-align:center;">
                                                    <select class="form-control" id="selectOption">
                                                        <option>Pilih DX Medis Utama</option>
                                                        <option id="cerebral-infarction">cerebral infarction (i63.9)</option>
                                                        <option id="intracerebral-haemorrhage">intracerebral haemorrhage(I61.9)</option>
                                                    </select>

                                                </td>

                                                <td style="text-align:center;">
                                                    <select class="form-control" id="selectOption2">
                                                        <option>Pilih DX Medis Sekunder</option>
                                                        <option id="hemiplegi">hemiplegi(G81)</option>
                                                        <option id="congestive-heart-failure">Congestive heart failure (I50.0)</option>
                                                    </select></th>
                                                </td>
                                                <td style="text-align:center;"><?php echo $dxmedis; ?></td>
                                                <td style="text-align:center;">-</td>
                                                <td style="text-align:center;">1</td>

                                            </tr>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>

                            <div class="card">

                                <!-- <div class="card-header">
                                    
                                    <h3 class="card-title">Detail Data Pasien</h3>
                                </div> -->
                                <!-- <form method="POST" action="detailkelas1.php?"> -->
                                <form method="POST">

                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered">

                                            <thead>
                                                <tr>
                                                    <th rowspan=" 2">No.</th>
                                                    <th rowspan="2">Kegiatan</th>
                                                    <th rowspan="2">Uraian Kegiatan</th>
                                                    <th colspan="6" class="text-center">Hari</th>
                                                    <!-- <th rowspan="2">Keterangan</th> -->
                                                    <th rowspan="2">Biaya</th>
                                                </tr>

                                                <tr>
                                                    <th>1</th>
                                                    <th>2</th>
                                                    <th>3</th>
                                                    <th>4</th>
                                                    <th>5</th>
                                                    <th>6</th>
                                                </tr>
                                            </thead>



                                            <tbody>
                                                <!-- Nomor 1 -->
                                                <input type="hidden" name="NOMR" value="<?php echo $NOMR; ?>">
                                                <tr>
                                                    <td rowspan="5">1</td>
                                                    <td rowspan="2">a. Asesment awal Medis</td>
                                                    <td>Dokter IGD</td>


                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya1 == 15000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1a11" name="biaya1" value="15000" onchange="hitungTotal()" checked>
                                                                <label for="customCheckbox1a11" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1a11" name="biaya1" value="15000" onchange="hitungTotal()">
                                                                <label for="customCheckbox1a11" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya2 == 15000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1a12" name="biaya2" value="15000" onchange="hitungTotal()" checked>
                                                                <label for="customCheckbox1a12" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1a12" name="biaya2" value="15000" onchange="hitungTotal()">
                                                                <label for="customCheckbox1a12" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya3 == 15000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1a13" name="biaya3" value="15000" onchange="hitungTotal()" checked>
                                                                <label for="customCheckbox1a13" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1a13" name="biaya3" value="15000" onchange="hitungTotal()">
                                                                <label for="customCheckbox1a13" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya4 == 15000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1a14" name="biaya4" value="15000" onchange="hitungTotal()" checked>
                                                                <label for="customCheckbox1a14" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1a14" name="biaya4" value="15000" onchange="hitungTotal()">
                                                                <label for="customCheckbox1a14" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya5 == 15000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1a15" name="biaya5" value="15000" onchange="hitungTotal()" checked>
                                                                <label for="customCheckbox1a15" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1a15" name="biaya5" value="15000" onchange="hitungTotal()">
                                                                <label for="customCheckbox1a15" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya6 == 15000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1a16" name="biaya6" value="15000" onchange="hitungTotal()" checked>
                                                                <label for="customCheckbox1a16" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1a16" name="biaya6" value="15000" onchange="hitungTotal()">
                                                                <label for="customCheckbox1a16" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->



                                                    <td>
                                                        <p id="total">Rp-</p>
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>DPJP</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya7 == 20000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1a21" name="biaya7" value="20000" onchange="hitungTotal2()" checked>
                                                                <label for="customCheckbox1a21" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1a21" name="biaya7" value="20000" onchange="hitungTotal2()">
                                                                <label for="customCheckbox1a21" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya8 == 20000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1a22" name="biaya8" value="20000" onchange="hitungTotal2()" checked>
                                                                <label for="customCheckbox1a22" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1a22" name="biaya8" value="20000" onchange="hitungTotal2()">
                                                                <label for="customCheckbox1a22" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya9 == 20000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1a23" name="biaya9" value="20000" onchange="hitungTotal2()" checked>
                                                                <label for="customCheckbox1a23" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1a23" name="biaya9" value="20000" onchange="hitungTotal2()">
                                                                <label for="customCheckbox1a23" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya10 == 20000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1a24" name="biaya10" value="20000" onchange="hitungTotal2()" checked>
                                                                <label for="customCheckbox1a24" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1a24" name="biaya10" value="20000" onchange="hitungTotal2()">
                                                                <label for="customCheckbox1a24" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya11 == 20000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1a25" name="biaya11" value="20000" onchange="hitungTotal2()" checked>
                                                                <label for="customCheckbox1a25" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1a25" name="biaya11" value="20000" onchange="hitungTotal2()">
                                                                <label for="customCheckbox1a25" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya12 == 20000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1a26" name="biaya12" value="20000" onchange="hitungTotal2()" checked>
                                                                <label for="customCheckbox1a26" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1a26" name="biaya12" value="20000" onchange="hitungTotal2()">
                                                                <label for="customCheckbox1a26" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total2">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td rowspan="3">b. Asesment awal Keperawatan</td>
                                                    <td>IGD / Poli</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya13 == 5000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1b11" name="biaya13" value="5000" onchange="hitungTotal3()" checked>
                                                                <label for="customCheckbox1b11" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1b11" name="biaya13" value="5000" onchange="hitungTotal3()">
                                                                <label for="customCheckbox1b11" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya14 == 5000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1b12" name="biaya14" value="5000" onchange="hitungTotal3()" checked>
                                                                <label for="customCheckbox1b12" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1b12" name="biaya14" value="5000" onchange="hitungTotal3()">
                                                                <label for="customCheckbox1b12" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya15 == 5000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1b13" name="biaya15" value="5000" onchange="hitungTotal3()" checked>
                                                                <label for="customCheckbox1b13" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1b13" name="biaya15" value="5000" onchange="hitungTotal3()">
                                                                <label for="customCheckbox1b13" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya16 == 5000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1b14" name="biaya16" value="5000" onchange="hitungTotal3()" checked>
                                                                <label for="customCheckbox1b14" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1b14" name="biaya16" value="5000" onchange="hitungTotal3()">
                                                                <label for="customCheckbox1b14" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya17 == 5000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1b15" name="biaya17" value="5000" onchange="hitungTotal3()" checked>
                                                                <label for="customCheckbox1b15" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1b15" name="biaya17" value="5000" onchange="hitungTotal3()">
                                                                <label for="customCheckbox1b15" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya18 == 5000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1b16" name="biaya18" value="5000" onchange="hitungTotal3()" checked>
                                                                <label for="customCheckbox1b16" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1b16" name="biaya18" value="5000" onchange="hitungTotal3()">
                                                                <label for="customCheckbox1b16" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total3">Rp-</p>
                                                    </td>
                                                </tr>

                                                <tr>

                                                    <td>Poli Klinik</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya19 == 2500) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1b21" name="biaya19" value="2500" onchange="hitungTotal4()" checked>
                                                                <label for="customCheckbox1b21" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1b21" name="biaya19" value="2500" onchange="hitungTotal4()">
                                                                <label for="customCheckbox1b21" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya20 == 2500) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1b22" name="biaya20" value="2500" onchange="hitungTotal4()" checked>
                                                                <label for="customCheckbox1b22" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1b22" name="biaya20" value="2500" onchange="hitungTotal4()">
                                                                <label for="customCheckbox1b22" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya21 == 2500) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1b23" name="biaya21" value="2500" onchange="hitungTotal4()" checked>
                                                                <label for="customCheckbox1b23" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1b23" name="biaya21" value="2500" onchange="hitungTotal4()">
                                                                <label for="customCheckbox1b23" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya22 == 2500) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1b24" name="biaya22" value="2500" onchange="hitungTotal4()" checked>
                                                                <label for="customCheckbox1b24" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1b24" name="biaya22" value="2500" onchange="hitungTotal4()">
                                                                <label for="customCheckbox1b24" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya23 == 2500) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1b25" name="biaya23" value="2500" onchange="hitungTotal4()" checked>
                                                                <label for="customCheckbox1b25" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1b25" name="biaya23" value="2500" onchange="hitungTotal4()">
                                                                <label for="customCheckbox1b25" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya24 == 2500) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1b26" name="biaya24" value="2500" onchange="hitungTotal4()" checked>
                                                                <label for="customCheckbox1b26" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1b26" name="biaya24" value="2500" onchange="hitungTotal4()">
                                                                <label for="customCheckbox1b26" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>

                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total4">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>Rawat Inap</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya25 == 13000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1231" name="biaya25" value="13000" onchange="hitungTotal5()" checked>
                                                                <label for="customCheckbox1231" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1231" name="biaya25" value="13000" onchange="hitungTotal5()">
                                                                <label for="customCheckbox1231" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya26 == 13000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1232" name="biaya26" value="13000" onchange="hitungTotal5()" checked>
                                                                <label for="customCheckbox1232" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1232" name="biaya26" value="13000" onchange="hitungTotal5()">
                                                                <label for="customCheckbox1232" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya27 == 13000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1233" name="biaya27" value="13000" onchange="hitungTotal5()" checked>
                                                                <label for="customCheckbox1233" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1233" name="biaya27" value="13000" onchange="hitungTotal5()">
                                                                <label for="customCheckbox1233" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya28 == 13000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1234" name="biaya28" value="13000" onchange="hitungTotal5()" checked>
                                                                <label for="customCheckbox1234" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1234" name="biaya28" value="13000" onchange="hitungTotal5()">
                                                                <label for="customCheckbox1234" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya29 == 13000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1235" name="biaya29" value="13000" onchange="hitungTotal5()" checked>
                                                                <label for="customCheckbox1235" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1235" name="biaya29" value="13000" onchange="hitungTotal5()">
                                                                <label for="customCheckbox1235" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya30 == 13000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1236" name="biaya30" value="13000" onchange="hitungTotal5()" checked>
                                                                <label for="customCheckbox1236" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox1236" name="biaya30" value="13000" onchange="hitungTotal5()">
                                                                <label for="customCheckbox1236" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total5">Rp-</p>
                                                    </td>

                                                </tr>

                                                <!-- Nomor 2 -->
                                                <tr>
                                                    <td rowspan="13">2</td>
                                                    <td rowspan="13">Laboratorium</td>

                                                </tr>
                                                <tr>

                                                    <td>Darah Lengkap</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya31 == 56000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2111" name="biaya31" value="56000" onchange="hitungTotal6()" checked>
                                                                <label for="customCheckbox2111" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2111" name="biaya31" value="56000" onchange="hitungTotal6()">
                                                                <label for="customCheckbox2111" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya32 == 56000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2112" name="biaya32" value="56000" onchange="hitungTotal6()" checked>
                                                                <label for="customCheckbox2112" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2112" name="biaya32" value="56000" onchange="hitungTotal6()">
                                                                <label for="customCheckbox2112" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya33 == 56000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2113" name="biaya33" value="56000" onchange="hitungTotal6()" checked>
                                                                <label for="customCheckbox2113" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2113" name="biaya33" value="56000" onchange="hitungTotal6()">
                                                                <label for="customCheckbox2113" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya34 == 56000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2114" name="biaya34" value="56000" onchange="hitungTotal6()" checked>
                                                                <label for="customCheckbox2114" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2114" name="biaya34" value="56000" onchange="hitungTotal6()">
                                                                <label for="customCheckbox2114" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya35 == 56000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2115" name="biaya35" value="56000" onchange="hitungTotal6()" checked>
                                                                <label for="customCheckbox2115" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2115" name="biaya35" value="56000" onchange="hitungTotal6()">
                                                                <label for="customCheckbox2115" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya36 == 56000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2116" name="biaya36" value="56000" onchange="hitungTotal6()" checked>
                                                                <label for="customCheckbox2116" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2116" name="biaya36" value="56000" onchange="hitungTotal6()">
                                                                <label for="customCheckbox2116" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total6">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>Urenium Kriatin</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya37 == 26500) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2121" name="biaya37" value="26500" onchange="hitungTotal7()" checked>
                                                                <label for="customCheckbox2121" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2121" name="biaya37" value="26500" onchange="hitungTotal7()">
                                                                <label for="customCheckbox2121" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya38 == 26500) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2122" name="biaya38" value="26500" onchange="hitungTotal7()" checked>
                                                                <label for="customCheckbox2122" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2122" name="biaya38" value="26500" onchange="hitungTotal7()">
                                                                <label for="customCheckbox2122" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya39 == 26500) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2123" name="biaya39" value="26500" onchange="hitungTotal7()" checked>
                                                                <label for="customCheckbox2123" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2123" name="biaya39" value="26500" onchange="hitungTotal7()">
                                                                <label for="customCheckbox2123" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya40 == 26500) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2124" name="biaya40" value="26500" onchange="hitungTotal7()" checked>
                                                                <label for="customCheckbox2124" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2124" name="biaya40" value="26500" onchange="hitungTotal7()">
                                                                <label for="customCheckbox2124" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya41 == 26500) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2125" name="biaya41" value="26500" onchange="hitungTotal7()" checked>
                                                                <label for="customCheckbox2125" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2125" name="biaya41" value="26500" onchange="hitungTotal7()">
                                                                <label for="customCheckbox2125" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya42 == 26500) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2126" name="biaya42" value="26500" onchange="hitungTotal7()" checked>
                                                                <label for="customCheckbox2126" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2126" name="biaya42" value="26500" onchange="hitungTotal7()">
                                                                <label for="customCheckbox2126" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total7">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>GDS</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya43 == 24000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2131" name="biaya43" value="24000" onchange="hitungTotal8()" checked>
                                                                <label for="customCheckbox2131" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2131" name="biaya43" value="24000" onchange="hitungTotal8()">
                                                                <label for="customCheckbox2131" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya44 == 24000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2132" name="biaya44" value="24000" onchange="hitungTotal8()" checked>
                                                                <label for="customCheckbox2132" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2132" name="biaya44" value="24000" onchange="hitungTotal8()">
                                                                <label for="customCheckbox2132" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya45 == 24000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2133" name="biaya45" value="24000" onchange="hitungTotal8()" checked>
                                                                <label for="customCheckbox2133" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2132" name="biaya44" value="24000" onchange="hitungTotal8()">
                                                                <label for="customCheckbox2132" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya46 == 24000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2134" name="biaya46" value="24000" onchange="hitungTotal8()" checked>
                                                                <label for="customCheckbox2134" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2134" name="biaya46" value="24000" onchange="hitungTotal8()">
                                                                <label for="customCheckbox2134" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya47 == 24000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2135" name="biaya47" value="24000" onchange="hitungTotal8()" checked>
                                                                <label for="customCheckbox2135" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2135" name="biaya47" value="24000" onchange="hitungTotal8()">
                                                                <label for="customCheckbox2135" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya48 == 24000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2136" name="biaya48" value="24000" onchange="hitungTotal8()" checked>
                                                                <label for="customCheckbox2136" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2136" name="biaya48" value="24000" onchange="hitungTotal8()">
                                                                <label for="customCheckbox2136" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total8">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>Elektrolit</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya49 == 91000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2141" name="biaya49" value="91000" onchange="hitungTotal9()" checked>
                                                                <label for="customCheckbox2141" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2141" name="biaya49" value="91000" onchange="hitungTotal9()">
                                                                <label for="customCheckbox2141" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya50 == 91000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2142" name="biaya50" value="91000" onchange="hitungTotal9()" checked>
                                                                <label for="customCheckbox2142" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2142" name="biaya50" value="91000" onchange="hitungTotal9()">
                                                                <label for="customCheckbox2142" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya51 == 91000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2143" name="biaya51" value="91000" onchange="hitungTotal9()" checked>
                                                                <label for="customCheckbox2143" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2143" name="biaya51" value="91000" onchange="hitungTotal9()">
                                                                <label for="customCheckbox2143" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya52 == 91000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2144" name="biaya52" value="91000" onchange="hitungTotal9()" checked>
                                                                <label for="customCheckbox2144" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2144" name="biaya52" value="91000" onchange="hitungTotal9()">
                                                                <label for="customCheckbox2144" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya53 == 91000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2145" name="biaya53" value="91000" onchange="hitungTotal9()" checked>
                                                                <label for="customCheckbox2145" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2145" name="biaya53" value="91000" onchange="hitungTotal9()">
                                                                <label for="customCheckbox2145" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya54 == 91000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2146" name="biaya54" value="91000" onchange="hitungTotal9()" checked>
                                                                <label for="customCheckbox2146" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2146" name="biaya54" value="91000" onchange="hitungTotal9()">
                                                                <label for="customCheckbox2146" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total9">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>Asam Urat</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya55 == 14500) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2151" name="biaya55" value="14500" onchange="hitungTotal10()" checked>
                                                                <label for="customCheckbox2151" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2151" name="biaya55" value="14500" onchange="hitungTotal10()">
                                                                <label for="customCheckbox2151" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya56 == 14500) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2152" name="biaya56" value="14500" onchange="hitungTotal10()" checked>
                                                                <label for="customCheckbox2152" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2152" name="biaya56" value="14500" onchange="hitungTotal10()">
                                                                <label for="customCheckbox2152" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya57 == 14500) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2153" name="biaya57" value="14500" onchange="hitungTotal10()" checked>
                                                                <label for="customCheckbox2153" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2153" name="biaya57" value="14500" onchange="hitungTotal10()">
                                                                <label for="customCheckbox2153" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya58 == 14500) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2154" name="biaya58" value="14500" onchange="hitungTotal10()" checked>
                                                                <label for="customCheckbox2154" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2154" name="biaya58" value="14500" onchange="hitungTotal10()">
                                                                <label for="customCheckbox2154" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya59 == 14500) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2155" name="biaya59" value="14500" onchange="hitungTotal10()" checked>
                                                                <label for="customCheckbox2155" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2155" name="biaya59" value="14500" onchange="hitungTotal10()">
                                                                <label for="customCheckbox2155" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya60 == 14500) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2156" name="biaya60" value="14500" onchange="hitungTotal10()" checked>
                                                                <label for="customCheckbox2156" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2156" name="biaya60" value="14500" onchange="hitungTotal10()">
                                                                <label for="customCheckbox2156" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total10">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>GDP</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya61 == 24000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2161" name="biaya61" value="24000" onchange="hitungTotal11()" checked>
                                                                <label for="customCheckbox2161" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2161" name="biaya61" value="24000" onchange="hitungTotal11()">
                                                                <label for="customCheckbox2161" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya62 == 24000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2162" name="biaya62" value="24000" onchange="hitungTotal11()" checked>
                                                                <label for="customCheckbox2162" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2162" name="biaya62" value="24000" onchange="hitungTotal11()">
                                                                <label for="customCheckbox2162" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya63 == 24000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2163" name="biaya63" value="24000" onchange="hitungTotal11()" checked>
                                                                <label for="customCheckbox2163" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2163" name="biaya63" value="24000" onchange="hitungTotal11()">
                                                                <label for="customCheckbox2163" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya64 == 24000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2164" name="biaya64" value="24000" onchange="hitungTotal11()" checked>
                                                                <label for="customCheckbox2164" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2164" name="biaya64" value="24000" onchange="hitungTotal11()">
                                                                <label for="customCheckbox2164" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya65 == 24000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2165" name="biaya65" value="24000" onchange="hitungTotal11()" checked>
                                                                <label for="customCheckbox2165" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2165" name="biaya65" value="24000" onchange="hitungTotal11()">
                                                                <label for="customCheckbox2165" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya66 == 24000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2166" name="biaya66" value="24000" onchange="hitungTotal11()" checked>
                                                                <label for="customCheckbox2166" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2166" name="biaya66" value="24000" onchange="hitungTotal11()">
                                                                <label for="customCheckbox2166" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total11">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>GD2PP</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya67 == 24000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2171" name="biaya67" value="24000" onchange="hitungTotal12()" checked>
                                                                <label for="customCheckbox2171" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2171" name="biaya67" value="24000" onchange="hitungTotal12()">
                                                                <label for="customCheckbox2171" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya68 == 24000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2172" name="biaya68" value="24000" onchange="hitungTotal12()" checked>
                                                                <label for="customCheckbox2172" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2172" name="biaya68" value="24000" onchange="hitungTotal12()">
                                                                <label for="customCheckbox2172" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya69 == 24000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2173" name="biaya69" value="24000" onchange="hitungTotal12()" checked>
                                                                <label for="customCheckbox2173" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2173" name="biaya69" value="24000" onchange="hitungTotal12()">
                                                                <label for="customCheckbox2173" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya70 == 24000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2174" name="biaya70" value="24000" onchange="hitungTotal12()" checked>
                                                                <label for="customCheckbox2174" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2174" name="biaya70" value="24000" onchange="hitungTotal12()">
                                                                <label for="customCheckbox2174" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya71 == 24000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2175" name="biaya71" value="24000" onchange="hitungTotal12()" checked>
                                                                <label for="customCheckbox2175" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2175" name="biaya71" value="24000" onchange="hitungTotal12()">
                                                                <label for="customCheckbox2175" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya72 == 24000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2176" name="biaya72" value="24000" onchange="hitungTotal12()" checked>
                                                                <label for="customCheckbox2176" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2176" name="biaya72" value="24000" onchange="hitungTotal12()">
                                                                <label for="customCheckbox2176" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total12">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>LDL</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya73 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2181" name="biaya73" value="0" onchange="hitungTotal13()" checked>
                                                                <label for="customCheckbox2181" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2181" name="biaya73" value="0" onchange="hitungTotal13()">
                                                                <label for="customCheckbox2181" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya74 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2182" name="biaya74" value="0" onchange="hitungTotal13()" checked>
                                                                <label for="customCheckbox2182" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2182" name="biaya74" value="0" onchange="hitungTotal13()">
                                                                <label for="customCheckbox2182" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya75 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2183" name="biaya75" value="0" onchange="hitungTotal13()" checked>
                                                                <label for="customCheckbox2183" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2183" name="biaya75" value="0" onchange="hitungTotal13()">
                                                                <label for="customCheckbox2183" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya76 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2184" name="biaya76" value="0" onchange="hitungTotal13()" checked>
                                                                <label for="customCheckbox2184" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2184" name="biaya76" value="0" onchange="hitungTotal13()">
                                                                <label for="customCheckbox2184" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya77 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2185" name="biaya77" value="0" onchange="hitungTotal13()" checked>
                                                                <label for="customCheckbox2185" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2185" name="biaya77" value="0" onchange="hitungTotal13()">
                                                                <label for="customCheckbox2185" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya78 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2186" name="biaya78" value="0" onchange="hitungTotal13()" checked>
                                                                <label for="customCheckbox2186" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2186" name="biaya78" value="0" onchange="hitungTotal13()">
                                                                <label for="customCheckbox2186" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total13">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>HDL</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya79 == 29000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2191" name="biaya79" value="29000" onchange="hitungTotal14()" checked>
                                                                <label for="customCheckbox2191" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2191" name="biaya79" value="29000" onchange="hitungTotal14()">
                                                                <label for="customCheckbox2191" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya80 == 29000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2192" name="biaya80" value="29000" onchange="hitungTotal14()" checked>
                                                                <label for="customCheckbox2192" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2192" name="biaya80" value="29000" onchange="hitungTotal14()">
                                                                <label for="customCheckbox2192" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya81 == 29000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2193" name="biaya81" value="29000" onchange="hitungTotal14()" checked>
                                                                <label for="customCheckbox2193" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2193" name="biaya81" value="29000" onchange="hitungTotal14()">
                                                                <label for="customCheckbox2193" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya82 == 29000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2194" name="biaya82" value="29000" onchange="hitungTotal14()" checked>
                                                                <label for="customCheckbox2194" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2194" name="biaya82" value="29000" onchange="hitungTotal14()">
                                                                <label for="customCheckbox2194" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya83 == 29000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2195" name="biaya83" value="29000" onchange="hitungTotal14()" checked>
                                                                <label for="customCheckbox2195" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2195" name="biaya83" value="29000" onchange="hitungTotal14()">
                                                                <label for="customCheckbox2195" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya84 == 29000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2196" name="biaya84" value="29000" onchange="hitungTotal14()" checked>
                                                                <label for="customCheckbox2196" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox2196" name="biaya84" value="29000" onchange="hitungTotal14()">
                                                                <label for="customCheckbox2196" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total14">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>Trigliserida</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya85 == 24000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox21101" name="biaya85" value="24000" onchange="hitungTotal15()" checked>
                                                                <label for="customCheckbox21101" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox21101" name="biaya85" value="24000" onchange="hitungTotal15()">
                                                                <label for="customCheckbox21101" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya86 == 24000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox21102" name="biaya86" value="24000" onchange="hitungTotal15()" checked>
                                                                <label for="customCheckbox21102" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox21102" name="biaya86" value="24000" onchange="hitungTotal15()">
                                                                <label for="customCheckbox21102" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya87 == 24000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox21103" name="biaya87" value="24000" onchange="hitungTotal15()" checked>
                                                                <label for="customCheckbox21103" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox21103" name="biaya87" value="24000" onchange="hitungTotal15()">
                                                                <label for="customCheckbox21103" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya88 == 24000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox21104" name="biaya88" value="24000" onchange="hitungTotal15()" checked>
                                                                <label for="customCheckbox21104" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox21104" name="biaya88" value="24000" onchange="hitungTotal15()">
                                                                <label for="customCheckbox21104" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya89 == 24000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox21105" name="biaya89" value="24000" onchange="hitungTotal15()" checked>
                                                                <label for="customCheckbox21105" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox21105" name="biaya89" value="24000" onchange="hitungTotal15()">
                                                                <label for="customCheckbox21105" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya90 == 24000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox21106" name="biaya90" value="24000" onchange="hitungTotal15()" checked>
                                                                <label for="customCheckbox21106" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox21106" name="biaya90" value="24000" onchange="hitungTotal15()">
                                                                <label for="customCheckbox21106" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total15">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>Kolesterol Total</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya91 == 24000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox21111" name="biaya91" value="24000" onchange="hitungTotal16()" checked>
                                                                <label for="customCheckbox21111" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox21111" name="biaya91" value="24000" onchange="hitungTotal16()">
                                                                <label for="customCheckbox21111" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya92 == 24000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox21112" name="biaya92" value="24000" onchange="hitungTotal16()" checked>
                                                                <label for="customCheckbox21112" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox21112" name="biaya92" value="24000" onchange="hitungTotal16()">
                                                                <label for="customCheckbox21112" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya93 == 24000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox21113" name="biaya93" value="24000" onchange="hitungTotal16()" checked>
                                                                <label for="customCheckbox21113" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox21113" name="biaya93" value="24000" onchange="hitungTotal16()">
                                                                <label for="customCheckbox21113" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya94 == 24000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox21114" name="biaya94" value="24000" onchange="hitungTotal16()" checked>
                                                                <label for="customCheckbox21114" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox21114" name="biaya94" value="24000" onchange="hitungTotal16()">
                                                                <label for="customCheckbox21114" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya95 == 24000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox21115" name="biaya95" value="24000" onchange="hitungTotal16()" checked>
                                                                <label for="customCheckbox21115" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox21115" name="biaya95" value="24000" onchange="hitungTotal16()">
                                                                <label for="customCheckbox21115" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya96 == 24000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox21116" name="biaya96" value="24000" onchange="hitungTotal16()" checked>
                                                                <label for="customCheckbox21116" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox21116" name="biaya96" value="24000" onchange="hitungTotal16()">
                                                                <label for="customCheckbox21116" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total16">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>EKG</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya97 == 24000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox21121" name="biaya97" value="40000" onchange="hitungTotal17()" checked>
                                                                <label for="customCheckbox21121" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox21121" name="biaya97" value="40000" onchange="hitungTotal17()">
                                                                <label for="customCheckbox21121" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya98 == 24000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox21122" name="biaya98" value="40000" onchange="hitungTotal17()" checked>
                                                                <label for="customCheckbox21122" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox21122" name="biaya98" value="40000" onchange="hitungTotal17()">
                                                                <label for="customCheckbox21122" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya99 == 24000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox21213" name="biaya99" value="40000" onchange="hitungTotal17()" checked>
                                                                <label for="customCheckbox21213" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox21213" name="biaya99" value="40000" onchange="hitungTotal17()">
                                                                <label for="customCheckbox21213" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya100 == 24000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox21214" name="biaya100" value="40000" onchange="hitungTotal17()" checked>
                                                                <label for="customCheckbox21214" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox21214" name="biaya100" value="40000" onchange="hitungTotal17()">
                                                                <label for="customCheckbox21214" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya101 == 24000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox21215" name="biaya101" value="40000" onchange="hitungTotal17()" checked>
                                                                <label for="customCheckbox21215" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox21215" name="biaya101" value="40000" onchange="hitungTotal17()">
                                                                <label for="customCheckbox21215" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya102 == 24000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox21216" name="biaya102" value="40000" onchange="hitungTotal17()" checked>
                                                                <label for="customCheckbox21216" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox21216" name="biaya102" value="40000" onchange="hitungTotal17()">
                                                                <label for="customCheckbox21216" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total17">Rp-</p>
                                                    </td>

                                                </tr>


                                                <!-- Nomor 3 -->
                                                <tr>
                                                    <td rowspan="2">3</td>
                                                    <td rowspan="2">Radiologi / Imaging</td>
                                                    <td>RTO Thorax</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya103 == 133500) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox31112" name="biaya103" value="133500" onchange="hitungTotal18()" checked>
                                                                <label for="customCheckbox31112" class="custom-control-label">Besar</label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox31112" name="biaya103" value="133500" onchange="hitungTotal18()">
                                                                <label for="customCheckbox31112" class="custom-control-label">Besar</label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya104 == 93300) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox31111" name="biaya104" value="93300" onchange="hitungTotal18()" checked>
                                                                <label for="customCheckbox31111" class="custom-control-label">Sedang</label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox31111" name="biaya104" value="93300" onchange="hitungTotal18()">
                                                                <label for="customCheckbox31111" class="custom-control-label">Sedang</label>
                                                            <?php
                                                            } ?>

                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya105 == 133500) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox31122" name="biaya105" value="133500" onchange="hitungTotal18()" checked>
                                                                <label for="customCheckbox31122" class="custom-control-label">Besar</label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox31122" name="biaya105" value="133500" onchange="hitungTotal18()">
                                                                <label for="customCheckbox31122" class="custom-control-label">Besar</label>
                                                            <?php
                                                            } ?>

                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya106 == 93300) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox31121" name="biaya106" value="93300" onchange="hitungTotal18()" checked>
                                                                <label for="customCheckbox31121" class="custom-control-label">Sedang</label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox31121" name="biaya106" value="93300" onchange="hitungTotal18()">
                                                                <label for="customCheckbox31121" class="custom-control-label">Sedang</label>
                                                            <?php
                                                            } ?>
                                                        </div>

                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya107 == 133500) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox31132" name="biaya107" value="133500" onchange="hitungTotal18()" checked>
                                                                <label for="customCheckbox31132" class="custom-control-label">Besar</label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox31132" name="biaya107" value="133500" onchange="hitungTotal18()">
                                                                <label for="customCheckbox31132" class="custom-control-label">Besar</label>
                                                            <?php
                                                            } ?>

                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya108 == 93300) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox31131" name="biaya108" value="93300" onchange="hitungTotal18()" checked>
                                                                <label for="customCheckbox31131" class="custom-control-label">Sedang</label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox31131" name="biaya108" value="93300" onchange="hitungTotal18()">
                                                                <label for="customCheckbox31131" class="custom-control-label">Sedang</label>
                                                            <?php
                                                            } ?>
                                                        </div>

                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya109 == 133500) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox31142" name="biaya109" value="133500" onchange="hitungTotal18()" checked>
                                                                <label for="customCheckbox31142" class="custom-control-label">Besar</label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox31142" name="biaya109" value="133500" onchange="hitungTotal18()">
                                                                <label for="customCheckbox31142" class="custom-control-label">Besar</label>
                                                            <?php
                                                            } ?>

                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya110 == 93300) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox31141" name="biaya110" value="93300" onchange="hitungTotal18()" checked>
                                                                <label for="customCheckbox31141" class="custom-control-label">Sedang</label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox31141" name="biaya110" value="93300" onchange="hitungTotal18()">
                                                                <label for="customCheckbox31141" class="custom-control-label">Sedang</label>
                                                            <?php
                                                            } ?>
                                                        </div>

                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya111 == 133500) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox31152" name="biaya111" value="133500" onchange="hitungTotal18()" checked>
                                                                <label for="customCheckbox31152" class="custom-control-label">Besar</label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox31152" name="biaya111" value="133500" onchange="hitungTotal18()">
                                                                <label for="customCheckbox31152" class="custom-control-label">Besar</label>
                                                            <?php
                                                            } ?>

                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya112 == 93300) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox31151" name="biaya112" value="93300" onchange="hitungTotal18()" checked>
                                                                <label for="customCheckbox31151" class="custom-control-label">Sedang</label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox31151" name="biaya112" value="93300" onchange="hitungTotal18()">
                                                                <label for="customCheckbox31151" class="custom-control-label">Sedang</label>
                                                            <?php
                                                            } ?>
                                                        </div>

                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya113 == 133500) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox31162" name="biaya113" value="133500" onchange="hitungTotal18()" checked>
                                                                <label for="customCheckbox31162" class="custom-control-label">Besar</label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox31162" name="biaya113" value="133500" onchange="hitungTotal18()">
                                                                <label for="customCheckbox31162" class="custom-control-label">Besar</label>
                                                            <?php
                                                            } ?>

                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya114 == 93300) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox31161" name="biaya114" value="93300" onchange="hitungTotal18()" checked>
                                                                <label for="customCheckbox31161" class="custom-control-label">Sedang</label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox31161" name="biaya114" value="93300" onchange="hitungTotal18()">
                                                                <label for="customCheckbox31161" class="custom-control-label">Sedang</label>
                                                            <?php
                                                            } ?>
                                                        </div>

                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total18">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>CT Scan Kepala</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya115 == 670000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox3121" name="biaya115" value="670000" onchange="hitungTotal19()" checked>
                                                                <label for="customCheckbox3121" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox3121" name="biaya115" value="670000" onchange="hitungTotal19()">
                                                                <label for="customCheckbox3121" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya116 == 670000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox3122" name="biaya116" value="670000" onchange="hitungTotal19()" checked>
                                                                <label for="customCheckbox3122" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox3122" name="biaya116" value="670000" onchange="hitungTotal19()">
                                                                <label for="customCheckbox3122" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya117 == 670000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox3123" name="biaya117" value="670000" onchange="hitungTotal19()" checked>
                                                                <label for="customCheckbox3123" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox3123" name="biaya117" value="670000" onchange="hitungTotal19()">
                                                                <label for="customCheckbox3123" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya118 == 670000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox3124" name="biaya118" value="670000" onchange="hitungTotal19()" checked>
                                                                <label for="customCheckbox3124" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox3124" name="biaya118" value="670000" onchange="hitungTotal19()">
                                                                <label for="customCheckbox3124" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya119 == 670000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox3125" name="biaya119" value="670000" onchange="hitungTotal19()" checked>
                                                                <label for="customCheckbox3125" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox3125" name="biaya119" value="670000" onchange="hitungTotal19()">
                                                                <label for="customCheckbox3125" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya120 == 670000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox3126" name="biaya120" value="670000" onchange="hitungTotal19()" checked>
                                                                <label for="customCheckbox3126" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox3126" name="biaya120" value="670000" onchange="hitungTotal19()">
                                                                <label for="customCheckbox3126" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total19">Rp-</p>
                                                    </td>

                                                </tr>


                                                <!-- Nomor 4 -->
                                                <tr>
                                                    <td>4</td>
                                                    <td>Konsultasi</td>
                                                    <td>DPJP</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya121 == 27000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox4111" name="biaya121" value="27000" onchange="hitungTotal20()" checked>
                                                                <label for="customCheckbox4111" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox4111" name="biaya121" value="27000" onchange="hitungTotal20()">
                                                                <label for="customCheckbox4111" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya122 == 27000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox4112" name="biaya122" value="27000" onchange="hitungTotal20()" checked>
                                                                <label for="customCheckbox4112" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox4112" name="biaya122" value="27000" onchange="hitungTotal20()">
                                                                <label for="customCheckbox4112" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya123 == 27000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox4113" name="biaya123" value="27000" onchange="hitungTotal20()" checked>
                                                                <label for="customCheckbox4113" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox4113" name="biaya123" value="27000" onchange="hitungTotal20()">
                                                                <label for="customCheckbox4113" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya124 == 27000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox4114" name="biaya124" value="27000" onchange="hitungTotal20()" checked>
                                                                <label for="customCheckbox4114" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox4114" name="biaya124" value="27000" onchange="hitungTotal20()">
                                                                <label for="customCheckbox4114" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya125 == 27000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox4115" name="biaya125" value="27000" onchange="hitungTotal20()" checked>
                                                                <label for="customCheckbox4115" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox4115" name="biaya125" value="27000" onchange="hitungTotal20()">
                                                                <label for="customCheckbox4115" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya126 == 27000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox4116" name="biaya126" value="27000" onchange="hitungTotal20()" checked>
                                                                <label for="customCheckbox4116" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox4116" name="biaya126" value="27000" onchange="hitungTotal20()">
                                                                <label for="customCheckbox4116" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total20">Rp-</p>
                                                    </td>
                                                </tr>

                                                <!-- Nomor 5 -->
                                                <tr>
                                                    <td rowspan="4">5</td>
                                                    <td rowspan="4">Asesmen Lanjutan</td>
                                                    <td>a. Asesmen Medis</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya127 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5111" name="biaya127" value="0" onchange="hitungTotal21()" checked>
                                                                <label for="customCheckbox5111" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5111" name="biaya127" value="0" onchange="hitungTotal21()">
                                                                <label for="customCheckbox5111" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya128 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5112" name="biaya128" value="0" onchange="hitungTotal21()" checked>
                                                                <label for="customCheckbox5112" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5112" name="biaya128" value="0" onchange="hitungTotal21()">
                                                                <label for="customCheckbox5112" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya129 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5113" name="biaya129" value="0" onchange="hitungTotal21()" checked>
                                                                <label for="customCheckbox5113" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5113" name="biaya129" value="0" onchange="hitungTotal21()">
                                                                <label for="customCheckbox5113" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya130 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5114" name="biaya130" value="0" onchange="hitungTotal21()" checked>
                                                                <label for="customCheckbox5114" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5114" name="biaya130" value="0" onchange="hitungTotal21()">
                                                                <label for="customCheckbox5114" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya131 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5115" name="biaya131" value="0" onchange="hitungTotal21()" checked>
                                                                <label for="customCheckbox5115" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5115" name="biaya131" value="0" onchange="hitungTotal21()">
                                                                <label for="customCheckbox5115" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya132 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5116" name="biaya132" value="0" onchange="hitungTotal21()" checked>
                                                                <label for="customCheckbox5116" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5116" name="biaya132" value="0" onchange="hitungTotal21()">
                                                                <label for="customCheckbox5116" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total21">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>b. Asesmen Keperawtan</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya133 == 13000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5121" name="biaya133" value="13000" onchange="hitungTotal22()" checked>
                                                                <label for="customCheckbox5121" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5121" name="biaya133" value="13000" onchange="hitungTotal22()">
                                                                <label for="customCheckbox5121" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya134 == 13000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5122" name="biaya134" value="13000" onchange="hitungTotal22()" checked>
                                                                <label for="customCheckbox5122" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5122" name="biaya134" value="13000" onchange="hitungTotal22()">
                                                                <label for="customCheckbox5122" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya135 == 13000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5123" name="biaya135" value="13000" onchange="hitungTotal22()" checked>
                                                                <label for="customCheckbox5123" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5123" name="biaya135" value="13000" onchange="hitungTotal22()">
                                                                <label for="customCheckbox5123" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya136 == 13000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5124" name="biaya136" value="13000" onchange="hitungTotal22()" checked>
                                                                <label for="customCheckbox5124" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5124" name="biaya136" value="13000" onchange="hitungTotal22()">
                                                                <label for="customCheckbox5124" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya137 == 13000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5125" name="biaya137" value="13000" onchange="hitungTotal22()" checked>
                                                                <label for="customCheckbox5125" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5125" name="biaya137" value="13000" onchange="hitungTotal22()">
                                                                <label for="customCheckbox5125" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya138 == 13000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5126" name="biaya138" value="13000" onchange="hitungTotal22()" checked>
                                                                <label for="customCheckbox5126" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5126" name="biaya138" value="13000" onchange="hitungTotal22()">
                                                                <label for="customCheckbox5126" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total22">Rp-</p>
                                                    </td>

                                                </tr>
                                                <tr>

                                                    <td>c. Asesment Gizi</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya139 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5131" name="biaya139" value="0" onchange="hitungTotal23()" checked>
                                                                <label for="customCheckbox5131" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5131" name="biaya139" value="0" onchange="hitungTotal23()">
                                                                <label for="customCheckbox5131" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya140 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5132" name="biaya140" value="0" onchange="hitungTotal23()" checked>
                                                                <label for="customCheckbox5132" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5132" name="biaya140" value="0" onchange="hitungTotal23()">
                                                                <label for="customCheckbox5132" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya141 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5133" name="biaya141" value="0" onchange="hitungTotal23()" checked>
                                                                <label for="customCheckbox5133" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5133" name="biaya141" value="0" onchange="hitungTotal23()">
                                                                <label for="customCheckbox5133" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya142 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5134" name="biaya142" value="0" onchange="hitungTotal23()" checked>
                                                                <label for="customCheckbox5134" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5134" name="biaya142" value="0" onchange="hitungTotal23()">
                                                                <label for="customCheckbox5134" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya143 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5135" name="biaya143" value="0" onchange="hitungTotal23()" checked>
                                                                <label for="customCheckbox5135" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5135" name="biaya143" value="0" onchange="hitungTotal23()">
                                                                <label for="customCheckbox5135" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya144 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5136" name="biaya144" value="0" onchange="hitungTotal23()" checked>
                                                                <label for="customCheckbox5136" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5136" name="biaya144" value="0" onchange="hitungTotal23()">
                                                                <label for="customCheckbox5136" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total23">Rp-</p>
                                                    </td>

                                                </tr>
                                                <tr>

                                                    <td>d. Asesment Farmasi</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya145 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5141" name="biaya145" value="0" onchange="hitungTotal24()" checked>
                                                                <label for="customCheckbox5141" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5141" name="biaya145" value="0" onchange="hitungTotal24()">
                                                                <label for="customCheckbox5141" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya146 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5142" name="biaya146" value="0" onchange="hitungTotal24()" checked>
                                                                <label for="customCheckbox5142" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5142" name="biaya146" value="0" onchange="hitungTotal24()">
                                                                <label for="customCheckbox5142" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya147 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5143" name="biaya147" value="0" onchange="hitungTotal24()" checked>
                                                                <label for="customCheckbox5143" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5143" name="biaya147" value="0" onchange="hitungTotal24()">
                                                                <label for="customCheckbox5143" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya148 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5144" name="biaya148" value="0" onchange="hitungTotal24()" checked>
                                                                <label for="customCheckbox5144" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5144" name="biaya148" value="0" onchange="hitungTotal24()">
                                                                <label for="customCheckbox5144" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya149 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5145" name="biaya149" value="0" onchange="hitungTotal24()" checked>
                                                                <label for="customCheckbox5145" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5145" name="biaya149" value="0" onchange="hitungTotal24()">
                                                                <label for="customCheckbox5145" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya150 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5146" name="biaya150" value="0" onchange="hitungTotal24()" checked>
                                                                <label for="customCheckbox5146" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox5146" name="biaya150" value="0" onchange="hitungTotal24()">
                                                                <label for="customCheckbox5146" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total24">Rp-</p>
                                                    </td>

                                                </tr>


                                                <!-- Nomor 6 -->
                                                <tr>
                                                    <td rowspan="14">6</td>
                                                    <td rowspan="6">a. Injeksi</td>
                                                    <td>Inj. Piracetam</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya151 == 9057) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6111" name="biaya151" value="9057" onchange="hitungTotal25()" checked>
                                                                <label for="customCheckbox6111" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6111" name="biaya151" value="9057" onchange="hitungTotal25()">
                                                                <label for="customCheckbox6111" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya152 == 9057) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6112" name="biaya152" value="9057" onchange="hitungTotal25()" checked>
                                                                <label for="customCheckbox6112" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6112" name="biaya152" value="9057" onchange="hitungTotal25()">
                                                                <label for="customCheckbox6112" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya153 == 9057) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6113" name="biaya153" value="9057" onchange="hitungTotal25()" checked>
                                                                <label for="customCheckbox6113" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6113" name="biaya153" value="9057" onchange="hitungTotal25()">
                                                                <label for="customCheckbox6113" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya154 == 9057) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6114" name="biaya154" value="9057" onchange="hitungTotal25()" checked>
                                                                <label for="customCheckbox6114" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6114" name="biaya154" value="9057" onchange="hitungTotal25()">
                                                                <label for="customCheckbox6114" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya155 == 9057) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6115" name="biaya155" value="9057" onchange="hitungTotal25()" checked>
                                                                <label for="customCheckbox6115" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6115" name="biaya155" value="9057" onchange="hitungTotal25()">
                                                                <label for="customCheckbox6115" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya156 == 9057) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6116" name="biaya156" value="9057" onchange="hitungTotal25()" checked>
                                                                <label for="customCheckbox6116" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6116" name="biaya156" value="9057" onchange="hitungTotal25()">
                                                                <label for="customCheckbox6116" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total25">Rp-</p>
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>Inj. Citicolin</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya157 == 19980) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6121" name="biaya157" value="19980" onchange="hitungTotal26()" checked>
                                                                <label for="customCheckbox6121" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6121" name="biaya157" value="19980" onchange="hitungTotal26()">
                                                                <label for="customCheckbox6121" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya158 == 19980) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6122" name="biaya158" value="19980" onchange="hitungTotal26()" checked>
                                                                <label for="customCheckbox6122" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6122" name="biaya158" value="19980" onchange="hitungTotal26()">
                                                                <label for="customCheckbox6122" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya159 == 19980) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6123" name="biaya159" value="19980" onchange="hitungTotal26()" checked>
                                                                <label for="customCheckbox6123" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6123" name="biaya159" value="19980" onchange="hitungTotal26()">
                                                                <label for="customCheckbox6123" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya160 == 19980) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6124" name="biaya160" value="19980" onchange="hitungTotal26()" checked>
                                                                <label for="customCheckbox6124" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6124" name="biaya160" value="19980" onchange="hitungTotal26()">
                                                                <label for="customCheckbox6124" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya161 == 19980) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6125" name="biaya161" value="19980" onchange="hitungTotal26()" checked>
                                                                <label for="customCheckbox6125" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6125" name="biaya161" value="19980" onchange="hitungTotal26()">
                                                                <label for="customCheckbox6125" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya162 == 19980) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6126" name="biaya162" value="19980" onchange="hitungTotal26()" checked>
                                                                <label for="customCheckbox6126" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6126" name="biaya162" value="19980" onchange="hitungTotal26()">
                                                                <label for="customCheckbox6126" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total26">Rp-</p>
                                                    </td>

                                                </tr>
                                                <tr>

                                                    <td>Inj. Mekobalamin</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya163 == 9057) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6131" name="biaya163" value="9057" onchange="hitungTotal27()" checked>
                                                                <label for="customCheckbox6131" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6131" name="biaya163" value="9057" onchange="hitungTotal27()">
                                                                <label for="customCheckbox6131" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya164 == 9057) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6132" name="biaya164" value="9057" onchange="hitungTotal27()" checked>
                                                                <label for="customCheckbox6132" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6132" name="biaya164" value="9057" onchange="hitungTotal27()">
                                                                <label for="customCheckbox6132" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya165 == 9057) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6133" name="biaya165" value="9057" onchange="hitungTotal27()" checked>
                                                                <label for="customCheckbox6133" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6133" name="biaya165" value="9057" onchange="hitungTotal27()">
                                                                <label for="customCheckbox6133" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya166 == 9057) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6134" name="biaya166" value="9057" onchange="hitungTotal27()" checked>
                                                                <label for="customCheckbox6134" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6134" name="biaya166" value="9057" onchange="hitungTotal27()">
                                                                <label for="customCheckbox6134" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya167 == 9057) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6135" name="biaya167" value="9057" onchange="hitungTotal27()" checked>
                                                                <label for="customCheckbox6135" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6135" name="biaya167" value="9057" onchange="hitungTotal27()">
                                                                <label for="customCheckbox6135" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya168 == 9057) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6136" name="biaya168" value="9057" onchange="hitungTotal27()" checked>
                                                                <label for="customCheckbox6136" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6136" name="biaya168" value="9057" onchange="hitungTotal27()">
                                                                <label for="customCheckbox6136" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total27">Rp-</p>
                                                    </td>

                                                </tr>
                                                <tr>

                                                    <td>Inj. Ranitidin</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya169 == 1270) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6141" name="biaya169" value="1270" onchange="hitungTotal28()" checked>
                                                                <label for="customCheckbox6141" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6141" name="biaya169" value="1270" onchange="hitungTotal28()">
                                                                <label for="customCheckbox6141" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya170 == 1270) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6142" name="biaya170" value="1270" onchange="hitungTotal28()" checked>
                                                                <label for="customCheckbox6142" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6142" name="biaya170" value="1270" onchange="hitungTotal28()">
                                                                <label for="customCheckbox6142" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya171 == 1270) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6143" name="biaya171" value="1270" onchange="hitungTotal28()" checked>
                                                                <label for="customCheckbox6143" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6143" name="biaya171" value="1270" onchange="hitungTotal28()">
                                                                <label for="customCheckbox6143" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya172 == 1270) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6144" name="biaya172" value="1270" onchange="hitungTotal28()" checked>
                                                                <label for="customCheckbox6144" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6144" name="biaya172" value="1270" onchange="hitungTotal28()">
                                                                <label for="customCheckbox6144" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya173 == 1270) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6145" name="biaya173" value="1270" onchange="hitungTotal28()" checked>
                                                                <label for="customCheckbox6145" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6145" name="biaya173" value="1270" onchange="hitungTotal28()">
                                                                <label for="customCheckbox6145" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya174 == 1270) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6146" name="biaya174" value="1270" onchange="hitungTotal28()" checked>
                                                                <label for="customCheckbox6146" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6146" name="biaya174" value="1270" onchange="hitungTotal28()">
                                                                <label for="customCheckbox6146" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total28">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>Inj. OMZ</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya175 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6151" name="biaya175" value="0" onchange="hitungTotal29()" checked>
                                                                <label for="customCheckbox6151" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6151" name="biaya175" value="0" onchange="hitungTotal29()">
                                                                <label for="customCheckbox6151" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya176 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6152" name="biaya176" value="0" onchange="hitungTotal29()" checked>
                                                                <label for="customCheckbox6152" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6152" name="biaya176" value="0" onchange="hitungTotal29()">
                                                                <label for="customCheckbox6152" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya177 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6153" name="biaya177" value="0" onchange="hitungTotal29()" checked>
                                                                <label for="customCheckbox6153" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6153" name="biaya177" value="0" onchange="hitungTotal29()">
                                                                <label for="customCheckbox6153" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya178 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6154" name="biaya178" value="0" onchange="hitungTotal29()" checked>
                                                                <label for="customCheckbox6154" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6154" name="biaya178" value="0" onchange="hitungTotal29()">
                                                                <label for="customCheckbox6154" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya179 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6155" name="biaya179" value="0" onchange="hitungTotal29()" checked>
                                                                <label for="customCheckbox6155" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6155" name="biaya179" value="0" onchange="hitungTotal29()">
                                                                <label for="customCheckbox6155" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya180 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6156" name="biaya180" value="0" onchange="hitungTotal29()" checked>
                                                                <label for="customCheckbox6156" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6156" name="biaya180" value="0" onchange="hitungTotal29()">
                                                                <label for="customCheckbox6156" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total29">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>Inj. Furosemid</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya181 == 2216) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6161" name="biaya181" value="2216" onchange="hitungTotal30()" checked>
                                                                <label for="customCheckbox6161" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6161" name="biaya181" value="2216" onchange="hitungTotal30()">
                                                                <label for="customCheckbox6161" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya182 == 2216) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6162" name="biaya182" value="2216" onchange="hitungTotal30()" checked>
                                                                <label for="customCheckbox6162" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6162" name="biaya182" value="2216" onchange="hitungTotal30()">
                                                                <label for="customCheckbox6162" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya183 == 2216) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6163" name="biaya183" value="2216" onchange="hitungTotal30()" checked>
                                                                <label for="customCheckbox6163" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6163" name="biaya183" value="2216" onchange="hitungTotal30()">
                                                                <label for="customCheckbox6163" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya184 == 2216) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6164" name="biaya184" value="2216" onchange="hitungTotal30()" checked>
                                                                <label for="customCheckbox6164" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6164" name="biaya184" value="2216" onchange="hitungTotal30()">
                                                                <label for="customCheckbox6164" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya185 == 2216) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6165" name="biaya185" value="2216" onchange="hitungTotal30()" checked>
                                                                <label for="customCheckbox6165" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6165" name="biaya185" value="2216" onchange="hitungTotal30()">
                                                                <label for="customCheckbox6165" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya186 == 2216) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6166" name="biaya186" value="2216" onchange="hitungTotal30()" checked>
                                                                <label for="customCheckbox6166" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6166" name="biaya186" value="2216" onchange="hitungTotal30()">
                                                                <label for="customCheckbox6166" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total30">Rp-</p>
                                                    </td>

                                                </tr>



                                                <tr>

                                                    <td rowspan="2">b. Infus</td>
                                                    <td>Asering</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya187 == 10500) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6211" name="biaya187" value="10500" onchange="hitungTotal31()" checked>
                                                                <label for="customCheckbox6211" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6211" name="biaya187" value="10500" onchange="hitungTotal31()">
                                                                <label for="customCheckbox6211" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya188 == 10500) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6212" name="biaya188" value="10500" onchange="hitungTotal31()" checked>
                                                                <label for="customCheckbox6212" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6212" name="biaya188" value="10500" onchange="hitungTotal31()">
                                                                <label for="customCheckbox6212" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya189 == 10500) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6213" name="biaya189" value="10500" onchange="hitungTotal31()" checked>
                                                                <label for="customCheckbox6213" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6213" name="biaya189" value="10500" onchange="hitungTotal31()">
                                                                <label for="customCheckbox6213" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya190 == 10500) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6214" name="biaya190" value="10500" onchange="hitungTotal31()" checked>
                                                                <label for="customCheckbox6214" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6214" name="biaya190" value="10500" onchange="hitungTotal31()">
                                                                <label for="customCheckbox6214" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya191 == 10500) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6215" name="biaya191" value="10500" onchange="hitungTotal31()" checked>
                                                                <label for="customCheckbox6215" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6215" name="biaya191" value="10500" onchange="hitungTotal31()">
                                                                <label for="customCheckbox6215" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya192 == 10500) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6216" name="biaya192" value="10500" onchange="hitungTotal31()" checked>
                                                                <label for="customCheckbox6216" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6216" name="biaya192" value="10500" onchange="hitungTotal31()">
                                                                <label for="customCheckbox6216" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total31">Rp-</p>
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>Manitol</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya193 == 29221) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6221" name="biaya193" value="29221" onchange="hitungTotal32()" checked>
                                                                <label for="customCheckbox6221" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6221" name="biaya193" value="29221" onchange="hitungTotal32()">
                                                                <label for="customCheckbox6221" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya194 == 29221) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6222" name="biaya194" value="29221" onchange="hitungTotal32()" checked>
                                                                <label for="customCheckbox6222" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6222" name="biaya194" value="29221" onchange="hitungTotal32()">
                                                                <label for="customCheckbox6222" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya195 == 29221) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6223" name="biaya195" value="29221" onchange="hitungTotal32()" checked>
                                                                <label for="customCheckbox6223" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6223" name="biaya195" value="29221" onchange="hitungTotal32()">
                                                                <label for="customCheckbox6223" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya196 == 29221) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6224" name="biaya196" value="29221" onchange="hitungTotal32()" checked>
                                                                <label for="customCheckbox6224" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6224" name="biaya196" value="29221" onchange="hitungTotal32()">
                                                                <label for="customCheckbox6224" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya197 == 29221) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6225" name="biaya197" value="29221" onchange="hitungTotal32()" checked>
                                                                <label for="customCheckbox6225" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6225" name="biaya197" value="29221" onchange="hitungTotal32()">
                                                                <label for="customCheckbox6225" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya198 == 29221) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6226" name="biaya198" value="29221" onchange="hitungTotal32()" checked>
                                                                <label for="customCheckbox6226" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6226" name="biaya198" value="29221" onchange="hitungTotal32()">
                                                                <label for="customCheckbox6226" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total32">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td rowspan="5">c. Obat Oral</td>
                                                    <td>Antiplatelet</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya199 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6311" name="biaya199" value="0" onchange="hitungTotal33()" checked>
                                                                <label for="customCheckbox6311" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6311" name="biaya199" value="0" onchange="hitungTotal33()">
                                                                <label for="customCheckbox6311" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya200 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6312" name="biaya200" value="0" onchange="hitungTotal33()" checked>
                                                                <label for="customCheckbox6312" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6312" name="biaya200" value="0" onchange="hitungTotal33()">
                                                                <label for="customCheckbox6312" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya201 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6313" name="biaya201" value="0" onchange="hitungTotal33()" checked>
                                                                <label for="customCheckbox6313" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6313" name="biaya201" value="0" onchange="hitungTotal33()">
                                                                <label for="customCheckbox6313" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya202 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6314" name="biaya202" value="0" onchange="hitungTotal33()" checked>
                                                                <label for="customCheckbox6314" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6314" name="biaya202" value="0" onchange="hitungTotal33()">
                                                                <label for="customCheckbox6314" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya203 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6315" name="biaya203" value="0" onchange="hitungTotal33()" checked>
                                                                <label for="customCheckbox6315" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6315" name="biaya203" value="0" onchange="hitungTotal33()">
                                                                <label for="customCheckbox6315" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya204 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6316" name="biaya204" value="0" onchange="hitungTotal33()" checked>
                                                                <label for="customCheckbox6316" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6316" name="biaya204" value="0" onchange="hitungTotal33()">
                                                                <label for="customCheckbox6316" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total33">Rp-</p>
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>Simvasatatin</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya205 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6321" name="biaya205" value="0" onchange="hitungTotal34()" checked>
                                                                <label for="customCheckbox6321" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6321" name="biaya205" value="0" onchange="hitungTotal34()">
                                                                <label for="customCheckbox6321" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya206 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6322" name="biaya206" value="0" onchange="hitungTotal34()" checked>
                                                                <label for="customCheckbox6322" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6322" name="biaya206" value="0" onchange="hitungTotal34()">
                                                                <label for="customCheckbox6322" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya207 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6323" name="biaya207" value="0" onchange="hitungTotal34()" checked>
                                                                <label for="customCheckbox6323" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6323" name="biaya207" value="0" onchange="hitungTotal34()">
                                                                <label for="customCheckbox6323" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya208 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6324" name="biaya208" value="0" onchange="hitungTotal34()" checked>
                                                                <label for="customCheckbox6324" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6324" name="biaya208" value="0" onchange="hitungTotal34()">
                                                                <label for="customCheckbox6324" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya209 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6325" name="biaya209" value="0" onchange="hitungTotal34()" checked>
                                                                <label for="customCheckbox6325" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6325" name="biaya209" value="0" onchange="hitungTotal34()">
                                                                <label for="customCheckbox6325" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya210 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6326" name="biaya210" value="0" onchange="hitungTotal34()" checked>
                                                                <label for="customCheckbox6326" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6326" name="biaya210" value="0" onchange="hitungTotal34()">
                                                                <label for="customCheckbox6326" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total34">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>Amlodipin/Candesartan</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya211 == 352) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6331" name="biaya211" value="352" onchange="hitungTotal35()" checked>
                                                                <label for="customCheckbox6331" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6331" name="biaya211" value="352" onchange="hitungTotal35()">
                                                                <label for="customCheckbox6331" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya212 == 352) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6332" name="biaya212" value="352" onchange="hitungTotal35()" checked>
                                                                <label for="customCheckbox6332" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6332" name="biaya212" value="352" onchange="hitungTotal35()">
                                                                <label for="customCheckbox6332" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya213 == 352) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6333" name="biaya213" value="352" onchange="hitungTotal35()" checked>
                                                                <label for="customCheckbox6333" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6333" name="biaya213" value="352" onchange="hitungTotal35()">
                                                                <label for="customCheckbox6333" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya214 == 352) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6334" name="biaya214" value="352" onchange="hitungTotal35()" checked>
                                                                <label for="customCheckbox6334" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6334" name="biaya214" value="352" onchange="hitungTotal35()">
                                                                <label for="customCheckbox6334" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya215 == 352) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6335" name="biaya215" value="352" onchange="hitungTotal35()" checked>
                                                                <label for="customCheckbox6335" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6335" name="biaya215" value="352" onchange="hitungTotal35()">
                                                                <label for="customCheckbox6335" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya216 == 352) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6336" name="biaya216" value="352" onchange="hitungTotal35()" checked>
                                                                <label for="customCheckbox6336" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6336" name="biaya216" value="352" onchange="hitungTotal35()">
                                                                <label for="customCheckbox6336" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total35">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>CPG</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya217 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6341" name="biaya217" value="0" onchange="hitungTotal36()" checked>
                                                                <label for="customCheckbox6341" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6341" name="biaya217" value="0" onchange="hitungTotal36()">
                                                                <label for="customCheckbox6341" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya218 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6342" name="biaya218" value="0" onchange="hitungTotal36()" checked>
                                                                <label for="customCheckbox6342" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6342" name="biaya218" value="0" onchange="hitungTotal36()">
                                                                <label for="customCheckbox6342" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya219 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6343" name="biaya219" value="0" onchange="hitungTotal36()" checked>
                                                                <label for="customCheckbox6343" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6343" name="biaya219" value="0" onchange="hitungTotal36()">
                                                                <label for="customCheckbox6343" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya220 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6344" name="biaya220" value="0" onchange="hitungTotal36()" checked>
                                                                <label for="customCheckbox6344" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6344" name="biaya220" value="0" onchange="hitungTotal36()">
                                                                <label for="customCheckbox6344" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya221 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6345" name="biaya221" value="0" onchange="hitungTotal36()" checked>
                                                                <label for="customCheckbox6345" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6345" name="biaya221" value="0" onchange="hitungTotal36()">
                                                                <label for="customCheckbox6345" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya222 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6346" name="biaya222" value="0" onchange="hitungTotal36()" checked>
                                                                <label for="customCheckbox6346" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6346" name="biaya222" value="0" onchange="hitungTotal36()">
                                                                <label for="customCheckbox6346" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total36">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td>Mecobalamin</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya223 == 806) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6351" name="biaya223" value="806" onchange="hitungTotal37()" checked>
                                                                <label for="customCheckbox6351" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6351" name="biaya223" value="806" onchange="hitungTotal37()">
                                                                <label for="customCheckbox6351" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya224 == 806) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6352" name="biaya224" value="806" onchange="hitungTotal37()" checked>
                                                                <label for="customCheckbox6352" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6352" name="biaya224" value="806" onchange="hitungTotal37()">
                                                                <label for="customCheckbox6352" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya225 == 806) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6353" name="biaya225" value="806" onchange="hitungTotal37()" checked>
                                                                <label for="customCheckbox6353" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6353" name="biaya225" value="806" onchange="hitungTotal37()">
                                                                <label for="customCheckbox6353" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya226 == 806) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6354" name="biaya226" value="806" onchange="hitungTotal37()" checked>
                                                                <label for="customCheckbox6354" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6354" name="biaya226" value="806" onchange="hitungTotal37()">
                                                                <label for="customCheckbox6354" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya227 == 806) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6355" name="biaya227" value="806" onchange="hitungTotal37()" checked>
                                                                <label for="customCheckbox6355" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6355" name="biaya227" value="806" onchange="hitungTotal37()">
                                                                <label for="customCheckbox6355" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya228 == 806) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6356" name="biaya228" value="806" onchange="hitungTotal37()" checked>
                                                                <label for="customCheckbox6356" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6356" name="biaya228" value="806" onchange="hitungTotal37()">
                                                                <label for="customCheckbox6356" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total37">Rp-</p>
                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td rowspan="1">d. Oksigenasi</td>
                                                    <td>3 lpm</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya229 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6411" name="biaya229" value="0" onchange="hitungTotal38()" checked>
                                                                <label for="customCheckbox6411" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6411" name="biaya229" value="0" onchange="hitungTotal38()">
                                                                <label for="customCheckbox6411" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya230 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6412" name="biaya230" value="0" onchange="hitungTotal38()" checked>
                                                                <label for="customCheckbox6412" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6412" name="biaya230" value="0" onchange="hitungTotal38()">
                                                                <label for="customCheckbox6412" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya231 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6413" name="biaya231" value="0" onchange="hitungTotal38()" checked>
                                                                <label for="customCheckbox6413" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6413" name="biaya231" value="0" onchange="hitungTotal38()">
                                                                <label for="customCheckbox6413" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya232 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6414" name="biaya232" value="0" onchange="hitungTotal38()" checked>
                                                                <label for="customCheckbox6414" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6414" name="biaya232" value="0" onchange="hitungTotal38()">
                                                                <label for="customCheckbox6414" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya233 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6415" name="biaya233" value="0" onchange="hitungTotal38()" checked>
                                                                <label for="customCheckbox6415" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6415" name="biaya233" value="0" onchange="hitungTotal38()">
                                                                <label for="customCheckbox6415" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya234 == 1) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6416" name="biaya234" value="0" onchange="hitungTotal38()" checked>
                                                                <label for="customCheckbox6416" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox6416" name="biaya234" value="0" onchange="hitungTotal38()">
                                                                <label for="customCheckbox6416" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total38">Rp-</p>
                                                    </td>
                                                </tr>

                                                <!-- Nomor 7 -->
                                                <tr>
                                                    <td rowspan="14">7</td>
                                                    <td rowspan="1">a. DPJP</td>
                                                    <td>Asesmen Ulang</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya235 == 45000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7111" name="biaya235" value="45000" onchange="hitungTotal39()" checked>
                                                                <label for="customCheckbox7111" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7111" name="biaya235" value="45000" onchange="hitungTotal39()">
                                                                <label for="customCheckbox7111" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya236 == 45000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7112" name="biaya236" value="45000" onchange="hitungTotal39()" checked>
                                                                <label for="customCheckbox7112" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7112" name="biaya236" value="45000" onchange="hitungTotal39()">
                                                                <label for="customCheckbox7112" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya237 == 45000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7113" name="biaya237" value="45000" onchange="hitungTotal39()" checked>
                                                                <label for="customCheckbox7113" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7113" name="biaya237" value="45000" onchange="hitungTotal39()">
                                                                <label for="customCheckbox7113" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya238 == 45000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7114" name="biaya238" value="45000" onchange="hitungTotal39()" checked>
                                                                <label for="customCheckbox7114" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7114" name="biaya238" value="45000" onchange="hitungTotal39()">
                                                                <label for="customCheckbox7114" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya239 == 45000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7115" name="biaya239" value="45000" onchange="hitungTotal39()" checked>
                                                                <label for="customCheckbox7115" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7115" name="biaya239" value="45000" onchange="hitungTotal39()">
                                                                <label for="customCheckbox7115" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya240 == 45000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7116" name="biaya240" value="45000" onchange="hitungTotal39()" checked>
                                                                <label for="customCheckbox7116" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7116" name="biaya240" value="45000" onchange="hitungTotal39()">
                                                                <label for="customCheckbox7116" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total39">Rp-</p>
                                                    </td>
                                                </tr>

                                                <tr>

                                                    <td rowspan="2">b. Non DPJP</td>
                                                    <td>DPJP Sekunder</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya241 == 45000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7211" name="biaya241" value="45000" onchange="hitungTotal40()" checked>
                                                                <label for="customCheckbox7211" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7211" name="biaya241" value="45000" onchange="hitungTotal40()">
                                                                <label for="customCheckbox7211" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya242 == 45000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7212" name="biaya242" value="45000" onchange="hitungTotal40()" checked>
                                                                <label for="customCheckbox7212" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7212" name="biaya242" value="45000" onchange="hitungTotal40()">
                                                                <label for="customCheckbox7212" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya243 == 45000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7213" name="biaya243" value="45000" onchange="hitungTotal40()" checked>
                                                                <label for="customCheckbox7213" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7213" name="biaya243" value="45000" onchange="hitungTotal40()">
                                                                <label for="customCheckbox7213" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya244 == 45000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7214" name="biaya244" value="45000" onchange="hitungTotal40()" checked>
                                                                <label for="customCheckbox7214" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7214" name="biaya244" value="45000" onchange="hitungTotal40()">
                                                                <label for="customCheckbox7214" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya245 == 45000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7215" name="biaya245" value="45000" onchange="hitungTotal40()" checked>
                                                                <label for="customCheckbox7215" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7215" name="biaya245" value="45000" onchange="hitungTotal40()">
                                                                <label for="customCheckbox7215" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya246 == 45000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7216" name="biaya246" value="45000" onchange="hitungTotal40()" checked>
                                                                <label for="customCheckbox7216" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7216" name="biaya246" value="45000" onchange="hitungTotal40()">
                                                                <label for="customCheckbox7216" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total40">Rp-</p>
                                                    </td>
                                                </tr>

                                                <tr>


                                                    <td>DU</td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya247 == 27000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7221" name="biaya247" value="27000" onchange="hitungTotal41()" checked>
                                                                <label for="customCheckbox7221" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7221" name="biaya247" value="27000" onchange="hitungTotal41()">
                                                                <label for="customCheckbox7221" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya248 == 27000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7222" name="biaya248" value="27000" onchange="hitungTotal41()" checked>
                                                                <label for="customCheckbox7222" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7222" name="biaya248" value="27000" onchange="hitungTotal41()">
                                                                <label for="customCheckbox7222" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya249 == 27000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7223" name="biaya249" value="27000" onchange="hitungTotal41()" checked>
                                                                <label for="customCheckbox7223" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7223" name="biaya249" value="27000" onchange="hitungTotal41()">
                                                                <label for="customCheckbox7223" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya250 == 27000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7224" name="biaya250" value="27000" onchange="hitungTotal41()" checked>
                                                                <label for="customCheckbox7224" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7224" name="biaya250" value="27000" onchange="hitungTotal41()">
                                                                <label for="customCheckbox7224" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya251 == 27000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7225" name="biaya251" value="27000" onchange="hitungTotal41()" checked>
                                                                <label for="customCheckbox7225" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7225" name="biaya251" value="27000" onchange="hitungTotal41()">
                                                                <label for="customCheckbox7225" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya252 == 27000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7226" name="biaya252" value="27000" onchange="hitungTotal41()" checked>
                                                                <label for="customCheckbox7226" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7226" name="biaya252" value="27000" onchange="hitungTotal41()">
                                                                <label for="customCheckbox7226" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total41">Rp-</p>
                                                    </td>
                                                </tr>

                                                <tr>

                                                    <td>c. Keperawatan</td>

                                                    <td> -</td>

                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya253 == 13000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7311" name="biaya253" value="13000" onchange="hitungTotal42()" checked>
                                                                <label for="customCheckbox7311" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7311" name="biaya253" value="13000" onchange="hitungTotal42()">
                                                                <label for="customCheckbox7311" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya254 == 13000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7312" name="biaya254" value="13000" onchange="hitungTotal42()" checked>
                                                                <label for="customCheckbox7312" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7312" name="biaya254" value="13000" onchange="hitungTotal42()">
                                                                <label for="customCheckbox7312" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya255 == 13000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7313" name="biaya255" value="13000" onchange="hitungTotal42()" checked>
                                                                <label for="customCheckbox7313" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7313" name="biaya255" value="13000" onchange="hitungTotal42()">
                                                                <label for="customCheckbox7313" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya256 == 13000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7314" name="biaya256" value="13000" onchange="hitungTotal42()" checked>
                                                                <label for="customCheckbox7314" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7314" name="biaya256" value="13000" onchange="hitungTotal42()">
                                                                <label for="customCheckbox7314" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya257 == 13000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7315" name="biaya257" value="13000" onchange="hitungTotal42()" checked>
                                                                <label for="customCheckbox7315" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7315" name="biaya257" value="13000" onchange="hitungTotal42()">
                                                                <label for="customCheckbox7315" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya258 == 13000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7316" name="biaya258" value="13000" onchange="hitungTotal42()" checked>
                                                                <label for="customCheckbox7316" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7316" name="biaya258" value="13000" onchange="hitungTotal42()">
                                                                <label for="customCheckbox7316" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total42">Rp-</p>
                                                    </td>
                                                </tr>

                                                <tr>

                                                    <td>d. Fisioterapi</td>

                                                    <td> -</td>

                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya259 == 26000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7411" name="biaya259" value="26000" onchange="hitungTotal43()" checked>
                                                                <label for="customCheckbox7411" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7411" name="biaya259" value="26000" onchange="hitungTotal43()">
                                                                <label for="customCheckbox7411" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya260 == 26000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7412" name="biaya260" value="26000" onchange="hitungTotal43()" checked>
                                                                <label for="customCheckbox7412" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7412" name="biaya260" value="26000" onchange="hitungTotal43()">
                                                                <label for="customCheckbox7412" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya261 == 26000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7413" name="biaya261" value="26000" onchange="hitungTotal43()" checked>
                                                                <label for="customCheckbox7413" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7413" name="biaya261" value="26000" onchange="hitungTotal43()">
                                                                <label for="customCheckbox7413" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya262 == 26000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7414" name="biaya262" value="26000" onchange="hitungTotal43()" checked>
                                                                <label for="customCheckbox7414" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7414" name="biaya262" value="26000" onchange="hitungTotal43()">
                                                                <label for="customCheckbox7414" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya263 == 26000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7415" name="biaya263" value="26000" onchange="hitungTotal43()" checked>
                                                                <label for="customCheckbox7415" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7415" name="biaya263" value="26000" onchange="hitungTotal43()">
                                                                <label for="customCheckbox7415" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <?php if ($biaya264 == 26000) { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7416" name="biaya264" value="26000" onchange="hitungTotal43()" checked>
                                                                <label for="customCheckbox7416" class="custom-control-label"></label>
                                                            <?php } else { ?>
                                                                <input class="custom-control-input" type="checkbox" id="customCheckbox7416" name="biaya264" value="26000" onchange="hitungTotal43()">
                                                                <label for="customCheckbox7416" class="custom-control-label"></label>
                                                            <?php
                                                            } ?>
                                                        </div>
                                                    </td>
                                                    <!-- <td> -</td> -->
                                                    <td>
                                                        <p id="total43">Rp-</p>
                                                    </td>
                                                </tr>

                                            </tbody>


                                            <tfoot>
                                                <tr>

                                                    <th colspan="8" class="text-center"></th>
                                                    <th class="text-center">TOTAL BIAYA</th>
                                                    <td>

                                                        <p id="totalSum"></p>

                                                    </td>


                                                </tr>

                                                <tr>

                                                    <th colspan="8" class="text-center"></th>
                                                    <th class="text-center">KLAIM INA CBGS</th>
                                                    <td>

                                                        <p id="klaiminacbg"></p>

                                                    </td>


                                                </tr>
                                            </tfoot>
                                        </table>
                                        <td>
                                            <!-- <input type=button value="Proses" onclick="proses()"> -->
                                            <button type="submit" value="Save" name="simpan" class="btn btn-block bg-gradient-primary btn-lg">SIMPAN</button>
                                        </td>
                                    </div>
                                </form>



                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2023 <a href="https://adminlte.io">ITI RSUD Ajibarang</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/plugins/jszip/jszip.min.js"></script>
    <script src="assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="assets/dist/js/demo.js"></script> -->
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    <!-- Maksimal harga DX Medis -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var nilai; // Declare the variable outside the event listener to make it accessible in both functions

        // Get the select elements
        var selectOption1 = document.getElementById('selectOption');
        var selectOption2 = document.getElementById('selectOption2');

        // Add an event listener to the first select element
        selectOption1.addEventListener('change', function() {
            // Get the selected option id
            var selectedOptionId = this.options[this.selectedIndex].id;

            // Check the selected option id and assign the corresponding value to the 'nilai' variable
            switch (selectedOptionId) {
                case 'cerebral-infarction':
                    nilai = 5211800;
                    break;
                case 'intracerebral-haemorrhage':
                    nilai = 4579000;
                    break;
                default:
                    nilai = 0;
                    break;
            }

            // Update the p element with the calculated value
            var klaiminacbg = document.getElementById('klaiminacbg');
            klaiminacbg.textContent = formatRupiah(nilai);

            // Enable the second select element
            selectOption2.disabled = false;

            // Call the calculateSum function to update the totalSum and check if it has reached the 'nilai' value
            calculateSum();
        });

        // Add an event listener to the second select element
        selectOption2.addEventListener('change', function() {
            // Get the selected option id
            var selectedOptionId = this.options[this.selectedIndex].id;

            // Check the selected option id and assign the corresponding value to the 'nilai' variable
            switch (selectedOptionId) {
                case 'hemiplegi':
                    nilai = 7081400;
                    break;
                case 'congestive-heart-failure':
                    nilai = 6276300;
                    break;
                default:
                    nilai = 0;
                    break;
            }

            // Update the p element with the calculated value
            var klaiminacbg = document.getElementById('klaiminacbg');
            klaiminacbg.textContent = formatRupiah(nilai);

            // Call the calculateSum function to update the totalSum and check if it has reached the 'nilai' value
            calculateSum();
        });

        // Function to calculate the total sum and display an alert if it reaches the 'nilai' value
        function calculateSum() {
            var checkboxes = document.getElementsByTagName("input");
            var totalSum = 0;

            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    var biaya = parseInt(checkboxes[i].value);
                    totalSum += biaya;
                }
            }

            // totalSum -= 2; // Subtract 2 from totalSum

            var totalRupiah = formatRupiah(totalSum);

            document.getElementById("totalSum").innerHTML = "" + totalRupiah;

            if (totalSum >= nilai) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Total biaya sudah mencapai Klaim INA CBGS ' + formatRupiah(nilai) + '!',
                    text: '',
                    confirmButtonText: 'OK'
                });
            }
        }

        // Function to format the value as Rupiah
        function formatRupiah(value) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(value);
        }
    </script>





</body>

</html>