<?php

namespace App\Http\Livewire\Backend\Update;

use Livewire\Component;

class Auto extends Component {

    public $status = [
        'available' => false,
        'disabled' => false,
        'message' => 'No Update Available'
    ];
    public $progress = '';

    protected $listeners = ['apply'];

    public function mount() {
        $this->check();
    }

    public function apply($step = 0) {
        $this->progress .= '<div class="text-white">No Update Available</div>';
    }

    public function render() {
        return view('backend.update.auto');
    }

    /** Check for Update */
    private function check() {
		return false;
    }
}
