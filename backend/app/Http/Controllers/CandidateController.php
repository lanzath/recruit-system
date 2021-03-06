<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Candidate\StoreRequest;
use App\Http\Requests\Candidate\UpdateRequest;
use App\Models\CandidateTechnology;
use Illuminate\Support\Facades\DB;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        if($request->filter) {
            $candidates = Candidate::technology($request->filter)->get();

            return response()->json($candidates, 200);
        };

        return response()->json(Candidate::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRequest  $request
     * @return JsonResponse
     */
    public function store(StoreRequest $request): JsonResponse
    {
        // Creates a candidate and it's technologies.
        $candidate = DB::transaction(function () use ($request) {
            $candidate = Candidate::create($request->validated());

            $candidate->technologies()->createMany($request->technology);

            return response()->json($candidate, 201);
        }, 1);

        return $candidate;
    }

    /**
     * Display the specified resource.
     *
     * @param  Candidate $candidate
     * @return JsonResponse
     */
    public function show(Candidate $candidate): JsonResponse
    {
        return response()->json($candidate, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest $request
     * @param  Candidate     $candidate
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, Candidate $candidate): JsonResponse
    {
        // Updates a candidate and it's technologies
        $update = DB::transaction(function () use ($candidate, $request) {
            $candidate->update($request->validated());

            // Handle candidate technologie's update request
            foreach ($request->technology as $technology) {
                CandidateTechnology::where('id', $technology['id'])->update($technology);
            }

            return response()->json($candidate, 200);
        }, 1);

        return $update;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Candidate $candidate
     * @return JsonResponse
     */
    public function destroy(Candidate $candidate): JsonResponse
    {
        $candidate->delete();

        return response()->json([], 204);
    }
}
