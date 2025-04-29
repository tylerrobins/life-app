<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class FinanceController extends Controller
{
    public function view(): Response
    {
        return Inertia::render('Finance');
    }

    public function test(): Response
    {
        $user = Auth::user();
        $transactions = $user->home->transactions()
            ->select(['transactions.id', 'transactions.name', 'transactions.date', 'transactions.amount', 'transactions.user_id', 'transactions.category_id'])
            ->with([
                'user:id,name',
                'category:id,name,type'
            ])
            ->get();
        return Inertia::render(
            'FinanceTest',
            [
                'transactions' => $transactions
            ]
        );
    }
}
