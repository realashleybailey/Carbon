<?php

namespace Carbon\Sanitizer\Tests;

use Carbon\Sanitizer\Tests\Fixtures\Filters\CustomFilter;
use Carbon\Sanitizer\Laravel\Factory;
use PHPUnit\Framework\TestCase;

class FactoryTest extends TestCase
{
    public function test_custom_closure_filter()
    {
        $factory = new Factory;
        $factory->extend('hash', function ($value) {
            return sha1($value);
        });

        $data = [
            'name' => 'TEST',
        ];
        $filters = [
            'name' => 'hash',
        ];
        $newData = $factory->make($data, $filters)->sanitize();

        $this->assertEquals(sha1('TEST'), $newData['name']);
    }

    public function test_custom_class_filter()
    {
        $factory = new Factory;
        $factory->extend('custom', CustomFilter::class);

        $data = [
            'name' => 'TEST',
        ];
        $filters = [
            'name' => 'custom',
        ];
        $newData = $factory->make($data, $filters)->sanitize();

        $this->assertEquals('TESTTEST', $newData['name']);
    }

    public function test_replace_filter()
    {
        $factory = new Factory;
        $factory->extend('trim', function ($value) {
            return sha1($value);
        });

        $data = [
            'name' => 'TEST',
        ];
        $filters = [
            'name' => 'trim',
        ];
        $newData = $factory->make($data, $filters)->sanitize();

        $this->assertEquals(sha1('TEST'), $newData['name']);
    }
}
