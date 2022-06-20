<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CounselingResults extends Model
{
    use HasFactory;

    protected $table = "counseling_results";
           /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'student_id',
        'description',
        'remarks',
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
