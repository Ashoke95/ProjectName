<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\models\Contact;
use App\models\Contact1;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Photo;
use Mail;


class ContactController extends Controller
{
    


    public function index()
    {
        $contacts = Contact::all();
      return view ('contacts.index')->with('contacts', $contacts);
    }
 

    public function index1() { 

        return view('contact-us'); 
      } 

    

      public function save(Request $request) { 
 
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
           //  'image' => 'file|max:25000|mimes:jpeg,bmp,png',
            'subject' => 'required',
            'phone_number' => 'required',
            'message' => 'required'
        ]);
      
  
       $contact = new Contact1;

        $contact->name = $request->name;
        $contact->email = $request->email;
      
           

        $contact->subject = $request->subject;
        $contact->phone_number = $request->phone_number;
        $contact->message = $request->message;
       
          

        $contact->save();
        \Mail::send('contact_email',
        array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'phone_number' => $request->get('phone_number'),
            'user_message' => $request->get('message'),
        ), function($message) use ($request)
          {
             $message->from($request->email);
             $message->to('ashoke.flamingostech@gmail.com');
          });
       
        
        return redirect('contact')->with('success', 'Thank you for contact us!');

    }


    public function create()
    {
        return view('contacts.create');

    }
 
  
    public function store(Request $request)
    {
        $input = $request->all();
        Contact::create($input);

        return redirect('contact')->with('flash_message', 'Contact Addedd!');  
        
        

          
    }


    

     public function editstudent($id)
     {
         $contact = Contact::find($id);
         return view('contacts.editstudent')->with('editstudent', ['editstudent' => $contact]);
     }
        
        
     
    
   
    
    
 
  
    public function updatestudent(Request $request)
    {

        $updateData= new Contact;

        $updateData=Contact::find($request->id);
        $updateData->name=$request->name;
        $updateData->address=$request->address;
        $updateData->mobile=$request->mobile;
        $updateData->state=$request->state;
        $updateData->district=$request->district;
        $updateData->save();

        return redirect('contact')->with('flash_message', 'Contact updated successfully!'); 
        
    }
 
  
    public function deletestudent($id)
    {
        $data=Contact::find($id);
        $data->delete();
        return redirect('contact'); 
    }
  }