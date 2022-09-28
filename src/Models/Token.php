<?php

namespace Zaoob\Laravel\Tokenable\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'zaoom_tokans';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'token'];

    public function model($model = null)
    {
        if ($model && $model != $this->modelable_type) {
            abort(404);
        }

        return (new $this->modelable_type)->find($this->modelable_id);
    }
}