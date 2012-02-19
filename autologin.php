<?php

if (isset($cookie_name)) {
    if (isset($_COOKIE[$cookie_name])) {
        parse_str($_COOKIE[$cookie_name]);

    }
}
?>
