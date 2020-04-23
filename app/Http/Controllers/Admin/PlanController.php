<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlan;
use App\Models\Plan;
use Illuminate\Http\Request;
Use Illuminate\Support\Str;

class PlanController extends Controller
{

    private $repository;

    /**
     * PlanController constructor.
     */
    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
        $this->middleware(['can:plans']);

    }

    public function index(){
        $plans = $this->repository->latest()->paginate();
        return view('admin.pages.plans.index', ['plans' => $plans]);
    }

    public function create(){
        return view('admin.pages.plans.create');
    }

    public function store(StoreUpdatePlan $request){
        $this->repository->create($request->all());
        return redirect()->route('plans.index');
    }

    public function show(String $url){
        $plan = $this->repository->where('url', $url)->first();
        if(!$plan)
            return redirect()->back();

        return view('admin.pages.plans.show',[
            'plan' => $plan,
        ]);
    }

    public function destroy(String $url){
        $plan = $this->repository
            ->where('url', $url)
            ->with('details')
            ->first();
        if(!$plan)
            return redirect()->back();

        if($plan->details->count() > 0){
            return redirect()
                ->back()
                ->with('error', 'Existem detalhes vinculados a este plano, deve apagar primeiro os detalhes e depois apagar o plano');
        }

        $plan->delete();

        return redirect()->route('plans.index');
    }

    public function edit(String $url){
        $plan = $this->repository->where('url', $url)->first();
        if(!$plan)
            return redirect()->back();

        return view('admin.pages.plans.edit', ['plan' => $plan]);
    }

    public function update(StoreUpdatePlan $request, $url){

        $plan = $this->repository->where('url', $url)->first();
        if(!$plan)
            return redirect()->back();

        $plan->update($request->all());
        return redirect()->route('plans.index');
    }

    public function search(Request $request){
        $filter = $request->except('_token');
        $plans = $this->repository->search($request->filter);
        return view('admin.pages.plans.index', [
            'plans' => $plans,
            'filters' => $filter
        ]);
    }
}
