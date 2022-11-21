<?php

namespace FruitsBytes\Laravel\MonCash\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends  Component
{
    public function render(): View
    {
        return view('components.button');
    }
}
