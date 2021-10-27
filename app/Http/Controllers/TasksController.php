<?php

namespace App\Http\Controllers;


class TasksController extends Controller
{
    public function list()
    {
        return view('pages.tasks');
    }

    public function new()
    {
        return view('pages.new');
    }

    public function task()
    {
        return view('pages.task');
    }
}
