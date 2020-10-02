<?php

namespace App\Models;

use App\Support\Role;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    protected $table = 'admins';

    protected $guarded = ['id'];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Check whether this user is root or not
     * @return bool
     */
    public function isRoot()
    {
        return ($this->role == Role::ROOT);
    }

    /**
     * Check whether this user is admin or not
     * @return bool
     */
    public function isAdmin()
    {
        return ($this->role == Role::ADMIN);
    }

    /**
     * Check whether this user is Owner or not
     * @return bool
     */
    public function isOwner()
    {
        return ($this->role == Role::OWNER);
    }

    /**
     * Check whether this user is Customer Service or not
     * @return bool
     */
    public function isCs()
    {
        return ($this->role == Role::CS);
    }

    /**
     * Check whether this user is Content Creator or not
     *
     * @return bool
     */
    public function isCreator()
    {
        return ($this->role == Role::CREATOR);
    }

    public function getBlog()
    {
        return $this->hasMany(Blog::class, 'admin_id');
    }

    /**
     * Sends the password reset notification.
     *
     * @param string $token
     *
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomPasswordAdmin($token));
    }
}

class CustomPasswordAdmin extends ResetPassword
{
    public function toMail($notifiable)
    {
        $token = $this->token;
        $email = $notifiable->getEmailForPasswordReset();
        return (new MailMessage)
            ->from(env('MAIL_USERNAME'), __('lang.title'))
            ->subject('Admin ' . __('lang.mail.subject.reset'))
            ->view('emails.auth.reset', compact('token', 'email'));
    }
}
