<?php

namespace App\Http\Controllers\Admin;

use App\AdminModel\Admin;
use App\AdminModel\Usergroup;
use App\Helpers\UploadImages;
use App\Http\Requests\UserRegsiterRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin:admin');
    }

    /**
     * 后台用户列表
     * @param
     *
     * @return 后台用户数据
     */

    function Index()
    {
        $adminlists=Admin::all();
        return view('admin.adminlist',compact('adminlists'));
    }

    /**
     * 后台用户注册
     * @param
     *
     * @return
     */

    function Register()
    {
        return view('admin.adminregister',compact('adminlists'));
    }
    /**
     * 后台用户注册处理
     * @param
     *
     * @return
     */
    function PostRegister(UserRegsiterRequest $request)
    {
        $request['password']=bcrypt($request['password']);
        Admin::create($request->all());
        return redirect(action('Admin\AdminController@Index'));
    }
    /**
     * 后台用户编辑
     * @param
     *
     * @return
     */

    function Edit($id)
    {
        $adminUser=Admin::find($id);
        $groups=Usergroup::all();
        return view('admin.adminedit',compact('adminUser','groups'));
    }
    /**
     * 后台用户编辑提交处理
     * @param
     *
     * @return
     */
    function PostEdit(UserRegsiterRequest $request,$id)
    {
        if (isset($request['image']))
        {
            $request['portrait']=UploadImages::UploadImage($request);
        }
        $request['password']=bcrypt($request['password']);
        Admin::find($id)->update($request->all());
        return redirect(action('Admin\AdminController@Index'));
    }

    /**
     * 用户组管理
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function UserGroupCreate()
    {
        return view('admin.groupcreate');
    }

    /**
     * @param 用户组管理POST
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function PostUserGroupCreate(Request $request)
    {
        Usergroup::create($request->all());
        return redirect(route('usergroup'));
    }

    /**
     * @param 用户组列表
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function UserGroup()
    {
        $groups=Usergroup::where('id','<>',0)->get();
        return view('admin.usergroup',compact('groups'));
    }

    /**
     * @param 组编辑
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function UserGroupEdit($id)
    {
        $thisgroup=Usergroup::where('id',$id)->first();
        return view('admin.groupedit',compact('thisgroup'));
    }

    /**
     * 组编辑POST
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function PostUserGroupEdit(Request $request,$id)
    {
        Usergroup::where('id',$id)->update(['groupname'=>$request['groupname']]);
        return redirect(route('usergroup'));
    }

    /**
     * 删除用户
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    function Delete($id)
    {
        if($id==1)
        {
            exit('禁止删除超级管理员');
        }
        Admin::find($id)->delete();
        redirect(action('Admin\AdminController@Index'));
        return redirect(action('Admin\AdminController@Index'));
    }

    /**
     * 后台用户授权
     * @param
     *
     * @return
     */
    function Userauth()
    {
        abort(403);
    }
    public function NotificationClear()
    {
        $admin=Admin::find(auth('admin')->user()->id);
        $admin->unreadNotifications->markAsRead();
        return redirect()->back();

    }

}
