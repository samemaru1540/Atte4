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
        $attend = Carbon::now()->toTimestring();

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
            'attend' => $attend,
        ]);

        return redirect()->back()->with('message', '勤務を開始しました');
    }

    // 勤務終了の処理
    protected function leave()
    {
        $user = Auth::user();
        $date = Carbon::now()->toDateString();
        $leave = Carbon::now()->toTimestring();

        // 当日の出勤データを取得
        $time = Time::where('user_id', $user->id)
                    ->where('date', $date)
                    ->first();

        if (!$time || $time->leave) {
            return redirect()->back()->with('error', '本日の退勤がすでに記録されているか、出勤がありません');
        }

        // 退勤の記録
        $time->update([
            'leave' => $leave,
        ]);

        return redirect()->back()->with('message', '勤務を終了しました');
    }

    // 休憩開始の処理
    protected function break()
    {
        $user = Auth::user();
        $date = Carbon::now()->toDateString();
        $break = Carbon::now()->toTimestring();

        // 出勤レコードを確認
        $time = Time::where('user_id', $user->id)
                    ->where('date', $date)
                    ->first();

        if (!$time) {
            return redirect()->back()->with('error', '勤務を開始していません');
        }

        // 休憩開始の記録
        Rest::create([
            'time_id' => $time->id,
            'break' => $break,
        ]);

        return redirect()->back()->with('message', '休憩を開始しました');
    }

    // 休憩終了の処理
    protected function breakEnd()
    {
        $user = Auth::user();
        $date = Carbon::now()->toDateString();
        $breakEnd = Carbon::now()->toTimestring();

        // 出勤レコードを確認
        $time = Time::where('user_id', $user->id)
                    ->where('date', $date)
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
            'break_end' => $breakEnd,
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

    public function totalBreak()
    {
        $totalBreak = $break->diffInSeconds($breakEnd);

        // 4.秒数から時間、分、秒を計算
        $hours = floor($diffInSeconds / 3600);
        $minutes = floor(($diffInSeconds % 3600) / 60);
        $seconds = $diffInSeconds % 60;
    }

    public function totalWork()
    {
        $totalWork = $attend->diffInSeconds($leave);

        // 4.秒数から時間、分、秒を計算
        $hours = floor($diffInSeconds / 3600);
        $minutes = floor(($diffInSeconds % 3600) / 60);
        $seconds = $diffInSeconds % 60;
    }
}
