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
    public function create( User $user)

    {
        //dd($user->name);
        return view('auth.register',compact('user'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request )
   
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

//dd($this->gerarTokenUnico());

        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'email' => $request->email,
            'vc_tipo_utilizador'=>$request->vc_tipo_utilizador,
            'password' => Hash::make($request->password),
            'vc_path' => "imagens/user.png",
            'convite'=> $this->gerarTokenUnico(),
            
          
        ]);
        $id=$user->id;

        if($user->vc_tipo_utilizador == 3){
            User::where('id',$id)->update([
                'estado'=>'pedente'
     
             ]);

        }
        if($user->vc_tipo_utilizador == 6){
            User::where('id',$id)->update([
                'link'=>"/register$user->convite"

         ]);
        }
    
      
     if($request->convite){
        
        User::where('id',$id)->update([
            'codigo_convite'=>$request->convite,
 
         ]);
         $user2 = User::where('convite',$request->convite)->first();
         $novos_pontos = $user2->pontos + 0.5;
         User::where('convite',$request->convite)->update([
            'pontos'=>$novos_pontos,
 
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
        $destino=$req_bi->move(public_path("pdf/user/bi"), $bi_name);
        $dir = "pdf/user/bi";
        $caminho_bi=$dir. "/". $bi_name;
        $id=$user->id;
        User::where('id',$id)->update([
                'bi'=>$caminho_bi
         ]);
        }

            if($request->hasFile('carta') && $req->file('carta')->isValid()){
                // Imagem Hablitacôes
            $req_carta=$request->carta;
            $extension=$req_carta->extension();
            $carta_name=md5($req_carta->getClientOriginalName() . strtotime('now')) . "." . $extension;
            $destino=$req_carta->move(public_path("pdf/user/carta"), $carta_name);
            $dir = "pdf/user/carta";
            $caminho_carta=$dir. "/". $carta_name;
            $id=$user->id;
            User::where('id',$id)->update([
                    'carta'=>$caminho_carta
             ]);
            
        }

        if($request->hasFile('registro_criminal') && $req->file('registro_criminal')->isValid()){
            // Imagem Hablitacôes
        $req_carta=$request->carta;
        $extension=$req_carta->extension();
        $carta_name=md5($req_carta->getClientOriginalName() . strtotime('now')) . "." . $extension;
        $destino=$req_carta->move(public_path("pdf/user/registro_criminal"), $carta_name);
        $dir = "pdf/user/registro_criminal";
        $caminho_carta=$dir. "/". $carta_name;
        $id=$user->id;
        User::where('id',$id)->update([
                'registro_criminal'=>$caminho_carta
         ]);
        
    }
       

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME)->with('cadastrada',1);

    
    }

    public function gerarTokenUnico()
    {
        $token = Str::random(20); // Gera uma string aleatória de 32 caracteres
    
        // Verifica se o token já existe no banco de dados
        while (User::where('convite', $token)->exists()) {
            $token = Str::random(20); // Gera um novo token
        }
    
        return $token;
    }
 
}
