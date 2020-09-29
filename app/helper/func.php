<?php
    
use App\Models\Setting;
	/**
	 * @param null $string
	 * @param string $separator
	 * @return mixed|null|string
	*/


	function settings()
	{
	    $settings = Setting::find(1);
	    if ($settings) {
	        return $settings;
	    } else {
	        return new Setting;
	    }
	}


	function responseJson($status, $msg, $data = null)
	{
	    $response = [
	        'status' => $status,
	        'msg' => $msg,
	        'data' => $data
	    ];
	    return response()->json($response);
	}


	function smsMisr($to, $message){

		$url = 'https://smsmisr.com/api/webapi/?';
		$push_payload = array(

			"username" => "*****",
			"password" => "*****",
			"language" => "2",
			"sender" => "Sofra",
			"mobile" => '2'. $to,
			"message" => $message,
		);

		$rest = curl_init();
		curl_setopt($rest, CURLOPT_URL, $url.http_build_query($push_payload));
		curl_setopt($rest, CURLOPT_POST, 1);
		curl_setopt($rest, CURLOPT_POSTFIELDS, $push_payload);
		curl_setopt($rest, CURLOPT_SSL_VERIFYPEER, true);
		curl_setopt($rest, CURLOPT_HTTPHEADER, 
			array("content-type" => "application/x-www-form-urlencoded"));
		curl_setopt($rest, CURLOPT_SSL_RETURNTRANSFER, 1);

		$response = curl_exec($rest);

		curl_close($rest);

		return $response;

	}

	// function deleteConfirmation(id) {
    //     swal({
    //       title: "Delete?",
    //         text: "Please ensure and then confirm!",
    //         type: "warning",
    //         showCancelButton: !0,
    //         confirmButtonText: "Yes, delete it!",
    //         cancelButtonText: "No, cancel!",
    //         reverseButtons: !0
    //     }).then(function (e) {
 
    //         if (e.value === true) {
    //             var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    //             $.ajax({
    //                 type: 'POST',
    //                 url : "{{url('/delete-category')}}/" + id,
    //                 data:  {"_token": "{{ csrf_token() }}"},
    //                 dataType: 'JSON',
    //                 success: function (results) {

    //                     if (results.success === true) {
    //                         swal("Done!", results.message, "success");
    //                     } else {
    //                         swal("Error!", results.message, "error");
    //                     }
    //                 }
    //             });

    //         } else {
    //             e.dismiss;
    //         }

    //     }, function (dismiss) {
    //         return false;
    //     })
    // }
