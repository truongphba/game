<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class GameController extends Controller
{
    public function list_game()
    {
        $data = Game::orderBy('created_at', 'desc')->get();
        return view('list_game')->with('data', $data);
    }

    public function detail_game(Request $request)
    {
        $type = 'add';
        $data = '1';
        if ($request->edit) {
            $type = 'edit';
            $data = Game::where('id', $request->id)->first();
        }
        return view('detail_game')
            ->with('data', $data)
            ->with('type', $type);
    }

    public function save_game(Request $request)
    {

        if ($request->edit) {
            $game = Game::find($request->id);
            $game->name = $request->name;
            $game->description = $request->description;
            $game->price = $request->price;
            $game->status = $request->status;
            $game->save();
        } else {
            $game = new Game();
            $game->name = $request->name;
            $game->description = $request->description;
            $game->price = $request->price;
            $game->save();
        }

            return redirect('/');

    }

    public function destroy_game($game)
    {
        Game::find($game)->delete();
        return redirect('/');
    }
}
