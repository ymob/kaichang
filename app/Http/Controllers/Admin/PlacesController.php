<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Place;
use App\Model\Meetplace;
use App\Model\Facilitie;

class PlacesController extends Controller
{
    // index
    public function index(Request $request)
    {
        $num = $request->input('num', 10);

        $keywords = $request->input('keywords', '');

        $data = \DB::table('places')
        	->join('shopkeepers', 'places.sid', '=', 'shopkeepers.id')
        	->where('places.title','like','%'.$keywords.'%')
        	->select('places.*', 'shopkeepers.name')
        	->paginate($num);
        // dd($data);
        foreach ($data as $key => $val) {
			$arr1 = explode(',', $val->freeService);
			$val->freeService = $arr1;
			$arr2 = explode(',', $val->supportService);
			$val->supportService = $arr2;
			$arr3 = explode(',', $val->pic);
			$val->pic = $arr3;
			$meetplace = Meetplace::where('pid', $val->id)->get();
			foreach ($meetplace as $k => $v) {
				$facilitie = Facilitie::where('mid', $v->id)->get();
				$arr4 = explode(',', $v->freeService);
				$v->freeService = $arr4;
				$arr5 = explode(',', $v->supportService);
				$v->supportService = $arr5;
				$v->facilitie = $facilitie;
			}
			$val->meetplace = $meetplace;
        }
        // dd($data);
        return view('admin.places.index',['title'=>'场地列表','request'=>$request->all(),'data'=>$data]);
    }

    public function status(Request $request)
    {
    	$num=$request->input('num',10);

        $keywords=$request->input('keywords','');

        $data=\DB::table('shopkeepers')
            ->join('shopdetails', 'shopdetails.sid', 'shopkeepers.id')
            ->where([['shopkeepers.name','like','%'.$keywords.'%'], ['shopkeepers.status', 3]])
            ->select('shopkeepers.*', 'shopdetails.name as dname', 'shopdetails.address', 'shopdetails.license')
            ->paginate($num);

        $status = \Cache::get('shopkeeper-is-status', 1);

        return view('admin.places.status',['title'=>'加盟商列表','status' => $status, 'request'=>$request->all(),'data'=>$data]);
    }

    public function status_yes($id)
    {
    	$data = \DB::table('shopkeepers')->where([['id', $id], ['status', 3]])->first();
    	if(!$data)
    	{
    		return redirect('404');
    	}
    	$res = \DB::table('shopkeepers')->where('id', $id)->update(['status' => 1]);
    	\Cache::forget('status-info-no'.$id);
    	return back()->with(['info' => '审核成功']);
    }

    public function status_no($id, Request $request)
    {
    	$data = \DB::table('shopkeepers')->where([['id', $id], ['status', 3]])->first();
    	if(!$data)
    	{
    		return redirect('404');
    	}
    	$res = \DB::table('shopkeepers')->where('id', $id)->update(['status' => 2]);
    	\Cache::forever('status-info-no'.$id, $request->con);
    	\DB::table('shopdetails')->where('sid', $request->id)->delete();
    	return back()->with(['info' => '驳回成功']);
    }

    public function isstatus()
    {
    	$status = \Cache::get('shopkeeper-is-status', function(){
    		return 1;
    		\Cache::forever('shopkeeper-is-status', 1);
    	});
    	if($status)
    	{
    		\Cache::forever('shopkeeper-is-status', 0);
    		$status = 0;
    	}else
    	{
    		\Cache::forever('shopkeeper-is-status', 1);
    		$status = 1;
    	}

    	return response()->json($status);
    }
}
