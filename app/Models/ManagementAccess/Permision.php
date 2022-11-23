<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permision extends Model
{
     // use HasFactory;
    // karena kita g pake coment aja use has factory
    // kita pake soft delete
    use SoftDeletes;

    // kita define nama tabel nya
    public $table = 'permision';

// kita define dates nya biar di isi format DATE biar g di isengin
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // declare fillable(field yang mau di isi)
    protected $fillable = [
        'title',
        // date kita declare filable karena di isi lagi oleh user. di atas kita hanya set input nya wajib type date
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function permision_role()
    {
        // 2 parameter (path model yang di tuju), FK nya
        return $this->hasMany('App\Models\ManagementAccess\PermisionRole', 'permision_id');
    }
}
