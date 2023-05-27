<?php

$url = "https://api.green-api.com/waInstance1101816148/sendFileByUrl/09e4c65667064230af2f1ab45abb30c82e09c87119094ac198";
$payload = '{
    "chatId": "51961498695@c.us",
    "urlFile": "https://avatars.mds.yandex.net/get-pdb/477388/77f64197-87d2-42cf-9305-14f49c65f1da/s375",
    "fileName": "tecsimg.jpg",
    "caption": "Como un caballo desbocado, TECSUP sin temor, rompiendo barreras y superando obstáculos, siempre en búsqueda del éxito y la excelencia tecnológica."
}';

$headers = array(
    'Content-Type: application/json'
);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

if(curl_error($ch)){
    echo 'Error: ' . curl_error($ch);
}else{
    echo $response;
}

curl_close($ch);
?>