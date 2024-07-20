<?php

namespace App\Models;

use App\Observers\MenuObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Number;

#[ObservedBy([MenuObserver::class])]

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'desc',
        'type',
        'photo',
    ];

    public static $types = [
        'coffee',
        'non-coffe',
        'tea',
        'dessert',
    ];

    public function getHargaAttribute(){
        return "Rp. ". Number::format($this->price);
    }

    public function getGambarAttribute(){
        return $this->photo ? Storage::url($this->photo) : url('noimages.png');
    }
}
