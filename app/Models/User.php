<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Hash;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class User extends Authenticatable implements HasMedia
{
    use Notifiable;
    use InteractsWithMedia;
    use Auditable;
    use HasFactory;

    public const STANDING_ORDER_RADIO = [
        'no'        => 'No',
        'yes'       => 'Yes',
        'cancelled' => 'Cancelled',
    ];

    public const DISCOURSE_RADIO = [
        'no'      => 'No',
        'invited' => 'Invited',
        'emailed' => 'Email Follow-up Sent',
        'yes'     => 'Yes',
    ];

    public const STATUS_RADIO = [
        'joining'    => 'Joining',
        'active'     => 'Active',
        'suspended'  => 'Suspended',
        'cancelled'  => 'Cancelled',
        'terminated' => 'Terminated',
    ];

    public $table = 'users';

    protected $hidden = [
        'remember_token',
        'password',
    ];

    protected $dates = [
        'email_verified_at',
        'membership_end_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'status',
        'name',
        'surname',
        'email',
        'password',
        'standing_order',
        'standing_order_name',
        'direct_debit',
        'email_verified_at',
        'welcome_email',
        'mailchimp',
        'discourse',
        'postal_address',
        'membership_end_date',
        'notes',
        'remember_token',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getIsAdminAttribute()
    {
        return $this->roles()->where('id', 1)->exists();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function userCards()
    {
        return $this->hasMany(Card::class, 'user_id', 'id');
    }

    public function userInductions()
    {
        return $this->hasMany(Induction::class, 'user_id', 'id');
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setEmailVerifiedAtAttribute($value)
    {
        $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getMembershipEndDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setMembershipEndDateAttribute($value)
    {
        $this->attributes['membership_end_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
