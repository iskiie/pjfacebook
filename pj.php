<?php
echo "Penebar Jempol Facebook".PHP_EOL;
sleep(1);
echo "Official Website : https://penebarjempol.net/".PHP_EOL;
sleep(3);
echo "Fitur PJFacebook :".PHP_EOL;
sleep(1);
echo "- Bot Likes Beranda".PHP_EOL;
sleep(1);
echo "- Arisan Jempol".PHP_EOL;
sleep(5);
echo "Silahkan masukkan cookie untuk login :".PHP_EOL;

$cookie = trim(fgets(STDIN));

$login = json_decode(curl("https://penebarjempol.net/api/login-api.php?cookie=".urlencode($cookie)));
//print_r($login);
if (isset($login->error)) {
	echo "Error : ".$login->error."".PHP_EOL;
} elseif (isset($login->success)) {
	echo "Berhasil Login...".PHP_EOL;
	sleep(2);
	echo "ID : ".$login->id.".".PHP_EOL;
	echo "Nama : ".$login->name.".".PHP_EOL;
	sleep(2);
	echo "Masukan Reactions pilihan : [LIKE, LOVE, CARE, HAHA, WOW, SAD, ANGRY, RANDOM]".PHP_EOL;

	$input = strtoupper(trim(fgets(STDIN)));

	$react = ['LIKE', 'LOVE', 'CARE', 'HAHA', 'WOW', 'SAD', 'ANGRY', 'RANDOM'];

	if (!in_array($input,$react)) 
	{
		die("Waduh goblok sekali anda, hmmm......".PHP_EOL);
	}

	$sgb = json_decode(curl("https://penebarjempol.net/api/sgb.php?type=".urlencode($input)."&id=".urlencode($login->id)."&access_token=".urlencode($login->access_token)));

	if ($sgb->success) {
		echo $sgb->success."...".PHP_EOL;
		echo "ENJOY".PHP_EOL;
	}
}








function curl($dhan, $cha = null)
{
    $love = curl_init();
    curl_setopt($love, CURLOPT_URL, $dhan);
    if ($cha != null) {
        curl_setopt($love, CURLOPT_POST, true);
        curl_setopt($love, CURLOPT_POSTFIELDS, $cha);
    }
    curl_setopt($love, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($love, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($love, CURLOPT_SSL_VERIFYPEER, false);
    $hmm = curl_exec($love);
    curl_close($love);
    return $hmm;
}


