<?php
declare(strict_types=1);

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'price',
        'image_id',
    ];

    public function image()
    {
        return $this->belongsTo('App\Models\Products\Image', 'image_id');
    }

    /**
     * relationship with only active warehouse
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function warehouses(): BelongsToMany
    {
        return $this->belongsToMany(Warehouse::class)->where('warehouses.active', true);
    }
}
