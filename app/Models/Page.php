<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'content',
        'parent_id',
    ];

    /*
     * Связь один ко многим таблицы pages c таблицей pages
     */
    public function children() {
        return $this->hasMany(Page::class, 'parent_id');
    }

    /*
     * Связь страница принадлежит таблицы pages c таблицей pages
     */
    public function parent() {
        return $this->belongsTo(Page::class);
    }

}
