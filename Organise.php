<?php



namespace Organise;

include('vendor/autoload.php');

class Organise
{

    public function __construct() {
        
    }

    public function getLineList(int $partLength, string $string):array
    {

        $words = explode(' ', $string);
        $parts = [];
        $currentPart = '';

        foreach ($words as $word) {
            if (strlen($currentPart) + strlen($word) <= $partLength) {
                // Add the word to the current part
                $currentPart .= $word . ' ';
            } else {
                // Add the current part to the array
                $parts[] = rtrim($currentPart);

                // Start a new part with the current word
                $currentPart = $word . ' ';
            }
        }

        // Add the last part to the array
        if (!empty($currentPart)) {
            $parts[] = rtrim($currentPart);
        }

        return $parts;
    }
}
