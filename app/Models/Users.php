<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'user_name',
        'password',
        'salt',
        'email',
        'user_level',
        'created_by',
    ];

    public function test_results()
    {
        return $this->hasMany(TestResults::class, 'encoded_by');
    }

    public function counseling_results()
    {
        return $this->hasMany(CounselingResults::class, 'encoded_by');
    }

    public function downloadable_files()
    {
        return $this->hasMany(DownloadableFiles::class, 'uploaded_by');
    }

    public function students()
    {
        return $this->hasMany(Students::class, 'added_by');
    }
}
