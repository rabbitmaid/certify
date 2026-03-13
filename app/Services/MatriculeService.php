<?php
namespace App\Services;

use App\Models\Intern;
use Illuminate\Support\Str;

class MatriculeService {

    public static function generate(string $prefix = 'ES'): string 
    {
        $year = date('Y');
        $random1 = Str::random(6);
        $random2 = Str::random(4);

        $separator = setting('matricule_seperator') ?? "-";

        $matricule = sprintf("%s%s$separator%s$separator%s",$prefix, $year, $random1, $random2);

        $existingMatricule = self::matriculeExist($matricule); 

        if($existingMatricule) return self::generate($prefix);

        return $matricule;
    }

    private static function matriculeExist(string $matricule): bool
    {
        $check = Intern::where('matricule', $matricule)->first();
        
        if($check) return true;
        return false;
    }


}