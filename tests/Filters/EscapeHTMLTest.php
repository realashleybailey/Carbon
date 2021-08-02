<?php

namespace CarbonClean\Sanitizer\Tests\Filters;

use CarbonClean\Sanitizer\Tests\SanitizesData;
use PHPUnit\Framework\TestCase;

class EscapeHTMLTest extends TestCase
{
    use SanitizesData;

    public function test_escapes_strings()
    {
        $data = [
            'name' => '<h1>Hello! Unicode chars as Ñ are not escaped.</h1> <script>Neither is content inside HTML tags</script>',
        ];
        $filters = [
            'name' => 'escape',
        ];
        $data = $this->sanitize($data, $filters);

        $this->assertEquals('Hello! Unicode chars as Ñ are not escaped. Neither is content inside HTML tags', $data['name']);
    }
}
