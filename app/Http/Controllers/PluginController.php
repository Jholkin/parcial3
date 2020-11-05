<?php

namespace App\Http\Controllers;
use Symfony\Component\Process\Process;
use App\Models\Plugin;
use App\Models\Venta;
use Illuminate\Http\Request;

class PluginController extends Controller
{
    public function index()
    {
        $value = json_decode(file_get_contents("https://api.cambio.today/v1/quotes/EUR/PEN/json?quantity=2&key=5235|zA4mrWtCr*f33HFpdF7b~cHLv^*3rrsW"));
        //$value = \file_get_contents("https://api.cambio.today/v1/full/EUR/json?key=5235|zA4mrWtCr*f33HFpdF7b~cHLv^*3rrsW");
        
dd($value->result->value);
        // $git_url = "https://github.com/Jholkin/Calculator.git";
        // $url_name = preg_split("/\//",$git_url)[4];
        // //dd($parts_url);
        // $name_module = preg_split("/\./",$url_name)[0];
        // //dd($name_module);
        // $path_plugin_add = base_path() . "/Modules" . "/" . $name_module;
        // $a = require($path_plugin_add . '/Config/config.php');
        // dd($a);
        return view("home");
    }

    public function ventas()
    {
        $ventas = Venta::all();
        return view("ventas.index", ['ventas' => $ventas]);
    }

    public function convert($id)
    {
        $v = Venta::where('id',$id)->get();
        //$ve = $v[0];
        $price = $v[0]->price_total;
        //dd($price);
        $venta = new Venta();
        $price = $venta->convert($v[0]);
        //dd($ve->id);
        //dd($price);
        return view("ventas.venta", ['venta' => $v[0], 'new_price' => $price]);
    }

    public function insert()
    {
        return view("plugins.insert");
    }

    public function save(Request $request)
    {
        $r = $request->all();
        $url = $r['url'];
        $properties = register($url);

        $plugin = Plugin::create([
            'name' => $properties['name'],
            'description' => $properties['description'],
            'author' => $properties['author'],
            'version' => $properties['version'],
            'status' => 0,
            'last_added' => 1
        ]);

        return redirect('/modules', ['properties_plugin' => $properties]);
    }
    
    public function modules()
    {
        $path = base_path() . "/Modules";
        $modules = list_dirs($path);
        //dd($modules);
        $plugins = [];
        foreach ($modules as $module) {
            $plugin = Plugin::where('name',$module)->get();
            array_push($plugins, $plugin);
        }

        return view("plugins.list", ["plugins" => $plugins]);
    }

    public function delete(Request $request, $module)
    {
        $path = base_path() . "/Modules" . "/" . $module;
        return delete_dir($path) ? redirect('/modules') : "Ha ocurrido un error al eliminar el módulo";
    }
}
