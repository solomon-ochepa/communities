<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{
    public array $data;

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.guest', $this->data);
    }
}
