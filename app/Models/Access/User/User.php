<?php

namespace App\Models\Access\User;

use App\Models\Access\User\Traits\UserAccess;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Access\User\Traits\Attribute\UserAttribute;
use App\Models\Access\User\Traits\Relationship\UserRelationship;

/**
 * Class User
 * @package App\Models\Access\User
 */
class User extends Authenticatable
{

    use SoftDeletes, UserAccess, UserAttribute, UserRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'status', 'confirmation_code', 'confirmed'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function courses() {
        return $this->belongsToMany('App\Course');
    }

    public function notifications() {
        return $this->hasMany('App\Notice');
    }

    public function quests() {
        return $this->belongsToMany('App\Quest')->withPivot('revision', 'graded')->withTimestamps();
    }

    public function feedback_received() {
        return $this->hasMany('App\Feedback', 'to_user_id');
    }

    public function feedback_given() {
        return $this->hasMany('App\Feedback', 'from_user_id');
    }

    public function submissions() {
        return $this->belongsToMany('App\Submission');        
    }

    public function links() {
        return $this->belongsToMany('App\Link');
    }

    public function skills() {
        return $this->belongsToMany('App\Skill')->withPivot('amount');
    }
}
