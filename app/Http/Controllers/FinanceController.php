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
        $paginated_transactions = $user->home->transactions()
            ->with([
                'user:id,name',
                'category:id,name,type'
            ])
            ->latest('date')
            ->paginate(25)
            ->onEachSide(2);
        return Inertia::render(
            'FinanceTest',
            [
                'paginated_transactions' => $paginated_transactions
            ]
        );
    }
}
