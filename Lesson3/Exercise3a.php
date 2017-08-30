<?php

namespace Lesson3\Exercise3a {

    abstract class Option {}

    final class Some extends Option
    {
        private $value;

        public function __construct($value)
        {
            $this->value = $value;
        }
    }

    final class None extends Option {}

    function maybeDivBy(int $divisor): \Closure
    {
        return function(int $dividend) use ($divisor): Option {
            // TODO: Exercise 3a
            // Write the implemetation
        };
    }

}