<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, User $userafiliado )
   
    {
         
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ],
        [
            'name.required'=>'O campo é obrigatório',
            'name.max'=>'O limite do campo é 255'
        ]
    );



        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'email' => $request->email,
            'vc_tipo_utilizador'=>$request->vc_tipo_utilizador,
            'password' => Hash::make($request->password),
            'vc_path' => "imagens/user.png",
            'convite'=>$this->gerarTokenUnico(),
            
          
        ]);


        $id=$user->id;

        if($user->vc_tipo_utilizador == 6){
            User::where('id',$id)->update([
                'link'=>"/convite/$user->convite"

         ]);
        }
        if($request->iban){
           
            User::where('id',$id)->update([
                'iban'=>$request->iban
         ]);

        

        }
      
        if($request->hasFile('bi') && $request->file('bi')->isValid()){
            // Imagem Hablitacôes
        $req_bi=$request->bi;
        $extension=$req_bi->extension();
        $bi_name=md5($req_bi->getClientOriginalName() . strtotime('now')) . "." . $extension;
        $destino=$req_bi->move(public_path("imagens/bi"), $bi_name);
        $dir = "imagens/bi";
        $caminho_bi=$dir. "/". $bi_name;
        $id=$user->id;
        User::where('id',$id)->update([
                'bi'=>$caminho_bi
         ]);
        }

            if($request->hasFile('habilitacoes') && $req->file('habilitacoes')->isValid()){
                // Imagem Hablitacôes
            $req_habilitacoes=$request->habilitacoes;
            $extension=$req_habilitacoes->extension();
            $habilitacoes_name=md5($req_habilitacoes->getClientOriginalName() . strtotime('now')) . "." . $extension;
            $destino=$req_habilitacoes->move(public_path("imagens/habilitacoes"), $habilitacoes_name);
            $dir = "imagens/habilitacoes";
            $caminho_habilitacoes=$dir. "/". $habilitacoes_name;
            $id=$user->id;
            User::where('id',$id)->update([
                    'habilitacoes'=>$caminho_habilitacoes
             ]);
            
        }
       

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME)->with('cadastrada',1);

    
    }

    public function gerarTokenUnico()
    {
        $token = Str::random(20); // Gera uma string aleatória de 20 caracteres
    
        // Verifica se o token já existe no banco de dados
        while (User::where('convite', $token)->exists()) {
            $token = Str::random(20); // Gera um novo token
        }
    
        return $token;
    }
 
}
