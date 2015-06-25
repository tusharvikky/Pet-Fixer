<?php

namespace Mazkara;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
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
     * Relationship with PetService
     *
     * @return Relation
     * @author tusharvikky@gmail.com
     **/
    public function services()
    {
        return $this->belongsTo('Mazkara\Service', 'serviceId');
    }
}
