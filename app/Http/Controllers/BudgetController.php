<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateBudgetRequest;
use App\Models\Budget;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function index(Budget $budget){
        $budgets = $budget->all();
        return view('index', compact('budgets'));
    }

    public function show(string $id){
        $budget = Budget::find($id);
        if(!$budget){
            return back();
        }
        return view('budgets.show', compact('budget'));
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

        return view('/budget.edit', compact('budget'));
    }

    public function update(Request $request, Budget $budget, string|int $id){
        $budget = $budget->find($id);
        if(!$budget){
            return back();
        }
        $budget->update($request->all());
        return redirect()->route('badgets.index');
    }

    public function destroy(Budget $budget, string|int $id){
        $budget = $budget->find($id);
        if(!$budget){
            return back();
        }
        $budget->delete();
        return redirect()->route('badgets.index');
    }
}
