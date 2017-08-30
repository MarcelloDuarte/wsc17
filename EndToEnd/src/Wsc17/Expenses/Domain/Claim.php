<?php

namespace Wsc17\Expenses\Domain;

abstract class Claim {
    private $expenseSheet;
    function __construct(ExpenseSheet $es) { $this->expenseSheet = $es; }
}

abstract class UnpaidClaim extends Claim {}

final class PendingClaim extends UnpaidClaim {}
final class ApprovedClaim extends UnpaidClaim {}
final class RejectedClaim extends UnpaidClaim {}
final class PaidClaim extends Claim {}

final class InvalidClaimError {}