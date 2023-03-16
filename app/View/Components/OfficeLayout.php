<?php

namespace App\View\Components;

use Illuminate\View\Component;

class OfficeLayout extends Component
{
    public $data = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($data = [], $title = null)
    {
        $this->data = $data;
        if (isset($title)) {
            $this->data['title'] = $title;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        // dd($this->data);
        return view('layouts.office', $this->data);
    }
}
