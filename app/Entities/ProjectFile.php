<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use App\Entities\Project;

/**
 * Class Project.
 *
 * @package namespace App\Entities;
 */
class ProjectFile extends Model implements Transformable
{

    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id',
        'name',
        'description',
        'extension'];

    public function project()
    {
        return $this->belongsTo(Project::Class);
    }

}
