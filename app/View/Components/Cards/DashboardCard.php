<?php

namespace App\View\Components\cards;

use Illuminate\View\Component;

class DashboardCard extends Component
{
    public $cardData;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($cardData)
    {
        $this->cardData = $cardData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.cards.dashboard-card');
    }
}
