<?php

    function isActive($segment) {
        return strpos($_SERVER['REQUEST_URI'], $segment) !== false ? 'active' : '';
    }

    function isOpen($segments = []) {
        foreach ($segments as $segment) {
            if (strpos($_SERVER['REQUEST_URI'], $segment) !== false) {
                return 'open';
            }
        }
        return '';
    }

