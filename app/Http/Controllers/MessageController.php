<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MessageModel;
use App\Models\UserModel;
use Pusher\Pusher;
use DB;

class MessageController extends Controller
{
    public function index(){

        //current user info
        $current_user_id = session('current_user_id');
        $current_user=UserModel::find($current_user_id);

        // $receiver_messages=MessageModel::where('receiver_id',$current_user_id)->get();
        // $sender_people=$receiver_messages->unique('sender_id');

        // $sender_messages=MessageModel::where('sender_id',$current_user_id)->get();
        // $received_people=$sender_messages->unique('receiver_id');

        // $all_people=collect();

        // foreach($sender_people as $sender_person){
        //     $all_people->push($sender_person->sender_id);
        // }

        // foreach($received_people as $received_person){
        //         $all_people->push($received_person->receiver_id);
        // }

        // $all_people=$all_people->unique();

        $all_people = DB::select("select users.id, users.username, users.imgfile_path, users.first_name,users.last_name, count(is_read) as unread 
        from users JOIN  messages ON users.id = messages.sender_id 
        where messages.receiver_id = '.$current_user_id.'
        
        UNION
        
        select users.id, users.username, users.imgfile_path, users.first_name,users.last_name, count(is_read) as unread 
        from users JOIN  messages ON users.id = messages.receiver_id 
        where messages.sender_id = '.$current_user_id.' 
        group by users.id  ");

        return view('chat',['all_people' => $all_people,'current_user_id' => $current_user_id,'current_user'=>$current_user]);
    }

    public function show_message($user_id){
        //current user info
        $current_user_id = session('current_user_id');

        $user=UserModel::find($user_id);

        MessageModel::where(['sender_id'=>$user_id,'receiver_id'=>$current_user_id])->update(['is_read'=>1]);

        $messages = MessageModel::where(function ($query) use ($user_id, $current_user_id) {
            $query->where('sender_id',$current_user_id)->where('receiver_id',$user_id);
        })->orWhere(function ($query) use ($user_id, $current_user_id) {
            $query->where('sender_id',$user_id)->where('receiver_id',$current_user_id);
        })->get();

        return view('partials.chat_body',['messages' => $messages,'user'=>$user,'current_user_id' => $current_user_id,'user_id'=>$user_id]);
    }

    public function send_message(Request $request){

        //current user info
        $current_user_id = session('current_user_id');
        $user_id=$request->receiver_id;
        $message = $request -> message;

        $data = new MessageModel();
        $data->sender_id = $current_user_id;
        $data->receiver_id = $user_id;
        $data->message = $message;
        $data->is_read = 0; // message will be unread when sending message
        $data->save();

        // $message=MessageModel::create([
        //     "message" => $message,
        //     "sender_id" => $current_user_id,
        //     "receiver_id" => $user_id,
        //     "is_read" => 0
        // ]);

        $options = array (
            'cluster' => 'eu',
            'useTLS' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data = ['sender_id' => $current_user_id, 'receiver_id' => $user_id];
        $pusher->trigger('my-channel','my-event',$data);

    }
}
