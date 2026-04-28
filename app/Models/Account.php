<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'type',
        'parent_id'
    ];

    /**
     * Parent COA (contoh: Aset -> Aset Lancar)
     */
    public function parent()
    {
        return $this->belongsTo(Account::class, 'parent_id');
    }

    /**
     * Child COA (tree structure)
     */
    public function children()
    {
        return $this->hasMany(Account::class, 'parent_id');
    }

    /**
     * Scope untuk ambil akun utama (root)
     */
    public function scopeRoot($query)
    {
        return $query->whereNull('parent_id');
    }
}
