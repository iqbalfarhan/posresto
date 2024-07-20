<table>
    <thead>
        <tr>
            <th>Kode</th>
            <th>Tanggal</th>
            <th>Customer</th>
            <th>Total</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transaksis as $transaksi)
            <tr>
                <td>{{ $transaksi->id }}</td>
                <td>{{ $transaksi->created_at->format('Y-m-d') }}</td>
                <td>{{ $transaksi->customer?->name }}</td>
                <td>{{ $transaksi->price }}</td>
                <td>{{ $transaksi->desc }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
