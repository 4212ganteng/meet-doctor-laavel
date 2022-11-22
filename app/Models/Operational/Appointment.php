<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
   // use HasFactory;
    // karena kita g pake coment aja use has factory
    // kita pake soft delete
    use SoftDeletes;

    // kita define nama tabel nya
    public $table = 'appointment';

// kita define dates nya biar di isi format DATE biar g di isengin
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // declare fillable(field yang mau di isi)
    protected $fillable = [
        'doctor_id',
        'user_id',
        'consultation_id',
        'level',
        'date',
        'time',
        'status',
        // date kita declare filable karena di isi lagi oleh user. di atas kita hanya set input nya wajib type date
        'created_at',
        'updated_at',
        'deleted_at',
    ];

      // appointment belongs to doctor
    // bikin function table yang di tuju
    public function doctor()
    {
        // parameter belongs to ada 3
        // 3 parameter (path model yang di tuju), FK nya, primart key(id)
        return $this->belongsTo('App\Models\Operational\doctor', 'doctor_id', 'id');
    }

      // appointment belongs to doctor
    // bikin function table yang di tuju
    public function consultation()
    {
        // parameter belongs to ada 3
        // 3 parameter (path model yang di tuju), FK nya, primart key(id)
        return $this->belongsTo('App\Models\MasterData\Consultation', 'consultation', 'id');
    }

      // appointment belongs to user
    // bikin function table yang di tuju
    public function user()
    {
        // parameter belongs to ada 3
        // 3 parameter (path model yang di tuju), FK nya, primart key(id)
        return $this->belongsTo('App\Models\User', 'appointment_id', 'id');
    }

     // appointment hasOne transaction
    // bikin function table yang di tuju
    public function transaction()
    {
        // 2 parameter (path model yang di tuju), FK nya
        return $this->hasOne('App\Models\Operational\Transaction', 'appointment_id');
    }

    
}
