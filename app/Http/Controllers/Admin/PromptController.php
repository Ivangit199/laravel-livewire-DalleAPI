<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prompt;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PromptController extends Controller
{
    public function index()
    {
        return view('admin.prompt.index');
    }

    public function create()
    {
        // abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.prompt.create');
    }

    public function edit($prompt)
    {
        return view('admin.prompt.edit', compact('prompt'));
    }

    public function show(Prompt $prompt)
    {
        return view('admin.prompt.show', compact('prompt'));
    }
}
