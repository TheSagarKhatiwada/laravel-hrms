<?php

namespace App\Services;

use Carbon\Carbon;

class NepaliDateService
{
    // BS to AD conversion reference data
    private static $bsMonths = [
        2000 => [30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31],
        2001 => [31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30],
        2002 => [31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30],
        2003 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31],
        2004 => [30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31],
        2005 => [31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30],
        2006 => [31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30],
        2007 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31],
        2008 => [31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 29, 31],
        2009 => [31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30],
        2010 => [31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30],
        2011 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31],
        2012 => [31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30],
        2013 => [31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30],
        2014 => [31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30],
        2015 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31],
        2016 => [31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30],
        2017 => [31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30],
        2018 => [31, 32, 31, 32, 31, 30, 30, 29, 30, 29, 30, 30],
        2019 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31],
        2020 => [31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30],
        2021 => [31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30],
        2022 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30],
        2023 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31],
        2024 => [31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30],
        2025 => [31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30],
        2026 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31],
        2027 => [30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31],
        2028 => [31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30],
        2029 => [31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30],
        2030 => [31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31],
        // Add more years as needed
    ];

    // Reference AD date for BS 2000/01/01
    private static $referenceAD = '1943-04-14';
    
    /**
     * Simple conversion using known mapping
     * For accurate conversion, this should be replaced with more comprehensive algorithm
     * Currently using approximation: 2024-01-01 AD ≈ 2080-09-16 BS
     */
    private static function getApproximateBsDate($adDate)
    {
        $adCarbon = Carbon::parse($adDate);
        $knownAD = Carbon::parse('2024-01-01');
        $knownBsYear = 2080;
        $knownBsMonth = 9;
        $knownBsDay = 16;
        
        $daysDiff = $adCarbon->diffInDays($knownAD, false);
        
        // For now, simple approximation
        $year = $knownBsYear;
        $month = $knownBsMonth;
        $day = $knownBsDay + $daysDiff;
        
        // Normalize the date
        while ($day > 30) {
            $day -= 30;
            $month++;
            if ($month > 12) {
                $month = 1;
                $year++;
            }
        }
        
        while ($day < 1) {
            $day += 30;
            $month--;
            if ($month < 1) {
                $month = 12;
                $year--;
            }
        }
        
        return [$year, $month, $day];
    }

    /**
     * Convert AD date to BS date
     *
     * @param string $adDate Date in Y-m-d format
     * @return array ['year' => int, 'month' => int, 'day' => int, 'formatted' => string]
     */
    public static function adToBs($adDate)
    {
        [$bsYear, $bsMonth, $bsDay] = self::getApproximateBsDate($adDate);
        
        return [
            'year' => $bsYear,
            'month' => $bsMonth,
            'day' => $bsDay,
            'formatted' => sprintf('%04d-%02d-%02d', $bsYear, $bsMonth, $bsDay)
        ];
    }

    /**
     * Convert BS date to AD date
     *
     * @param int $bsYear
     * @param int $bsMonth
     * @param int $bsDay
     * @return string AD date in Y-m-d format
     */
    public static function bsToAd($bsYear, $bsMonth, $bsDay)
    {
        $totalDays = 0;
        
        // Calculate total days from reference BS date (2000/01/01) to given BS date
        for ($year = 2000; $year < $bsYear; $year++) {
            if (!isset(self::$bsMonths[$year])) {
                self::$bsMonths[$year] = [31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30];
            }
            $totalDays += array_sum(self::$bsMonths[$year]);
        }
        
        if (!isset(self::$bsMonths[$bsYear])) {
            self::$bsMonths[$bsYear] = [31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30];
        }
        
        for ($month = 1; $month < $bsMonth; $month++) {
            $totalDays += self::$bsMonths[$bsYear][$month - 1];
        }
        
        $totalDays += $bsDay - 1;
        
        // Add to reference AD date
        $referenceCarbon = Carbon::parse(self::$referenceAD);
        $resultCarbon = $referenceCarbon->copy()->addDays($totalDays);
        
        return $resultCarbon->format('Y-m-d');
    }

    /**
     * Format BS date for display
     *
     * @param int $bsYear
     * @param int $bsMonth
     * @param int $bsDay
     * @return string
     */
    public static function formatBsDate($bsYear, $bsMonth, $bsDay)
    {
        $nepaliMonths = [
            1 => 'बैशाख', 2 => 'जेठ', 3 => 'आषाढ', 4 => 'श्रावण', 5 => 'भाद्र', 6 => 'आश्विन',
            7 => 'कार्तिक', 8 => 'मंसिर', 9 => 'पौष', 10 => 'माघ', 11 => 'फाल्गुन', 12 => 'चैत'
        ];
        
        return sprintf('%02d %s %04d', $bsDay, $nepaliMonths[$bsMonth], $bsYear);
    }

    /**
     * Get current Nepali date
     *
     * @return array
     */
    public static function getCurrentNepaliDate()
    {
        $today = Carbon::now()->format('Y-m-d');
        return self::adToBs($today);
    }

    /**
     * Validate BS date
     *
     * @param int $bsYear
     * @param int $bsMonth
     * @param int $bsDay
     * @return bool
     */
    public static function isValidBsDate($bsYear, $bsMonth, $bsDay)
    {
        if ($bsMonth < 1 || $bsMonth > 12) {
            return false;
        }
        
        if (!isset(self::$bsMonths[$bsYear])) {
            self::$bsMonths[$bsYear] = [31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30];
        }
        
        $daysInMonth = self::$bsMonths[$bsYear][$bsMonth - 1];
        
        return $bsDay >= 1 && $bsDay <= $daysInMonth;
    }
}