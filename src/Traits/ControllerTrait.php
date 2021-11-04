<?php
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

namespace gersonalves\laravelBase\Traits;

trait ControllerTrait
{
    public function index(): JsonResponse
    {
        try {
            return response()->json($this->service->get());
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function show(int $id): JsonResponse
    {
        try {
            return response()->json($this->service->get($id));

        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
    }

    public function update(int $id, Request $request): JsonResponse
    {
        return response()->json($this->service->update($request));
    }

    public function store(Request $request): JsonResponse
    {
        return response()->json($this->service->store($request));
    }

    public function destroy(int $id): JsonResponse
    {
        try {
            return response()->json($this->service->destroy($id));
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
    }

    public function getErrorString(Exception $e, string $customMessage = "Server error"): string
    {
        return env("APP_DEBUG") ? $e->getMessage() : $customMessage;
    }
}