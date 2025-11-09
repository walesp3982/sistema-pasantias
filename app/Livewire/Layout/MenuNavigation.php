<?php

namespace App\Livewire\Layout;

use App\Livewire\Actions\Logout;
use Livewire\Component;

class MenuNavigation extends Component
{
    public function render()
    {
        return view('livewire.layout.menu-navigation');
    }

    public function logout(Logout $logout) {
        $logout();

        $this->redirect('/', true);
    }
}
