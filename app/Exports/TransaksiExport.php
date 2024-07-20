<?php

namespace App\Exports;

use App\Models\Transaksi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TransaksiExport implements FromView
{
    public $month;
    public $year;

    public function __construct($bulan) // 2024-05
    {
        [$this->year, $this->month] = explode("-", $bulan);
    }

    public function view(): View
    {
        return view('export.transaksi', [
            'transaksis' => Transaksi::whereYear('created_at', $this->year)->whereMonth('created_at', $this->month)->get()
        ]);
    }
}
