<?php
// config for Fruitsbytes/LaravelMoncash
return [
    'client_id'     => env( 'MON_CASH_CLIENT_ID', '' ),
    'client_secret' => env( 'MON_CASH_CLIENT_SECRET', '' ),
    'mode'          => env( 'MON_CASH_MODE', 'sandbox' ),
    'endpoint'          => [
        'sandbox'    => 'https://sandbox.moncashbutton.digicelgroup.com',
        'production' => 'https://moncashbutton.digicelgroup.com'
    ]
];
