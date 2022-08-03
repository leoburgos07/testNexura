<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\Area;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\Redirect;

class EmployeeController extends Controller
{

    private $employee;

    public function __construct(Employee $employee){
       $this->employee = $employee;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $employees = Employee::all();
        return view('welcome', compact([
            'employees'
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::all();
        $roles = Rol::all();
        return view('employees.create',compact([
            'areas',
            'roles'
        ]));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        try {
            //return $request;
            $employee = $this->employee::create([
                'name'          => $request['name'],
                'email'         => $request['email'],
                'sex'           => $request['sex'],
                'description'   => $request['description'],
                'area_id'       => $request['area'],
                'bulletin'      => $request['bulletin'] ?  1 : 0
            ]);
            
            foreach ($request['rol'] as $rol) {
                $employee->rol()->attach($rol);
            }
            return redirect('/');
        } catch (\Throwable $th) {
            return Redirect::back()->withErrors(['msg' => 'Error al registrar al empleado']);
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return Redirect::back()->with('status','Empleado eliminado correctamente');
    }
}
