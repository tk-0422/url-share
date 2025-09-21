<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{

    public $title;
    public $customButton;
    public $hideActions;

    public function __construct($title = null, $customButton =null, $hideActions = false)
    {
        $this->title=$title;
        $this->customButton = $customButton;
        $this->hideActions = $hideActions;
    }


    public function render(): View|Closure|string
    {
        return view('components.header');
    }
}
