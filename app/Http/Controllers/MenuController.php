<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Menu;
use App\Http\Requests\MenuRequest;


class MenuController extends Controller {

    public function __construct() {
       $this->middleware('CheckRoute');
    }

    public function index() {
        $records = Menu::latest()->paginate(5);
        return view('admin.menus.index', compact('records'));
    }

    public function create() {
        return view('admin.menus.create');
    }

    public function store(MenuRequest $request) {
        $request = setCheckbox($request, 'published');
        $input = $request->all();
        $menu = new Menu($input);
        Auth::user()->menu()->save($menu);
        return redirect('/admin/menus');
    }

    public function edit($id) {
        $record = Menu::findOrFail($id);
        return view('admin.menus.edit', compact('record'));
    }

    public function update(MenuRequest $request, $id) {  
        $menu = Menu::find($id);
        $menu = updateCheckbox($request, $menu, 'published');
         $input = $request->all();
        $rules = $request->rules();
        $messages = $request->messages;
        $this->validate($request, $rules, $messages);

        //$input['published'] = checkBox($request, $input, "published");
        $menu->update($input);
        Auth::user()->menu()->save($menu);
        return redirect('/admin/menus');
    }

    public function destroy($id) {
        $record = Menu::findOrFail($id);
        $record->delete();
       return redirect('/admin/menus');
    }

}
