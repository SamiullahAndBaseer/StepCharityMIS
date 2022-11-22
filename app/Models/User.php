<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $table = 'users';

    protected $dir = 'assets/img/staff/';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'father_name',
        'phone_number',
        'id_card_number',
        'salary',
        'bio',
        'role_id',
        'email',
        'password',
        'profile_photo_path',
        'branch_id',
        'currency_id',
        'marital_status',
        'date_of_birth',
        'status',
        'join_date',
        'gender',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function remittance_sender()
    {
        return $this->hasMany(Remittance::class, 'sender_id');
    }

    public function remittance_receiver()
    {
        return $this->hasMany(Remittance::class, 'receiver_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    /**
     * Get all of the leaves for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function leaves()
    {
        return $this->hasMany(Leave::class, 'user_id');
    }

    /**
     * Get all of the teachers for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function teachers()
    {
        return $this->hasMany(Teacher_course::class, 'user_id');
    }

    /**
     * Get all of the students for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students()
    {
        return $this->hasMany(Student_course::class, 'user_id');
    }

    /**
     * Get all of the lessons for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'user_id');
    }

    /**
     * Get the certificate associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function certificate()
    {
        return $this->hasMany(Certificate::class, 'user_id');
    }

    /**
     * Get all of the contracts for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contracts()
    {
        return $this->hasMany(Contract::class, 'user_id');
    }

    /**
     * Get all of the createReport for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createReport()
    {
        return $this->hasMany(Report::class, 'user_id');
    }

    /**
     * Get all of the feedbacks for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'user_id');
    }
}
