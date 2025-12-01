<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class VikingForm extends Component
{
    /**
     * Create a new component instance.
     * All props (action, method, viking, dragons) are passed directly
     * through the Blade template using @props() instead of the class.
     *
     * This is valid — the component serves only as a container that
     * renders a Blade file without processing data.
     */
    public function __construct()
    {
        // No initialization needed since the Blade file handles all props.
        // Blade automatically extracts the data passed to the component tag into variables listed in @props.
        // Default values are assigned if the variable wasn’t passed:
        // $viking defaults to null
        // $dragons defaults to an empty array
    }

    
     //Get the view that represent the component.
     
    //  This tells Laravel to render the Blade file in viking-form.blade.php
     
    //  The Blade template itself will receive the props defined using:
    //  @props(['action', 'method', 'viking' => null, 'dragons' => []])
     
    //   @return View|Closure|string
     
    public function render(): View|Closure|string
    {
        return view('components.viking-form');
    }
}
