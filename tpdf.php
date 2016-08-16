<?php 
//session_start();

$comapny = $_SESSION['company_name'];
$email = $_SESSION['email'];
$header = "<img src='img_pdf/header.png' height='76' width='250' />";
$footer = "<p style='text-align: right; color: #8BB5C3'>www.koneo.se</p>";
$page_2_values_button = $_SESSION['page_2_choice'];

   for ($valp4=0; $valp4 < count($_SESSION['valuename_importance']); $valp4++) { 
        	${"page_4_" . $valp4} =  $_SESSION['valuename_importance'][$valp4];
        }

 for ($valp4=0; $valp4 < count($_SESSION['valuename_importance_num']); $valp4++) { 
        	${"page_4_" . $valp4} =  $_SESSION['valuename_importance_num'][$valp4];
        }
$final_close_sum = $_SESSION['final_close_result'];
$beat_budget_status = $_SESSION['beat_budget_status'];
$beat_budget_calc = ((int) $_SESSION['budget'] - (int) $_SESSION['today_pay']) - (int) $_SESSION['months_remaining']; ///<($budget - $today)*months>
$matched_months = $_SESSION['final_close_result_month'];
//////////processing starts
include 'mpdf60'.DIRECTORY_SEPARATOR.'mpdf.php';

 $mpdf=new mPDF('utf-8', 'A4-P');

///page 1
$html_page_1 = "<br><br><br><p style='text-align: center'><strong>AFFÄRSFÖRSLAG: </strong></p>";
$html_page_1 .= "<p style='text-align: center'>{$comapny}</p>";
$html_page_1 .= "<p style='text-align: center'>{$email}</p>";
$html_page_1 .= "<br><br><br><br><br>";
$html_page_1 .= "<p style='text-align: center'><img src='img_pdf/image001.png' width='600' height='550' /></p>";
$html_page_1 .= "<br>";

$html_page_1 .= "<p style='font-size: 10px'>Koneo<br>Kryddstigen 8<br>Gävle<br>Telefon 026 – 60 04 90<br>E-post info.gavle@koneo.se<br>Org nr 556923-9972</p>";
//page 2
$html_page_1 .= "<br><br><br><br><br><br>";

$html_page_2 = "<p style='margin: 2rem 2rem'> </p>";
$html_page_2 .= "<p style='margin: 2rem 2rem'> </p>";

$html_page_1 .= "<p style='margin: 0rem 2rem; padding: 5rem 0rem 0rem 0rem; font-size: 20px'><strong>Koneo – din lokala IT-leverantör </strong></p>";
$html_page_1 .= "<p style='margin: 0rem 0rem 0rem 2rem; text-align: justify'>Koneo Gävle är ett privatägt bolag som ingår i koncern med ytterligare Koneo återförsäljare i landet. <br>Koneos affärsidé är att utveckla, bygga och underhålla IT- och dokumentlösningar för våra kunder. Vi skapar värde genom att vara nära våra kunder, bygga långsiktiga relationer och föreslå innovativa lösningar. <br>Vår vision är att stärka vår position på den lokala marknaden, från att vara ett tjänsteföretag med ett heltäckande erbjudande inom både IT och dokumenthantering.</p>";

$html_page_1 .= "<p style='margin: 0rem 2rem; padding: 1rem 0rem 0rem 0rem; font-size: 20px'><strong>Koneo – en rikstäckande leverantör </strong></p>";
$html_page_1 .= "<p style='margin: 0rem 0rem 0rem 2rem; text-align: justify'>Koneo är en av Sveriges ledande leverantörer av kompletta IT-lösningar för små och medelstora<br> företag och organisationer. Vi finns nära våra kunder på ett 50-tal platser i hela landet.</p>";

$html_page_1 .= "<p style='margin: 0rem 2rem; padding: 1rem 0rem 0rem 0rem; font-size: 20px'><strong>Koneo – en märkesoberoende leverantör</strong></p>";
$html_page_1 .= "<p style='margin: 0rem 0rem 0rem 2rem; text-align: justify'>Koneo samarbetar med de flesta stora leverantörerna på marknaden vad det gäller IT utrustning<br> samt produkter för utskrift och dokumenthantering. Detta garanterar att våra kunder får rätt <br>utrustning och tjänster efter varje unikt behov och önskemål.</p>";

$html_page_1 .= "<p style='margin: 0rem 2rem; padding: 1rem 0rem 0rem 0rem; font-size: 20px'><strong>Koneo – vinner utmärkelser</strong></p>";
$html_page_1 .= "<p style='margin: 0rem 0rem 0rem 2rem; text-align: justify'>Koneo Gävle har utsetts till bästa leverantör i Gävleborg, i stor Custice undersökning.<br><br> 
Konica Minolta vinner pris för 4:e året i rad i BLI (Buyers Lab Institute), årets multifunktionsprodukter, <br> <br> </p>";
$html_page_1 .= "<p style='text-align: center'><img src='img_pdf/p2_b1.png' width='600' /></p>";
$html_page_1 .= "<p style='text-align: center'><img src='img_pdf/p2_b2.png' width='200' height='200' /></p>";

$html_page_1 .= "<p style='margin: 0rem 2rem; padding: 5rem 0rem 0rem 0rem; font-size: 20px'><strong>Bakgrund </strong></p>";
$html_page_1 .= "<p style='margin: 0rem 0rem 0rem 2rem; text-align: justify'>Vid vårat senaste möte pratade vi om era önskemål kring kopieringsmaskin, skrivare och<br>  skanner. Ni vill se förslag på ny utrustning som kan ersätta er befintliga skrivare.
</p>";

$html_page_1 .= "<p style='margin: 0rem 2rem; padding: 4rem 0rem 0rem 0rem; font-size: 15px'><strong>Valda funktioner för er dokumenthantering: </strong></p>";

$html_page_1 .= "<p style='margin: 0rem 2rem; padding: 0rem 0rem 0rem 0rem; font-size: 15px'><ul>
	<li><strong>A4<strong></li>";

if (!empty($page_2_values_button)) {
		foreach ($page_2_values_button as $key => $value) {
			$html_page_1 .= "<li><strong>{$value}</strong></li>";
		}
}

$html_page_1 .= "</ul></p>";
$html_page_1 .= "<p style='margin: 0rem 2rem; padding: 4rem 0rem 0rem 0rem; font-size: 15px'><strong>Prioritet gällande (högre värde = högre prioritet):</strong></p>";
$html_page_1 .= "<p style='margin: 0rem 2rem; padding: 2rem 0rem 0rem 0rem; font-size: 15px'><strong>Driftsäkerhet: {$page_4_0}</strong></p>";
$html_page_1 .= "<p style='margin: 0rem 2rem; padding: 0rem 0rem 0rem 0rem; font-size: 15px'><strong>Ekonomi: {$page_4_1}</strong></p>";
$html_page_1 .= "<p style='margin: 0rem 2rem; padding: 0rem 0rem 0rem 0rem; font-size: 15px'><strong>Hastighet: {$page_4_2}</strong></p>";
$html_page_1 .= "<p style='margin: 0rem 2rem; padding: 0rem 0rem 0rem 0rem; font-size: 15px'><strong>Mobilitet: {$page_4_3}</strong></p>";

$mpdf->SetHTMLHeader($header);
$mpdf->SetHTMLFooter($footer);

$mpdf->WriteHTML($html_page_1);
$mpdf->AddPage();

$html_page_3 = "<p style='margin: 0rem 2rem; padding: 4rem 0rem 0rem 0rem; font-size: 15px'><strong>Förslag till ny lösning</strong></p>";
$html_page_3 .= "<p style='margin: 0rem 2rem; padding: 0rem 0rem 0rem 0rem;'>Utifrån era valda funktioner och parametrar presenterar jag härmed följande förslag.</p>";
$html_page_3 .= "<p style='margin: 0rem 2rem; padding: 2rem 0rem 0rem 0rem; font-size: 15px'><strong>Samsung SL-X4300 </strong></p>";
$html_page_3 .= "<p style='margin: 0rem 6rem; padding: 0rem 0rem 0rem 0rem; font-size: 15px'><br><ul style='margin: 0rem 3rem;'>";
$page_3_values_list = array("Digital fullfärgsmaskin", "Kopierar och skriver ut både svart/vit och färg", "Inbyggt nätverkskort, fungerar som central skrivare och skanner", "Automatisk dokumentmatare", "Automatisk dubbelsidighet", "Förstoring och förminskning 25-400%", "Hanterar A3, A4 och A5", "Pappersmagasin", "Efterbehandling för sortering, häftning", "Skanning till E-post, Mapp, FTP samt USB", "Upplösning 1200x1200dpi", "PostScript för stöd mot MAC datorer");

if (!empty($page_3_values_list)) {
		foreach ($page_3_values_list as $key => $value) {
			$html_page_3 .= "<li>	{$value}</li>";
		}
}

$html_page_3 .= "</ul></p>";

$mpdf->WriteHTML($html_page_3);

$mpdf->AddPage();
$html_page_4 = "<p style='margin: 0rem 2rem; padding: 4rem 0rem 0rem 0rem; font-size: 15px'><img src='img_pdf/p4_img.png' /></p>";


$mpdf->WriteHTML($html_page_4);


$mpdf->AddPage();
$html_page_5 = "<p style='margin: 0rem 2rem; padding: 4rem 0rem 0rem 0rem; font-size: 15px'><strong>Finansiering</strong></p>";
$html_page_5 .= "<p style='margin: 0rem 2rem; padding: 0rem 0rem 0rem 0rem; text-align: justify'>Då ni finansierar er utrustning via Koneo finns alltid möjlighet att när som helst uppgradera utrustningen eller på annat sätt göra förändringar på er utrustning. Detta ger er en handlingsfrihet och en möjlighet att alltid hålla er uppdaterade vad det gäller IT och dokumentutrustning.<br><br>
</p>";

$html_page_5 .= "<p style='margin: 0rem 2rem; padding: 4rem 0rem 0rem 0rem; font-size: 15px'><strong>Hyra</strong></p>";
$html_page_5 .= "<p style='margin: 0rem 2rem; padding: 0rem 0rem 0rem 0rem; font-size: 15px'><strong>Samsung SL-X4300 		</strong>{$final_close_sum} kr / månad med en avtalstid på {$matched_months} månader</p>";

if ($beat_budget_status) {
	$html_page_5 .= "<p style='margin: 0rem 2rem; padding: 4rem 0rem 0rem 0rem; font-size: 15px'><strong>Besparing</strong></p>";
	$html_page_5 .= "<p style='margin: 0rem 2rem; padding: 0rem 0rem 0rem 0rem; text-align: justify'>Genom att välja detta förslag så gör ni en besparing på {$beat_budget_calc} kr/under avtalsperioden
<br><br></p>";


}
	$html_page_5 .= "<p style='margin: 0rem 2rem; padding: 2rem 0rem 0rem 0rem; font-size: 15px'><strong>Service </strong></p>";
	$html_page_5 .= "<p style='margin: 0rem 2rem; padding: 0rem 0rem 0rem 0rem;'>
	Vi på Koneo Gävle erbjuder alltid fullserviceavtal till våra kunder. <br>
Ett s.k ”all-inclusive avtal”<br>
Vår serviceavdelning erbjuder service på plats hos våra kunder samt fjärrsupport och telefon-<br>support. Serviceavtalet innefattar all förebyggande, presumtiv och akut service.<br>
Alla reservdelar och slitdelar ingår samt resa och arbete för tekniker. Även förbrukningsmaterial <br>i form av toner ingår till ingående volym.<br>
1000st svart och 500st färg kopior ingår i serviceavtalet. 

	<br><br>
</p>";
$html_page_5 .= "<p style='margin: 0rem 2rem; padding: 0rem 0rem 0rem 0rem; font-size: 15px; text-align: center'><img src='img_pdf/p4-2.jpg' /></p>";

$mpdf->WriteHTML($html_page_5);

$mpdf->AddPage();
// $mpdf->AddPage();

$html_page_7 = "<p style='margin: 0rem 2rem; padding: 4rem 0rem 0rem 0rem; font-size: 15px'><strong>Övriga villkor
</strong></p>";


$html_page_7 .= "<p style='margin: 0rem 2rem; padding: 1rem 0rem 0rem 0rem; font-size: 12px;'><b>Giltighetstid</b></p>";

$html_page_7 .= "<p style='margin: 0rem 2rem; padding: 1rem 0rem 0rem 0rem; font-size: 12px;'>Offerten är giltig 20 dagar
</p>";

$html_page_7 .= "<p style='margin: 0rem 2rem; padding: 1rem 0rem 0rem 0rem; font-size: 12px;'><b>Leverans och tidsplan</b></p>";

$html_page_7 .= "<p style='margin: 0rem 2rem; padding: 1rem 0rem 0rem 0rem; font-size: 12px;'>Leverans enligt överenskommelse. Frakt tillkommer.
</p>";

$html_page_7 .= "<p style='margin: 0rem 2rem; padding: 1rem 0rem 0rem 0rem; font-size: 12px;'><b>Installation nätverk
</b></p>";

$html_page_7 .= "<p style='margin: 0rem 2rem; padding: 1rem 0rem 0rem 0rem; font-size: 12px;'>Installation kopieringsmaskin/skrivare i nätverk, installation av drivrutiner på server eller lokal <br>arbetsstation mm, uppsättning för mejlkonton vid e-post skanning, grundinstallation enligt <br>specifika önskemål för maskinens standard uppförande. Installation löpande normal timtaxa.
</p>";


$html_page_7 .= "<p style='margin: 0rem 2rem; padding: 1rem 0rem 0rem 0rem; font-size: 12px;'><b>Mervärdesskatt
</b></p>";

$html_page_7 .= "<p style='margin: 0rem 2rem; padding: 1rem 0rem 0rem 0rem; font-size: 12px;'>Samtliga priser exkl. moms.
</p>";

$html_page_7 .= "<p style='margin: 0rem 2rem; padding: 12rem 0rem 0rem 0rem; font-size: 12px;'><b>
Med vänliga hälsningar
</b></p>";
$html_page_7 .= "<p style='margin: 0rem 2rem; padding: 2rem 0rem 0rem 0rem; font-size: 12px;'>……………………………………..
</p>";
$html_page_7 .= "<p style='margin: 0rem 2rem; padding: 0rem 0rem 0rem 0rem; font-size: 12px;'><b>
Christer Skogsberg
</b></p>";
$html_page_7 .= "<p style='margin: 0rem 2rem; padding: 0rem 0rem 0rem 0rem; font-size: 12px;'>
Säljare Dokumenthantering
</p>";
$html_page_7 .= "<p style='margin: 0rem 2rem; padding: 0rem 0rem 0rem 0rem; font-size: 12px;'>Koneo Gävle</p>";
$mpdf->WriteHTML($html_page_7);


$mpdf->Output();
if ($beat_budget_status) {
	empty_except_p1();
} else {
	session_unset(); 
	// destroy the session 
	session_destroy(); 
}
exit;
?>
