<?php

namespace App\Http\Controllers;

use App\sale;
use App\Swish;
use Illuminate\Http\Request;

class SwishPaymentController extends Controller
{
    public static function createPaymentRequest($order_number,$number,$amount)
    {
		$ch = curl_init('https://cpc.getswish.net/swish-cpcapi/api/v1/paymentrequests');
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, '2');
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, '1');
		curl_setopt($ch, CURLOPT_SSL_CIPHER_LIST, 'SSLv3');
		curl_setopt($ch, CURLOPT_SSLCERT, storage_path('swish/swish_certificate_202103301053.pem'));
		curl_setopt($ch, CURLOPT_SSLKEY, storage_path('swish/swish_certificate_202103301053.key'));
		curl_setopt($ch, CURLOPT_HEADERFUNCTION,
	 		function($curl, $header) use (&$headers) {
		    	$len = strlen($header);
		    	$header = explode(':', $header, 2);
		    	if (count($header) < 2) {
		      		return $len;
		    	}
		    	$name = strtolower(trim($header[0]));
		    	echo "[". $name . "] => " . $header[1];
                //todo: $name Location to get payment
		    	return $len;
		 	 }
		);

		$data = array(
		"payeePaymentReference" => $order_number,
		"callbackUrl" => "https://sanofa.se/mat/api/callback/swish",
		"payerAlias" => $number,
		"payeeAlias" => "1232948263",
		"amount" => strval($amount),
		"currency" => "SEK",
		"message" => "Shoppig from sanofa");
		$data_string = json_encode($data);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'Content-Type: application/json',
		    'Content-Length: ' . strlen($data_string))
		);

		if(!$response = curl_exec($ch)) {
	        trigger_error(curl_error($ch));
	    }
		curl_close($ch);
    }
    public function getPaymentRequest($payment_url)
    {
        $ch = curl_init($payment_url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, '1');
		curl_setopt($ch, CURLOPT_SSLCERT, storage_path('swish/swish_certificate_202103301053.pem'));
		curl_setopt($ch, CURLOPT_SSLKEY, storage_path('swish/swish_certificate_202103301053.key'));
		curl_setopt($ch, CURLOPT_HEADERFUNCTION,
	 		function($curl, $header) use (&$headers) {
		    	$len = strlen($header);
		    	$header = explode(':', $header, 2);
		    	if (count($header) < 2) {
		      		return $len;
		    	}
		    	$name = strtolower(trim($header[0]));
		    	return $len;
		 	 }
		);

		if(!$response = curl_exec($ch)) {
	        trigger_error(curl_error($ch));
	    }
		curl_close($ch);
    }
    public static function TestNumber($number) {
		$ch = curl_init('https://mss.cpc.getswish.net/swish-cpcapi/api/v1/paymentrequests');
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, '2');
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, '1');
		// curl_setopt($ch, CURLOPT_SSL_CIPHER_LIST, 'SSLv3');
		curl_setopt($ch, CURLOPT_CAINFO, storage_path('swish/Swish_TLS_RootCA.pem'));
		curl_setopt($ch, CURLOPT_SSLCERT, storage_path('swish/Swish_Merchant_TestCertificate_1234679304.pem'));
		curl_setopt($ch, CURLOPT_SSLKEY, storage_path('swish/Swish_Merchant_TestCertificate_1234679304.key'));
		curl_setopt($ch, CURLOPT_SSLKEYPASSWD,  'swish');
		curl_setopt($ch, CURLOPT_HEADERFUNCTION,
	 		function($curl, $header) use (&$headers) {
				// this function is called by curl for each header received
		    	$len = strlen($header);
		    	$header = explode(':', $header, 2);
		    	if (count($header) < 2) {
		    		// ignore invalid headers
		      		return $len;
		    	}

		    	$name = strtolower(trim($header[0]));
		    	echo "[". $name . "] => " . $header[1];

		    	return $len;
		 	 }
		);

		$data = array(
		"payeePaymentReference" => "0123456789",
		"callbackUrl" => "https://webhook.site/916322d9-12b0-4889-bfb2-eff103566b66",
		"payerAlias" => $number,
		// "payerAlias" => "46700514425",
		"payeeAlias" => "1232948263",
		"amount" => "1",
		"currency" => "SEK",
		"message" => "We Test Your Number");
		$data_string = json_encode($data);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		    'Content-Type: application/json',
		    'Content-Length: ' . strlen($data_string))
		);

		if(!$response = curl_exec($ch)) {
	        trigger_error(curl_error($ch));
	    }
		curl_close($ch);
	}

    public function callbackSwish(Request $request)
    {
        $m=Swish::where('order_id',$request->payeePaymentReference)->first();
        $m->properties = \json_encode($request->all());
        $m->save();
		if($request->status == 'PAID'){
            $s=sale::find($request->payeePaymentReference);
            $s->is_paid=1;
            $s->order_status='processing';
            $s->save();
        }
        if($request->status == 'DECLINED')
    	{
            $s=sale::find($request->payeePaymentReference);
            $s->order_status='decline';
            $s->save();
        }
        
    }
}

