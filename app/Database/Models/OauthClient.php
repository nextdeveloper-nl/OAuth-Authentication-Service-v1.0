<?php

namespace App\Database\Models;

use Illuminate\Database\Eloquent\Model;
use NextDeveloper\Commons\Database\Traits\Filterable;
use NextDeveloper\I18n\Database\Observers\I18nTranslationObserver;
use NextDeveloper\Commons\Database\Traits\UuidId;

/**
 * Class I18nTranslation.
 *
 * @package NextDeveloper\I18n\Database\Models
 */
class OauthClient extends Model
{
    use Filterable, UuidId;

    public $incrementing = false;

    public $timestamps = false;

    protected $table = 'oauth_clients';


    /**
     * @var array
     */
    protected $guarded = [];

    /**
     *  Here we have the fulltext fields. We can use these for fulltext search if enabled.
     */
    protected $fullTextFields = [

    ];

    /**
     * @var array
     */
    protected $appends = [

    ];

    /**
     * We are casting fields to objects so that we can work on them better
     * @var array
     */
    protected $casts = [

    ];

    /**
     * We are casting data fields.
     * @var array
     */
    protected $dates = [

    ];

    /**
     * @var array
     */
    protected $with = [

    ];

    /**
     * @var int
     */
    protected $perPage = 20;

    /**
     * @return void
     */
    public static function boot()
    {
        parent::boot();
    }
}