<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

use App\Models\User;
use App\Models\Giay;
use App\Models\LoaiGiay;
use App\Models\ThuongHieu;
use App\Models\PhanQuyen;

class PhanQuyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PhanQuyen::all();
        return response(view('admin.phanquyen.phanquyen', ['phanquyens' => $data]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return the view for creating a new 'PhanQuyen'
        return response(view('admin.phanquyen.them'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $phanquyen = PhanQuyen::create([
            'ten_phan_quyen' => $request->input('ten_phan_quyen'),
            
        ]);
        return response()->redirectTo('/admin/phanquyen');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // hiển thị
        $data = PhanQuyen::all();
        return response(View('admin.phanquyen.phanquyen', ['phanquyens'=>$data]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /// sửa
        $data = PhanQuyen::find($id);
        return response(view('admin.phanquyen.sua', ['phanquyen'=>$data]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // update
        $phanquyen = PhanQuyen::find($request->id_phan_quyen);
        $phanquyen['ten_phan_quyen'] = $request->ten_phan_quyen;
      
        $phanquyen->save();
        return response(Redirect('/admin/phanquyen'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /// xóa
        $data = PhanQuyen::find($id);
        $data->delete();
        return response(Redirect('/admin/phanquyen'));
    }
}