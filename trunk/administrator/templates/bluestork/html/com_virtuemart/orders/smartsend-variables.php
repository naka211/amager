<?php //æøå

/* Display settings */
	$pacsoftDisplayType = 'form'; 		//use 'link', 'form', 'both' (link+form) or 'direct'
	$pacsoftDisplayTrackAndTrace = 1; 	//Don't show Track&Trace link: 0. Show: 1
	$pacsoftSystem = 'virtuemartto'; 		//name of the system (with lower case letters)

/* Posting Url */
	$SmartSendURL = 'http://www.pacsoft.smartsend.dk/version5/';

/* Smart Send parameters */
	$parameter['smartsendID'] = "204";
	$parameter['smartsendKey'] = "1480e9r1qg7jn2mjpsekadtoutj7";
	$parameter['redirect'] = "1";
	$parameter['HTMLencode'] = "0";

/* CMS system variabels */
	/* rcvid - reciever */
		$parameter['rcvid'] = array();  		//leave this line
		$parameter['rcvid']['company'] = $this->shipmentfields['fields']['company']['value'];
		$parameter['rcvid']['userid'] = '';
		$parameter['rcvid']['name'] = $this->shipmentfields['fields']['first_name']['value'].' '.$this->shipmentfields['fields']['middle_name']['value'].' '.$this->shipmentfields['fields']['last_name']['value'];
		$parameter['rcvid']['contact'] = '';
		$parameter['rcvid']['address1'] = (isset($this->shipmentfields['fields']['address_1']['value']) ? $this->shipmentfields['fields']['address_1']['value'] : $this->shipmentfields['fields']['address_type_name']['value']);
		$parameter['rcvid']['address2'] = $this->shipmentfields['fields']['address_2']['value'];
		$parameter['rcvid']['city'] = $this->shipmentfields['fields']['city']['value'];
		$parameter['rcvid']['country'] = $this->shipmentfields['fields']['virtuemart_country_id']['value'];
		$parameter['rcvid']['zipcode'] = $this->shipmentfields['fields']['zip']['value'];
	/* agentto - delivery point */
	/* leave this array empty if no delivery point is to be used */
if(class_exists('plgVmShipmentPostnord')) {
	$postnord = plgVmShipmentPostnord::getPostnordPluginData($this->orderID);
}
		$parameter['agentto'] = array(); 		//leave this line
		$parameter['agentto']['type'] = (isset($postnord) && $postnord->service_point_id != '0' && $postnord->service_point_id != '' ? 'pupopt' : ''); 	//use 'pupopt' if a pickup location is choosen
		$parameter['agentto']['id'] = (isset($postnord) && $postnord->service_point_id != '0' ? $postnord->service_point_id : ''); 		
		$parameter['agentto']['parid'] = (isset($postnord) && $postnord->service_point_id != '0' ? $postnord->service_point_id : ''); 	//This is the id of the pickup location
		$parameter['agentto']['name'] = (isset($postnord) && $postnord->service_point_id != '0' ? $postnord->service_point_id_name : '');
		$parameter['agentto']['contact'] = '';
		$parameter['agentto']['address1'] = (isset($postnord) && $postnord->service_point_id != '0' ? $postnord->service_point_id_address : '');
		$parameter['agentto']['address2'] = '';
		$parameter['agentto']['city'] = (isset($postnord) && $postnord->service_point_id != '0' ? $postnord->service_point_id_city : '');
		$parameter['agentto']['country'] = (isset($postnord) && $postnord->service_point_id != '0' ? 'DK' : '');
		$parameter['agentto']['zipcode'] = (isset($postnord) && $postnord->service_point_id != '0' ? $postnord->service_point_id_postcode : '');
	/* Generel info */
		$parameter['phone'] = ''; 				//To be printed under the reciever, next to "contact"
		$parameter['orderno'] = $this->orderbt->order_number;
		$parameter['email'] = $this->userfields['fields']['email']['value'];
		$parameter['sms'] = $this->shipmentfields['fields']['phone_1']['value']; 				//Mobile number for sms-advesering
		$parameter['VALUE'] = $this->orderbt->order_total; 				//Price of order + delivery
		$parameter['freetext'] = $this->shipmentfields['fields']['customer_note']['value'];

/* Services */
	$Services = array(
		'srvid' => (string) 'auto', //'auto' or defined, e.g. 'P19DK'
		'PRINTFREETEXT' => (string) '1',
		'LNKPRTN' => (string) '0',
		'LNKPRTNemail' => (string) 'ttih@amagerisenkram.dk',
		'DLV' => (string) ($parameter['agentto']['id'] != '' && $parameter['agentto']['id'] != '0' ? '0' : '1'), //($this->virtuemart_shipmentmethod_id == 15 ? '0' : '1'), //Integer must be changed according to the shop
		'DLVFLEX' => (string) '0',
		'GREEN' => (string) '0',
		'NOTSMS' => (string) '1',
		'DNG' => (string) '0',
		'POD' => (string) '0',
		'NOTEMAIL' => (string) '1',
		'RETURN' => (string) '0',
		'parcelcopies' => (string) '1',
		'parcelweight' => (string) '',
		'parcelcontents' => (string) '',
		'fromID' => (string) '1'
	);

?>