<div class="page-wrapper">
    <div class="max-w-sm mx-auto space-y-8">
        <div class="text-center">
            <h3 class="font-bold text-xl">{{ config('app.name') }}</h3>
            <p>{{ fake()->address() }}</p>
        </div>

        <div>
            <table class="w-full">
                <tr>
                    <td>Kode transaksi</td>
                    <td>:</td>
                    <td>{{ $transaksi->id }}</td>
                </tr>
                <tr>
                    <td>Tangggal</td>
                    <td>:</td>
                    <td>{{ $transaksi->created_at->format('d F Y H:i') }}</td>
                </tr>
                <tr>
                    <td>Customer</td>
                    <td>:</td>
                    <td>{{ $transaksi->customer?->name ?? '-' }}</td>
                </tr>
            </table>
        </div>

        <div class="space-y-2">
            @foreach ($transaksi->items as $name => $item)
                <div class="flex flex-col">
                    <div>{{ $name }}</div>
                    <div class="flex justify-between">
                        <div>{{ $item['price'] / $item['qty'] }} x {{ $item['qty'] }}</div>
                        <div>{{ $item['price'] }}</div>
                    </div>
                </div>
            @endforeach
        </div>

        <div>
            <small>Total bayar</small>
            <div class="text-xl">Rp. {{ Number::format($transaksi->price) }}</div>
        </div>
    </div>
</div>
