<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Editstep extends Component
{
    public $steps = [];

    public function mount($steps)
    {
        $this->steps = $steps->toArray();
    }

    public function add()
    {
        $this->steps[] = count($this->steps);
    }

    public function remove($index)
    {
        unset($this->steps[$index]);
//        $this->steps--;
    }

    public function render()
    {
        return view('livewire.editstep');
    }
}
