<?php

field::$methods['titleCapitalize'] = function($field)
{
    // Converts $title to Title Case, and returns the result.
    // Our array of 'small words' which shouldn't be capitalised if 
    // they aren't the first word. Add your own words to taste.
    
    $smallWords = array(
        "a","an","the","and","but","or","nor","at","by","for","from","in","into","of","off","on","onto","out","over","to","up","with","as"
    );

    $phrasalVerbs = array(
    	"Beat Up","Blow Out","Break Down","Break Into","Break Up","Bring Up","Call Off","Call On","Call Up","Carry On","Come Back","Come Down","Come On","Come Out","Come Over","Do Over","Fill In","Fill Out","Find Out","Get Along","Get Around","Get By","Get Over","Get Through","Get Up","Give Back","Give Up","Go Along","Go Away","Go On","Go Over","Hand In","Hang Up","Hold On","Keep On","Keep Up","Leave Out","Let Down","Look For","Look Into","Look Like","Look Out","Look Over","Look Up","Make Out","Make Up","Pack Up","Pass Out","Pick Out","Pick Up","Put Away","Put Off","Put On","Put Out","Put Up","Roll Over","Run Into","Run Out","Run Over","Show Up","Take After","Take Back","Take Off","Take On","Take Up","Talk Back","Talk Over","Throw Away","Try On","Turn Down","Turn In","Turn Off","Turn On","Use Up","Wait On",
    );

    $title = strtolower($field->value);
    
    
    // Split the string into separate words
    $words = explode(' ', $title);
    
    foreach ($words as $key => $word) {

        // If this word is the first, or it's not one of our small words, capitalise it
        // with ucwords().
        if ($key == 0 or !in_array($word, $smallWords)) $words[$key] = ucwords($word);
    }

    
    // Join the words back into a string
    $newtitle = implode(' ', $words);

    // Phrasal verbs replace
    $newtitle = str_replace(array_map('strtolower', $phrasalVerbs), $phrasalVerbs, $newtitle);

    // Apostrophe replace
    $newtitle = str_replace('`', '’', $newtitle);

    return $newtitle;
    
};

?>