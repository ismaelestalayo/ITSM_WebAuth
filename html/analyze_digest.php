<?php 

// Analyze HTTP authentication header
function analyze_digest($txt){
    // Check for missing attributes
    $check_attr = array('nonce'=>1, 'nc'=>1, 'cnonce'=>1, 'qop'=>1, 'username'=>1, 'uri'=>1, 'response'=>1);
    $data = array();
    $keys = implode('|', array_keys($check_attr));

    preg_match_all('@(' . $keys . ')=(?:([\'"])([^\2]+?)\2|([^\s,]+))@', $txt, $matches, PREG_SET_ORDER);

    foreach ($matches as $c) {
        $data[$c[1]] = $c[3] ? $c[3] : $c[4];
        unset($check_attr[$c[1]]);
    }

    return $check_attr ? false : $data;
}

?>