<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if(!function_exists("truncate_string")) {
  function truncate_string($phrase='', $max_words=100){
    if(!empty($phrase)) {
      $phrase_array = explode(' ',$phrase);
      if(count($phrase_array) > $max_words && $max_words > 0){
        $phrase = join(' ',array_slice($phrase_array, 0, $max_words)).'...';
      }
    }
    return $phrase;
  }
}

/* End of file string_helper.php */
/* Location: ./application/helpers/string_helper.php */

