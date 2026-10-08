<?php

require_once __DIR__ . '/config.php';


/**
 * How to Use:
 *
 * require_once __DIR__ . '/core/omni.php';
 *
 * $result = sendEmail(
 *     'onespiderdigital@gmail.com',
 *     'Your OTP is: 123456',
 *     '<h1>Account Update!</h1><p>Your OTP is <b>123456</b>.</p>'
 * );
 */


/**
 * Send email through Green Omni API.
 *
 * @param string $to
 * @param string $subject
 * @param string $html
 *
 * @return array
 */
function sendEmail(
    string $to,
    string $subject,
    string $html
): array {

    $payload = json_encode([
        'user_token' => OMNI_API_TOKEN,

        'email' => [
            'from'    => OMNI_FROM_EMAIL,
            'to'      => $to,
            'subject' => $subject,
            'html'    => $html,
        ],

    ], JSON_UNESCAPED_SLASHES);


    // JSON encoding failure
    if ($payload === false) {
        return [
            'success'   => false,
            'response'  => null,
            'http_code' => 0,
            'error'     => json_last_error_msg(),
        ];
    }


    $ch = curl_init();


    curl_setopt_array($ch, [

        CURLOPT_URL => OMNI_API_URL,

        CURLOPT_POST => true,

        CURLOPT_POSTFIELDS => $payload,

        CURLOPT_RETURNTRANSFER => true,

        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'Accept: application/json',
        ],

        CURLOPT_SSL_VERIFYPEER => true,

        CURLOPT_SSL_VERIFYHOST => 2,

        CURLOPT_TIMEOUT => 30,

        CURLOPT_CONNECTTIMEOUT => 10,

    ]);


    $response = curl_exec($ch);

    $httpCode = curl_getinfo(
        $ch,
        CURLINFO_HTTP_CODE
    );

    $curlError = curl_error($ch);


    curl_close($ch);


    // cURL failure
    if ($response === false) {

        return [
            'success'   => false,
            'response'  => null,
            'http_code' => 0,
            'error'     => $curlError,
        ];

    }


    // Decode API response
    $decoded = json_decode(
        $response,
        true
    );


    return [

        'success' => (
            $httpCode >= 200 &&
            $httpCode < 300
        ),

        'response' => (
            $decoded !== null
                ? $decoded
                : $response
        ),

        'http_code' => $httpCode,

        'error' => null,

    ];
}