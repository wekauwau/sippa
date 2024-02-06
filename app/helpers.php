<?php

function get_ids($model)
{
    $ids = $model::pluck('id')->all();
    return fake()->randomElement($ids);
}
