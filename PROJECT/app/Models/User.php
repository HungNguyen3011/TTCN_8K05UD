<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['HOTEN', 'EMAIL', 'MATKHAU', 'ANHDAIDIEN', 'VAITRO', 'TRANGTHAI'])]
#[Hidden(['MATKHAU', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;
    protected $table = 'NGUOIDUNG';
    protected $primaryKey = 'MANGUOIDUNG';
    public const CREATED_AT = 'NGAYTAO';
    public const UPDATED_AT = 'NGAYCAPNHAT';

    public function getAuthPasswordName(): string
    {
        return 'MATKHAU';
    }
    protected function casts(): array
    {
        return [
            'MATKHAU' => 'hashed',
        ];
    }
}
