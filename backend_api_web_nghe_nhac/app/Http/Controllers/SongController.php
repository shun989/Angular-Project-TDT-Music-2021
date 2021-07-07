<?php

namespace App\Http\Controllers;

use App\Services\SongService;
use Illuminate\Http\Request;

class SongController extends Controller
{
    protected $songService;

    public function __construct(SongService $songService)
    {
        $this->songService = $songService;
    }

    public function index()
    {
        $songs = $this->songService->getAll();

        return response()->json($songs, 200);
    }

    public function show($id)
    {
        $datasong = $this->songService->findById($id);

        return response()->json($datasong['songs'], $datasong['statusCode']);
    }

    public function store(Request $request)
    {
        $datasong = $this->songService->create($request->all());

        return response()->json($datasong['songs'], $datasong['statusCode']);
    }

    public function update(Request $request, $id)
    {
        $datasong = $this->songService->update($request->all(), $id);

        return response()->json($datasong['songs'], $datasong['statusCode']);
    }

    public function destroy($id)
    {
        $datasong = $this->songService->destroy($id);

        return response()->json($datasong['message'], $datasong['statusCode']);
    }
}
