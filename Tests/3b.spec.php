<?php

use Lesson3\Exercise3b\{ Left, Right, function eitherDivBy };

describe("Lesson 3", function() {
    it("solves 3b: implementing Either", function() {
        expect(eitherDivBy(0)(4))->toEqual(new Left("Division by zero"));
        expect(eitherDivBy(2)(4))->toEqual(new Right(2));
    });
});