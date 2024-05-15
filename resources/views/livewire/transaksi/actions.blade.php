<div class="page-wrapper">
    <div class="grid md:grid-cols-2 gap-6">
        <div class="card card-divider h-fit">
            <div class="card-body">
                <input type="search" class="input input-bordered" placeholder="Cari menu" wire:model.live="search">
            </div>
            @foreach ($menus as $type => $menu)
                <div class="card-body">
                    <h3 class="text-xl font-bold capitalize">{{ $type }} :</h3>
                    <div class="grid grid-cols-4 gap-2">
                        @foreach ($menu as $item)
                            <button class="avatar" wire:click="addItem({{ $item->id }})">
                                <div class="w-full rounded-lg">
                                    <img src="{{ $item->gambar }}" alt="">
                                </div>
                            </button>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <div class="card h-fit">
            <form class="card-body space-y-4" wire:submit="simpan">
                <h3 class="card-title">Detail transaksi</h3>

                <div @class([
                    'table-wrapper',
                    'border-error' => $errors->first('form.items'),
                ])>
                    <table class="table">
                        <thead>
                            <th>Nama menu</th>
                            <th>Qty</th>
                            <th>Harga</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($items ?? [] as $key => $value)
                                <tr>
                                    <td>{{ $key }}</td>
                                    <td>{{ $value['qty'] }}</td>
                                    <td>{{ Number::format($value['price']) }}</td>
                                    <td>
                                        <button class="btn btn-xs btn-square"
                                            wire:click="removeItem('{{ $key }}')">
                                            <x-tabler-minus class="size-4" />
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <select class="select select-bordered" wire:model="form.customer_id">
                    <option value="">Pilih customer</option>
                    @foreach ($customers as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>

                <textarea rows="3" @class([
                    'textarea textarea-bordered',
                    'textarea-error' => $errors->first('form.desc'),
                ])
                    placeholder="Keterangan transaksi, bisa diisi dengan nomor meja atau jenis transaksi." wire:model="form.desc"></textarea>

                <div class="card-actions justify-between">
                    <div class="flex flex-col">
                        <div class="text-xs">Total harga</div>
                        <div @class(['card-title', 'text-error' => $errors->first('form.items')])>Rp. {{ Number::format($this->getTotalPrice()) }}</div>
                    </div>
                    <button class="btn btn-primary">
                        <x-tabler-check class="size-5" />
                        <span>Simpan</span>
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
