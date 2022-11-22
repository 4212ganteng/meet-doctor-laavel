<?php

namespace App\Models\Masterdata;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specialist extends Model
{
    // use HasFactory;
    // karena kita g pake coment aja use has factory
    // kita pake soft delete
    use SoftDeletes;

    // kita define nama tabel nya
    public $table = 'specialist';

// kita define dates nya biar di isi format DATE biar g di isengin
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // declare fillable(field yang mau di isi)
    protected $fillable = [
        'name',
        'price',
        // date kita declare filable karena di isi lagi oleh user. di atas kita hanya set input nya wajib type date
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
