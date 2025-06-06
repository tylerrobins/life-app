<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class TransactionController extends Controller
{
    public function index(): Response
    {
        $user = Auth::user();
        $paginated_transactions = $user->home->transactions()
            ->with([
                'user:id,name',
                'category:id,name,type'
            ])
            ->latest('date')
            ->paginate(20)
            ->onEachSide(2);
        return Inertia::render(
            'finance/transactions/Index',
            [
                'paginated_transactions' => $paginated_transactions
            ]
        );
    }

    public function create(): Response
    {
        return Inertia::render('finance/transactions/Create');
    }
}
