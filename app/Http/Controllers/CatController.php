<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\users;
use App\comms;
use App\prods;
use App\zakazis;
use App\components;
use App\info_zak;
use App\shifts;
use Illuminate\Support\Arr;

class CatController extends Controller
{       
    public function del(Request $request,$id)
    {
        $name=info_zak::where('created_at','=',$id)->first();
        $name->delete();
        return redirect('/admin');
    }

    public function page(Request $request){
        $user = users::where('login','=',$request->session()->get('user'))->get();
        return view('page',['user' => $user]);
    }
    
    public function reg()
    {
        return view('reg');
    }

    public function view_shifts()
    {
        $all = shifts::all();
        return view('shifts',['all' => $all]);
    }

    public function appr($id)
    {
        $find = shifts::find($id);
        $alphab = "abcdefghiklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ";
        $numbrs = "1234567890!@#$%&";
        $login = "";
        $pass = "";
        for($i=0; $i < 5; $i++){
            $index = rand(0,strlen($alphab)-1);
            $login .= $alphab[$index];
        }

        for($i=0; $i < 3; $i++){
            $index = rand(0,strlen($numbrs)-1);
            $login .= $numbrs[$index];
        }

        for($i=0; $i < 5; $i++){
            $index = rand(0,strlen($alphab)-1);
            $pass .= $alphab[$index];
        }

        for($i=0; $i < 3; $i++){
            $index = rand(0,strlen($numbrs)-1);
            $pass .= $numbrs[$index];
        }


        $hash_login = password_hash($login,PASSWORD_DEFAULT);
        $hash_pass = password_hash($pass,PASSWORD_DEFAULT);

        $den_1 = new users;
        $den_1->name=$find['name'];
        $den_1->surn=$find['surn'];
        $den_1->patron=$find['patron'];
        $den_1->tel=$find['tel'];
        $den_1->email=$find['email'];
        $den_1->login=$login;
        $den_1->pass=$hash_pass;
        $den_1->addr=$find['addr'];
        $den_1->status='Доставщик';

        $den_1->save();
        echo '<script>alert("Сотрудник зарегистрирован!")</script>';
        

        $mess = $find['surn']." ".$find['name']." ".$find['patron'].", мы заинтересованы в вашей кандидатуре на вакансию 'Доставщик'. Перезвоните нам на наш номер: +7 (950) 175 72 33.
Логин и пароль для входа :".$login." ".$pass;
        mail($find['email'], 'Работа', $mess, 'From: culinaryoasis@culinaryoasis.ru');

        $find->delete();

        return redirect('/view_shifts');
        
    }

    public function deny($id)
    {
        $find = shifts::find($id);
        $mess = $find['surn']." ".$find['name']." ".$find['patron'].", мы внимательно изучили вашу заявку, но , к сожалению, не можем принять вас на работу.";
        mail($find['email'], 'Работа', $mess, 'From: culinaryoasis@mail.ru');

        $find->delete();

        return redirect('/view_shifts');
    }

    public function about()
    {
        $comms = prods::orderby('id','desc')->take(5)->get();
        return view('ab_us',['comms' => $comms]);
    }

    public function res(Request $request)
    {
        $login=request()->input('login');
        $user = users::where('login','=',$login)->first();
        $pass=request()->input('pass');
        $re_pass=request()->input('re_pass');
        $email=request()->input('email');
        $name=request()->input('name');
        $surn=request()->input('surn');
        $patron=request()->input('patron');
        $tel=request()->input('tel');
        $addr=request()->input('addr');
        
        if(empty($user)){
            if($pass == $re_pass){

                $randomNumber = rand(1, 100);
                $randomNumber .= rand(1, 100);
                $randomNumber .= rand(1, 100);
                $randomNumber .= rand(1, 100);
                mail($email, 'Подтверждение аккаунта', 'Код подтверждения:'.$randomNumber, 'From: culinaryoasis@mail.ru');
                echo '<script>alert("На указанную почту отправлено письмо с подтвеждением пароля");</script>';
                return view('check',['name' => $name, 'surn' => $surn, 'patron' => $patron, 'tel' => $tel, 'email' => $email, 'login' => $login, 'pass' => $pass, 'addr' => $addr,'cod' => $randomNumber]);
            }else{echo '<script>alert("Ошибка подтверждения пароля")</script>';}
        }else {echo '<script>alert("Данный пользователь уже зарегестрирован!")</script>';}
        return view('reg');
    }

    public function auth()
    {
        return view('auth');
    }

    public function send(Request $request)
    {   
        //Код, введенный пользователем
        $code = $request->input('code');
        //Код, который сгенерировался
        $cod = $request->input('cod');

        $name=request()->input('name');
        $surn=request()->input('surn');
        $patron=request()->input('patron');
        $tel=request()->input('tel');
        $email=request()->input('email');
        $login=request()->input('login');
        $pass=request()->input('pass');
        $addr=request()->input('addr');

        if($code == $cod){
        $hash = password_hash($pass,PASSWORD_DEFAULT);

        $den_1 = new users;
                $den_1->name=$name;
                $den_1->surn=$surn;
                $den_1->patron=$patron;
                $den_1->tel=$tel;
                $den_1->email=$email;
                $den_1->login=$login;
                $den_1->pass=$hash;
                $den_1->addr=$addr;
                $den_1->status='Пользователь';

                $den_1->save();
                echo '<script>alert("Вы успешно зарегистрировались!")</script>';
                return view('auth');
        }else{echo '<script>alert("Ошбика подтвеждения электронной почты!")</script>';
        return view('reg');}
    }

    public function k_h()
    {
        $pr = prods::where('type','=','Кофе и чай')->get();
        return view('cat',['prods' => $pr]);
    }

    public function des()
    {
        $pr = prods::where('type','=','Десерт')->get();
        return view('cat',['prods' => $pr]);
    }

    public function hot()
    {
        $pr = prods::where('type','=','Горячее')->get();
        return view('cat',['prods' => $pr]);
    }

    public function sup()
    {
        $pr = prods::where('type','=','Суп')->get();
        return view('cat',['prods' => $pr]);
    }

    public function id($id)
    {
        $pr = prods::find($id);
        return view('card',['prods' => $pr]);
    }

    public function fish()
    {
        $pr = prods::where('type','=','Рыба')->get();
        return view('cat',['prods' => $pr]);
    }

    public function rolls()
    {
        $pr = prods::where('type','=','Роллы')->get();
        return view('cat',['prods' => $pr]);
    }

    public function shift()
    {
        return view('shift');
    }
    
    public function shift_obr(Request $request)
    {
        $name= $request->input('name');
        $surn= $request->input('surn');
        $patron= $request->input('patron');
        $tel= $request->input('tel');
        $email= $request->input('email');
        $birth= $request->input('birth');
        $exp= $request->input('exp');
        $addr= $request->input('addr');
        $zp= $request->input('zp');
        
        //Год рождения
        $year = substr($birth,0,4);

        //Нынешний год
        $now = date('Y');
        
        //Разница
        $diff = $now - $year;

        if($diff < 18){echo '<script>alert("Вам должно быть полных 18 лет!")</script>';}else{
        $new = new shifts;
        $new->name=$name;
        $new->surn=$surn;
        $new->patron=$patron;
        $new->tel=$tel;
        $new->email=$email;
        $new->birth=$birth;
        $new->exp=$exp;
        $new->addr=$addr;
        $new->zp=$zp;

        $new->save();
        echo '<script>alert("Вы успешно подали заявку на вакансию "Доставщик" ")</script>';
        return redirect('/reg');
        }
        
    }

    public function bread()
    {
        $pr = prods::where('type','=','Хлеб')->get();
        return view('cat',['prods' => $pr]);
    }


    public function cat()
    {
        $prods = prods::orderby('id','asc')->get();
        return view('cat',['prods' => $prods]);
    }

    public function red_prod($id)
    {
        $find = prods::find($id);
        return view('red_prod',['prods' => $find]);
    }

    public function rem_prod($id)
    {
        $prods = prods::find($id);
        $prods->delete();
        return redirect('/cat');
    }

    public function red_prod_res(Request $request)
    {
        $name = $request->input('name');
        $find = prods::where('name','=', $name)->first();
        $upak_mass = $request->input('upak_mass');
        $upak_price = $request->input('upak_price');
        $type = $request->input('type');
        $img = $request->input('img');
        $descr = $request->input('descr');

        $find->name=$name;
        $find->upak_mass=$upak_mass;
        $find->upak_price=$upak_price;
        $find->type=$type;
        $find->img=$img;
        $find->descr=$descr;
        $find->save();

        return redirect('/cat');
    }

    public function inpt(Request $request)
    {
        $login=request()->input('login');
        $pass=request()->input('pass');

        $user = users::where('login','=',$login)->first();

        $verify_pass = password_verify($pass,$user['pass']);

        if ($login == 'admin' and $pass == 'admin123'){

            $request->session()->put('admin','true');
            return redirect()->action([CatController::class, 'about']);
        }else{
        if($verify_pass){

            if($user['status'] == 'Пользователь'){

            $request->session()->put('user',$login);
            $request->session()->put('name',$user['name']);
            $request->session()->put('addr',$user['addr']);
            $request->session()->put('tel',$user['tel']);
            $request->session()->put('role',$user['status']);
            return redirect()->action([CatController::class, 'about']);
            }else if($user['status'] == 'Доставщик'){
            $request->session()->put('user',$login);
            $request->session()->put('name',$user['name']);
            $request->session()->put('addr',$user['addr']);
            $request->session()->put('tel',$user['tel']);
            $request->session()->put('role',$user['status']);
            return redirect()->action([CatController::class, 'about']);
            }
        }else {echo '<script>alert("Данного пользователя не существует!")</script>';}

        return view('auth');
        
        }
    }

    public function clean(Request $request)
    {
        $request->session()->forget('mass');
        return redirect()->action([CatController::class,'cat']);
    }
    
    public function ses(Request $request){
        $name = $request->input('user.quan');
        dump($name);
        return view('cor');
    }


    public function cor()
    {
        $all = array_count_values(session()->get('arr'));

        return view('cor',['all' => $all]);
    }

    public function zaki(Request $request)
    {
        $hist = zakazis::all()->where('name','=',session()->get('user'));

        $mas = [];
        $or = [];
        
        foreach($hist as $item){
            $or[] = explode(',',$item['zak']);
        }

        foreach($or as $item){
            $mas[] = array_count_values($item);
        }


        return view('zaki',['hist' => $mas,'info' => $hist]);
    }

    public function add(Request $request,$id)
    {
        $name=prods::find($id);
        $request->session()->push('mass',$name['name']);
    }


    public function mass(Request $request)
    {
        $mass = session()->get('mass');
        $idk = session()->get('double');
        
        //Суммирование количества
        if(!empty($request->session()->get('mass'))){
        $all = array_count_values($mass);

        $count = 0;
        $co = 0;
        foreach($all as $item => $value){
            $cost = prods::where('name','=',$item)->first();
            $count += $cost['upak_price'] * $value;
            $co += $value;
        }

        $zak = [];
        foreach($all as $item => $value){
            $zak[] = "Продукт: $item. Количество: $value.".';';
        }

        $pak = [];
        foreach($mass as $item){
            $cost = prods::where('name','=',$item)->first();
            $pak[] = $cost['id'];
        }

        $stoim = [];
        foreach($all as $item => $value){
            $money = prods::where('name','=',$item)->first();
            $stoim[$item] = $money['upak_price'];
        }

        
        $img = [];
        foreach($all as $item => $value){
            $carta = prods::where('name','=',$item)->first();
            $img[$item] = $carta['img'];
        }

        $imp = implode(",",$zak);

        $ks = implode(",",$pak);

        $request->session()->put('sum',$count);

        $request->session()->put('zak',$imp);

        $request->session()->put('pak',$ks);
        //Вывод корзины
        $request->session()->put('count',$co);

        return view('cor',['all' => $all,'itog' => $count,'stoim' => $stoim, 'img' => $img, 'count' => $co]);
        }else{return view('cor');}

    }

    public function del_mass(Request $request, $key){
        $arr = $request->session()->get('mass');

        foreach($arr as $item => $value){
            if($value == $key)
            unset($arr[$item]);
        }

        
        $request->session()->forget('mass');
        
        $request->session()->put('mass',$arr);
        return redirect()->action([CatController::class,'mass']);
    }

    public function ch(Request $request)
    {
        if($request->session()->get('count') > 14){echo '<script>alert("Превышено количество позиций возможных для доставки");</script>';
        return redirect()->action([CatController::class,'mass']);}else{
        $zak = new zakazis;
        $zak->name=session()->get('user');
        $zak->zak=session()->get('pak');
        $zak->status="Новый";
        $zak->save();

        $info_zak = new info_zak;
        $info_zak->addr=session()->get('addr');
        $info_zak->id_orig=session()->get('user');
        $info_zak->numbr=session()->get('tel');
        $info_zak->summ=session()->get('sum');
        $info_zak->zak=session()->get('zak');
        $info_zak->save();

        $request->session()->forget('mass');
        return redirect()->action([CatController::class,'cat']);
        }
    }

    public function exit(Request $request)
    {
        $request->session()->forget('user');
        $request->session()->forget('name');
        $request->session()->forget('addr');
        $request->session()->forget('tel');
        $request->session()->forget('admin');
        $request->session()->forget('mass');
        $request->session()->forget('role');
        return view('auth');
    }

    public function obr()
    {
        $zaki = info_zak::where('status','=','Новый')->get();
        $or = [];
        
        foreach($zaki as $item){
            $or[] = explode(',',$item['zak']);
        }


        return view('obr',['zaki' => $zaki,'hist' => $or]);
    }

    public function admin(Request $request)
    {
        return view('admin');
    }

    public function add_eat()
    {
        return view('add');
    }

    public function main_inf(Request $request)
    {
        $name = request()->input('name');
        $upak_mass = request()->input('upak_price');
        $upak_price = request()->input('upak_price');
        $type = request()->input('type');
        $img = request()->input('img');
        $descr = request()->input('descr');
        $quan = request()->input('quan');


        $prod = new prods;
        $prod->name=$name;
        $prod->upak_price=$upak_price;
        $prod->upak_mass=$upak_mass;
        $prod->type=$type;
        $prod->img=$img;
        $prod->descr=$descr;
        $prod->save();

        $fnd = prods::where('name','=',$name)->first();

        for($i = 1; $i < $quan; $i++){
            $protein=request()->input('Белки'.$i); 
            $fats=request()->input('Жиры'.$i);
            $carbs=request()->input('Углеводы'.$i);
            $kkal=request()->input('К-калории'.$i);
            $name=request()->input('Название'.$i); 
            $mass=request()->input('Масса'.$i);

            $new = new components;
            $new->prods_id=$fnd['id'];
            $new->fats=$fats;
            $new->protein=$protein;
            $new->carbs=$carbs;
            $new->kkal=$kkal;
            $new->name=$name;
            $new->mass=$mass;

            $new->save();
        }
        return redirect('/admin');
    }

    public function confirm(Request $request)
    {
        $name=$request->input('name');
        $surn=$request->input('surn');
        $tel=$request->input('tel');
        $email=$request->input('email');
        $login=$request->input('login');
        $pass=$request->input('pass');
        $addr=$request->input('addr');

        $find=users::where('login','=',$login)->first();
        $find->name=$name;
        $find->surn=$surn;
        $find->tel=$tel;
        $find->email=$email;
        $find->login=$login;
        $find->pass=$pass;
        $find->addr=$addr;
        $find->save();
        return redirect('/page');
    }

    public function red_lk(Request $request,$user)
    {
        $find = users::where('login','=',$user)->first();
        return view('red_lk',['user' => $find]);
    }

    public function stat(Request $request,$id)
    {
        $post_zaki = zakazis::where('created_at','=',$id)->first();
        $post_admin = info_zak::where('created_at','=',$id)->first();

        $post_zaki->status = 'Подтвержден';
        $post_admin->dlvr = $request->session()->get('user');
        $post_admin->status = 'Подтвержден';

        $post_admin->save();
        $post_zaki->save();
	
        return redirect('/orders');
    }

    public function otm(Request $request,$id)
    {
        $post = zakazis::find($id);
	    $post->status = 'Отменен';
	
	    $post->save();

        return redirect()->action([CatController::class,'admin']);
    }

    public function pers_zaki()
    {
        return view('pers_lk');
    }

    public function gets($id)
    {
        $find_info_zak = info_zak::where('created_at','=',$id)->first();
        $find_zaki = zakazis::where('created_at','=',$id)->first();

        $find_info_zak->status="Доставлен";
        $find_zaki->status="Доставлен";

        $find_info_zak->save();
        $find_zaki->save();
        return redirect('/orders');
    }

    public function orders()
    {
        $zaki = info_zak::where('status','!=','Доставлен')->get();
        $or = [];
        
        foreach($zaki as $item){
            $or[] = explode(',',$item['zak']);
        }

        return view('orders',['zaki' => $zaki,'hist' => $or]);
    }
}
