<?php
namespace App\Services;

class ChildHealthService
{
    /**
     * حساب BMI
     */
    public function calculateBMI($weight, $height)
    {
        $heightInMeters = $height / 100; // تحويل الطول إلى متر
        return round($weight / ($heightInMeters * $heightInMeters), 2);
    }

    /**
     * حساب النسبة المئوية لـ BMI حسب العمر
     */
    public function getBMIPercentile($bmi, $age)
    {
        // جداول BMI المئوية بناءً على بيانات CDC للأطفال من 1 إلى 20 سنة
        $percentileTable = [
            1 => [14.0, 15.5, 17.0, 18.5], // (نسبة 5%, 50%, 85%, 95%)
            2 => [14.5, 16.0, 18.0, 19.5],
            5 => [14.8, 16.5, 18.5, 20.0],
            10 => [15.3, 17.5, 20.0, 22.5],
            15 => [17.0, 20.0, 23.5, 26.0],
            20 => [18.5, 22.0, 26.0, 30.0],
        ];

        if (!isset($percentileTable[$age])) {
            return null; // العمر خارج النطاق المدعوم
        }

        [$p5, $p50, $p85, $p95] = $percentileTable[$age];

        if ($bmi < $p5) {
            return 5;
        } elseif ($bmi < $p85) {
            return 50;
        } elseif ($bmi < $p95) {
            return 85;
        } else {
            return 95;
        }
    }

    /**
     * تحديد التوصية بناءً على BMI والعمر
     */
    public function getRecommendation($bmi, $age)
    {
        $bmiPercentile = $this->getBMIPercentile($bmi, $age);

        

        if ($bmiPercentile < 5) {
            return 'theme.foodsystem.index'; // نحافة → نظام غذائي 🍎
        } elseif ($bmiPercentile < 85) {
            return 'theme.exercises.index'; // وزن طبيعي → تمارين منزلية 🏡
        } elseif ($bmiPercentile < 95) {
            return 'theme.gyms.index'; // زيادة وزن → جيم 🏋️‍♂️
        } else {
            return 'theme.doctors.index'; // سمنة → دكتور تغذية 👨‍⚕️
        }
    }
}
