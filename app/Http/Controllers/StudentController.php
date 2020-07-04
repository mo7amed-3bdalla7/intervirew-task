<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorestudentRequest;
use App\Http\Requests\UpdatestudentRequest;
use App\Http\Resources\StudentResource;
use App\Student;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class StudentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return StudentResource::collection(Student::paginate(20));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorestudentRequest $request
     * @return StudentResource
     */
    public function store(StorestudentRequest $request)
    {
        $student = Student::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'date_of_birth' => $request->date_of_birth,
            'class_id' => $request->class_id,
        ]);

        return new StudentResource($student);

    }

    /**
     * Display the specified resource.
     *
     * @param Student $student
     * @return StudentResource
     */
    public function show(Student $student)
    {
        return new StudentResource($student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatestudentRequest $request
     * @param Student $student
     * @return StudentResource
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->all());

        return new StudentResource($student);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Student $student
     * @return JsonResponse
     */
    public function destroy(Student $student)
    {
        $student->forceDelete();

        return response()->json([
            'msg' => 'Deleted Successfully'
        ]);
    }
}
