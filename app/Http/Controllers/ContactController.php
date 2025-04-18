<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Validator;
use App\Models\FormSubmission;
use Jenssegers\Agent\Agent;
use Stevebauman\Location\Facades\Location;

class ContactController extends Controller
{
    public function index(){
        return view("pages.contact");
    }


    public function send(Request $request){

       
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'regex:/^[A-Za-zČčĆćŽžŠšĐđ\s]{2,50}$/'],
            'email' => ['required', 'regex:/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/'],
            'phone' => ['required', 'regex:/^\d{5,12}$/'],
            'company_name' => ['nullable', 'regex:/^[A-Za-zČčĆćŽžŠšĐđ\s]{0,100}$/'],
            'website' => ['nullable', 'regex:/^(https?:\/\/)?([\w\d\-]+\.)+\w{2,}(\/.*)?$|^$/'],
            'interest' => ['required', 'regex:/^(Branding|Web Design|App Design|Other|Hire me)$/'],
            'budget_range' => ['required', 'regex:/^(< 10k|10k - 30k|30k - 50k|50k - 70k|> 70k)$/'],
            'exact_budget' => ['nullable', 'regex:/^.{0,100}$/'],
            'timeline' => ['nullable', 'regex:/^.{0,255}$/'],
            'message' => ['required', 'regex:/^.{1,2000}$/'],
        ]);

        
        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json([
                    'errors' => $validator->errors()
                ], 422); // 422 Unprocessable Entity
            }
        
            return redirect()->back()
                ->withErrors($validator)
                ->with('error', 'true');
        }

        // Get client information
        $agent = new Agent();
        $ip = $request->ip();
        $location = Location::get($ip);
        
        // Check if the request is from a bot
        $isBot = $agent->isRobot();

        
        $formData = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company_name' => $request->company_name,
            'website' => $request->website,
            'interest' => $request->interest,
            'budget_range' => $request->budget_range,
            'exact_budget' => $request->exact_budget,
            'timeline' => $request->timeline,
            'message' => $request->message,



            // Security data
            'ip_address' => $ip,
            'user_agent' => $request->userAgent(),
            'country' => $location ? $location->countryName : null,
            'city' => $location ? $location->cityName : null,
            'device_type' => $agent->device(),
            'browser' => $agent->browser(),
            'operating_system' => $agent->platform(),
            'is_bot' => $isBot,
        ];

        FormSubmission::create($formData);

        Mail::to('branislav03@gmail.com')->send(new SendMail($formData));

        // Redirect with success message
        return redirect()->back()->with('success', 'Thank you for your message! We will get back to you soon.');


    }
}
