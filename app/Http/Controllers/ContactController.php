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
       //  $validatedData = $request->validate([
       //     'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
   
       //    ]);
   
       //    $name1 = $request->file('image')->getClientOriginalName();
   
       //    $path = $request->file('image')->store('public/images');
   
  
       $contact = new Contact1;

        $contact->name = $request->name;
        $contact->email = $request->email;
       //  $contact->name1 = $name1;
       //  $contact->path = $path;
 
          // $contact->image=$studentImg;
           

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
        
        

        // $input = $request->all();
        // Contact::create($input);
        // return redirect('contact')->with('flash_message', 'Contact Addedd!');  
    }


    // public function show( $id){
        
      
    //   $contact = Contact::find($id);
    //   return view('contacts.show')->with('contacts', $contact);
    //  }

     public function editstudent($id)
     {
         $contact = Contact::find($id);
         return view('contacts.editstudent')->with('editstudent', ['editstudent' => $contact]);
     }
        //return redirect('contact')->with('flash_message', 'Contact Addedd!');  
   
   


        // $validatedData = $request->validate([
        //     'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
    
        //    ]);
    
        //    $name = $request->file('image')->getClientOriginalName();
    
        //    $path = $request->file('image')->store('public/images');
    
    
        //    $save = new Contact;
    
        //    $save->name = $name;
        //    $save->address = $address;
        //    $save->mobile = $mobile;
        //    //$save->image = $image;
        //    $save->state = $state;
        //    $save->district = $district;
        //    $save->save();
          // return redirect('contact')->with('flash_message', 'Contact Addedd!');
         //return redirect('contact')->with('status', 'Image Has been uploaded')->with('image',$imageName);
    
   
        // $noticeFile = $request->file('file');
        // $fileThumbEx = $noticeFile->getClientOriginalExtension();
        // $fileNoticeNewname = 'T'.time().'.'.$fileThumbEx;

        // $filePath = Storage::disk('Notice_folder')->put($fileNoticeNewname,'Contents');
        // $filePath = Storage::disk('Notice_folder')->url($filePath);

        // $saveNoticeData = new Notice;

        // $saveNoticeData->name  = $request->name;
        // $saveNoticeData->address = $request->address;
        // $saveNoticeData->mobile  = $mobile;
        // $saveNoticeData->photo = $request->photo;

        // $saveNoticeData->save();

        //return redirect()->route('noticeboard'); 

        // return redirect('Contact')->with('flash_message', 'Contact Addedd!'); 
   
   
        // $uniqueFileName = uniqid() . $request->get('upload_file')->getClientOriginalName() . '.' . $request->get('upload_file')->getClientOriginalExtension();

        // $request->get('upload_file')->move(public_path('files') . $uniqueFileName);
     //dd($request);
        //return redirect()->back()->with('success', 'File uploaded successfully.');
  //  return redirect('Contact')->with('flash_message', 'Contact Addedd!'); 
   
    
 
    
    // public function show($id)
    // {
    //     $contacts = Contact::find($id);
    //     return view('contacts.show')->with('show',$contacts);
    // }
 
    
   
    
    
 
  
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