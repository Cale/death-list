<?php

include('../simple_html_dom.php');

$page = 'https://en.wikipedia.org/wiki/Recent_deaths';

$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_URL, $page);
curl_setopt($curl, CURLOPT_REFERER, $page);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
$str = curl_exec($curl);
curl_close($curl);

// Create a DOM object
$html = new simple_html_dom();
$html->load($str);

$people = array();

header('Content-type:application/json;charset=utf-8');

//echo '{"deathlist": { "people": [';

foreach($html->find('ul', 3)->find('li') as $person)
	{
		$person = substr($person->plaintext, 0, strpos($person->plaintext, '.&#91;'));
		array_push($people, $person);
		//echo '"'.$person.'",';
	}
	
foreach($html->find('ul', 4)->find('li') as $person)
	{
		$person = substr($person->plaintext, 0, strpos($person->plaintext, '.&#91;'));
		array_push($people, $person);
	}
	
foreach($html->find('ul', 5)->find('li') as $person)
	{
		$person = substr($person->plaintext, 0, strpos($person->plaintext, '.&#91;'));
		array_push($people, $person);
	}
	
foreach($html->find('ul', 6)->find('li') as $person)
	{
		$person = substr($person->plaintext, 0, strpos($person->plaintext, '.&#91;'));
		array_push($people, $person);
	}

echo json_encode($people);

?>
