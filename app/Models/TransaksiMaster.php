<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiMaster extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = "transaksi_master";

    protected $fillable = [
        'id',
        'tanggal',
        'status',
        'user_input',
    ];
}
