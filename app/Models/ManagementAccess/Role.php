<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
     // use HasFactory;
    // karena kita g pake coment aja use has factory
    // kita pake soft delete
    use SoftDeletes;

    // kita define nama tabel nya
    public $table = 'role';

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



// after set middleware
// many 2 many
public function user(){
    return $this->belongsToMany(User::class);
}

public function permision(){
    return $this->belongsToMany('App\Models\ManagementAccess\Permision');
}

// end many 2 many  after middlewaree

    public function role_user()
    {
        // 2 parameter (path model yang di tuju), FK nya
        return $this->hasMany('App\Models\ManagementAccess\RoleUser', 'role_id');
    }

    
    public function permision_role()
    {
        // 2 parameter (path model yang di tuju), FK nya
        return $this->hasMany('App\Models\ManagementAccess\PermisionRole', 'role_id');
    }
}
