<?php

namespace Storage\utils;

use Illuminate\Support\Facades\DB;

trait kobeniSecurity
{
    public function terminateAllDevices()
    {
        DB::transaction(function () {
            DB::table('personal_access_tokens')->delete();
            DB::table('devices')->delete();
        });
    }

    public function terminateDevice($id)
    {
        DB::transaction(function () use ($id) {
            DB::table('personal_access_tokens')->where('tokenable_id', $id)->delete();
            DB::table('devices')->where('user_id', $id)->delete();
        });
    }

    public function logAllDevices($userId, $perPage = 10)
    {
        return DB::table('users as u')
            ->leftJoin('devices as d', 'u.id', '=', 'd.user_id')
            ->where('u.id', $userId)
            ->select('u.name', 'd.user_agent as device', 'd.ip', 'd.created_at as logged_at')->orderBy('d.created_at', 'desc')->paginate($perPage);
    }
}
