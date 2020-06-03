<?php  
// Created by TrashSatan666

function get($url = null, $headers = null) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	if ($headers != "") {
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	}

	return $result = curl_exec($ch);
	curl_close($ch);
}


function number($length) {
	$characters = '0123456789';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}

function create_viu() {
	$name_fake = get('https://name-fake.com/id_ID');
	preg_match('/<div class="subj_div_45g45gg" id="copy1">(.*?)<\/div>/s', $name_fake, $name);
	preg_match('/<div id="copy4">(.*?)<\/div>/s', $name_fake, $email);


	$register = get('http://api.pamungkas.educationhost.cloud/viu.php?email='.$email[1].'&password=rendygans');

	if ($register == "1") {
		echo $data = "[+] Success create account | ".$email[1]." | rendygans\n";
		$fh = fopen("result_viu.txt", "a");
        fwrite($fh, $data);
        fclose($fh);
	} else {
		echo "[!] Something wrong\n";
	}
}


echo "Viu Account Creator\n";
echo "Created by iG : @bananacreamy\n";
echo "How many u want to create? ";
$banyak = trim(fgets(STDIN));
for ($i = 0; $i < $banyak ; $i++) {
	create_viu();
}
echo "Result save in result_viu.txt\n";


?>
