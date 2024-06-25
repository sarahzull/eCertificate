<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'date_issued', 
        'unique_number'
    ];

    protected $casts = [
        'date_issued' => 'date'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($certificate) {
            $certificate->unique_number = Str::random(15);
        });
    }

    public function getDateIssuedFormattedAttribute()
    {
        return $this->date_issued->format('d F Y');
    }
}
