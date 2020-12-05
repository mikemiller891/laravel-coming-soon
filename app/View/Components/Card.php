<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public $caption;
    public $text;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($caption, $text)
    {
        $this->caption = $caption;
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.card');
    }
}
