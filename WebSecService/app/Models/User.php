<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'borrowing_limit',
    ];

    /**
     * Get user role.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Member borrows.
     */
    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }

    public function isAdmin(): bool
    {
        return $this->role && $this->role->name === 'Admin';
    }

    public function isLibrarian(): bool
    {
        return $this->role && $this->role->name === 'Librarian';
    }

    public function isMember(): bool
    {
        return $this->role && $this->role->name === 'Member';
    }

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
}
