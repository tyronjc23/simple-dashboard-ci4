<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

function getJWT($authHeader)
{
	if (is_null($authHeader)) {
		throw new Exception("JWT Auth failed");
	}
	return explode(" ", $authHeader)[1];
}

function validateJWT($encodedToken)
{
	$key = getenv('JWT_SECRET_KEY');
	$decodedToken = JWT::decode($encodedToken, new Key($key, 'HS256'));
}

function createJWT($loginID)
{
	$timeRequest = time();
	$timeToken = getenv('JWT_TIME_TO_LIVE');
	$timeExpired = $timeRequest + $timeToken;
	$payload = [
		'login_id' => $loginID,
		'iat' => $timeRequest,
		'exp' => $timeExpired,
	];

	$jwt = JWT::encode($payload, getenv('JWT_SECRET_KEY'), 'HS256');

	return $jwt;
}
