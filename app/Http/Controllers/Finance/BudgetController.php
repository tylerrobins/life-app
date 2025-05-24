<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class BudgetController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('finance/budget/Index');
    }

    public function create(): Response
    {
        $categories = Category::all();
        $types = Category::select('type')->distinct()->pluck('type');
        return Inertia::render('finance/budget/Create', [
            'categories' => $categories,
            'types' => $types,
        ]);
    }

    public function store(Request $request): void
    {
        dd($request);
    }

    public function test(): void
    {
        $types = Category::select('type')->distinct()->pluck('type');
        $all = Category::all();
        dd($types, $all);
    }
}
