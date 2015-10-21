<?php

namespace GrahamCampbell\BootstrapCMS\Models\Relations;

/**
 * This is the belongs to post trait.
 *
 * @author yuez <i@yuez.me.com>
 */
trait BelongsToProjectTrait
{
    /**
     * Get the project relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo('GrahamCampbell\BootstrapCMS\Models\Project');
    }
}
