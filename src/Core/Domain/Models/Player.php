<?php

namespace estbase\Core\Domain\Models;

class Player extends MyBaseModel
{
    protected $table = 'players';

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $fillable = [
        'country_id',
        'language_id',
        'email',
        'name',
        'surname',
        'nickName',
        'nickNameHash',
        'birthDate',
        'gender',
        'occupation',
        'website',
        'about',
        'twitch',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    // TODO - Mirar si es necessari aqui, o a una UuidModel (que estengui de MyBaseModel) posar un setID, que em seteji el Uuid del model.

    /**
     * @param $countryId
     */
    public function setCountryIdAttribute($countryId)
    {
        $this->attributes['country_id'] = $this->nullIfBlank($countryId);
    }

    /**
     * @param $languageId
     */
    public function setLanguageIdAttribute($languageId)
    {
        $this->attributes['language_id'] = $this->nullIfBlank($languageId);
    }
}