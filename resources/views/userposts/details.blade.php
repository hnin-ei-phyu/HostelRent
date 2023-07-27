@extends('layouts.admin')

@section('contents')

<div class="container">
    <div class="d-flex justify-content-center">
        <div class="col-lg-6 p-4"> 
                <div class="card border-top border-bottom border-3" style="border-color: #808080 !important;">
                        <div class="card-body p-4">

                            <h1><span class="mb-5" style="color: #1e3f66;">Finding Hostel Post Details! </span></h1>

                            <div class="row my-4">
                            <div class="col-md-12 col-lg-12">
                                <p class="mb-0"><strong> User Name  :  {{$userpost[0]->username}}</strong></p>
                                </div>
                            </div>

                            <div class="row my-4">
                            <div class="col-md-12 col-lg-12">
                                <p class="mb-0"><strong> User Email  :  {{$userpost[0]->useremail}}</strong></p>
                                </div>
                            </div>
                           
                            <div class="row my-4">
                            <div class="col-md-12 col-lg-12">
                                <p class="mb-0"><strong> User ID  :  {{$userpost[0]->tenant_id}}</strong></p>
                                </div>
                            </div>

                            <div class="row my-4">
                            <div class="col-md-12 col-lg-12">
                                <p class="mb-0"><strong> Category  : {{$userpost[0]->category}}</strong></p>
                                </div>
                            </div>

                            <div class="row my-4">
                            <div class="col-md-12 col-lg-12">
                                <p class="mb-0"><strong> Room Type  : {{$userpost[0]->room_type}}</strong></p>
                                </div>
                            </div>

                            <div class="row my-4">
                            <div class="col-md-12 col-lg-12">
                                <p class="mb-0"><strong> Location  : {{$userpost[0]->location}}</strong></p>
                                </div>
                            </div>

                            <div class="row my-4">
                            <div class="col-md-12 col-lg-12">
                                <p class="mb-0"><strong> Affordable Price  : {{$userpost[0]->price}}</strong></p>
                                </div>
                            </div>

                            <div class="row my-4">
                            <div class="col-md-12 col-lg-12">
                                <p class="mb-0"><strong> Posted Date  : {{$userpost[0]->post_date}}</strong></p>
                                </div>
                            </div>

                            <div class="row my-4">
                            <div class="col-md-12 col-lg-12">
                                <p class="mb-0"><strong> Phone Number  : {{$userpost[0]->phone}}</strong></p>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-end">
                                <button style="border-radius: 5px;"><a href="/send-email-pdf/{{$userpost[0]->id}}">
                                    Sent Post Success Email
                                </a></button>
                            </div>         
                           
                            
                        </div>
                </div>
        </div>
    </div>
</div>

@endsection('contents')
