<?php

namespace App\Http\Controllers\API;

use App\Models\Pegawai;
use App\Models\JabatanPgw;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $s=$_GET['s'];$tp=$_GET['s'];
        $data=Pegawai::getPegawai($s,$tp)->paginate(5);
        // $data['message']='succses';
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi=$request->validate([
            'nama'=>'required',
            'nip'=>'required|numeric',
            'alamat'=>'',
            'telp'=>'required',
            'foto'=>'',
            'id_jabatan_pgw'=>'required',
            'status'=>''
        ]);
        try {
         if($request->file('foto')){
                 $fileName = time().$request->file('foto')->getClientOriginalName();
                 $path = $request->file('foto')->storeAs('uploads/pegawais',$fileName);
              $validasi['foto']=$path;
            }
            $response = Pegawai::create($validasi);
            return response()->json([
                'success'=>true,
                'message'=>'success',
                'data'=>$response
            ]);
        } catch (\Exception $e) {
           return response()->json([
               'message'=>'Err',
               'errors'=>$e->getMessage()
               ]);
        }
    }
    function jabatan_Pgw(){
        $data=JabatanPgw::all();
        return response()->json($data);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        // $data=Pegawai::where('id_pegawai',$id)->first();
        // return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $validasi=$request->validate([
            'nama'=>'required',
            'nip'=>'required|numeric',
            'alamat'=>'',
            'telp'=>'required',
            'foto'=>'',
            'id_jabatan_pgw'=>'required',
            'status'=>''
        ]);
        try {
         if($request->file('foto')){
                 $fileName = time().$request->file('foto')->getClientOriginalName();
                 $path = $request->file('foto')->storeAs('uploads/pegawais',$fileName);
              $validasi['foto']=$path;
            }
            $response = Pegawai::where('id_pegawai',$id);
            $response ->update($validasi);
            return response()->json([
                'success'=>true,
                'message'=>'success'
            ]);
        } catch (\Exception $e) {
           return response()->json([
               'message'=>'Err',
               'errors'=>$e->getMessage()
               ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $pegawai=Pegawai::where('id_pegawai',$id);
            $pegawai->delete();
            return response()->json([
                'success'=>true,
                'message'=>'Success'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message'=>'Err',
                'errors'=>$e->getMessage()
            ]);
        }
    }
}
