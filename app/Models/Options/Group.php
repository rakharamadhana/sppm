<?php

namespace App\Models\Options;

use App\Models\RecordingModel;

/**
 * Class SocialAccount.
 */
class Group extends RecordingModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'groups';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'name',
    ];
}
