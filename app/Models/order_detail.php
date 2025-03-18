<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_order',
        'id_produk',
        'jumlah',
        'harga',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_order' => 'integer',
        'id_produk' => 'integer',
    ];

    public function idOrder(): BelongsTo
    {
        return $this->belongsTo(IdOrder::class);
    }

    public function idProduk(): BelongsTo
    {
        return $this->belongsTo(IdProduk::class);
    }
}
