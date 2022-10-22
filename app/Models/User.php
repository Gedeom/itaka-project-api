<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Eloquent;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Hash;


/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection|PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @mixin Eloquent
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function login($credentials)
    {
        $credentials = (object) $credentials;

        $user = User::where('email', $credentials->email)->first();

        if (!$user || !\Illuminate\Support\Facades\Hash::check($credentials->password, $user->password)) {
            throw new Exception('Credencias incorretas, verifique-as e tente novamente.', -404);
        }

        return $user->createToken('auth_token')->plainTextToken;
    }


    public function logout($token)
    {
        auth()->user()->tokens()->where('id', $token)->delete();
    }

    public function checkToken()
    {

        if(!auth('sanctum')->check()){
            throw new Exception('Token inválido',322);
        }

        return true;
    }

    public function index()
    {
        return self::orderBy('name')->get();
    }

    public function createOrUpdate($fields, $id = null)
    {
        if ($id) {
            $user = User::find($id);
        } else {
            $user = new User();
        }

        $user->name = $fields['name'];
        $user->email = $fields['email'];
        $user->password = Hash::make($fields['password']);
        $user->save();

        return $user;
    }

    public function show($id)
    {
        $show = self::find($id);

        if (!$show) {
            throw new Exception('Nada Encontrado', -404);
        }

        return $show;
    }

    public function remove($id)
    {
        $user = $this->show($id);

        $user->delete();
        return $user;
    }

}
