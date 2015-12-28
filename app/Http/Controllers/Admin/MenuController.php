<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Menu;
use App\Http\Requests\MenuCreateRequest;
use App\Http\Requests\MenuUpdateRequest;

class MenuController extends Controller
{
    protected $fields = [
        'menu' => '',
        'title' => '',
        'parent_id' => 0,
        'status' => 1,
        'icon' => '',
        'order' => '',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::where('parent_id','=',0)->orderBy('order','asc')->get();
        foreach ($menus as &$value) {
            $value['child_list'] = Menu::where('parent_id','=',$value['id'])->orderBy('order','asc')->get();
        }
        return view('admin.menu.index')->with('menus',$menus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        foreach ($this->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }
        $parent_list = Menu::where('parent_id','=',0)->orderBy('order','asc')->select('id','title')->get();
        return view('admin.menu.create', $data)->with('parent_list',$parent_list);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuCreateRequest $request)
    {
        $menu = new Menu();
        foreach (array_keys($this->fields) as $field) {
            $menu->$field = $request->get($field);
        }
        $menu->save();
        return redirect('/admin/menu')
                        ->withSuccess("The menu '$menu->menu' was created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $data = ['id' => $id];
        foreach (array_keys($this->fields) as $field) {
            $data[$field] = old($field, $menu->$field);
        }
        $parent_list = Menu::where('parent_id','=',0)->where('id','!=',$id)->orderBy('order','asc')->select('id','title')->get();

        return view('admin.menu.edit', $data)->with('parent_list',$parent_list);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MenuUpdateRequest $request, $id)
    {
        $menu = Menu::findOrFail($id);

        foreach (array_keys(array_except($this->fields, ['menu'])) as $field) {
            $menu->$field = $request->get($field);
        }
        $menu->save();

        return redirect("/admin/menu/$id/edit")->withSuccess("Changes saved.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
