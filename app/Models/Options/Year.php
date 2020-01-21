<?php

namespace App\Models\Options;

use App\Models\RecordingModel;

/**
 * Class SocialAccount.
 */
class Year extends RecordingModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'years';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'year',
    ];
}
