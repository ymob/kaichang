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
        	->join('shopkeepers', 'shopkeepers.id', '=', 'places.id')
        	->where('places.title','like','%'.$keywords.'%')
        	->select('places.*', 'shopkeepers.name')
        	->paginate($num);
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
        return view('admin.places.index',['title'=>'管理员列表','request'=>$request->all(),'data'=>$data]);
    }


}
