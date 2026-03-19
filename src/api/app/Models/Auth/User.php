<?php

namespace App\Models\Auth;

use App\Models\Auth\User\Traits\Attributes;
use App\Models\Auth\User\Traits\JwtSettings;
use App\Models\Auth\User\Traits\Relations;
use App\Models\Contracts\AuthenticationModel;
use App\Models\Contracts\Traits\HasUuid;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends AuthenticationModel implements MustVerifyEmail, JWTSubject
{
    use Attributes;
    use HasFactory;
    use HasUuid;
    use JwtSettings;
    use Notifiable;
    use Relations;
    use SoftDeletes;

    public function getTable(): string
    {
        return 'users';
    }
}
