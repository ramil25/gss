<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownloadableFiles extends Model
{
    use HasFactory;

    protected $table = "downloadable_files";
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'student_id',
        'file_type',
        'file_location',
        'uploaded_by',
    ];

    public function users()
    {
        return $this->belongsTo(Users::class, 'uploaded_by');
    }

    public function students()
    {
        return $this->belongsTo(Students::class, 'student_id');
    }
}
