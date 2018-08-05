<?php
    $url = '
            https://img.545141.com/images/201808/e555eb7fffa9c38c.jpghttps://img.545141.com/images/201808/8c6724af943b8461.jpghttps://img.545141.com/images/201808/70053fd4284d8678.jpg';

    $str = "http://www.jb51.net";
    $isMatched = preg_match('/[a-zA-z]+://[^\s]* 或 ^http://([\w-]+\.)+[\w-]+(/[\w-./?%&=]*)?$/', $url, $matches);
    var_dump($isMatched, $matches);