<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Header extends Component
{
    /**
     * Header Logo
     * @var $logo
     */
    public $logo;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->logo = config("fmp.logo");
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.header');
    }
}
