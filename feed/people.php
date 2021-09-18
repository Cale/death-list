<?php

include('simple_html_dom.php');

#$page = 'https://en.wikipedia.org/wiki/Recent_deaths';
$page = 'https://en.wikipedia.org/wiki/Deaths_in_August_2021';

$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_URL, $page);
curl_setopt($curl, CURLOPT_REFERER, $page);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
$str = curl_exec($curl);
curl_close($curl);

$html = new simple_html_dom();
$html->load($str);

$people = array();

header('Content-type:application/json;charset=utf-8');

foreach($html->find('ul', 3)->find('li') as $person)
	{
		$person = substr($person->plaintext, 0, strpos($person->plaintext, '.&#91;'));
		if ($person != "") {
			array_push($people, $person);
		}
	}
	
foreach($html->find('ul', 4)->find('li') as $person)
	{
		$person = substr($person->plaintext, 0, strpos($person->plaintext, '.&#91;'));
		if ($person != "") {
			array_push($people, $person);
		}
	}
	
foreach($html->find('ul', 5)->find('li') as $person)
	{
		$person = substr($person->plaintext, 0, strpos($person->plaintext, '.&#91;'));
		if ($person != "") {
			array_push($people, $person);
		}
	}
	
foreach($html->find('ul', 6)->find('li') as $person)
	{
		$person = substr($person->plaintext, 0, strpos($person->plaintext, '.&#91;'));
		if ($person != "") {
			array_push($people, $person);
		}
	}

foreach($html->find('ul', 7)->find('li') as $person)
{
	$person = substr($person->plaintext, 0, strpos($person->plaintext, '.&#91;'));
	if ($person != "") {
		array_push($people, $person);
	}
}

foreach($html->find('ul', 8)->find('li') as $person)
{
	$person = substr($person->plaintext, 0, strpos($person->plaintext, '.&#91;'));
	if ($person != "") {
		array_push($people, $person);
	}
}

foreach($html->find('ul', 9)->find('li') as $person)
{
	$person = substr($person->plaintext, 0, strpos($person->plaintext, '.&#91;'));
	if ($person != "") {
		array_push($people, $person);
	}
}

foreach($html->find('ul', 10)->find('li') as $person)
{
	$person = substr($person->plaintext, 0, strpos($person->plaintext, '.&#91;'));
	if ($person != "") {
		array_push($people, $person);
	}
}

foreach($html->find('ul',11)->find('li') as $person)
{
	$person = substr($person->plaintext, 0, strpos($person->plaintext, '.&#91;'));
	if ($person != "") {
		array_push($people, $person);
	}
}

foreach($html->find('ul', 12)->find('li') as $person)
{
	$person = substr($person->plaintext, 0, strpos($person->plaintext, '.&#91;'));
	if ($person != "") {
		array_push($people, $person);
	}
}

foreach($html->find('ul', 13)->find('li') as $person)
{
	$person = substr($person->plaintext, 0, strpos($person->plaintext, '.&#91;'));
	if ($person != "") {
		array_push($people, $person);
	}
}

foreach($html->find('ul', 14)->find('li') as $person)
{
	$person = substr($person->plaintext, 0, strpos($person->plaintext, '.&#91;'));
	if ($person != "") {
		array_push($people, $person);
	}
}

echo json_encode($people);

?>
