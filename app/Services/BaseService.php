<?php

namespace App\Services;

use Illuminate\Http\Request;

abstract class BaseService
{
    protected $route;
    protected $type=['create'=>'新增','update'=>'更新','del'=>'刪除'];
    
    //返回結果
    public function result($result, $route, $type)
    {
        if ($result) {
            return redirect()->route($route)->with('success', $type.'成功');
        }
        return redirect()->route($route)->with('error', $type.'失敗');
    }

    //權限排序
    public function sortPermissions($permissions, $pid = 0)
    {
        $arr = [];
        foreach ($permissions as $k =>  $v) {
            if ($v['pid'] == $pid) {
                $arr[$k] = $v;
                $arr[$k]['child'] = self::sortPermissions($permissions, $v['id']);
            }
        }
        return $arr;
    }
}
