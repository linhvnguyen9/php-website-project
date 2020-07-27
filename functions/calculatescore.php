<?php
function calculateAvgScore($attendanceScore, $attendanceWeight, $labScore, $labWeight, $midtermScore, $midtermWeight, $projectScore, $projectWeight, $testScore, $testWeight)
{
    return $attendanceScore * $attendanceWeight + $labScore * $labWeight + $midtermScore * $midtermWeight + $projectScore * $projectWeight + $testScore * $testWeight;
}

function calculateTextScore($avgScore)
{
    if ($avgScore < 4) {
        return "F";
    } else if ($avgScore < 4.9) {
        return "D";
    } else if ($avgScore < 5.4) {
        return "D+";
    } else if ($avgScore < 6.4) {
        return "C";
    } else if ($avgScore < 6.9) {
        return "C+";
    } else if ($avgScore < 7.9) {
        return "B";
    } else if ($avgScore < 8.4) {
        return "B+";
    } else if ($avgScore < 8.9) {
        return "A";
    } else {
        return "A+";
    }
}

function calculateScore4($score10)
{
    $textScore = calculateTextScore($score10);

    switch ($textScore) {
        case "F":
            return 0;
        case "D":
            return 1;
        case "D+":
            return 1.5;
        case "C":
            return 2;
        case "C+":
            return 2.5;
        case "B":
            return 3;
        case "B+":
            return 3.5;
        case "A":
            return 3.7;
        case "A+":
            return 4;
        default:
            return 0;
    }
}

function calculateRank($gpa)
{
    if ($gpa < 1) {
        return "Kém";
    } else if ($gpa < 1.99) {
        return "Yếu";
    } else if ($gpa < 2.49) {
        return "Trung bình";
    } else if ($gpa < 3.19) {
        return "Khá";
    } else if ($gpa < 3.59) {
        return 'Giỏi';
    } else if ($gpa <= 4) {
        return "Xuất sắc";
    }
    return "";
}
