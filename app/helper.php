<?php


if (! function_exists('last_current_url')) {
    function last_current_url()
    {
        $types = collect(['now','yesterday','today','tomorrow']);
        $last = collect(explode('/',url()->current()))->last();     
        return $types->contains($last) ? $last : null;
    }
}