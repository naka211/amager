<?php //æøå
include "smartsend-variables.php"; //Change this to the correct shop file

function pacsoft_wraptext($string) {
	if (strlen($string) > 30) {
		$freetext = wordwrap($string, 30);
		$i = strpos($freetext, "\n");
		if ($i) {
			$string = array(0 => substr($string, 0, $i), 1=> substr($string, $i+1) );
		}
	}
	if(!is_array($string)) {
		$string = array(0 => $string, 1=> '' );
	}
return $string;
}

function pacsoft_filterHTMLSingle(&$value) {
	$value = str_replace('&#039;', '&apos;', htmlspecialchars($value, ENT_QUOTES, 'UTF-8'));
	//$value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function pacsoft_filterUrlencodeSingle(&$value) {
	$value = urlencode($value);
}

function utf8_encode_array(&$value) {
	$value = utf8_encode($value);
}

if($pacsoftCustoms == 1) {
	include 'smartsend-customs.php';
}

$pacsoftRcvid =  (string) ( ($parameter['rcvid']['userid'] ? $parameter['rcvid']['userid'] : 'guest').'-'.time().'-'.rand(100000,999999) );

if($parameter['agentto']['id'] != '') {
	$pacsoftAgentto = (string) ( ($parameter['agentto']['id'] ? $parameter['agentto']['id'] : 'guest').'-'.time().'-'.rand(100000,999999) );
	$pacsoftTo = $pacsoftAgentto;
} else {
	$pacsoftAgentto = (string) '';
	$pacsoftTo = $pacsoftRcvid;
}

$pacsoftOrder = array(); 
$pacsoftOrder [] = array( //Reciever information
	'rcvid' => array(
		'id' => (string) $pacsoftRcvid, //only if no pickup location is choosen. If so, then make it something else (use time and rand)
		'name' => (string) ($parameter['rcvid']['company'] ? $parameter['rcvid']['company'].' - ' : '').$parameter['rcvid']['name'],
		'contact' => (string) $parameter['rcvid']['contact'],
		'address1' => (string) $parameter['rcvid']['address1'],
		'address2' => (string) $parameter['rcvid']['address2'], 		
		'city' => (string) $parameter['rcvid']['city'],
		'country' => (string) $parameter['rcvid']['country'],
		'zipcode' => (string) $parameter['rcvid']['zipcode'],
		'phone' => (string) $parameter['phone']
	),
	'agentto' => array(
		'type' => (string) $parameter['agentto']['type'],
		'id' => (string) $pacsoftAgentto,
		'parid' => (string) $parameter['agentto']['parid'],
		'name' => (string) $parameter['agentto']['name'],
		'contact' => (string) $parameter['agentto']['contact'],
		'address1' => (string) $parameter['agentto']['address1'],
		'address2' => (string) $parameter['agentto']['address2'], 		
		'city' => (string) $parameter['agentto']['city'],
		'country' => (string) $parameter['agentto']['country'],
		'zipcode' => (string) $parameter['agentto']['zipcode'],
	),
	'reference' => (string) ( $parameter['orderno'].'-'.time().'-'.rand(100000,999999)),
	'orderNo' => (string) $parameter['orderno'],
	'to' => (string) $pacsoftTo, 
	'email' => (string) $parameter['email'],
	'sms' => (string) $parameter['sms'],
	'VALUE' => (string) ( (int)$parameter['VALUE'] ),
	'VALUEcurrency' => (string) "DKK"
);

$pacsoftServices = array();
$pacsoftFreetext = pacsoft_wraptext($parameter['freetext']);

if($Services['srvid'] == 'auto') {
	if($parameter['agentto']['id'] != '') {
		$srvid = 'private';
	} else {
		if($parameter['rcvid']['company'] != '') {
			$srvid = 'commercial';
		} else {
			$srvid = 'private';
		}
	}
} else {
	$srvid = $Services['srvid'];
}

$pacsoftServices[] = array(
	'srvid' => (string) $srvid,
	'freetext1' => (string) $pacsoftFreetext[0],
	'freetext2' => (string) $pacsoftFreetext[1],
	'PRINTFREETEXT' => (string) $Services['PRINTFREETEXT'],
	'LNKPRTN' => (string) $Services['LNKPRTN'],
	'LNKPRTNemail' => (string) $Services['LNKPRTNemail'],
	'DLV' => (string) $Services['DLV'],
	'DLVFLEX' => (string) $Services['DLVFLEX'],
	'GREEN' => (string) $Services['GREEN'],
	'NOTSMS' => (string) $Services['NOTSMS'],
	'DNG' => (string) $Services['DNG'],
	'POD' => (string) $Services['POD'],
	'NOTEMAIL' => (string) $Services['NOTEMAIL'],
	'RETURN' => (string) $Services['RETURN'],
	'parcelcopies' => (string) $Services['parcelcopies'],
	'parcelweight' => (string) $Services['parcelweight'],
	'parcelcontents' => (string) $Services['parcelcontents'],
	'fromID' => (string) $Services['fromID'],
	'customs' => $pacsoftCustoms,
	'customsInfo' => (isset($pacsoftCustomsInfo) ? $pacsoftCustomsInfo : '')
);

$pacsoftInfo = array(
	"smartsendID" => $parameter['smartsendID'],
	"key" => $parameter['smartsendKey'],
	"check" => "",
	"version" => "5",
	"bulk" => "0",
	"HTMLESCAPE" => "1",
	"redirect" => $parameter['redirect'],
	"system" => $parameter['system']);

if($pacsoftUTF8encode == '1') {
	array_walk_recursive($pacsoftOrder, "utf8_encode_array");
	array_walk_recursive($pacsoftServices, "utf8_encode_array");
	array_walk_recursive($pacsoftInfo, "utf8_encode_array");
}

if($parameter['HTMLencode'] == '1') {
	array_walk_recursive($pacsoftOrder, "pacsoft_filterHTMLSingle");
}
				
//Encrypt the data used to create the label
$pacsoftInfo['check'] = md5(serialize(array(0 => $pacsoftOrder, 1 => $pacsoftInfo['key'], 2=> $pacsoftInfo['smartsendID'])));
			
array_walk_recursive($pacsoftOrder, "pacsoft_filterUrlencodeSingle");

//SMARTSEND END

//Direct part start
if($pacsoftDisplayType == 'direct') {
	$URL_DATA = http_build_query(array(
					'pacsoftOrder'=>$pacsoftOrder,
					'pacsoftInfo'=>$pacsoftInfo,
					'pacsoftServices'=>$pacsoftServices ))
				;
		 $c = curl_init();
		 curl_setopt($c, CURLOPT_URL, $SmartSendURL);
		 curl_setopt($c, CURLOPT_POST, true);
		 curl_setopt($c, CURLOPT_POSTFIELDS, $URL_DATA);
		 curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		 curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
		 echo curl_exec($c);
		 curl_close($c);
}
//Direct part end
?>

<div class="smartsend <?php echo $pacsoftSystem; ?>">

<?php
//FORM PART START - Only if one wishes to use the form solution
if($pacsoftDisplayType == 'form' || $pacsoftDisplayType == 'both') {
?>

<LINK REL=StyleSheet HREF="<?php echo $SmartSendURL; ?>css.css" TYPE="text/css" MEDIA="screen">						
<form name="SmartSendForm" action="<?php echo $SmartSendURL; ?>server_request.php<?php if($pacsoftTest == 1) { echo "?test=1"; } ?>" method="post" target="_blank">

<?php
$i = 0;
foreach ($pacsoftServices as $pacsoftServicesData) {
?>
	<div class="order">
	
	<input type="hidden" value="<?php echo $pacsoftServicesData['srvid']; ?>" name="pacsoftServices[<?php echo $i; ?>][srvid]" />

        
    <div class="NOTEMAIL">
            <input type="hidden" name="pacsoftServices[<?php echo $i; ?>][NOTEMAIL]" value="0">
            <input id="NOTEMAIL" type="checkbox" name="pacsoftServices[<?php echo $i; ?>][NOTEMAIL]" value="1"<?php echo ($pacsoftServicesData['NOTEMAIL'] == '1' ? ' checked="yes"' : '') ?> />
            <label for="NOTEMAIL">E-mail-advisering </label><br />
	</div>

	<div class="NOTSMS">
		<input type="hidden" name="pacsoftServices[<?php echo $i; ?>][NOTSMS]" value="0">
		<input id="NOTSMS" type="checkbox" name="pacsoftServices[<?php echo $i; ?>][NOTSMS]" value="1"<?php echo ($pacsoftServicesData['NOTSMS'] == '1' ? ' checked="yes"' : '') ?> />
		<label for="NOTSMS">SMS-advisering</label><br />
	</div>
        
	<div class="GREEN">
		<input type="hidden" name="pacsoftServices[<?php echo $i; ?>][GREEN]" value="0">
		<input id="GREEN" type="checkbox" name="pacsoftServices[<?php echo $i; ?>][GREEN]" value="1"<?php echo ($pacsoftServicesData['GREEN'] == '1' ? ' checked="yes"' : '') ?> />
		<label for="GREEN">Pakke med omtanke </label><br />
	</div>
	
	<div class="DNG">
		<input type="hidden" name="pacsoftServices[<?php echo $i; ?>][DNG]" value="0">
		<input id="DNG" type="checkbox" name="pacsoftServices[<?php echo $i; ?>][DNG]" value="1"<?php echo ($pacsoftServicesData['DNG'] == '1' ? ' checked="yes"' : '') ?> />
		<label for="DNG">Farligt indhold</label><br />
	</div>

	<div class="DLV">
		<input type="hidden" name="pacsoftServices[<?php echo $i; ?>][DLV]" value="0">
		<input id="DLV" type="checkbox" name="pacsoftServices[<?php echo $i; ?>][DLV]" value="1"<?php echo ($pacsoftServicesData['DLV'] == '1' ? ' checked="yes"' : '') ?> />
		<label for="DLV">Omdeling</label><br />
	</div>

	<div class="POD">
		<input type="hidden" name="pacsoftServices[<?php echo $i; ?>][POD]" value="0">
		<input id="POD" type="checkbox" name="pacsoftServices[<?php echo $i; ?>][POD]" value="1"<?php echo ($pacsoftServicesData['POD'] == '1' ? ' checked="yes"' : '') ?> />
		<label for="POD">Modtagerkvittering</label><br />
	</div>        
                	
	<div class="DLVFLEX">
		<input type="hidden" name="pacsoftServices[<?php echo $i; ?>][DLVFLEX]" value="0">
		<input id="DLVFLEX" type="checkbox" name="pacsoftServices[<?php echo $i; ?>][DLVFLEX]" value="1"<?php echo ($pacsoftServicesData['DLVFLEX'] == '1' ? ' checked="yes"' : '') ?> />
		<label for="DLVFLEX">Flexlevering</label><br />
	</div>

	<div class="LNKPRTN">
		<input type="hidden" name="pacsoftServices[<?php echo $i; ?>][LNKPRTN]" value="0">
		<input id="LNKPRTN" type="checkbox" name="pacsoftServices[<?php echo $i; ?>][LNKPRTN]" value="1"<?php echo ($pacsoftServicesData['LNKPRTN'] == '1' ? ' checked="yes"' : '') ?> />
		<input type="hidden" name="pacsoftServices[<?php echo $i; ?>][LNKPRTNemail]" value="<?php echo $pacsoftServicesData['LNKPRTNemail']; ?>"/>
		<label for="LNKPRTN">Send label til mail</label><br />
	</div>

	<div class="parcelcopies">
		<select id="parcelcopies" name="pacsoftServices[<?php echo $i; ?>][parcelcopies]">
			<option value="1"<?php echo ($pacsoftServicesData['parcelcopies'] == '1' ? ' selected="selected"' : ''); ?>>1</option>
			<option value="2"<?php echo ($pacsoftServicesData['parcelcopies'] == '2' ? ' selected="selected"' : ''); ?>>2</option>
			<option value="3"<?php echo ($pacsoftServicesData['parcelcopies'] == '3' ? ' selected="selected"' : ''); ?>>3</option>
			<option value="4"<?php echo ($pacsoftServicesData['parcelcopies'] == '4' ? ' selected="selected"' : ''); ?>>4</option>
			<option value="5"<?php echo ($pacsoftServicesData['parcelcopies'] == '5' ? ' selected="selected"' : ''); ?>>5</option>
			<option value="6"<?php echo ($pacsoftServicesData['parcelcopies'] == '6' ? ' selected="selected"' : ''); ?>>6</option>
			<option value="7"<?php echo ($pacsoftServicesData['parcelcopies'] == '7' ? ' selected="selected"' : ''); ?>>7</option>
			<option value="8"<?php echo ($pacsoftServicesData['parcelcopies'] == '8' ? ' selected="selected"' : ''); ?>>8</option>
			<option value="9"<?php echo ($pacsoftServicesData['parcelcopies'] == '9' ? ' selected="selected"' : ''); ?>>9</option>
		</select>
		<label for="parcelcopies">Antal kolli</label>
	</div>        
    <div class="RETURN">
		<input id="RETURN0" type="radio" name="pacsoftServices[<?php echo $i; ?>][RETURN]" value="0"<?php echo ($pacsoftServicesData['RETURN']=='0' ? ' checked' : '') ?>><label for="RETURN0">Pakkelabel</label>
		<returlabel>Returlabels</returlabel>
                <input id="RETURN1"type="radio" name="pacsoftServices[<?php echo $i; ?>][RETURN]" value="1"<?php echo ($pacsoftServicesData['RETURN']=='1' ? ' checked' : '') ?>><label for="RETURN1">Retur-label</label>
		<input id="RETPUP" type="radio" name="pacsoftServices[<?php echo $i; ?>][RETURN]" value="RETPUP"<?php echo ($pacsoftServicesData['RETURN']=='RETPUP' ? ' checked' : '') ?>><label for="RETPUP">Pakke afh. Erhverv</label>
		<input id="RETCAR" type="radio" name="pacsoftServices[<?php echo $i; ?>][RETURN]" value="RETCAR"<?php echo ($pacsoftServicesData['RETURN']=='RETCAR' ? ' checked' : '') ?>><label for="RETCAR">Printes af PDK</label>
	</div>



	

	<div class="freetext1">
		<label for="freetext1">Leveringsnote 1</label><br/>
                <input type="text" id="freetext1" name="pacsoftServices[<?php echo $i; ?>][freetext1]" value="<?php echo $pacsoftServicesData['freetext1']; ?>">
	</div>
	<div class="freetext2">
		<label for="freetext2">Leveringsnote 2</label><br/>
                <input type="text" id="freetext2" name="pacsoftServices[<?php echo $i; ?>][freetext2]" value="<?php echo $pacsoftServicesData['freetext2']; ?>">
	</div>
	
	<div class="PRINTFREETEXT">
                <input type="hidden" name="pacsoftServices[<?php echo $i; ?>][PRINTFREETEXT]" value="0">
                <input id="PRINTFREETEXT" type="checkbox" name="pacsoftServices[<?php echo $i; ?>][PRINTFREETEXT]" value="1"<?php echo ($pacsoftServicesData['PRINTFREETEXT'] == '1' ? ' checked="yes"' : '') ?> />
                <label for="PRINTFREETEXT">Print leveringsnoter</label>
	</div>	

	<div class="parcelweight">
		<label for="parcelweight">Vægt (kg)</label><br />
		<input id="parcelweight" type="number" name="pacsoftServices[<?php echo $i; ?>][parcelweight]" step="0.01" value="<? echo $pacsoftServicesData['parcelweight']; ?>">
	</div>
	
	<div class="parcelcontents">
                <label for="parcelcontents">Indhold</label><br />
		<input id="parcelcontents" type="text" name="pacsoftServices[<?php echo $i; ?>][parcelcontents]" value="<?php echo $pacsoftServicesData['parcelcontents'];?>" />
		
	</div>
	
	<div class="fromID">
		<select id="fromID" name="pacsoftServices[<?php echo $i; ?>][fromID]">
			<option value="1"<?php echo ($pacsoftServicesData['fromID'] == '1' ? ' selected="selected"' : ''); ?>>1</option>
			<option value="2"<?php echo ($pacsoftServicesData['fromID'] == '2' ? ' selected="selected"' : ''); ?>>2</option>
			<option value="3"<?php echo ($pacsoftServicesData['fromID'] == '3' ? ' selected="selected"' : ''); ?>>3</option>
			<option value="4"<?php echo ($pacsoftServicesData['fromID'] == '4' ? ' selected="selected"' : ''); ?>>4</option>
			<option value="5"<?php echo ($pacsoftServicesData['fromID'] == '5' ? ' selected="selected"' : ''); ?>>5</option>
			<option value="6"<?php echo ($pacsoftServicesData['fromID'] == '6' ? ' selected="selected"' : ''); ?>>6</option>
			<option value="7"<?php echo ($pacsoftServicesData['fromID'] == '7' ? ' selected="selected"' : ''); ?>>7</option>
			<option value="8"<?php echo ($pacsoftServicesData['fromID'] == '8' ? ' selected="selected"' : ''); ?>>8</option>
			<option value="9"<?php echo ($pacsoftServicesData['fromID'] == '9' ? ' selected="selected"' : ''); ?>>9</option>
		</select>
		<label for="fromID">AfsenderID (Kvik-id)</label>
	</div>

<?php
$i++;
}

$i=0;
foreach ($pacsoftOrder as $pacsoftOrderData) {
?>
	<input type="hidden" value="<?php echo $pacsoftOrderData['rcvid']['id']; ?>" name="pacsoftOrder[<?php echo $i; ?>][rcvid][id]" />
	<input type="hidden" value="<?php echo $pacsoftOrderData['rcvid']['name']; ?>" name="pacsoftOrder[<?php echo $i; ?>][rcvid][name]" />
	<input type="hidden" value="<?php echo $pacsoftOrderData['rcvid']['contact']; ?>" name="pacsoftOrder[<?php echo $i; ?>][rcvid][contact]" />
	<input type="hidden" value="<?php echo $pacsoftOrderData['rcvid']['address1']; ?>" name="pacsoftOrder[<?php echo $i; ?>][rcvid][address1]" />
	<input type="hidden" value="<?php echo $pacsoftOrderData['rcvid']['address2']; ?>" name="pacsoftOrder[<?php echo $i; ?>][rcvid][address2]" />
	<input type="hidden" value="<?php echo $pacsoftOrderData['rcvid']['city']; ?>" name="pacsoftOrder[<?php echo $i; ?>][rcvid][city]" />
	<input type="hidden" value="<?php echo $pacsoftOrderData['rcvid']['country']; ?>" name="pacsoftOrder[<?php echo $i; ?>][rcvid][country]" />
	<input type="hidden" value="<?php echo $pacsoftOrderData['rcvid']['zipcode']; ?>" name="pacsoftOrder[<?php echo $i; ?>][rcvid][zipcode]" />
	<input type="hidden" value="<?php echo $pacsoftOrderData['rcvid']['phone']; ?>" name="pacsoftOrder[<?php echo $i; ?>][rcvid][phone]" />

    <input type="hidden" value="<?php echo $pacsoftOrderData['agentto']['type']; ?>" name="pacsoftOrder[<?php echo $i; ?>][agentto][type]" />
    <input type="hidden" value="<?php echo $pacsoftOrderData['agentto']['id']; ?>" name="pacsoftOrder[<?php echo $i; ?>][agentto][id]" />
	<input type="hidden" value="<?php echo $pacsoftOrderData['agentto']['parid']; ?>" name="pacsoftOrder[<?php echo $i; ?>][agentto][parid]" />
	<input type="hidden" value="<?php echo $pacsoftOrderData['agentto']['name']; ?>" name="pacsoftOrder[<?php echo $i; ?>][agentto][name]" />
	<input type="hidden" value="<?php echo $pacsoftOrderData['agentto']['contact']; ?>" name="pacsoftOrder[<?php echo $i; ?>][agentto][contact]" />
	<input type="hidden" value="<?php echo $pacsoftOrderData['agentto']['address1']; ?>" name="pacsoftOrder[<?php echo $i; ?>][agentto][address1]" />
	<input type="hidden" value="<?php echo $pacsoftOrderData['agentto']['address2']; ?>" name="pacsoftOrder[<?php echo $i; ?>][agentto][address2]" />
	<input type="hidden" value="<?php echo $pacsoftOrderData['agentto']['city']; ?>" name="pacsoftOrder[<?php echo $i; ?>][agentto][city]" />
	<input type="hidden" value="<?php echo $pacsoftOrderData['agentto']['country']; ?>" name="pacsoftOrder[<?php echo $i; ?>][agentto][country]" />
	<input type="hidden" value="<?php echo $pacsoftOrderData['agentto']['zipcode']; ?>" name="pacsoftOrder[<?php echo $i; ?>][agentto][zipcode]" />
	
	<input type="hidden" value="<?php echo $pacsoftOrderData['reference']; ?>" name="pacsoftOrder[<?php echo $i; ?>][reference]" />
	<input type="hidden" value="<?php echo $pacsoftOrderData['orderNo']; ?>" name="pacsoftOrder[<?php echo $i; ?>][orderNo]" />
	<input type="hidden" value="<?php echo $pacsoftOrderData['to']; ?>" name="pacsoftOrder[<?php echo $i; ?>][to]" />
	<input type="hidden" value="<?php echo $pacsoftOrderData['email']; ?>" name="pacsoftOrder[<?php echo $i; ?>][email]" />
	<input type="hidden" value="<?php echo $pacsoftOrderData['sms']; ?>" name="pacsoftOrder[<?php echo $i; ?>][sms]" />
	<input type="hidden" value="<?php echo $pacsoftOrderData['VALUE']; ?>" name="pacsoftOrder[<?php echo $i; ?>][VALUE]" />
	<input type="hidden" value="<?php echo $pacsoftOrderData['VALUEcurrency']; ?>" name="pacsoftOrder[<?php echo $i; ?>][VALUEcurrency]" />
<?php	
$i++;
} ?>

<input type="hidden" value="<?php echo $pacsoftInfo['smartsendID']; ?>" name="pacsoftInfo[smartsendID]" />
<input type="hidden" value="<?php echo $pacsoftInfo['check']; ?>" name="pacsoftInfo[check]" />
<input type="hidden" value="<?php echo $pacsoftInfo['version']; ?>" name="pacsoftInfo[version]" />
<input type="hidden" value="<?php echo $pacsoftInfo['bulk']; ?>" name="pacsoftInfo[bulk]" />
<input type="hidden" value="<?php echo $pacsoftInfo['HTMLESCAPE']; ?>" name="pacsoftInfo[HTMLESCAPE]" />
<input type="hidden" value="<?php echo $pacsoftInfo['redirect']; ?>" name="pacsoftInfo[redirect]" />
<input type="hidden" value="<?php echo $pacsoftInfo['system']; ?>" name="pacsoftInfo[system]" />

<input class="button" type="submit" value="Generere pakkelabel" />

</form>

<?php
}
//FORM PART END

//LINK PART START - Only if one wishes to use the link solution
if($pacsoftDisplayType == 'link' || $pacsoftDisplayType == 'both') {

$url = http_build_query(array(
    'pacsoftOrder' => $pacsoftOrder,
	'pacsoftInfo' => $pacsoftInfo,
	'pacsoftServices' => $pacsoftServices
), '&amp;');

echo '<a href="'.$SmartSendURL.'server_request.php?URL=1&'.$url.'" target="_blank">Create label (using link)</a><br>';
}
//LINK PART END

//Display track and trace link
if($pacsoftDisplayTrackAndTrace == 1) {
	echo '<div class="tracelink"><a href="'.$SmartSendURL.'TrackAndTrace.php?smartsendID='.$pacsoftInfo['smartsendID'].'&orderNo='.$pacsoftOrder[0]['orderNo'].'&zip='.$pacsoftOrder[0]['rcvid']['zipcode'].'&lang=dk" target="_blank">Track&Trace order</a></div)';
}

?>
</div>
</div>