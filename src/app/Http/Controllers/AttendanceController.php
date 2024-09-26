<?php

namespace App\Http\Controllers;
use App\Models\Time;
use App\Models\Rest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
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

    public function indexDate(Request $request)
    {
        $user = Auth::user();
        $displayDate = Carbon::now();

        $users = User::join('times', 'users.id', '=', 'times.user_id')
                    ->join('rests', 'times.id', '=', 'rests.time_Id')
                    ->paginate(5);

        $users->each(function ($user) {
            $totalWorkTime = 0;
                foreach ($user->time as $time) {
                // 勤務時間の計算 (出勤時間と退勤時間の差)
                    $workTime = Carbon::parse($time->attend)->diffInSeconds(Carbon::parse($time->leave));

            // 休憩時間の計算
            $totalBreakTime = 0;
                foreach ($time->rest as $rest) {
                    $breakTime = Carbon::parse($rest->break)->diffInSeconds(Carbon::parse($rest->break_end));
                    $totalBreakTime += $breakTime;
            }

            // トータル勤務時間 = 勤務時間 - 休憩時間
            $totalWorkTime += ($workTime - $totalBreakTime);
            }
            // ユーザーにトータル勤務時間を追加
            $user->totalWorkTime = gmdate('H:i:s', $totalWorkTime);
            //ユーザーにトータル休憩時間を追加
            $user->totalBreakTime = gmdate('H:i:s', $totalBreakTime);
        });

    // ビューに渡す
        return view('attendance', compact('users', 'displayDate'));
    }

    public function perDate(Request $request)
    {
        $displayDate = Carbon::parse($request->input('displayDate'));
        if ($request->has('prevDate')) {
            $displayDate->subDay();
            }
        if ($request->has('nextDate')) {
            $displayDate->addDay();
            }
        $users = User::join('times', 'users.id', '=', 'times.user_id')
                    ->join('rests', 'times.id', '=', 'rests.time_Id')
                    ->paginate(5);

        return view('attendance', compact('users', 'displayDate'));
    }

    // ユーザー一覧表示
    public function users()
    {
        $users = User::paginate(5);
        $displayDate = Carbon::now();

        return view('attendance_user', compact('users', 'displayDate'));
    }
}
