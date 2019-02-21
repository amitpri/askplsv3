<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ReviewMember extends Model
{
    protected $fillable = [
        
          'tenant_id', 'user_id','topic_id', 'profile_id', 'topic_name' , 'topic_categories_id',    'review', 'published' , 'status'
    ];

    public function topiccategorymembers()
    {

    	return $this->belongsTo('App\TopicCategoryMembers');

    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('user_id', function (Builder $builder) {

        	$loggedinid = Auth::user()->id;
            $loggedinemail = Auth::user()->email;
            $loggedinrole = Auth::user()->role;

            if ( $loggedinrole == 'super' ) {

            }else{
                
                $builder->where('review_members.user_id', '=', $loggedinid);

            }

            

        });
    }    

}
