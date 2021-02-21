<?php

include('simple_html_dom.php');

$page = 'https://en.wikipedia.org/wiki/Deaths_in_2021';

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

echo '<!DOCTYPE html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="/css/death.css" media="screen">
</head>
<body>';

echo '<ul>';

foreach($html->find('ul', 3)->find('li') as $person)
	{
		$person = substr($person->plaintext, 0, strpos($person->plaintext, '.&#91;'));
		echo '<li>'.$person.'</li>';
		echo "\n";
	}

echo '</ul>';
echo '</body></html>';

?>
