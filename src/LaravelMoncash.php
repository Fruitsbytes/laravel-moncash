<?php

namespace Fruitsbytes\LaravelMoncash;

use Fruitsbytes\PHP\Moncash\Moncash;

class LaravelMoncash extends Moncash {
    /**
     * @var string Default value 'sandbox'
     */
    public string $mode;

    private string $client_secret;

    private string $client_id;

    public bool $isProduction;

    public function __construct() {
        $this->client_id     = config( 'moncash.client_id' );
        $this->client_secret = config( 'moncash.client_secret' );
        $this->mode          = config( 'moncash.mode' );
        $this->isProduction  = $this->mode === 'sandbox';
        parent::__construct( $this->client_id, $this->client_secret, $this->mode );
    }
}
