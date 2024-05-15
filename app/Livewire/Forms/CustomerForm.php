<?php

namespace App\Livewire\Forms;

use App\Models\Customer;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CustomerForm extends Form
{
    public $name;
    public $contact;
    public $desc;

    public ?Customer $customer;

    public function setCustomer(Customer $customer){
        $this->customer = $customer;

        $this->name = $customer->name;
        $this->contact = $customer->contact;
        $this->desc = $customer->desc;
    }

    public function store(){
        $validate = $this->validate([
            "name"=> "required",
            "contact"=> "required",
            "desc"=> "",
        ]);

        Customer::create($validate);
        $this->reset();
    }

    public function update(){
        $validate = $this->validate([
            "name"=> "required",
            "contact"=> "required",
            "desc"=> "",
        ]);

        $this->customer->update($validate);
        $this->reset();
    }
}
