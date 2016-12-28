<?php

/**
 * Set active page
 *
 * @param string $uri
 * @return string
 */
function set_active($path, $active = 'active')
{
    return Request::is($path) ? $active : '';
}