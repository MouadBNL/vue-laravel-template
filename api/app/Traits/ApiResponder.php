<?php

namespace App\Traits;

trait ApiResponder {

    protected function apiResponse($data = null, $succes = true, $code = 200)
	{
		return response()->json([
			'success' 	=> $succes,
			'data' 		=> $data,
			'code' 		=> $code
		], $code);
	}
}