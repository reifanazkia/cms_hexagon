<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $query = Job::query();

        // Filter berdasarkan pencarian (nama, email, posisi)
        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('position', 'like', "%{$search}%");
            });
        }

        // Filter berdasarkan tanggal
        if ($request->filled('start')) {
            $query->whereDate('created_at', '>=', $request->start);
        }

        if ($request->filled('end')) {
            $query->whereDate('created_at', '<=', $request->end);
        }

        $applications = $query->orderByDesc('id')->paginate(10);

        return view('jobs.index', compact('applications'));
    }
}
