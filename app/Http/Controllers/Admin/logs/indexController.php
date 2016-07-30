<?php

namespace App\Http\Controllers\Admin\logs;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logList(Request $request)
    {
        //对应的表
        $tableName = 'operation'.date('_m', time());

        //定义搜索初值
        $search = [];
        $search['type'] = null;
        $search['time'] = null;
        //搜索
        $query = \DB::table($tableName);

        if($request->type == 0){
            $query = $query->where('username','like','%'.trim($request->search).'%');
            $search['type'] = 0;
        }

        if($request->type == 1){
            $query = $query;
            $search['type'] = 1;
        }

        if($request->time){
//            dd($request->time);
            $search['time'] = $request->time;
            $tableName = 'operation'.date('_m',strtotime($request->time));
            $query = \DB::table($tableName);

            if($request->type == 0){
                $query = $query->where('username','like','%'.trim($request->search).'%');
                $search['type'] = 0;
            }

            if($request->type == 1){
                $query = $query;
                $search['type'] = 1;
            }
            $data = $query->orderBy('id','desc')->paginate();

            return view('admin.logs.logList',compact('data','search','tableName'))->with('time',$request->time);
        }



        $data = $query->orderBy('id','desc')->paginate();

        return view('admin.logs.logList',compact('data','search','tableName'));

    }

    public function destroy($tableName,$id,$time=null)
    {
        //日志删除操作
        if(\DB::table($tableName)->delete($id)){
//            $this -> OperationLog("删除了ID为{$id}的日志", 1);
            return redirect()->back()->with(['status'=>'删除日志成功','time'=>$time]);
        }else{
            return redirect()->back()->with(['errors'=>'删除日志失败','time'=>$time]);
        }
    }


}