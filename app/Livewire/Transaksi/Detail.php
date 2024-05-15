<?php

namespace App\Livewire\Transaksi;

use App\Models\Transaksi;
use Livewire\Attributes\On;
use Livewire\Component;

class Detail extends Component
{
    public $show = false;
    public ?Transaksi $transaksi;

    #[On('detailTransaksi')]
    public function detailTransaksi(Transaksi $transaksi){
        $this->show = true;
        $this->transaksi = $transaksi;
    }

    public function closeModal(){
        $this->reset();
    }

    public function render()
    {
        return view('livewire.transaksi.detail');
    }
}
