<?php

namespace App\Traits;

use App\Services\NepaliDateService;

trait HasNepaliDates
{
    /**
     * Convert AD date to BS and set nepali date field
     *
     * @param string $adDateField
     * @param string $nepaliDateField
     */
    public function convertAndSetNepaliDate($adDateField, $nepaliDateField)
    {
        if ($this->$adDateField) {
            $nepaliDate = NepaliDateService::adToBs($this->$adDateField);
            $this->$nepaliDateField = $nepaliDate['formatted'];
        }
    }

    /**
     * Convert BS date to AD and set AD date field
     *
     * @param string $nepaliDateField
     * @param string $adDateField
     */
    public function convertAndSetAdDate($nepaliDateField, $adDateField)
    {
        if ($this->$nepaliDateField) {
            // Parse BS date format (YYYY-MM-DD)
            $parts = explode('-', $this->$nepaliDateField);
            if (count($parts) === 3) {
                $adDate = NepaliDateService::bsToAd((int)$parts[0], (int)$parts[1], (int)$parts[2]);
                $this->$adDateField = $adDate;
            }
        }
    }

    /**
     * Get formatted Nepali date for display
     *
     * @param string $nepaliDateField
     * @return string
     */
    public function getFormattedNepaliDate($nepaliDateField)
    {
        if ($this->$nepaliDateField) {
            $parts = explode('-', $this->$nepaliDateField);
            if (count($parts) === 3) {
                return NepaliDateService::formatBsDate((int)$parts[0], (int)$parts[1], (int)$parts[2]);
            }
        }
        return '';
    }
}