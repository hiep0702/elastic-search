<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Auth\Authenticatable;
use Laravel\Scout\Searchable;

class Employee extends Model implements AuthenticatableContract, JWTSubject, CanResetPassword
{
    use HasFactory, Notifiable, Authenticatable, Searchable;

    protected $table = 'employee';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'employeeCode',
        'image',
        'fullname',
        'birthday',
        'identification',
        'salary',
        'dayOff',
        'email',
        'phone',
        'password',
        'status',
        'departmentId',
        'roleId',
        'device_token',
        'keySearch',
        'logged',
        'expired',
        'createdAt',
        'updatedAt',
    ];

    public function toSearchableArray(): array
    {
        return [
            'email' => $this->email,
            'fullname' => $this->fullname,
            'phone' => $this->phone,
        ];
    }

    public $timestamps = false;

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function getEmailForPasswordReset()
    {
        return $this->email;
    }

    public function sendPasswordResetNotification($token)
    {
        // Gửi email đặt lại mật khẩu tới người dùng
        // Code gửi email ở đây
    }
}
