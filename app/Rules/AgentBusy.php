<?php

namespace App\Rules;

use App\Services\AgentService;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class AgentBusy implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (AgentService::hasActiveOrder($value))
            $fail(__('delay_report.agent_has_order'));
    }
}
