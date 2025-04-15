<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Auth\Access\Gate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Tests\Integration\Queue\Order;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'address_id',
        'password',
        'phone_number',
        'type','status'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relationships
    public function posts(){
        return $this->hasMany(Post::class, "seller_id");
    }

    public function orders(){
        return $this->hasMany(Order::class, "buyer_id");
    }

    public function soldOrders(){
        return $this->hasMany(Order::class, "seller_id");
    }

    public function addresses(){
        return $this->hasMany(Address::class);
    }

    public function notifications(){
        return $this->hasMany(Notification::class);
    }

}
