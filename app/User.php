<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'password',
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


    /**
     * The relationship integred Answer table
     *
     * @var array
     */

     public function answers()
     {
       return $this->hasMany('App\Answer');
     }



    /**
     * The relationship get score
     *
     * @var array
     */

     public function getScoreAttribute()
     {
       return $this->answers->where('answer_score', 1)->count();
     }


     /**
     * Create user's test .
     *
     * @return void
     */
    public function createTest()
    {
        $test = UserTest::firstOrCreate(
              ['user_id' => $this->id],
              [
                'started_at' => Carbon::now(),
                'ended_at' => Carbon::now()->addSeconds(60),
                'status' => 1
              ]);
        return $this;
    }


    /**
     * The relationship integred UserTest table
     *
     * @var array
     */

     public function userTest()
     {
       return $this->hasOne('App\UserTest');
     }

    /**
     * The relationship Tested Check table
     *
     * @var array
     */

     public function isTested()
     {
       return $this->userTest()->where('status', 2)->count();
     }


}
