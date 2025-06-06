<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /*
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'email',
        'thumbnail',
        'phone_number',
        'province',
        'district',
        'ward',
        'address_detail',
        'password',
        'account_balance',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
     public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
    public function getFullAddressAttribute()
    {
        return "{$this->province}, {$this->district}, {$this->ward}, {$this->address_detail}";
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function hasRole($role)
    {
        return $this->role->roleName === $role;
    }
    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Product::class, 'favorites');
    }
}
