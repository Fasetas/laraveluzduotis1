<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    use HasFactory;

    public function tasks(){
        return $this->belongsTo(Task::class);
    }

public function scopeSearch($query, $search){
    if ($search!==null){
        $query->where('name','like',"%$search%");
    }
    return $query;

}
public function scopeFromPriority($query, $priorityId){
    if ($priorityId!==null){
        $query->where('priority_id',$priorityId);
    }
    return $query;
}


}