<?php

namespace Modules\Gatepass\app\Http\Livewire\Request\Admin;

use Livewire\Component;
use Modules\Checkpoint\app\Models\Checkpoint;
use Modules\Gatepass\app\Models\Gatepass;
use Modules\Gatepass\app\Models\GatepassRequest;

class Index extends Component
{
    public $gatepass;

    public function render()
    {
        return view('gatepass::livewire.request.admin.index');
    }

    public function check_in(GatepassRequest $request)
    {
        // Get Checking point
        $checkpoint = Checkpoint::whereDefault(1)->first();

        // Pending checkout
        if ($log = $request->access_logs()->latest()->first() and $log->checked_out_at == null) {
            session()->flash('status', "Already Checked-In, please Checkout before Checking-in again!");
            return;
        }

        // Create Access Log
        $access_log = $request->access_logs()->firstOrCreate([
            'accessible_type' => get_class($checkpoint),
            'accessible_id' => $checkpoint->id,
            'checked_in_at' => now(),
            'checked_in_by' => auth()->id(),
        ]);

        // Create a Timeline
        $timeline = $request->timeline()->firstOrCreate([
            'name' => 'Check-in',
            'description' => "Checked in successfully at {{$checkpoint->name}}"
        ]);

        session()->flash('status', "Checked in successfully.");

        $this->emitSelf('$refresh');
    }

    public function checkout(GatepassRequest $request)
    {
        // Get Checking point
        $checkpoint = Checkpoint::whereDefault(1)->first();

        // Pending checkout
        if ($log = $request->access_logs()->latest()->first() and $log->checked_out_at !== null) {
            session()->flash('status', "Not Checked-In yet, please Check-in before Checking-out.");
            return;
        }

        // Create Access Log
        $access_log = $request->access_logs()->firstOrCreate([
            'accessible_type' => get_class($checkpoint),
            'accessible_id' => $checkpoint->id,
            'checked_out_at' => now(),
            'checked_out_by' => auth()->id(),
        ]);

        // Create a Timeline
        $timeline = $request->timeline()->firstOrCreate([
            'name' => 'Checkout',
            'description' => "Checked out successfully at {{$checkpoint->name}}"
        ]);

        session()->flash('status', "Checked out successfully.");

        $this->emitSelf('$refresh');
    }
}
