<?php

namespace App\Http\Controllers\Backend;
use App\Models\UserInfo;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\StoreEditInfoRequest;
use App\Http\Requests\StoreUserUpdateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        // $users = User::get();
        $users = User::Where('role','!=',1)->paginate(6);
        // dd($users);
        if ($user->can('view', User::class)) {
            // echo "string";
            return view('backend.user.index')->with([
                'users' => $users
            ]);
        }else{
            return redirect()->route('backend.error',$user);
         // $users = User::simplePaginate(15); //dùng cho nhiều bản ghi
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        if ($user->can('create',User::class)) {
            return view('backend.user.create');
        }else{
            return redirect()->route('backend.error',$user);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        // dd($request);
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $name = $file->getClientOriginalName();
            $avatar = $file->move('users', $name);
        }else{
            echo "không";
        }
        $user = new User();
        $user->name = $request->get('username');
        $user->email = $request->get('email');
        $user->phone = $request->get('phone');
        $user->sex = $request->get('sex');
        $user->password = bcrypt($request->get('password'));
        $user->role = $request->get('role');
        $user->avatar = $avatar;
        $save = $user->save();
        $userInfo = new UserInfo();
        $userInfo->fullname = $request->get('fullname');
        $userInfo->address = $request->get('address');
        $userInfo->birthday = $request->get('birthday');
        $userInfo->user_id = $user->id;
        $save = $userInfo->save();
        if ($save) {
            $request->session()->flash('success','Tạo danh mục thành công');
        }else{
            $request->session()->flash('error','Tạo danh mục không thành công');
        }
        return redirect()->route('backend.user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function resetpassword(){
        $user = Auth::user();
        return view('backend.user.reset')->with([
            'user' => $user
        ]);
    }
    public function updatepassword(Request $request, $id){
        $user = User::find($id);
        $passwordold = $request->get('passwordold');
        $passwordnew = $request->get('passwordnew');
        $repasswordnew = $request->get('repasswordnew');
        $credentials = $user->only('email', 'password');
        // dd($credentials);
        // dd($passwordold,$passwordnew,$repasswordnew);
        if (empty($passwordold) || empty($passwordold) || empty($passwordold)) {
            $request->session()->flash('error5','trường * không được để trống');
            return redirect()->route('backend.user.reset');
        }elseif ( $passwordnew != $repasswordnew) {
            $request->session()->flash('error5','Mật khẩu mới không trùng nhau');
            return redirect()->route('backend.user.reset');
        }elseif (Hash::check($passwordold,$user->password)) {
            $user->password = bcrypt($passwordnew);
            $save = $user->save();
            if ($save) {
                $request->session()->flash('success5','Đổi mật khẩu thành công');
            }
            return redirect()->route('backend.dashboard');
        }else{
            $request->session()->flash('error5','Mật khẩu nhập vào không khớp với mật khẩu ban đầu');
            return redirect()->route('backend.user.reset');
            }
        }
    public function editinfo($id){
        $user = Auth::user();
        // $user = User::find($id);
        // $user_info = UserInfo::find($id);
        $userInfo = $user->userInfo;
        // dd($userInfo);
        return view('backend.user.editinfo')->with([
            'user' => $user,
            'userInfo' => $userInfo
        ]);
    }
    public function updateimage(Request $request,$id){
        $user = User::find($id);
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            // dd($file);
            $name = $file->getClientOriginalName();
            $avatar = $file->move('users', $name);
            $user->avatar = $avatar;
        }else{
            echo "không";
        }
        $save = $user->save();
        if ($save) {
            $request->session()->flash('success4','Cập nhật ảnh thành công');
        }else{
            $request->session()->flash('error4','Cập nhật ảnh không thành công');
        }
        return redirect()->route('backend.user.editinfo',Auth::user());
    }
    public function updateinfo(StoreEditInfoRequest $request,$id)
    {
        $user = User::find($id);
        $user->phone = $request->get('phone');
        $user->email = $request->get('email');
        $user->sex = $request->get('sex');
        $save = $user->save();
        $userInfo = $user->userInfo;
        $userInfo->fullname = $request->get('fullname');
        $userInfo->address = $request->get('address');
        $userInfo->birthday = $request->get('birthday');
        $userInfo->user_id = $user->id;
        $save = $userInfo->save();
        if ($save) {
            $request->session()->flash('success3','Cập nhật thông tin thành công');
        }else{
            $request->session()->flash('error3','Cập nhật thông tin không thành công');
        }
        return redirect()->route('backend.user.editinfo',Auth::user());
    }
    public function show($id)
    {
        $user = User::find($id);
        // dd($userInfo);
        $userInfo = $user->userInfo;
        // dd($user);
        return view('backend.user.detail')->with([
            'user' => $user,
            'userInfo' => $userInfo,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $users = User::get();
        $item = User::find($id);
        if ($user->can('update',$item)) {
            return view('backend.user.edit')->with([
                'users' => $users,
                'item' => $item
            ]);
        }else{
            return redirect()->route('backend.error',$user);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUserUpdateRequest $request, $id)
    {
        $user = User::find($id);
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            // dd($file);
            $name = $file->getClientOriginalName();
            $avatar = $file->move('users', $name);
            $user->avatar = $avatar;
        }else{
            echo "không";
        }
        $user->name = $request->get('username');
        $user->email = $request->get('email');
        $user->phone = $request->get('phone');
        $user->role = $request->get('role');
        $user->sex = $request->get('sex');
        // $user->avatar = $avatar;
        $save = $user->save();
                if ($save) {
                    $request->session()->flash('success1','Cập nhật thông tin thành công');
                }else{
                    $request->session()->flash('error1','Cập nhật thông tin không thành công');
                }
        return redirect()->route('backend.user.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $user = Auth::user();
        if ($user->can('delete',User::find($id))) {
            User::destroy($id);
            if (User::destroy($id) == 0) {
                $request->session()->flash('success5','Xóa tài khoản thành công');
            }else{
                $request->session()->flash('error5','Xóa tài khoản không thành công');
            }
            return redirect()->route('backend.user.index');
        }else{
            return redirect()->route('backend.error',$user);
        }
    }
}
