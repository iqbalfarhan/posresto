<ul class="menu p-4 w-80 min-h-full bg-base-100 text-base-content border-r-2 border-base-300 space-y-4">
    <li>
        <h2 class="menu-title">Dashboard</h2>
        <ul>
            <li>
                <a href="{{ route('home') }}" @class(['active' => Route::is('home')]) wire:navigate>
                    <x-tabler-dashboard class="size-5" />
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('transaksi.create') }}" @class(['active' => Route::is('transaksi.create')]) wire:navigate>
                    <x-tabler-file-plus class="size-5" />
                    <span>Input Transaksi</span>
                </a>
            </li>
        </ul>
    </li>
    <li>
        <h2 class="menu-title">Data master</h2>
        <ul>
            <li>
                <a href="{{ route('menu.index') }}" @class(['active' => Route::is('menu.index')]) wire:navigate>
                    <x-tabler-layout-grid-add class="size-5" />
                    <span>Menu Makanan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('customer.index') }}" @class(['active' => Route::is('customer.index')]) wire:navigate>
                    <x-tabler-users class="size-5" />
                    <span>Data Customer</span>
                </a>
            </li>
            <li>
                <a href="{{ route('transaksi.index') }}" @class(['active' => Route::is('transaksi.index')]) wire:navigate>
                    <x-tabler-file class="size-5" />
                    <span>Riwayat Transaksi</span>
                </a>
            </li>
        </ul>
    </li>
    <li>
        <h2 class="menu-title">Account</h2>
        <ul>
            <li>
                <a href="{{ route('profile') }}" @class(['active' => Route::is('profile')]) wire:navigate>
                    <x-tabler-user class="size-5" />
                    <span>Edit profile</span>
                </a>
            </li>
            <li>
                <button wire:click="logout">
                    <x-tabler-logout class="size-5" />
                    <span>Logout</span>
                </button>
            </li>
        </ul>
    </li>
</ul>
