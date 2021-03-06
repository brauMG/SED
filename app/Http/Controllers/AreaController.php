<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\Concept;
use App\Test;
use App\User;
use App\Role;
use App\User_Area;
use App\Company;
use App\Role_User;
use App\MaturityLevel;
use App\History;
use App\Attribute;
use Auth;
use App\AjaxCrud;
use App\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;

class AreaController extends Controller
{
    //    public function __construct(Request $request)
//    {
//        $this->middleware(['auth', 'verified']);
//    }

	public function show($request,$test,$concept,$user)
	{

        $Atributos = json_decode($request);
        $Test = json_decode($test);
        $Concept = json_decode($concept);
        foreach ($Atributos as $value)
        {
        	//$value->AtributoName
        	if($value->AtributoId != "")
        	{
        		Attribute::find($value->AtributoId)->update([
        		    'description' => $value->AtributoName,
                    'suggestion' => $value->AtributoSuggestion
                ]);
        	}

        }
        DB::table('test_user')->where('testId',$Test->Id)
        ->update(['userId' => $user]);

        Test::find($Test->Id)->update(['name' => $Test->Name]);
        Concept::find($Concept->Id)->update(['description' => $Concept->Name]);

    }

    public function beta()
    {
      return view('admins.area.test.beta');
    }

    public function showArea(Request $request, $id)
    {
        $area = Area::where('areaId','=', $id)->first();
//        $areaId = $area->areaid;
//        $name = $area->name;
        $id = Auth::user()->companyId;
        $areas = DB::table('areas')->where('areas.companyId','=',$id)->get()->toArray();
        return view('/admins/area/Edit/editArea', compact('area', 'areas'));
    }

    public function EditArea(Request $request, $id)
    {
        DB::table('areas')
        ->where('areaId',$id)
        ->update(['name' =>$request->name]);

        History::Logs('Actualizo el nombre del área '.$request->name.'.');
        return redirect('/admin')->with('mensaje', 'El nombre del área fue modificado exitosamente.');
        //return back();
    }

    public function DeleteArea(Request $request, $id)
    {
        History::Logs('Elimino los datos del área con identificador '.$id.'.');
        $test = DB::table('tests')
        ->select('testId')
        ->where('areaId', $id)->get()->toArray(); //testId to delete

        $c = count($test);

        for ($i=0; $i <$c ; $i++) {
            Test::DeleteTest($test[$i]->testId);
        }

        DB::table('user_areas') ->where('areaId',$id)->delete();

        DB::table('areas') ->where('areaId',$id)->delete();

        return redirect('/admin')->with('mensaje', 'El área fue eliminada exitosamente.');
    }
}
