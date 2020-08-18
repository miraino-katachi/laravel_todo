<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    /**
     * トップページのアクション
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        // テーブルに登録済みのTODOリストのレコードを取得する。
        $items = DB::table('todo_items')
            ->where('is_deleted', 0)
            ->orderby('expiration_date')
            ->orderby('id')
            ->get();

        // ビューへ引き渡す変数
        $data = [
            'today' => date('Y-m-d'),   // 期限日の初期値
            'items' => $items,          // テーブルに登録済みのTODOリストのレコード
        ];

        // ビューを表示する。
        return view('todo.index', $data);
    }

    /**
     * 登録の送信先のアクション
     *
     * @param TodoRequest $request FormRequest
     * @return void
     */
    public function register(TodoRequest $request)
    {
        // テーブルにインサートする項目と値を連想配列にする
        $param = [
            'expiration_date' => $request->expiration_date,
            'todo_item' => $request->todo_item,
        ];

        // インサート処理を行う。
        DB::table('todo_items')->insert($param);

        // トップページへリダイレクトする。
        return redirect('/');
    }

    /**
     * 更新ページのアクション
     *
     * @param Request $request
     * @return void
     */
    public function update(Request $request)
    {
        // 指定IDのTODOリストのレコードを1件取得する。
        $item = DB::table('todo_items')->where('id', $request->id)->get();

        // ビューを表示する。
        return view('todo.update', ['item' => $item[0]]);
    }

    /**
     * 更新処理のアクション
     *
     * @param TodoRequest $request
     * @return void
     */
    public function doUpdate(TodoRequest $request)
    {
        // 更新する項目と値を連想配列にする
        $param = [
            'expiration_date' => $request->expiration_date,
            'todo_item' => $request->todo_item,
            'is_completed'=>isset($request->is_completed) ? 1 : 0,
            'is_deleted'=>isset($request->is_deleted) ? 1 : 0,
        ];

        // 更新処理を行う
        DB::table('todo_items')->where('id', $request->id)->update($param);

        // トップページへリダイレクト
        return redirect('/');
    }
}
