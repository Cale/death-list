<?php

include('simple_html_dom.php');

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

echo '<!DOCTYPE html>
<head>
	<title>Death List</title>
	<link rel="stylesheet" type="text/css" href="/css/death.css" media="screen">
</head>
<body>';

echo '<ul>';

foreach($html->find('ul', 3)->find('li') as $person)
	{
		$person = substr($person->plaintext, 0, strpos($person->plaintext, '.&#91;'));
		echo '<li>'.$person.'</li>';
	}
	
foreach($html->find('ul', 4)->find('li') as $person)
	{
		$person = substr($person->plaintext, 0, strpos($person->plaintext, '.&#91;'));
		echo '<li>'.$person.'</li>';
	}
	
foreach($html->find('ul', 5)->find('li') as $person)
	{
		$person = substr($person->plaintext, 0, strpos($person->plaintext, '.&#91;'));
		echo '<li>'.$person.'</li>';
	}
	
foreach($html->find('ul', 6)->find('li') as $person)
	{
		$person = substr($person->plaintext, 0, strpos($person->plaintext, '.&#91;'));
		echo '<li>'.$person.'</li>';
	}
	
foreach($html->find('ul', 7)->find('li') as $person)
	{
		$person = substr($person->plaintext, 0, strpos($person->plaintext, '.&#91;'));
		echo '<li>'.$person.'</li>';
	}
		
foreach($html->find('ul', 8)->find('li') as $person)
	{
		$person = substr($person->plaintext, 0, strpos($person->plaintext, '.&#91;'));
		echo '<li>'.$person.'</li>';
	}
		
foreach($html->find('ul', 9)->find('li') as $person)
	{
		$person = substr($person->plaintext, 0, strpos($person->plaintext, '.&#91;'));
		echo '<li>'.$person.'</li>';
	}

echo '</ul>';
echo '	<script type="text/javascript" src="/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="/js/death.js"></script>
</body>
</html>';

?>
