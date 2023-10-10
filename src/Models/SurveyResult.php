<?php

namespace Sonphait\Survey\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyResult extends Model
{
    protected $table = 'survey_results';
    protected $fillable = [
        'survey_id', 'user_id', 'json',
    ];
    protected $casts = [
        'json'  =>  'array',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function survey()
    {
        return $this->belongsTo('Sonphait\Survey\Models\Survey', 'survey_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(config('survey-manager.user_model'), 'user_id');
    }
}
