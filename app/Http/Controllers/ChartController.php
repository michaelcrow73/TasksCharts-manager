<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class ChartController extends Controller
{
    public function index()
    {
        $completedData = [Task::where('completed', true)->count()];
        $incompleteData = [Task::where('completed', false)->count()];
        return view('charts.index', compact('completedData', 'incompleteData'));
    }
}
