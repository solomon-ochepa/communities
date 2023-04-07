<?php

namespace App\View\Components\Page;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Banner extends Component
{
    public $data = [];

    /**
     * Create a new component instance.
     */
    public function __construct($data = [])
    {
        $this->data = $data;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.page.banner', $this->data);
    }
}
