<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateBudgetRequest;
use App\Models\Budget;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function index(Request $request)
{
    $startDate = $request->input('startDate');
    $endDate = $request->input('endDate');
    $filter = $request->input('filter');
    
    $query = Budget::query();
    
    if ($startDate && $endDate) {
        $query->whereBetween('date', [$startDate, $endDate]);
    }
    
    if ($filter) {
        $query->where(function ($q) use ($filter) {
            $q->where('client', $filter)
                ->orWhere('seller', $filter);
        });
    }
    
    $budgets = $query->orderBy('date', 'asc')->paginate(10);
    
    return view('index', compact('budgets', 'startDate', 'endDate', 'filter'));
}

    public function show(string $id){
        $budget = Budget::find($id);
        if(!$budget){
            return back();
        }
        return view('show', compact('budget'));
    }

    public function create(){
        return view('create');
    }

    public function store(StoreUpdateBudgetRequest $request){
        $data = $request->all();
        Budget::create($data);
        return redirect()->route('budgets.index');
    }

    public function edit(Budget $budget, string|int $id){
        $budget = $budget->where('id', $id)->first();
        if(!$budget){
            return back();
        }

        return view('edit', compact('budget'));
    }

    public function update(Request $request, Budget $budget, string|int $id){
        $budget = $budget->find($id);
        if(!$budget){
            return back();
        }
        $budget->update($request->all());
        return redirect()->route('budgets.index');
    }

    public function destroy(Budget $budget, string|int $id){
        $budget = $budget->find($id);
        if(!$budget){
            return back();
        }
        $budget->delete();
        return redirect()->route('budgets.index');
    }
}
