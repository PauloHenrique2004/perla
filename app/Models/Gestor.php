<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * App\Models\Gestor
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|Gestor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gestor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gestor query()
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|Gestor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gestor whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gestor whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gestor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gestor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gestor wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gestor whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gestor whereUpdatedAt($value)
 */
class Gestor extends Authenticatable
{
    use Notifiable;

    protected $table = 'gestores';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        if (!empty($password))
            $this->attributes['password'] = $password;
    }
}
