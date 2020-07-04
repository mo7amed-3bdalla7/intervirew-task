<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClassRequest;
use App\Http\Requests\UpdateClassRequest;
use App\Http\Resources\ClassResource;
use App\StudentClass;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Str;
use function Illuminate\Support\Facades\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return ClassResource::collection(StudentClass::paginate(20));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreClassRequest $request
     * @return ClassResource
     */
    public function store(StoreClassRequest $request)
    {
        $class = StudentClass::create([
            'code' => Str::snake($request->code),
            'name' => $request->name,
            'maximum_students' => $request->maximum_students,
            'status' => $request->status ?? StudentClass::OPENED_STATUS,
            'description' => $request->description,
        ]);

        return new ClassResource($class);

    }

    /**
     * Display the specified resource.
     *
     * @param StudentClass $class
     * @return ClassResource
     */
    public function show(StudentClass $class)
    {
        return new ClassResource($class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateClassRequest $request
     * @param StudentClass $class
     * @return ClassResource
     */
    public function update(UpdateClassRequest $request, StudentClass $class)
    {
        $classFields = $request->all();

        if (isset($classFields['code'])) {
            $classFields['code'] = Str::snake($classFields['code']);
        }

        $class->update($classFields);

        return new ClassResource($class);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param StudentClass $class
     * @return JsonResponse
     */
    public function destroy(StudentClass $class)
    {
        $class->forceDelete();

        return response()->json([
            'msg' => 'Deleted Successfully'
        ]);
    }
}
