<?php

namespace App\Livewire\Menu;

use App\Livewire\Forms\MenuForm;
use App\Models\Menu;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Actions extends Component
{
    use WithFileUploads;

    public $show = false;
    public $photo;
    public MenuForm $form;

    #[On('createMenu')]
    public function createMenu(){
        $this->show = true;
    }

    #[On('editMenu')]
    public function editMenu(Menu $menu){
        $this->form->setMenu($menu);
        $this->show = true;
    }

    #[On('deleteMenu')]
    public function deleteMenu(Menu $menu){
        $menu->delete();
        $this->dispatch('reload');
    }

    public function simpan()
    {
        if ($this->photo) {
            $this->form->photo = $this->photo->hashName('menu');
            $this->photo->store('menu');
        }

        if (isset($this->form->menu)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->closeModal();

        $this->dispatch('reload');
    }

    public function closeModal(){
        $this->show = false;
        $this->photo = null;
        $this->form->reset();
    }

    public function render()
    {
        return view('livewire.menu.actions', [
            'types' => Menu::$types
        ]);
    }
}
