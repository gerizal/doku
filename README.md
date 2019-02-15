<pre>composer require gerizal/doku</pre>

please visit https://www.doku.com/API/index.html#merchant-hosted-api

<pre>
$data = [
    "MALLID" => $mallid,
    "SESSIONID" => $sessionid,
    "TRANSIDMERCHANT" => $invoice,
    "WORDS" => sha1($mallid.$sharedkey.$invoice),
    "CURRENCY" => '360',
    "PURCHASECURRENCY" => '360',
];   
</pre>
<pre>
$check = Doku_Api::checkStatus($data); //xml format
</pre>
