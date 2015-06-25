<?php

namespace Mazkara;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    /**
     * Relationship with User
     *
     * @return Relation
     * @author tusharvikky@gmail.com
     **/
    public function user()
    {
        return $this->belongsTo('Mazkara\User', 'userId');
    }

    /**
     * Relationship with Pet
     *
     * @return Relation
     * @author tusharvikky@gmail.com
     **/
    public function pets()
    {
        return $this->hasMany('Mazkara\Pet', 'serviceId');
    }


}
