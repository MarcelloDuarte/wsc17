<?php

namespace Wsc17\Expenses\Domain;

interface ClaimExpenses
{
    function add(Expense $e): Reader;
    function claim(ExpenseSheet $es): Reader;
    function approve(UnpaidClaim $c): Reader;
    function reject(UnpaidClaim $c): Reader;
    function pay(ApprovedClaim $c): Reader;
}