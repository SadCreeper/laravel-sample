<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Status;
use Auth;

class StatusesController extends Controller
{
    //中间件
    public function __construct()
    {
        //登录：需要登录才能进行的操作
        $this->middleware('auth', [
            'only' => ['store', 'destroy']
        ]);
    }
    //微博存储
    public function store(Request $request)
    {
        //表单验证
        $this->validate($request, [
            'content' => 'required|max:140'
        ]);
        //创建关联用户的微博数据
        Auth::user()->statuses()->create([
            'content' => $request->content
        ]);
        //返回之前的URL
        session()->flash('success', '新增成功！');
        return redirect()->back();
    }
    //微博删除
    public function destroy($id)
    {
        //删除
        $status = Status::findOrFail($id);
        $this->authorize('destroy', $status);
        $status->delete();
        //返回之前的URL
        session()->flash('success', '微博已被成功删除！');
        return redirect()->back();
    }
}
