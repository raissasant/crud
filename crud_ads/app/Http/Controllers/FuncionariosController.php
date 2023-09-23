<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Funcionarios;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class FuncionariosController extends Controller
{
    public function index()
    {
        $total = DB::table('funcionarios')->count();
        $Funcionarios = DB::table('funcionarios')->orderBy('nome', 'asc')->get();
        $Funcionarios = json_decode($Funcionarios, true);

        return view(
            'Funcionarios.index',
            ['funcionarios' => $Funcionarios]
        );
    }


    public function create()
    {
        return view("funcionarios.create");
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nome' => 'required|max:50|min:2',
            'email' => 'email:rfc,dns'

        ]);

        //dd($request->all());
        Funcionarios::create([
            'nome' => $request->nome,
            'idade' => $request->idade,
            'email' => $request->email
        ]);
        return redirect('/funcionarios')->with('success', 'Funcionario salvo com sucesso');
    }

    public function edit($id)
    {
        $funcionarios = Funcionarios::find($id);
       // dd($funcionarios);

        return view('funcionarios.edit', ['funcionarios' => $funcionarios]);
    
        
    }


    public function update(Request $request)
    {

        $Funcionarios = Funcionarios::find($request->id);

        $Funcionarios->update([
            'nome' => $request->nome,
            'idade' => $request->idade,
            'email' => $request->email
        ]);
        return redirect('/funcionarios')->with('success', 'Funcionario Alterado com sucesso');
    }
    public function destroy($id)
    {

        $funcionarios = Funcionarios::find($id);

        $funcionarios->delete();
        return redirect('/funcionarios');
    }
}
