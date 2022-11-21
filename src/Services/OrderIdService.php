<?php

namespace FruitsBytes\Laravel\MonCash\Services;

class OrderIdService
{

    /**
     * @return string
     */
    public function getNewId(): string
    {
        return uniqid(rand(), true);
    }
}
