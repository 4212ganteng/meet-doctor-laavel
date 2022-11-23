<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PermisionRole extends Model
{
  // use HasFactory;
    // karena kita g pake coment aja use has factory
    // kita pake soft delete
    use SoftDeletes;

    // kita define nama tabel nya
    public $table = 'permision_role';

// kita define dates nya biar di isi format DATE biar g di isengin
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // declare fillable(field yang mau di isi)
    protected $fillable = [
        'permision_id',
        'role_id',
        
        // date kita declare filable karena di isi lagi oleh user. di atas kita hanya set input nya wajib type date
        'created_at',
        'updated_at',
        'deleted_at',
    ];

      // bikin function table yang di tuju
      public function permision()
      {
          // parameter belongs to ada 3
          // 3 parameter (path model yang di tuju), FK nya, primart key(id)
          return $this->belongsTo('App\Models\ManagementAccess\Permision', 'permision_id', 'id');
      }
  
          // bikin function table yang di tuju
          public function role()
          {
              // parameter belongs to ada 3
              // 3 parameter (path model yang di tuju), FK nya, primart key(id)
              return $this->belongsTo('App\Models\ManagementAccess\Role', 'role_id', 'id');
          }
}
