<?php

namespace ProPay\Http\Controllers;

use ProPay\Employee;
use Illuminate\Http\Request;
use Mail;
use ProPay\Mail\WelcomeEmail;

class EmployeeController extends Controller
{


     public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        
        
        $employees = Employee::latest()->paginate(10);

         return view('employees.index',compact('employees'))
                 ->with('i',(request()->input('page',1) -1) * 10);

        // return response()->json($response);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Employee $employee)
    {
        //

        $array = array(

                 'name' => 'required',
                'surname' => 'required',
                'idno' => 'required|numeric|min:13',
                'mobileno' => 'required|numeric',
                'email' => 'required|email',
                'dateOfBirth' => 'required|date',
                'language' => 'required',
                'interests' => 'required',


        );

        request()->validate($array);

        //Adding a checkbox in database
        $request->request->add(array('interests' => implode(',',$request->input('interests'))));

        $employee->create($request->all());

            //Send Mail when the employee is created.
        $email_to = $request->input('email');
        $this->welcomeMail($email_to);               

        return redirect()->route('employees.index')
                    ->with('success','Employee created successfully.');




    }

    /**
     * Display the specified resource.
     *
     * @param  \ProPay\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
        return view('employees.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ProPay\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Employee $employee)
    {
            
        // 
        return view('employees.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ProPay\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //

         $array = array(

                'name' => 'required',
                'surname' => 'required',
                'idno' => 'required|numeric|min:13',
                'mobileno' => 'required|numeric',
                'email' => 'required|email',
                'dateOfBirth' => 'required|date',
                'language' => 'required',
                'interests' => 'required',

        );

        request()->validate($array);

        $request->request->add(array('interests' => implode(',',$request->input('interests'))));

        $employee->update($request->all());


        return redirect()->route('employees.index')
                        ->with('success','Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ProPay\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //

        $employee->delete();

        return redirect()->route('employees.index')
                          ->with('success', 'Employee deleted successfully');
    }

     /**
     * Send Reminder E-mail Example
     *
     * @return void
     */
    public function welcomeMail($email_to)
    {
             
        Mail::to( $email_to)->send(new WelcomeEmail);
        return "E-mail has been sent Successfully";  
  
    }
}
