<?php

namespace Emtudo\Domains\Calendars\Queries;

use Emtudo\Support\Queries\BaseQueryBuilder;
use Illuminate\Database\Eloquent\Builder as EloquentQueryBuilder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class EventQueryFilter extends BaseQueryBuilder
{
    /**
     * @param EloquentQueryBuilder|QueryBuilder $query
     * @param array                             $params
     */
    public function __construct($query, array $params)
    {
        $this->params = $params;
        $this->query = $query;
    }

    /**
     * @return EloquentQueryBuilder|QueryBuilder
     */
    public function getQuery()
    {
        $this->applyLike(['label', 'descripition']);
        $this->applyBetweenIn('date');
        $this->applyJsonWhere('address');

        return $this->query;
    }
}
