<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MonthlyPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'moon_id',
        'year',
        'price',
        'status',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function month(): BelongsTo
    {
        return $this->belongsTo(Moon::class, 'moon_id');
    }
}
