<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Ratings extends Component
{
    /**
     * Create a new component instance.
     */
    public $thisrating;
    public function __construct($thisrating = 0)
    {
        $this->thisrating = $thisrating; // Example rating value, you can pass this as a prop when using the component
    }

    public function render(): View|Closure|string
    {
        return view('components.ratings');
    }
}
