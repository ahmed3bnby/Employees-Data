<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empeloyee;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use PDO;

class EmpeloyeeController extends Controller
{


    public function employees(Request $request)
    {
        $query = Empeloyee::query();

        if ($request->filled('search')) {
            $query->where('first_name', 'like', '%' . $request->input('search') . '%')
                  ->orWhere('last_name', 'like', '%' . $request->input('search') . '%')
                  ->orWhere('email', 'like', '%' . $request->input('search') . '%')
                  ->orWhere('company', 'like', '%' . $request->input('search') . '%')
                  ->orWhere('street', 'like', '%' . $request->input('search') . '%')
                  ->orWhere('age', 'like', '%' . $request->input('search') . '%')
                  ->orWhere('gender', 'like', '%' . $request->input('search') . '%');
        }

        $employees = $query->paginate(25);

        return view("empeloyee", compact('employees'));
    }

    public function edit($id)
    {
        $employees = Empeloyee::find($id);
        return view("edit", compact('employees'));
    }

    public function update(Request $request,$id)
    {
        $employees = empeloyee::find($id);
        $employees->first_name = $request->input('first_name');
        $employees->last_name = $request->input('last_name');
        $employees->email = $request->input('email');
        $employees->country = $request->input('company');
        $employees->age = $request->input('age');
        $employees->gender = $request->input('gender');
        $employees->update();
        return redirect('/user/' . $request->id)->with('edited', 'Employee edited successfully');
    }


    public function delete($id)
    {

        Empeloyee::findorfail($id)->delete();

       //  Empeloyee::destroy($id);

        /*
        $employees = empeloyee::find($id);
        $employees->delete();

        */
        return redirect('/employees')->with('deleted','data deleted !');
    }

public function create()
{
    return view('create');
}



/*
public function store(Request $request)
{
    $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'company' => 'required',
        'street' => 'required',
        'country' => 'required',
        'age' => 'required|numeric',
        'gender' => 'required|in:Male,Female',
    ]);

    Empeloyee::create([
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'email' => $request->input('email'),
        'company' => $request->input('company'),
        'street' => $request->input('street'),
        'country' => $request->input('country'),
        'age' => $request->input('age'),
        'gender' => $request->input('gender'),
    ]);

    return redirect()->route('employees.index')->with('success', 'Employee added successfully');
}
}

*/

public function store(Request $request)
{
    $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'company' => 'required',
        'street' => 'required',
        'country' => 'required',
        'age' => 'required|numeric',
        'gender' => 'required|in:Male,Female',
    ]);

    $employee = new Empeloyee();

    $employee->first_name = $request->input('first_name');
    $employee->last_name = $request->input('last_name');
    $employee->email = $request->input('email');
    $employee->company = $request->input('company');
    $employee->street = $request->input('street');
    $employee->country = $request->input('country');
    $employee->age = $request->input('age');
    $employee->gender = $request->input('gender');

    $employee->save();

    return redirect()->route('employees.show', ['id' => $employee->id])->with('success', 'Employee added successfully');
}

public function show($id){

$user = Empeloyee::find($id);

if (!$user) {
    return redirect('/employees')->with('error', 'User not found');
}

return view('show', ['user' => $user]);
}

/*
public function index(Request $request) {
    $search = $request->input('search');

    $results = Empeloyee::where('first_name', 'like', '%' . $search . '%')
        ->orWhere('last_name', 'like', '%' . $search . '%')
        ->orWhere('email', 'like', '%' . $search . '%')
        ->orWhere('company', 'like', '%' . $search . '%')
        ->orWhere('street', 'like', '%' . $search . '%')
        ->orWhere('age', 'like', '%' . $search . '%')
        ->orWhere('gender', 'like', '%' . $search . '%')
        ->get();

    return response()->json($results);
} */


}
