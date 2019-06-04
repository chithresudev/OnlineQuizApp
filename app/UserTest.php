<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class UserTest extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'started_at', 'ended_at', 'status',
    ];


    public $timestamps = false;

    /**
     * Get the duration for the test.
     */
    public function getDurationAttribute()
    {
        $end_time = Carbon::parse($this->ended_at);
        $start_time = Carbon::parse($this->started_at);
        $interval = $end_time->diffInSeconds($start_time);
        return  $interval . ' Seconds';
    }

    /**
     * Get the duration for the test.
     */
    public function getTimerAttribute()
    {
        $end_time = Carbon::parse($this->ended_at);
        $start_time = Carbon::parse($this->started_at);
        $interval = $end_time->diffInSeconds($start_time);
        return  '00:'.$interval;
    }

}
