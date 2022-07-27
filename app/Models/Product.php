<?php

namespace App\Models;

use App\Enums\Currency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
	protected $fillable = ['title', 'price', 'currency', 'file_path'];

    protected $casts = [
		'currency' => Currency::class,
	];
    public function updateCurrency($currency)
	{
		$this->update(['status' => $currency]);
	}
}

