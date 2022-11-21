<?php

return [
    /*
   |--------------------------------------------------------------------------
   | MonCash Authentication  Client ID
   |--------------------------------------------------------------------------
   |
   | The client ID for the business you are  using
   |
   */
    "clientId" => env('MONCASH_CLIENT_ID', ''),
    /*
   |--------------------------------------------------------------------------
   | MonCash Authentication Client Secret
   |--------------------------------------------------------------------------
   |
   | The Client secret for this business account. It's best if you use a Vault
   | like Google Cloud Secret Manager to reduce the risks of secret being lost
   |
   */
    "clientSecret" => env('MONCASH_CLIENT_SECRET', ''),
    /*
   |--------------------------------------------------------------------------
   | MonCash API mode
   |--------------------------------------------------------------------------
   |
   | - production (live)
   | - sandbox (test)
   |
   */
    "mode" => env('MONCASH_MODE', 'sandbox'),

];
