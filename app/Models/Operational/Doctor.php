<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    // use HasFactory;
    // karena kita g pake coment aja use has factory
    // kita pake soft delete
    use SoftDeletes;

    // kita define nama tabel nya
    public $table = 'doctor';

// kita define dates nya biar di isi format DATE biar g di isengin
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // declare fillable(field yang mau di isi)
    protected $fillable = [
        'specialist_id',
        'name',
        'fee',
        'photo',
        // date kita declare filable karena di isi lagi oleh user. di atas kita hanya set input nya wajib type date
        'created_at',
        'updated_at',
        'deleted_at',
    ];

      // one to many
    
    // bikin function table yang di tuju
    public function specialist()
    {
        // parameter belongs to ada 3
        // 3 parameter (path model yang di tuju), FK nya, primart key(id)
        return $this->belongsTo('App\Models\MasterData\Specialist', 'specialist_id', 'id');
    }

      // doctor hash many appointment
    
    // bikin function table yang di tuju
    public function appointment()
    {
        //  parameter (path model yang di tuju), FK nya
        return $this->hasMany('App\Models\Operational\Appointment', 'doctor_id');
    }
}
