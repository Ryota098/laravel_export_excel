<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'questionnaire_id',
        'name',
        'company',
        'about_company',
        'about_lifestyle',
        'about_coaching',
        'noticed',
        'feedback',
        'etc',
    ];
    
    public function scopeSearch($query, $term) {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('company', 'like', $term);
        });
        
    }
}
