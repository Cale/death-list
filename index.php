<?php

include('simple_html_dom.php');

//base url
$base = 'https://en.wikipedia.org/wiki/Deaths_in_2021';

$curl = curl_init();
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_URL, $base);
curl_setopt($curl, CURLOPT_REFERER, $base);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
$str = curl_exec($curl);
curl_close($curl);

// Create a DOM object
$html = new simple_html_dom();
$html->load($str);

$div = $html->find('ul', 3);

foreach($html->find('ul', 3)->find('li') as $person)
	{
             // do something...
		echo $person->plaintext;
		echo "\n";
	}

//print_r($div);
//echo $div;


?>
