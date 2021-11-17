<?php

if (! function_exists('remove_required')) {
    /**
     * Removes the "required" from validation rules. This won't remove "required_if",
     * "required_without", and their siblings.
     *
     * @param  array|string  $rules
     * @return array|string
     */
    function remove_required($rules)
    {
        $remove_required_single = function ($value) {
            if (is_string($value)) {
                $value = explode('|', $value);
            }

            if (is_array($value)) {
                return array_filter($value, function ($value) {
                    if (is_string($value)) {
                        return $value !== 'required';
                    }

                    return $value;
                });
            }

            return $value;
        };

        if (is_array($rules)) {
            return array_map($remove_required_single, $rules);
        } elseif (is_string($rules)) {
            return $remove_required_single($rules);
        }

        throw new \Exception('$rules parameter should be an array or a string.');
    }
}