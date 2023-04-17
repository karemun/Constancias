<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddParticipant extends Component
{
    public $nombre, $rol, $actividad, $puesto, $codigo;
    public $inputs = [];
    public $i = 1;

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function add($i)
    {
        $i++;
        $this->i = $i;
        array_push($this->inputs ,$i);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove($i)
    {
        unset($this->inputs[$i]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function render()
    {
        return view('livewire.add-participant');
    }
}
