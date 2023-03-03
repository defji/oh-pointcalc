<?php


namespace PointCalc;


use PointCalc\Exceptions\LowLevelGraduateException;
use PointCalc\Exceptions\RequiredSubNotFoundException;

/**
 * Calculator Class
 * @author Balázs Györkös <balazs.gyorkos@gmail.com>
 * @project OH test project
 * @package Dfj\Pointcalc
 * @created 2023. 03. 02.
 */
class Calculator
{
    protected array $inputData;

    const REQUiRED_GRAD_SUBS = [
        "magyar nyelv és irodalom",
        "történelem",
        "matematika",
    ];

    public function __construct(array $inputData)
    {
        $this->inputData = $inputData;
    }


    /**
     * Calculate totalpoints
     * @return int
     */
    public function points(): int
    {
        return $this->basePoints() + $this->additionalPoints();
    }


    /**
     * Calculate base points
     * @return int
     * @throws LowLevelGraduateException
     * @throws RequiredSubNotFoundException
     */
    public function basePoints(): int
    {
        $baseRows = $this->inputData['erettsegi-eredmenyek'];
        $subs = [];
        $requiredSubs = [];
        $optionalSubs = [];
        foreach ($baseRows as $row) {
            $value = intval($row['eredmeny']);

            if (in_array($row['nev'], self::REQUiRED_GRAD_SUBS)) {
                $requiredSubs[] = $value;
            } else {
                $optionalSubs[] = $value;
            }

            if ($value < 20) {
                throw new LowLevelGraduateException("hiba, nem lehetséges a pontszámítás a ".$row['nev']." tárgyból elért 20% alatti eredmény miatt",
                    990);
            }
            $subs[] = $row['nev'];
        }
        foreach (self::REQUiRED_GRAD_SUBS as $sub) {
            if (!in_array($sub, $subs)) {
                throw new RequiredSubNotFoundException("hiba, nem lehetséges a pontszámítás a kötelező érettségi tárgyak hiánya miatt",
                    991);
            }
        }
        return (max($requiredSubs) + max($optionalSubs)) * 2;

    }


    /**
     * Calculate additional points
     * @return int
     */
    public function additionalPoints(): int
    {
        $baseRows = $this->inputData['erettsegi-eredmenyek'];
        $points = 0;
        foreach ($baseRows as $row) {
            $value = intval($row['eredmeny']);
            if ($row['tipus'] === 'emelt') {
                $points += 50;
            }
        }
        $addRows = $this->inputData['tobbletpontok'];
        foreach ($addRows as $row) {
            if ($row['tipus'] === 'B2') {
                $points += 28;
            }
            if ($row['tipus'] === 'C1') {
                $points += 40;
            }
        }
        return min($points, 100);
    }

}

