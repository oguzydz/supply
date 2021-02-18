<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Title extends Component
{
    public $title;
    public $backgroundImg;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title)
    {
        $this->title = $title;
        $this->setBackgroundImg();
    }

    public function setBackgroundImg()
    {
        $this->backgroundImg = config("supply.title_background_img");
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.title');
    }
}
