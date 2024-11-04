<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BorrowedItem extends Model
{
    protected $table = 'borrowed_items';
    protected $fillable = ['perpus_id', 'user_id', 'name', 'jumlah', 'return_date']; // Removed the extra comma

    public function perpus()
    {
        return $this->belongsTo(Perpus::class, 'perpus_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
