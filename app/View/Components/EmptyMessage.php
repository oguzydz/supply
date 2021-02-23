<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EmptyMessage extends Component
{

    public $content;
    public $linkContent;
    public $link;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($content, $linkContent, $link)
    {
        $this->content = $content;
        $this->linkContent = $linkContent;
        $this->link = $link;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.empty-message', [
            'content' => $this->content,
            'linkContent' => $this->linkContent,
            'link' => $this->link
        ]);
    }
}
