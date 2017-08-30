<?php

namespace Lesson3\Exercise3c {

    abstract class Option
    {
        public function map(callable $f): Option
        {
            // TODO
            // Apply $f to the value in the Some  context
            // and return a Some with the new result,
            // or return a None if the Option is None
            
        }
    }

    final class Some extends Option
    {
        private $value;

        public function __construct($value)
        {
            $this->value = $value;
        }

        public function get()
        {
            return $this->value;
        }
    }

    final class None extends Option {}

}