<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*$resources = [
            ['id' => 1, 'name' => 'category'],
            ['id' => 2, 'name' => 'product'],
            ['id' => 4, 'name' => 'color']
        ];
        $request->session()->put('resources', $resources);*/
        //$request->session()->forget('resources');
        //$request->session()->flush();
        $resources = [];
        if($request->session()->exists('resources')) {
            $resources = $request->session()->get('resources');
        }
        $enterprise = 'Resources Ltd.';
        $data = [];
        $data['resources'] = $resources;
        $data['enterprise'] = $enterprise;
        if($request->session()->exists('message')) {
            $data['message'] = $request->session()->get('message');
            if($request->session()->exists('type')) {
                $data['type'] = $request->session()->get('type');
            }
        }
        return view('resource.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $enterprise = 'Resources Ltd.';
        $data = [];
        $data['enterprise'] = $enterprise;
        return view('resource.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        //validación
        $id = $request->input('id');
        $name = $request->input('name');
        $resources = [];
        if($request->session()->exists('resources')) {
            $resources = $request->session()->get('resources');
        }
        $resource = ['id' => $id, 'name' => $name];
        if(isset($resources[$id])) {
            return back()->withInput();
        } else {
            $resources[$id] = $resource;
        }
        $request->session()->put('resources', $resources);
        return redirect('resource')->with('message', 'Se ha insertado el elemento correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if($request->session()->exists('resources') && isset($request->session()->get('resources')[$id])) {
            $resource = $request->session()->get('resources')[$id];
            $data = [];
            $data['resource'] = $resource;
            $data['enterprise'] = 'Resources Ltd.';
            return view('resource.show', $data);
        }
        return redirect('resource');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if($request->session()->exists('resources') && isset($request->session()->get('resources')[$id])) {
            $resource = $request->session()->get('resources')[$id];
            $data = [];
            $data['resource'] = $resource;
            $data['enterprise'] = 'Resources Ltd.';
            return view('resource.edit', $data);
            //return view('resource.edit', ['resource' => $resource]);
        } else {
            return abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idOriginal)
    {
        if($request->session()->exists('resources')) {
            $resources = $request->session()->get('resources');
            $id = $request->input('id');
            $name = $request->input('name');
            if(isset($resources[$idOriginal])) {
                if(isset($resources[$id]) && $idOriginal != $id) {
                    return back()->withInput();
                }
                $resource['id'] = $id;
                $resource['name'] = $name;
                unset($resources[$idOriginal]);
                $resources[$id] = $resource;
                $request->session()->put('resources', $resources);
                return redirect('resource')->with('message', 'Se ha editado el elemento correctamente.');
            }
        }
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $message = 'No se ha borrado el elemento correctamente.';
        $type = 'danger';
        if($request->session()->exists('resources')) {
            $resources = $request->session()->get('resources');
            if(isset($resources[$id])) {
                unset($resources[$id]);
                $request->session()->put('resources', $resources);
                $message = 'Se ha borrado el elemento correctamente.';
                $type = 'success';
            }
        }
        $data = [];
        $data['message'] = $message;
        $data['type'] = $type;
        return redirect('resource')->with($data);
    }
}
