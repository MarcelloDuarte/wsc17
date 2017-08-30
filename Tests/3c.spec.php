<?php

use Lesson3\Exercise3c\{ Some, None };

describe("Lesson 2", function() {
    it("is exercise 2e: implementing map for Option", function() {
        $plusOne = function($x) { return $x + 1; };
        expect((new Some(2))->map($plusOne))->toEqual(new Some(3));
        expect((new None())->map($plusOne))->toEqual(new None());
    });
});