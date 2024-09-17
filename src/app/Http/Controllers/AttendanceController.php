<?php

namespace App\Http\Controllers;
use App\Models\Time;
use App\Models\Rest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function attendance(Request $request)
    {
        $user = Auth::user();

        if ($request->has('attend')) {
            // 勤務開始の処理
            return $this->attend($user);
        } elseif ($request->has('leave')) {
            // 勤務終了の処理
            return $this->leave($user);
        } elseif ($request->has('break')) {
            // 休憩開始の処理
            return $this->startBreak($user);
        } elseif ($request->has('break_end')) {
            // 休憩終了の処理
            return $this->endBreak($user);
        }

        return redirect()->back()->with('error', '不正な操作です');
    }

    // 勤務開始の処理
    protected function attend()
    {
        $user = Auth::user();
        $date = Carbon::now()->toDateString();
        $newTime = new carbon('2021-11-01 10:00:00');

        // すでに出勤していないか確認
        $existingTime = Time::where('user_id', $user->id)
                            ->where('date', $date)
                            ->first();

        if ($existingTime) {
            return redirect()->back()->with('error', 'すでに本日の出勤が記録されています');
        }

        // 新規出勤の記録
        $time = Time::create([
            'user_id' => $user->id,
            'date' => $date,
            'attend' => $newTime->toTimeString(),
        ]);

        return redirect()->back()->with('message', '勤務を開始しました');
    }

    // 勤務終了の処理
    protected function leave()
    {
        $user = Auth::user();
        $today = now()->format('Y-m-d');
        $newTime = new Carbon('2021-11-01 20:00:00');

        // 当日の出勤データを取得
        $time = Time::where('user_id', $user->id)
                    ->where('date', $today)
                    ->first();

        if (!$time || $time->leave) {
            return redirect()->back()->with('error', '本日の退勤がすでに記録されているか、出勤がありません');
        }

        // 退勤の記録
        $time->update([
            'leave' => $newTime->toTimeString(),
        ]);

        return redirect()->back()->with('message', '勤務を終了しました');
    }

    // 休憩開始の処理
    protected function break()
    {
        $user = Auth::user();
        $today = now()->format('Y-m-d');
        $newTime = Carbon::now()->toTimestring();

        // 出勤レコードを確認
        $time = Time::where('user_id', $user->id)
                    ->where('date', $today)
                    ->first();

        if (!$time) {
            return redirect()->back()->with('error', '勤務を開始していません');
        }

        // 休憩開始の記録
        Rest::create([
            'time_id' => $time->id,
            'break' => $newTime->toTimeString(),
        ]);

        return redirect()->back()->with('message', '休憩を開始しました');
    }

    // 休憩終了の処理
    protected function endBreak()
    {
        $user = Auth::user();
        $today = now()->format('Y-m-d');
        $newTime = Carbon::now()->toTimestring();

        // 出勤レコードを確認
        $time = Time::where('user_id', $user->id)
                    ->where('date', $today)
                    ->first();

        if (!$time) {
            return redirect()->back()->with('error', '勤務を開始していません');
        }

        // 終了していない休憩を取得
        $rest = Rest::where('time_id', $time->id)
                    ->whereNull('break_end')
                    ->first();

        if (!$rest) {
            return redirect()->back()->with('error', '休憩が開始されていません');
        }

        // 休憩終了の記録
        $rest->update([
            'break_end' => $newTime->toTimeString(),
        ]);

        return redirect()->back()->with('message', '休憩を終了しました');
    }

    public function index(Request $request)
    {
        $user = Auth::user();

        // クエリパラメータから日付を取得 (無ければ今日の日付)
        $date = $request->input('date', now()->format('Y-m-d'));

        // 日付ごとに勤務・休憩データを取得
        $time = Time::where('user_id', $user->id)
                    ->where('date', $date)
                    ->with('rests')  // 休憩データも一緒に取得
                    ->first();

        return view('attendance.index', compact('time', 'date'));
    }
}
