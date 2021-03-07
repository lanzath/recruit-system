<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Models\CandidateTechnology;
use App\Http\Requests\CandidateTechnology\StoreRequest;
use App\Http\Requests\CandidateTechnology\UpdateRequest;

class CandidateTechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(CandidateTechnology::paginate(10), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest  $request
     * @return void
     */
    public function store(StoreRequest $request): JsonResponse
    {
        foreach ($request->technology as $technology) {
            $technology = CandidateTechnology::create([
                'candidate_id' => $request->candidate_id,
                'technology' => $technology,
            ]);
        }

        return response()->json($technology, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  CandidateTechnology $candidate
     * @return JsonResponse
     */
    public function show(CandidateTechnology $candidate): JsonResponse
    {
        return response()->json($candidate, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest       $request
     * @param  CandidateTechnology $candidate
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, $candidate): JsonResponse
    {
        return response()->json($candidate->update($request->validated()), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  CandidateTechnology $candidate
     * @return JsonResponse
     */
    public function destroy(CandidateTechnology $candidate): JsonResponse
    {
        $candidate->delete();

        return response()->json([], 204);
    }
}
