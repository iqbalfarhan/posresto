<div class="page-wrapper">
    <div class="card card-divider max-w-4xl mx-auto">
        <div class="card-body space-y-4">
            <h3 class="text-xl font-bold">Export data transaksi</h3>
            <p>Untuk mengexport data transaksi atau mendapatkan rekap data transaksi dalam bentuk excel, silakan pilih
                bulan terlebih dulu kemudian klik "export data".</p>
        </div>
        <div class="card-body py-4">
            <form class="card-actions justify-between" wire:submit="export">
                <input type="month" @class([
                    'input input-bordered',
                    'input-error' => $errors->first('bulan'),
                ]) wire:model="bulan">
                <button class="btn btn-primary">
                    <x-tabler-upload class="size-5" />
                    <span>Export data</span>
                </button>
            </form>
        </div>
    </div>
</div>
