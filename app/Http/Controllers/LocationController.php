<?php

namespace App\Http\Controllers;

use App\Models\Wilaya;
use App\Models\Daira;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Get all dairas for a specific wilaya.
     *
     * @param  Wilaya  $wilaya
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDairasByWilaya(Wilaya $wilaya)
    {
        $dairas = $wilaya->dairas()->get(['id', 'name']);

        return response()->json($dairas);
    }

    /**
     * Get all communes for a specific daira.
     *
     * @param  Daira  $daira
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCommunesByDaira(Daira $daira)
    {
        $communes = $daira->communes()->get(['id', 'name']);

        return response()->json($communes);
    }
}
