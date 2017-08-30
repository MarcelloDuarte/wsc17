<?php

use Lesson3\Exercise3a\{ Some, None, function maybeDivBy };

describe("Lesson 3", function() {
    it("solves 3a: implementing Option", function() {
        expect(maybeDivBy(0)(4))->toEqual(new None());
        expect(maybeDivBy(2)(4))->toEqual(new Some(2));
    });
});