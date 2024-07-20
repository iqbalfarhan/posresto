<?php

namespace App\Livewire\Transaksi;

use App\Exports\TransaksiExport;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class Export extends Component
{
    public $bulan;

    public function export(){
        $this->validate([
            'bulan' => 'required'
        ]);

        return Excel::download(new TransaksiExport($this->bulan), "laporan transaksi {$this->bulan}.xlsx");
    }

    public function render()
    {
        return view('livewire.transaksi.export');
    }
}
