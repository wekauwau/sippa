<?php

function get_ids($model)
{
    $ids = $model::pluck('id')->all();
    return fake()->randomElement($ids);
}

function get_random_user_id($model)
{
    $user_ids = $model::pluck('user_id')->all();
    return fake()->randomElement($user_ids);
}
