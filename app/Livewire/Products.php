<?php

namespace App\Livewire;

use Livewire\Component;

class Products extends Component
{
    public $name;
    public $email;

    public function submit()
    {
        dd($this->name);
    }

    public function render()
    {
        return view('livewire.products');
    }
}
