<?php

namespace Carbon\Sanitizer\Filters;

use Carbon\Sanitizer\Contracts\Filter;

class StripTags implements Filter
{
    /**
     * Strip tags from the given string.
     *
     * @param mixed $value
     * @param array $options
     * @return mixed
     */
    public function apply($value, array $options = [])
    {
        return is_string($value) ? strip_tags($value) : $value;
    }
}
