<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Step extends Component
{
    public $steps=[];

    public function add()
    {
        $this->steps[]=count($this->steps);
    }
    public function remove($index)
    {
        unset($this->steps[$index]);
//        $this->steps--;
    }
    public function render()
    {
        return view('livewire.step');
    }
}
