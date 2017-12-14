<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Contact;

class ClientController extends Controller
{
  public function __construct()	{
    // User Must Be Logged in
    $this->middleware('auth');
  }

  public function index() {
    $clients = Client::active()->get();
    $inactive = Client::inactive()->get();
    return view('client.index', compact('clients', 'inactive'));
  }
  public function create() {
    return view('client.create');
  }

  public function show() {
    return view('client.show');
  }

  public function store() {
    $client = Client::create([
      'client' => request('client'),
      'short' => request('short'),
      'address' => request('address'),
      'city' => request('city'),
      'state' => request('state'),
      'zipcode' => request('zipcode'),
      'phone' => request('phone'),
      'contract' => request('contract'),
  ]);

  if (request('contact_name')) {
    $count = request('contact_name');
    $name = request('contact_name');
    $phone = request('contact_phone');
    $email = request('contact_email');

    for ($i=0; $i < count($count); $i++) {
      $contact = Contact::create([
        "name" => $name[$i],
        "phone" => $phone[$i],
        "email" => $email[$i]
      ]);
      $client->contacts()->attach($contact);

    }
  }
    return redirect('client');
  }
}
