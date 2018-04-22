<?php



$html = '<span id="simpleHstNote" class="simpleNoteDisplay"><table width="100%" border="0" cellpadding="0"><tbody><tr><td colspan="2" class="bktTMHistoryHdr">Wed, Mar 19 2014 at 6:35 PM--BookIt.com Team Member: RS took the below actions:</td></tr><tr><td class="GDOCs">Added GDOC:</td><td> SSRDOCSNKHK1/////30OCT87/M//HUEBNER/JOSHUA/SCOTT</td></tr><tr><td class="GDOCs">Added GDOC:</td><td>SSRPSPTYYHK1///30OCT87/M-HUEBNER/JOSHUA</td></tr><tr><td class="GDOCs">Added GDOC:</td><td> SSRDOCSNKHK1/////08JUL89/F//BLEICHER/CHRISTINE/JUNE</td></tr><tr><td class="GDOCs">Added GDOC:</td><td>SSRPSPTYYHK1///08JUL89/F-BLEICHER/CHRISTINE</td></tr><tr><td class="GDOCs">Added GDOC:</td><td> SSRDOCSYYHK1/////30OCT87/M//HUEBNER/JOSHUA/SCOTT</td></tr><tr><td class="GDOCs">Added GDOC:</td><td> SSRDOCSYYHK1/////08JUL89/F//BLEICHER/CHRISTINE/JUNE</td></tr><tr><td class="OrSegs">Added segment:</td><td>Spirit Airlines Flight # 409 R Class 07MAY ORD-FLL  5:30 AM -  9:27 AM</td></tr><tr><td class="GDOCs">Added GDOC:</td><td> SSRDOCSYYHK1/////30OCT87/M//HUEBNER/JOSHUA/SCOTT</td></tr><tr><td class="OrSegs">Added segment:</td><td>Spirit Airlines Flight # 783 R Class 07MAY FLL-PUJ 10:30 AM - 12:52 PM</td></tr><tr><td class="OrSegs">Added segment:</td><td>Spirit Airlines Flight # 784 T Class 17MAY PUJ-FLL  1:37 PM -  4:05 PM</td></tr><tr><td class="OrSegs">Added segment:</td><td>Spirit Airlines Flight # 464 T Class 17MAY FLL-ORD  8:40 PM - 10:53 PM</td></tr></tbody></table><table width="100%" border="0" cellpadding="0"><tbody><tr><td colspan="2" class="arlnHistoryHdr">Wed, Mar 19 2014 at 6:35 PM-- Spirit Airlines took the below actions:</td></tr><tr><td class="Msg">Sent message:</td><td>TONK ON/BEFORE 20MAR 2335Z OTHERWISE WILL BE XLD</td></tr><tr><td class="Msg">Sent message:</td><td>MOST FARES EXCL GOV FARES REQUIRE TKT WITHIN 24 HRS</td></tr><tr><td class="Msg">Sent message:</td><td>Itinerary has been confirmed. Please provide payment.</td></tr><tr><td class="Msg">Sent message:</td><td>Will cancel within 24hs without payment.</td></tr><tr><td class="Msg">Sent message:</td><td>Total amount due is $1112.16</td></tr><tr><td class="Sc">Changed:</td><td>Spirit Airlines # 409 R Class, 07MAY ORD-FLL  5:30 AM -  9:27 AM</td></tr><tr><td>from:</td><td>confirmed</td></tr><tr><td>to:</td><td>modified</td></tr><tr><td class="Confs">Confirmed segment:</td><td>Spirit Airlines # 409 R Class, 07MAY ORD-FLL, Conf. #  R1SLUR</td></tr><tr><td class="Sc">Proposed alternate flight:</td><td>Spirit Airlines # 409 R Class 07MAY ORD-FLL  5:30 AM -  9:25 AM</td></tr><tr><td class="Confs">Confirmed segment:</td><td>Spirit Airlines # 783 R Class, 07MAY FLL-PUJ, Conf. #  R1SLUR</td></tr><tr><td class="Confs">Confirmed segment:</td><td>Spirit Airlines # 784 T Class, 17MAY PUJ-FLL, Conf. #  R1SLUR</td></tr><tr><td class="Sc">Changed:</td><td>Spirit Airlines # 464 T Class, 17MAY FLL-ORD  8:40 PM - 10:53 PM</td></tr><tr><td>from:</td><td>confirmed</td></tr><tr><td>to:</td><td>modified</td></tr><tr><td class="Confs">Confirmed segment:</td><td>Spirit Airlines # 464 T Class, 17MAY FLL-ORD, Conf. #  R1SLUR</td></tr><tr><td class="Sc">Proposed alternate flight:</td><td>Spirit Airlines # 464 T Class 17MAY FLL-ORD  8:20 PM - 10:33 PM</td></tr></tbody></table><table width="100%" border="0" cellpadding="0"><tbody><tr><td colspan="2" class="bktXPHistoryHdr">Wed, Mar 19 2014 at 6:35 PM-- BookIt.com System took the below actions:</td></tr><tr><td class="GDOCs wspnEmail" title="Emails may show here with a ? this is because Worldspan does not recognize some special characters and should not cause alarm.">Added email address:</td><td class="wspnEmail" title="Emails may show here with a ? this is because Worldspan does not recognize some special characters and should not cause alarm.">JOSHHUEBNER33//YAHOO.COM</td></tr><tr><td class="Tkting">Added form of payment:</td><td> Visa card ending in 4836, expiring on 06-15 for Joshua Scott</td></tr></tbody></table><table width="100%" border="0" cellpadding="0"><tbody><tr><td colspan="2" class="arlnHistoryHdr">Wed, Mar 19 2014 at 6:35 PM-- Spirit Airlines took the below actions:</td></tr><tr><td class="Tkting">Quoted total fare of:</td><td> $1112.16 USD</td></tr><tr><td class="Tkting">Charged credit card:</td><td> in the amount of $1112.16 USD</td></tr><tr><td class="Tkting">Comfirmed payment:</td><td> funds collected, remaining balance $0.00</td></tr><tr><td class="Confs">Comfirmed flight:</td><td>confirmation number-  R1SLUR</td></tr></tbody></table></span>
';


//==============================================================
//==============================================================
//==============================================================

include("../mpdf.php");

$mpdf=new mPDF('c'); 

$mpdf->SetDisplayMode('fullpage');

// LOAD a stylesheet
$stylesheet = file_get_contents('http://pnrbuilder.com/new/_css/notes.css');
$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text

$mpdf->WriteHTML($html);

$mpdf->Output('PNRHistory.pdf','D');;

exit;
//==============================================================
//==============================================================
//==============================================================

?>