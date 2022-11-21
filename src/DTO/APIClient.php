<?php

namespace FruitsBytes\Laravel\MonCash\DTO;

class APIClient
{
    public function __construct(public string $id, public string $secret)
    {
    }
}
