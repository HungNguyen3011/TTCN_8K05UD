<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $table = 'DANHMUC';
    protected $primaryKey = 'MADANHMUC';
    public const CREATED_AT = 'NGAYTAO';
    public const UPDATED_AT = 'NGAYCAPNHAT';

    protected $fillable = [
        'TENDANHMUC',
        'MOTA',
    ];
    public function recipes(): HasMany
    {
        return $this->hasMany(Recipe::class, 'MADANHMUC', 'MADANHMUC');
    }
}
