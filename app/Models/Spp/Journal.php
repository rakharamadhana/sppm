<?php

namespace App\Models\Spp;

use App\Models\RecordingModel;

/**
 * Class SocialAccount.
 */
class Journal extends RecordingModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'journals';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'year',
        'month',
        'amount',
        'receipt',
        'form',
        'status',
    ];

}
