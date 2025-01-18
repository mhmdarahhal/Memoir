<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memoir extends Model
{
    use HasFactory;

    protected $table = 'memoir';
    protected $primaryKey = 'memoirid';

    protected $fillable = [
        'body',
        'category',
        'mood',
        'title',
        'date',
        'userid',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userid', 'userid');
    }
}
