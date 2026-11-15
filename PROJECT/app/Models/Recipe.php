<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recipe extends Model
{
    public const STATUS_PENDING = 'Chờ duyệt';
    public const STATUS_APPROVED = 'Đã duyệt';
    public const STATUS_REJECTED = 'Bị từ chối';
    public const STATUS_HIDDEN = 'Bị ẩn';

    protected $table = 'CONGTHUC';
    protected $primaryKey = 'MACONGTHUC';
    public const CREATED_AT = 'NGAYTAO';
    public const UPDATED_AT = 'NGAYCAPNHAT';

    protected $fillable = [
        'MADANHMUC',
        'TENCONGTHUC',
        'MOTA',
        'THOIGIANNAU',
        'DOKHO',
        'HINHANH',
    ];
    protected function casts(): array
    {
        return [
            'THOIGIANNAU' => 'integer',
            'NGAYDUYET' => 'datetime',
        ];
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'MADANHMUC', 'MADANHMUC');
    }
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'MANGUOIDUNG', 'MANGUOIDUNG');
    }
    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'NGUOIDUYET', 'MANGUOIDUNG');
    }
}
