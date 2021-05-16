<?php

use Illuminate\Http\Request;
use App\Helpers\ApiConstants;
use App\Models\User;
use App\Models\VerificationPin;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Validation\ValidationException;

/** Return error api response */
function problemResponse(string $message = null, int $status_code , Request $request = null, Exception $trace = null)
{
	$code = !empty($status_code) ? $status_code : null;
	$traceMsg = empty($trace) ?  null  : $trace->getMessage();

	$body = [
		'msg' => $message,
		'code' => $code,
		'success' => false,
		'error_debug' => $traceMsg,
		'error_trace' => $trace->getTrace(),
	];

	!empty($trace) ? logger($trace->getMessage(), $trace->getTrace()) : null;
	return response()->json($body)->setStatusCode($code);
}


/** Return error api response */
function inputErrorResponse(string $message = null, int $status_code = null, Request $request = null, ValidationException $trace = null)
{
	$code = ($status_code != null) ? $status_code : '';
	$traceMsg = empty($trace) ?  null  : $trace->getMessage();
	$traceTrace = empty($trace) ?  null  : $trace->getTrace();

	$body = [
		'msg' => $message,
		'code' => $code,
		'success' => false,
		'errors' => empty($trace) ?  null  : $trace->errors(),
	];

	return response()->json($body)->setStatusCode($code);
}

/** Return valid api response */
function validResponse(string $message = null, $data = null, $request = null)
{
	if (is_null($data) || empty($data)) {
		$data = null;
	}
	$body = [
		'msg' => $message,
		'data' => $data,
		'success' => true,
		'code' => ApiConstants::GOOD_REQ_CODE,

	];


	return response()->json($body);
}

/**Returns formatted money value
 * @param float amount
 * @param int places
 * @param string symbol
 */
function format_money($amount, $places = 0, $symbol = '₦')
{
	return $symbol . '' . number_format((float)$amount, $places);
}


/**Returns formatted date value
 * @param string date
 * @param string format
 */
function format_date($date, $format = 'Y-m-d')
{
	return date($format, strtotime($date));
}


/**Returns the available auth instance with user
 * @param bool $getUser
 */
function auth_api($getUser = false)
{
	return $getUser ? auth("api")->user() : auth("api");
}



function collect_pagination($transformer, LengthAwarePaginator $pagination, $appendQuery = true)
{
	$request = request();
	unset($request["token"]);
	if ($appendQuery) {
		$pagination->appends($request->query());
	}
	$all_pg_data = $pagination->toArray();
	$data = collect($pagination->getCollection())->map(function ($model) use ($transformer) {
		return $transformer->transform($model);
	});
	unset($all_pg_data['links']); // remove links
	unset($all_pg_data['data']); // remove old data mapping

	$buildResponse['pagination_meta'] = $all_pg_data;
	$buildResponse['pagination_meta']["can_load_more"] = $all_pg_data["to"] < $all_pg_data["total"];
	$buildResponse['data'] = $data;
	return $buildResponse;
}
