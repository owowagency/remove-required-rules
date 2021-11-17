<?php

namespace Owowagency\RemoveRequiredRules\Tests;

use PHPUnit\Framework\TestCase;

class HelperTest extends TestCase
{
    /** @test */
    public function it_removes_required_rules()
    {
        $this->assert('string|max:30', ['required', 'string', 'max:30']);
        $this->assert('string|max:30', 'required|string|max:30');
        $this->assert('string|max:30', 'string|required|max:30');
        $this->assert('string|max:30', 'string|max:30|required');

        $this->assert('string|max:30', ['required', 'string', 'max:30']);
        $this->assert('string|max:30', ['string', 'required', 'max:30']);
        $this->assert('string|max:30', ['string', 'max:30', 'required']);
    }

    /**
     * Assert the expected results against the parsed rules.
     *
     * @param  string  $expected
     * @param  string|array  $rules
     * @return void
     */
    private function assert($expected, $rules)
    {
        $this->assertEquals($expected, $this->parseToString(remove_required($rules)));
    }

    /**
     * Parse the rules to a string for easier assertion.
     *
     * @param  array  $rules
     * @return string
     */
    private function parseToString($rules)
    {
        return implode('|', $this->flatten($rules));
    }

    /**
     * The remove_required() method returns the new rules array in a certain
     * format which we want to convert before imploding it.
     *
     * @param  array  $rules
     * @return array
     */
    private function flatten($rules)
    {
        $flatten = [];

        foreach ($rules as $rule) {
            if (is_array($rule)) {
                $rule = end($rule);
            }

            // Just like Laravel does, we're going to filter out the empty rules.
            if (empty($rule)) {
                continue;
            }

            $flatten[] = $rule;
        }

        return $flatten;
    }
}
