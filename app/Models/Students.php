<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $table = "students";
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'last_name',
        'first_name',
        'middle_name',
        'student_id',
        'gender',
        'birth_day',
        'address',
        'picture',
        'civil_status',
        'religion',
        'contact_number',
        'email_address',
        'guardian_name',
        'relationship',
        'guardian_contact_number',
        'remarks',
        'added_by'
    ];

    public function users()
    {
        return $this->belongsTo(Users::class, 'added_by');
    }

    public function test_results()
    {
        return $this->hasMany(TestResults::class, 'student_id');
    }

    public function counseling_results()
    {
        return $this->hasMany(CounselingResults::class, 'student_id');
    }

    public function downloadable_files()
    {
        return $this->hasMany(DownloadableFiles::class, 'student_id');
    }
}
