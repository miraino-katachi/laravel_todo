@extends('layouts.todo')

@section('title', 'TODOリスト | 更新')

@section('content')
    <form method="POST" action="./update">
        @csrf
        <input type="hidden" name="id" value="{{ $item->id }}">
        <div class="form-group">
            <label for="expiration_date">期限日</label>
            <input type="date" class="form-control" id="expiration_date" name="expiration_date"
                aria-describedby="expirationDateHelp"
                value="{{ $errors->has('expiration_date') ? old('expiration_date') : $item->expiration_date }}">
            @if ($errors->has('expiration_date'))
                <div class="alert alert-danger py-0 px-1">
                    <small>{{ $errors->first('expiration_date') }}</small>
                </div>
            @endif
        </div>
        <div class="form-group">
            <label for="todo_item">TODO項目</label>
            <input type="text" class="form-control" id="todo_item" name="todo_item" aria-describedby="todoItemHelp"
                value="{{ $errors->has('todo_item') ? old('todo_item') : $item->todo_item }}">
            @if ($errors->has('todo_item'))
                <div class="alert alert-danger py-0 px-1">
                    <small>{{ $errors->first('todo_item') }}</small>
                </div>
            @endif
        </div>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="is_completed" name="is_completed" value="1"
                {{ $item->is_completed == 1 ? ' checked' : '' }}>
            <label class="custom-control-label" for="is_completed">完了にする</label>
        </div>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="is_deleted" name="is_deleted" value="1">
            <label class="custom-control-label" for="is_deleted">削除する</label>
        </div>
        <div class="mt-3">
            <input type="submit" value="更新" class="btn btn-primary">
            <input type="button" value="もどる" onclick="location.href='/';" class="btn btn-outline-primary">
        </div>
        </div>
    </form>
@endsection
