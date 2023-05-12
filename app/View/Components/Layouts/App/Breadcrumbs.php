<?php

namespace App\View\Components\Layouts\App;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Breadcrumbs extends Component
{
    public $data;

    /**
     * Create a new component instance.
     */
    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layouts.app.breadcrumbs', $this->data);
    }
}
