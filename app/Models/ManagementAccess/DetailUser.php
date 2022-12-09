<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// jngn lupa imp softdeletes ny
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailUser extends Model
{
    // use HasFactory;
    // karena kita g pake coment aja use has factory
    // kita pake soft delete
    use SoftDeletes;

    // kita define nama tabel nya
    public $table = 'detail_user';

// kita define dates nya biar di isi format DATE biar g di isengin
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // declare fillable(field yang mau di isi)
    protected $fillable = [
        'user_id',
        'type_user_id',
        'contact',
        'photo',
        'gender',
        'age',
        // date kita declare filable karena di isi lagi oleh user. di atas kita hanya set input nya wajib type date
        'created_at',
        'updated_at',
        'deleted_at',
    ];

     // one to many
    
    // bikin function table yang di tuju
    public function type_user()
    {
        // parameter belongs to ada 3
        // 3 parameter (path model yang di tuju), FK nya, primart key(id)
        return $this->belongsTo('App\Models\MasterData\TypeUser', 'type_user_id', 'id');
    }

      // detail user belongs to user
    // bikin function table yang di tuju
    public function user()
    {
        // parameter belongs to ada 3
        // 3 parameter (path model yang di tuju), FK nya, primart key(id)
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

}
