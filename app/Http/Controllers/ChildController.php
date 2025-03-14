<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ChildHealthService;

class ChildController extends Controller
{
    protected $childHealthService;

    // حقن الخدمة في الكونستركتور
    public function __construct(ChildHealthService $childHealthService)
    {
        $this->childHealthService = $childHealthService;
    }

    public function recommend(Request $request)
{
    $validated = $request->validate([
        'height' => 'required|numeric|min:50|max:220',
        'weight' => 'required|numeric|min:3|max:150',
        'age' => 'required|numeric|min:1|max:20',
    ]);

    $bmi = $this->childHealthService->calculateBMI($validated['weight'], $validated['height']);
    $recommendationRoute = $this->childHealthService->getRecommendation($bmi, $validated['age']);

    return redirect()->route($recommendationRoute);
}

}
