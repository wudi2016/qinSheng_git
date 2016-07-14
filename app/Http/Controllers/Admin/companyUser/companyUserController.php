<?php

namespace App\Http\Controllers\Admin\companyUser;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class companyUserController extends Controller{

    /**
     * 列表
     */
    public function companyUserList(Request $request){

        $query = DB::table('companyuser as com');

        $data = $query->paginate(10);

        return view('admin.companyUser.companyUserList')->with('company',$data);
    }


    /**
     * 添加
     */
    public function addcompanyUser(){
        return view('admin.companyUser.addcompanyUser');
    }


    /**
     * 添加方法
     */
    public function addscompanyUser(Request $request){
        $input = Input::except('_token');
        //验证
        $validate = $this->validator($input);
        if($validate->fails()){
            return Redirect() -> back() -> withInput( $request -> all() ) -> withErrors( $validate );
        }
        $input['created_at'] = Carbon::now();
        //加密 (解密用Crypt::decrypt())
        $input['password'] = Crypt::encrypt($input['password']);
        $input['upassword'] = Crypt::encrypt($input['upassword']);
        if(Crypt::decrypt($input['password']) == Crypt::decrypt($input['upassword']) ){
            //销毁upassword字段
            unset($input['upassword']);
            $res = DB::table('companyuser')->insert($input);
        }else{
            return redirect()->back()->withInput()->withErrors('与第一次输入的密码不同，请重新输入');
        }
        if($res){
            return redirect('admin/message')->with(['status'=>'添加成功','redirect'=>'companyUser/companyUserList']);
        }else{
            return redirect()->back()->withInput()->withErrors('添加失败！');
        }
    }


    /**
     * 编辑
     */
    public function editcompanyUser($id){
        $data = DB::table('companyuser')->where('id',$id)->first();
        return view('admin.companyUser.editcompanyUser')->with('data',$data);
    }


    /**
     * 编辑方法
     */
    public function editscompanyUser(Request $request){
        $input = Input::except('_token');
        $input['updated_at'] = Carbon::now();
        //验证
        $validate = $this->validator_edit($input);
        if($validate->fails()){
            return Redirect() -> back() -> withInput( $request -> all() ) -> withErrors( $validate );
        }
        $res = DB::table('companyuser')->where('id',$input['id'])->update($input);
        if($res){
            return redirect('admin/message')->with(['status'=>'编辑成功','redirect'=>'companyUser/companyUserList']);
        }else{
            return redirect()->back()->withInput()->withErrors('编辑失败！');
        }
    }




    /**
     * 删除
     */
    public function delcompanyUser($id){
        $res = DB::table('companyuser')->where('id',$id)->delete();
        if($res){
            return redirect('admin/message')->with(['status'=>'删除成功','redirect'=>'companyUser/companyUserList']);
        }else{
            return redirect()->back()->withInput()->withErrors('删除失败！');
        }
    }


    /**
     * 重置密码页面
     */
    public function resetPassword($id){
        $data = DB::table('companyuser')->where('id',$id)->first();
        return view('admin.companyUser.editresetPassword')->with('data',$data);
    }


    /**
     * 提交密码
     */
    public function resetsPassword(Request $request){
        $input = Input::except('_token');
        //验证
        $validate = $this->validator_pass($input);
        if($validate->fails()){
            return Redirect() -> back() -> withInput( $request -> all() ) -> withErrors( $validate );
        }
        //加密 (解密用Crypt::decrypt())
        $input['password'] = Crypt::encrypt($input['password']);
        $input['upassword'] = Crypt::encrypt($input['upassword']);
        if(Crypt::decrypt($input['password']) == Crypt::decrypt($input['upassword']) ){
            //销毁upassword字段
            unset($input['upassword']);
            $res = DB::table('companyuser')->where('id',$input['id'])->update($input);
        }else{
            return redirect()->back()->withInput()->withErrors('与第一次输入的密码不同，请重新输入');
        }
        if($res){
            return redirect('admin/message')->with(['status'=>'编辑成功','redirect'=>'companyUser/companyUserList']);
        }else{
            return redirect()->back()->withInput()->withErrors('编辑失败！');
        }
    }



    /**
     * 状态
     */
    public function companyStatus(Request $request){
        $data['status'] = $request['status'];
        $data = DB::table('companyuser')->where('id',$request['id'])->update($data);
        if($data){
            echo 1;
        }else{
            echo 0;
        }
    }



    /**
     * 验证(添加)
     */
    protected function validator(array $data){
        $rules = [
            'username' => 'required|min:3|max:16',
            'realname' => 'required',
            'password' => 'sometimes|required|min:6|max:16',
            'phone' => 'required|digits:11',
            'email' => 'required',
        ];
        $messages = [
            'username.required' => '请输入用户名',
            'username.min' => '用户名最少3位',
            'username.max' => '用户名最多16位',
            'realname.required' => '请输入姓名',
            'password.required' => '请输入密码',
            'password.min' => '密码最少6位',
            'password.max' => '密码最多16位',
            'phone.required' => '请输入手机号',
            'phone.digits' => '手机号为11位数字',
            'email' => '请输入邮箱',
        ];

        return \Validator::make($data, $rules, $messages);
    }



    /**
     * 验证(修改)
     */
    protected function validator_edit(array $data){
        $rules = [
            'realname' => 'required',
            'phone' => 'required|digits:11',
            'email' => 'required',
        ];
        $messages = [
            'realname.required' => '请输入姓名',
            'phone.required' => '请输入手机号',
            'phone.digits' => '手机号为11位数字',
            'email' => '请输入邮箱',
        ];

        return \Validator::make($data, $rules, $messages);
    }


    /**
     * 验证密码
     */
    protected function validator_pass(array $data){
        $rules = [
            'password' => 'sometimes|required|min:6|max:16',
        ];
        $messages = [
            'password.required' => '请输入密码',
            'password.min' => '密码最少6位',
            'password.max' => '密码最多16位',
        ];

        return \Validator::make($data, $rules, $messages);
    }


}