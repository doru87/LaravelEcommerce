@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="profile-wrapper d-flex justify-content-center align-items-center">
            <div class="col-8 profile border border-primary text-white ">        
                <form action="{{route('profile')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row"> 
                        <div class="col-md-12 mb-3">
                          @if (strpos($file, 'bootdey') !== false)
                          <div class="col-md-3 mb-3">
                            <img style="width:150px" src="{{$file}}" alt="">
                        </div>
                          @else
                          <div class="col-md-3 mb-3">
                            <img style="width:150px" src="/storage/profile_images/{{$email}}/{{$file}}" alt="">
                        </div>
                          @endif
                           
                            <div class="col-md-9 mb-3">
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" name="image_profile" class="custom-file-input" id="inputGroupFile02">
                                        <label class="custom-file-label border border-primary" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">{{$file}}</label>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                          <label for="validationTooltip01">First name</label>
                          <input type="text" name="firstname" class="form-control border border-primary" id="validationTooltip01" value="{{$firstname}}" required>
                          <div class="valid-tooltip">
                            Looks good!
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="validationTooltip02">Last name</label>
                          <input type="text" name="lastname" class="form-control border border-primary" id="validationTooltip02" value="{{$lastname}}" required>
                          <div class="valid-tooltip">
                            Looks good!
                          </div>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="col-md-6 mb-3">
                          <label for="validationTooltip03">City</label>
                          <input type="text" name="city" class="form-control border border-primary" id="validationTooltip03" value="{{$city}}" required>
                          <div class="valid-tooltip">
                            Looks good!
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="validationTooltip04">Country</label>
                          <input type="text" name="country" class="form-control border border-primary" id="validationTooltip04" value="{{$country}}" required>
                          <div class="valid-tooltip">
                            Looks good!
                          </div>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="col-md-9 mb-3">
                          <label for="validationTooltip05">Email Address</label>
                          <input type="text" name="email" class="form-control border border-primary" id="validationTooltip05" value="{{$email}}" required>
                          <div class="valid-tooltip">
                            Looks good!
                          </div>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="col-md-6 mb-3">
                          <label for="validationTooltip06">Current Password</label>
                          <input type="password" name="current_password" class="form-control border border-primary" id="validationTooltip06" value="" >
                          <div class="valid-tooltip">
                            Looks good!
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="validationTooltip07">New Password</label>
                          <input type="password" name="new_password" class="form-control border border-primary" id="validationTooltip07" value="" >
                          <div class="valid-tooltip">
                            Looks good!
                          </div>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="validationTooltip08">Address</label>
                            <input type="text" name="address" class="form-control border border-primary" id="validationTooltip08" value="{{$address}}" required>
                            <div class="invalid-tooltip">
                              Please provide a valid adress.
                            </div>
                          </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Change</button>
                </form>
            </div>
        </div>
    </div>
@endsection