<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $id;
    public $name;
    public $value;
    public $type;

    /**
     * Create a new component instance.
     */
    public function __construct($id, $name, $value = '', $type = 'text')
    {
        $this->id = $id;
        $this->name = $name;
        $this->value = $value;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
