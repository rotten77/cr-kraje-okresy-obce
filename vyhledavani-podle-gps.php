<?php
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

$gps = isset($_GET['gps']) ? $_GET['gps'] : "";

$lokalita = array();
$lokalita['status'] = 0;

if($gps!="") {


		$url = "http://maps.google.com/maps/geo?q=".urlencode($gps)."&sensor=false&output=json&oe=utf-8";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);	
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept-Language:cs-CZ,cs;q=0.8'));
		$json = curl_exec($ch);
		curl_close($ch);
		$result = json_decode($json, true);
		
		$localityName = isset($result['Placemark'][0]['AddressDetails']['Country']['AdministrativeArea']['SubAdministrativeArea']['Locality']['LocalityName'])
							? $result['Placemark'][0]['AddressDetails']['Country']['AdministrativeArea']['SubAdministrativeArea']['Locality']['LocalityName']
							: null;

		if(!is_null($localityName)) {
			/**
			 * Tento příklad používá pro práci s MySQL NotORM (http://www.notorm.com/)
			 */
			$najdiObec = $db->obec("nazev LIKE ?", $localityName)->fetch();

			if($najdiObec) {
				$lokalita['status'] = 200;

				$lokalita['obec']['id'] = $najdiObec['id'];
				$lokalita['obec']['kod'] = $najdiObec['kod'];
				$lokalita['obec']['nazev'] = $najdiObec['nazev'];

				$lokalita['okres']['id'] = $najdiObec['okres_id'];
				$lokalita['okres']['kod'] = $najdiObec->okres['kod'];
				$lokalita['okres']['nazev'] = $najdiObec->okres['nazev'];

				$lokalita['kraj']['id'] = $najdiObec['kraj_id'];
				$lokalita['kraj']['kod'] = $najdiObec->kraj['kod'];
				$lokalita['kraj']['nazev'] = $najdiObec->kraj['nazev'];
			} else {
				$lokalita['status'] = 404;
			}
		} else {
			$lokalita['status'] = 401;
		}

	// 

	// 

}

echo json_encode($lokalita);