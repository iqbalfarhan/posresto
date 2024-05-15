<?php

namespace App\Livewire\Transaksi;

use App\Livewire\Forms\TransaksiForm;
use App\Models\Customer;
use App\Models\Menu;
use App\Models\Transaksi;
use Livewire\Component;

class Actions extends Component
{
    public $search;
    public $items = [];

    public TransaksiForm $form;
    public ?Transaksi $transaksi;

    public function addItem(Menu $menu)
    {
        if (isset($this->items[$menu->name])) {
            $item = $this->items[$menu->name];

            $this->items[$menu->name] = [
                'qty' => $item['qty'] + 1,
                'price' => $item['price'] + $menu->price
            ];
        }
        else{
            $this->items[$menu->name] = [
                'qty' => 1,
                'price' => $menu->price
            ];
        }
    }

    public function removeItem($key)
    {
        $item = $this->items[$key];

        if ($item['qty'] > 1) {
            $hargasatuan = $item['price'] / $item['qty'];
            $qtybaru = $item['qty'] - 1;

            $this->items[$key]['qty'] = $qtybaru;
            $this->items[$key]['price'] = $hargasatuan * $qtybaru;
        }
        else{
            unset($this->items[$key]);
        }
    }

    public function getTotalPrice()
    {
        if(isset($this->items)){
            $pricess = array_column($this->items, 'price');
            return array_sum($pricess);
        }
        else{
            return 0;
        }
    }

    public function simpan()
    {
        $this->form->items = $this->items;
        $this->form->price = $this->getTotalPrice();

        if (isset($this->form->transaksi)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->redirect(route('transaksi.index'), true);
    }

    public function mount()
    {
        if (isset($this->transaksi)) {
            $this->form->setTransaksi($this->transaksi);
            $this->items = $this->form->items;
        }
    }

    public function render()
    {
        return view('livewire.transaksi.actions', [
            'menus' => Menu::when($this->search, function($menu){
                $menu->where('name', 'like', '%'.$this->search.'%')
                ->orWhere('type', 'like', '%'.$this->search.'%')
                ->orWhere('desc', 'like', '%'.$this->search.'%');
            })->get()->groupBy('type'),
            'customers' => Customer::pluck('name', 'id')
        ]);
    }
}
