<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'note'
    ];
    /**
     * Get the Items of the todo
     * 
     * @return TodoItem
     */
    public function todoItems()
    {
        return $this->hasMany("App\TodoItem");
    }
}
