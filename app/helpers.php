<?php

function setting($name)
{
    return \App\Models\Setting::where('name', $name)->value('value');
}