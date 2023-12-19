<?php

namespace App\Rules;

use App\Enum\OrderStatus;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueDelayReport implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value['status'] !== OrderStatus::PENDING->value)
            $fail(__('delay_report.order_in_queue_already'));
    }
}
