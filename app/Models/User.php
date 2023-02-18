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

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    public function designation(){
        return $this->belongsTo(Designation::class, 'designation_id','id');
    }

    public function permission(){
        return $this->belongsTo(UserPermission::class, 'usertype','role_name');
    }


    public function getIsAdminAttribute()
    {
        return $this->roles()->where('id', 1)->exists();
    }

    public function getIsTeacherAttribute()
    {
        return $this->roles()->where('id', 4)->exists();
    }

    public function getIsStudentAttribute()
    {
        return $this->roles()->where('id', 5)->exists();
    }

    public function teacherLessons()
    {
        return $this->hasMany(Lesson::class, 'teacher_id', 'id');
    }

    public function roles()
    {
        return $this->belongsTo(UserPermission::class, 'usertype','role_name');
    }

    function class()
    {
        return $this->student()->student_class()->where('class_id', 'id');
    }
    function student()
    {
        return $this->belongsTo(AssignStudent::class, 'id', 'student_id');
    }
}
