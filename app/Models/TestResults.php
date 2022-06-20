<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestResults extends Model
{
    use HasFactory;

    protected $table = "test_results";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'student_id',
        'test_type',
        'test_result',
        'encoded_by',
    ];

    public function users()
    {
        return $this->belongsTo(Users::class, 'encoded_by');
    }

    public function students()
    {
        return $this->belongsTo(Students::class, 'student_id');
    }
}
