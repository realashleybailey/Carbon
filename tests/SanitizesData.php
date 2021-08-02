<?php

namespace CarbonClean\Sanitizer\Tests;

use CarbonClean\Sanitizer\Sanitizer;

trait SanitizesData
{
    /**
     * Sanitizes the data.
     *
     * @param array $data
     * @param array $data
     * @return array
     */
    public function sanitize(array $data, array $filters)
    {
        $sanitizer = new Sanitizer($data, $filters);

        return $sanitizer->sanitize();
    }
}
