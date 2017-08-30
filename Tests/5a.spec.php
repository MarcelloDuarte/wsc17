<?php

use Lesson5\Exercise5a\{ Expense };

describe("Lesson 5", function() {
    context("solves 5a: implementing smart constructor", function() {
        it("lets staff expense below 25 euros", function() {
            $cost = 24.0;

            $yesterday = (new \DateTime())
                ->add(DateInterval::createFromDateString('yesterday'));

            expect(Expense::ofFood($cost, $yesterday)->isRight())->toBe(true);
        });

        it("stops staff from expensing above 25 euros", function() {
            $cost = 26.0;

            $yesterday = (new \DateTime())
                ->add(DateInterval::createFromDateString('yesterday'));

            expect(Expense::ofFood($cost, $yesterday)->isLeft())->toBe(true);
        });

        it("lets staff claim expenses older than today", function() {
            $cost = 24.0;

            $yesterday = (new \DateTime())
                ->add(DateInterval::createFromDateString('yesterday'));

            expect(Expense::ofFood($cost, $yesterday)->isRight())->toBe(true);
        });

        it("stops staff claiming expenses in the future", function() {
            $cost = 24.0;

            $tomorrow = (new \DateTime())
                ->add(DateInterval::createFromDateString('tomorrow'));

            expect(Expense::ofFood($cost, $tomorrow)->isLeft())->toBe(true);
        });
    });
});