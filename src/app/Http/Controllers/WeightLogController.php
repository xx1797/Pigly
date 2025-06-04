<?php

namespace App\Http\Controllers;

use App\Models\WeightLog;
use App\Http\Requests\StoreWeightLogRequest;
use Illuminate\Support\Facades\Auth;

class WeightLogController extends Controller
{
    public function index()
    {
        $logs = WeightLog::where('user_id', Auth::id())
                         ->orderByDesc('date')
                         ->paginate(8);

        return view('weight_logs.index', compact('logs'));
    }

    public function create()
    {
        return view('weight_logs.create');
    }

    public function store(StoreWeightLogRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        WeightLog::create($data);

        return redirect('/weight_logs')->with('success', '登録が完了しました');
    }

    public function show($id)
    {
        $log = WeightLog::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('weight_logs.show', compact('log'));
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

        return redirect('/weight_logs')->with('success', '更新しました');
    }

    public function destroy($id)
    {
        $log = WeightLog::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $log->delete();

        return redirect('/weight_logs')->with('success', '削除しました');
    }

    public function search(Request $request)
    {
        $logs = WeightLog::where('user_id', Auth::id())
                         ->whereBetween('date', [$request->start_date, $request->end_date])
                         ->paginate(8);

        return view('weight_logs.index', compact('logs'));
    }
}
