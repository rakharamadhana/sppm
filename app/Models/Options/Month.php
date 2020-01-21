<?php

namespace App\Models\Options;

use App\Models\RecordingModel;

/**
 * Class SocialAccount.
 */
class Month extends RecordingModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'months';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'year_id',
        'month',
    ];
}
