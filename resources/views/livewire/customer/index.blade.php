<div class="page-wrapper">
    <div class="flex flex-col md:flex-row justify-between gap-2">
        <input type="search" class="input input-bordered" placeholder="Pencarian" wire:model.lazy="search">

        <button class="btn btn-primary" wire:click="$dispatch('createCustomer')">
            <x-tabler-plus class="size-5" />
            <span>Tambah customer</span>
        </button>
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Nama customer</th>
                <th>Kontak</th>
                <th>Keteragan</th>
                <th class="text-center">Actions</th>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->contact }}</td>
                        <td>{{ Str::limit($customer->desc, 50) }}</td>
                        <td>
                            <div class="flex justify-center gap-1">
                                <button class="btn btn-xs btn-square"
                                    wire:click="$dispatch('editCustomer', {customer : {{ $customer->id }}})">
                                    <x-tabler-edit class="size-4" />
                                </button>
                                <button class="btn btn-xs btn-square"
                                    wire:click="$dispatch('deleteCustomer', {customer : {{ $customer->id }}})">
                                    <x-tabler-trash class="size-4" />
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @livewire('customer.actions')
</div>
