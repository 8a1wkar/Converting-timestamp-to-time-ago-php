<?php
function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'ساڵ',
        'm' => 'مانگ',
        'w' => 'ھەفتە',
        'd' => 'رۆژ',
        'h' => 'كاتژمێر',
        'i' => 'خولەك',
        's' => 'چركە',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' پێش ئێستا' : 'ھەر ئێستا';
	}
?>