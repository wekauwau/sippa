<?php

use Illuminate\Support\Facades\DB;

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

function resolve_id($table, $id, $column = 'name')
{
    return DB::table($table)
        ->find($id)
        ->$column;
}
