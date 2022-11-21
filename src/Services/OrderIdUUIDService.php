<?php

namespace FruitsBytes\Laravel\MonCash\Services;

use Illuminate\Support\Str;

class OrderIdUUIDService extends OrderIdService
{

    /**
     * @return string
     */
    public function getNewId(): string
    {
        return (string) Str::uuid();
    }
}
