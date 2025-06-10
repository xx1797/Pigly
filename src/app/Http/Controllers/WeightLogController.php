<?php

namespace App\Http\Controllers;

use App\Models\WeightLog;
use App\Http\Requests\StoreWeightLogRequest;
use App\Http\Requests\GoalSettingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WeightLogController extends Controller
{
    public function index()
    {
        $logs = WeightLog::where('user_id', Auth::id())->orderByDesc('date')->paginate(8);
        return view('weight_logs.index', compact('logs'));
    }

    public function create()
    {
        return view('weight_logs.create');
    }

    public function store(StoreWeightLogRequest $request)
    {
        WeightLog::create($request->validated() + ['user_id' => Auth::id()]);
        return redirect()->route('weight_logs.index')->with('success', '登録しました');
    }

    public function edit($id)
    {
        $log = WeightLog::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('weight_logs.edit', compact('log'));
    }

    public function update(StoreWeightLogRequest $request, $id)
    {
        $log = WeightLog::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $log->update($request->validated());
        return redirect()->route('weight_logs.index')->with('success', '更新しました');
    }

    public function destroy($id)
    {
        $log = WeightLog::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $log->delete();
        return redirect()->route('weight_logs.index')->with('success', '削除しました');
    }

    public function search(Request $request)
    {
        $logs = WeightLog::where('user_id', Auth::id())
            ->when($request->start_date, fn($q) => $q->where('date', '>=', $request->start_date))
            ->when($request->end_date, fn($q) => $q->where('date', '<=', $request->end_date))
            ->orderByDesc('date')
            ->paginate(8);
        return view('weight_logs.index', compact('logs'));
    }

    public function editGoal()
    {
        $target = WeightTarget::where('user_id', auth()->id())->first();

        return view('weight_logs.goal_setting', compact('target'));
    }

    public function updateGoal(GoalSettingRequest $request)
    {
        WeightTarget::updateOrCreate(
            ['user_id' => auth()->id()],
            ['target_weight' => $request->target_weight]
        );

        return redirect()->route('weight_logs.index')->with('success', '目標体重を更新しました。');
    }
}
