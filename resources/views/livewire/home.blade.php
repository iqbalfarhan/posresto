<div class="page-wrapper">
    <div class="grid md:grid-cols-3 gap-2 md:gap-6">
        <div class="card card-compact">
            <div class="card-body flex-row items-center gap-3">
                <div class="avatar placeholder">
                    <div class="w-12 bg-warning rounded-full">
                        <x-tabler-calendar-month class="size-6" />
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="text-xs opacity-50">Pendapatan bulan ini</div>
                    <div class="text-xl font-bold">Rp. {{ Number::format($monthly) }}</div>
                </div>
            </div>
        </div>
        <div class="card card-compact">
            <div class="card-body flex-row items-center gap-3">
                <div class="avatar placeholder">
                    <div class="w-12 bg-warning rounded-full">
                        <x-tabler-calendar-check class="size-6" />
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="text-xs opacity-50">Pendapatan hari ini</div>
                    <div class="text-xl font-bold">Rp. {{ Number::format($today->sum('price')) }}</div>
                </div>
            </div>
        </div>
        <div class="card card-compact">
            <div class="card-body flex-row items-center gap-3">
                <div class="avatar placeholder">
                    <div class="w-12 bg-warning rounded-full">
                        <x-tabler-list-check class="size-6" />
                    </div>
                </div>
                <div class="flex flex-col">
                    <div class="text-xs opacity-50">Total pesanan hari ini</div>
                    <div class="text-xl font-bold">{{ $today->count() }} Pesanan</div>
                </div>
            </div>
        </div>
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Tanggal</th>
                <th>Keterangn</th>
                <th>Customer</th>
                <th>Total bayar</th>
                <th>Status</th>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr wire:key="{{ $data->id }}">
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->created_at->diffForHumans() }}</td>
                        <td>{{ $data->desc }}</td>
                        <td>{{ $data->cusomer?->name }}</td>
                        <td>Rp. {{ Number::format($data->price) }}</td>
                        <td>
                            <input type="checkbox" class="toggle toggle-sm toggle-primary" @checked($data->done)
                                wire:change="toggleDone({{ $data->id }})" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
