<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\NepaliDateService;
use Illuminate\Http\Request;

class DateConversionController extends Controller
{
    /**
     * Convert AD date to BS date
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function adToBs(Request $request)
    {
        $request->validate([
            'date' => 'required|date'
        ]);

        $adDate = $request->input('date');
        $bsDate = NepaliDateService::adToBs($adDate);

        return response()->json([
            'success' => true,
            'ad_date' => $adDate,
            'nepali_date' => $bsDate['formatted'],
            'nepali_date_formatted' => NepaliDateService::formatBsDate($bsDate['year'], $bsDate['month'], $bsDate['day'])
        ]);
    }

    /**
     * Convert BS date to AD date
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function bsToAd(Request $request)
    {
        $request->validate([
            'nepali_date' => 'required|string'
        ]);

        $nepaliDate = $request->input('nepali_date');
        
        // Parse BS date format (YYYY-MM-DD)
        $parts = explode('-', $nepaliDate);
        
        if (count($parts) !== 3) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Nepali date format. Use YYYY-MM-DD'
            ], 400);
        }

        $bsYear = (int)$parts[0];
        $bsMonth = (int)$parts[1];
        $bsDay = (int)$parts[2];

        if (!NepaliDateService::isValidBsDate($bsYear, $bsMonth, $bsDay)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Nepali date'
            ], 400);
        }

        $adDate = NepaliDateService::bsToAd($bsYear, $bsMonth, $bsDay);

        return response()->json([
            'success' => true,
            'nepali_date' => $nepaliDate,
            'date' => $adDate,
            'nepali_date_formatted' => NepaliDateService::formatBsDate($bsYear, $bsMonth, $bsDay)
        ]);
    }

    /**
     * Get current date in both formats
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCurrentDate()
    {
        $currentNepaliDate = NepaliDateService::getCurrentNepaliDate();
        $today = now()->format('Y-m-d');

        return response()->json([
            'success' => true,
            'ad_date' => $today,
            'nepali_date' => $currentNepaliDate['formatted'],
            'nepali_date_formatted' => NepaliDateService::formatBsDate(
                $currentNepaliDate['year'], 
                $currentNepaliDate['month'], 
                $currentNepaliDate['day']
            )
        ]);
    }
}
