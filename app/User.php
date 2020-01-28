<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use LaratrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'tel', 'district', 'password', 'profile_image', 'confirmation_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile()
    {
      return $this->hasOne(Profile::class);
    }

    public function pages()
    {
      return $this->hasMany(Pages::class);
    }

    public function adverts()
    {
      return $this->hasMany(Advert::class);
    }

    public function news()
    {
      return $this->hasMany(News::class);
    }

    public function categories()
    {
      return $this->hasMany(Category::class);
    }

    public function tags()
    {
      return $this->hasMany(Tag::class);
    }

    public function faqs()
    {
      return $this->hasMany(Faq::class);
    }

    public function activities()
    {
      return $this->hasMany(Activity::class);
    }

    public function partners()
    {
      return $this->hasMany(Partner::class);
    }

    public function abouts()
    {
      return $this->hasMany(About::class);
    }

    public function events()
    {
      return $this->hasMany(Event::class);
    }

    public function programs()
    {
      return $this->hasMany(Program::class);
    }

    public function crimes()
    {
      return $this->hasMany(Crime::class);
    }

     public function testimonials()
    {
      return $this->hasMany(Testimonial::class);
    }

}
