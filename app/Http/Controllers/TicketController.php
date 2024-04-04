<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Models\Ticket;
use App\Models\User;
use App\Notifications\TicketStatus;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    protected $ticket;
    public function __construct(Ticket $ticket){

        $this->ticket = $ticket;

    }
    public function ticketList(){

        if(auth()->user()->role == 'user'){

            $tickets = $this->ticket::where([['user_id', Auth::id()],['status','open']])->get();
        }
        else {

            $tickets = $this->ticket::with('user:id,name')->get();
        }

        return view('tickets.list',['tickets'=>$tickets]);
    }


    public function createTicket(){

        return view('tickets.create');

    }

     /**
     * Stored a newly created ticket.
     */
    public function storeTicket(StoreTicketRequest $request) : RedirectResponse
    {
        $request['user_id'] = Auth::id();
        $this->ticket::create($request->except('_token'));
        return redirect()->route('tickets')
                ->withSuccess('New ticket is added successfully.');

    }

    public function ticketView($id){

        $ticket = $this->ticket::find($id);
        return view('tickets.view',['ticket'=>$ticket]);
    }


    public function sendResponse(Request $request) : RedirectResponse 
    {
        $this->ticket::where('id',$request->ticketId)->update(['status' => 'closed']);

        $userId = $this->ticket::find($request->ticketId)->value('user_id');

        $user = User::find($userId);
  
        $messages["name"] = "Hi, ".ucfirst($user->name);
        $messages["remarks"] = "This ticket ".$request->ticketId." has been closed, kindly check it ".$request->remarks;
          
        $user->notify(new TicketStatus($messages));

        return redirect()->route('tickets');

    }
    
}
