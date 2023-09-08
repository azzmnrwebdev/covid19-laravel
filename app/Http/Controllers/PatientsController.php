<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patients::all();
        $total = count($patients);

        if ($total) {
            $data = [
                'message' => 'Get All Resource',
                'total_patients' => $total,
                'data_patients' => $patients
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data is empty',
                'total_patients' => $total
            ];
            return response()->json($data, 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|max:45',
            'phone' => 'required|numeric',
            'address' => 'required',
            'status' => 'required|max:10',
            'in_date_at' => 'required',
            'out_date_at' => 'nullable'
        ]);

        $patients = Patients::create($validate);

        $data = [
            'message' => 'Resource is added successfully',
            'data' => $patients
        ];

        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patients = Patients::find($id);

        if ($patients) {
            $data = [
                'message' => 'Get Detail Resource',
                'data' => $patients
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Resource not found'
            ];

            return response()->json($data, 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $patients = Patients::find($id);

        if ($patients) {
            $patients->update($request->all());
            $data = [
                'message' => 'Resource is update successfully',
                'data' => $patients
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Resource not found'
            ];

            return response()->json($data, 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patients  $patients
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patients = Patients::find($id);

        if ($patients) {
            $patients->delete();
            $data = [
                'message' => 'Resource is delete successfully'
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Resource not found'
            ];

            return response()->json($data, 404);
        }
    }

    /**
     * Method (GET) Search Resource by name.
     *
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        $patients = Patients::where('name', 'like', '%' . $name . '%')->get();

        $total = count($patients);

        if ($total) {
            $data = [
                'message' => 'Get searched resource',
                'total' => $total,
                'data' => $patients
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Resource not found'
            ];

            return response()->json($data, 404);
        }
    }

    public function positive()
    {
        $patients = Patients::where('status', 'positive')->get();
        $total = count($patients);

        if ($total) {
            $data = [
                'message' => 'Get positive resource',
                'total_patients' => $total,
                'data_patients' => $patients
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data is empty',
                'total_patients' => $total
            ];
            return response()->json($data, 200);
        }
    }

    public function  recovered()
    {
        $patients = Patients::where('status', 'recovered')->get();
        $total = count($patients);

        if ($total) {
            $data = [
                'message' => 'Get recovered resource',
                'total_patients' => $total,
                'data_patients' => $patients
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data is empty',
                'total_patients' => $total
            ];
            return response()->json($data, 200);
        }
    }

    public function dead()
    {
        $patients = Patients::where('status', 'dead')->get();
        $total = count($patients);

        if ($total) {
            $data = [
                'message' => 'Get dead resource',
                'total_patients' => $total,
                'data_patients' => $patients
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Data is empty',
                'total_patients' => $total
            ];
            return response()->json($data, 200);
        }
    }
}
