@extends('layouts.app')

@section('title', 'Edit Profile | x/' . Auth::user()->username )

@section('content')

@once
    <script src={{ asset('js/validate_form.js') }} defer></script>
@endonce

<main class="container-xl">
    <nav aria-label="breadcrumb" class="p-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item clickable"><a class="text-decoration-none text-muted" href="/user/{{Auth::user()->username}}">Profile</a></li>
            <li class="breadcrumb-item active text-white" aria-current="page">Edit Profile</li>
        </ol>
    </nav>
    <section class="p-3">
        <div class="row justify-content-start">
            <h5 class="col-auto text-white">
                @if(Auth::user()->is_partner)
                    <i class="fas fa-check"></i>
                @endif
                x/johndoe
            </h5>
        </div>

        <div class="row justify-content-start text-white align-items-end mb-3">
            <div class="col-auto">
                @if(!empty(Auth::user()->photo))
                    <img src={{ asset('storage/img/users/' . Auth::user()->photo) }} class="card-img-top" alt="{{ Auth::user()->username }}" style="width: 10rem;">
                @else
                    <img src={{ asset('img/user.png') }} class="card-img-top" alt="user image" style="width: 10rem;">
                @endif
            </div>
            <div class="col-auto">
                <h6 class="text-muted">Reputation</h6>
                <h2>{{Auth::user()->reputation}}</h2>

                <a href="edit_profile.php" class="col align-self-end btn btn-primary">Change Photo</a>
            </div>
        </div>
        
    </section>
    <section class="col-lg-8 col-md-9 col-sm-11">
        <form method="POST" action="" class="p-3 g-3 needs-validation" novalidate>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="inputUsername" placeholder="Username" value="{{Auth::user()->username}}" required>
                <label for="inputUsername">Username</label>
                <div class="invalid-feedback">
                    Username already in use.
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="inputEmail" placeholder="Email" value="{{Auth::user()->email}}" required>
                <label for="inputEmail" class="form-label">Email</label>
                <div class="invalid-feedback">
                    Email already in use or invalid format.
                </div>
            </div>
            <div class="row g-2">
                <div class="col-7 form-floating mb-3">
                    <input type="password" value="***********" disabled class="form-control" id="inputPassword" placeholder="Password" disabled>
                    <label for="inputPassword" class="form-label">Password</label>
                </div>
                <div class="col-5 form-floating mb-3">
                    <button type="button" class="btn btn-primary w-100 h-100" data-bs-toggle="modal" data-bs-target="#updatePassword">Change password</button>
                </div>
            </div>
            
            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="inputBirthDate" placeholder="Birth Date" value="{{Auth::user()->birthdate}}" required>
                <label for="inputBirthDate" class="form-label">Birth Date</label>
            </div>

            <div class="form-floating mb-3">
                    <select class="form-select bg-white" id="gender" aria-label="Gender" required>
                        <option></option>
                        <option @if(Auth::user()->gender == 'm') selected @endif value="0">Male</option>
                        <option @if(Auth::user()->gender == 'f') selected @endif value="1">Female</option>
                        <option @if(Auth::user()->gender == 'n') selected @endif value="2">Rather Not Say</option>
                    </select>
                    <label for="gender">Gender<label>
                    <div class="invalid-feedback">
                            Please select you gender.
                    </div>
            </div>

            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Leave a comment here" id="description" style="height: 100px">{{Auth::user()->description}}</textarea>
                <label for="description">Description (optional)</label>
            </div>

            <div class="form-floating mb-3">
                <button type="submit" class="btn btn-primary w-100">Save Changes</button>
            </div>
        </form>
        <form class="p-3 pt-3 g-3 needs-validation">
            @if(Auth::user()->is_partner)
                <div class="form-floating mb-3">
                    <button type="button" class="btn btn-outline-danger w-100" data-bs-toggle="modal" data-bs-target="#cancelPartnership">Cancel Partnership</button>
                </div>
            @else
            <div class="form-floating mb-3">
                <button type="button" class="btn btn-secondary w-100" data-bs-toggle="modal" data-bs-target="#askForPartner">Ask for Partner <i class="fas fa-check"></i></button>
            </div>
            @endif
            <div class="form-floating mb-3">
                <button type="button" class="btn btn-outline-danger w-100" data-bs-toggle="modal" data-bs-target="#deleteAccount">Delete Account</button>
            </div>
        </form>
    </section>
    
</main>

<div class="modal fade text-white" id="updatePassword" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog text-white">
        <div class="modal-content bg-light-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title text-white">Update Password</h5>
                <button type="button" class="btn-close btn-close-white " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/update_password" class="g-3">
                    <div class=" mb-3">
                        <label for="inputOldPassword">Old password*</label>
                        <input type="password" class="form-control" id="inputOldPassword" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputNewPassword" class="form-label">New password*</label>
                        <input type="password" class="form-control" id="inputNewPassword" required>
                    </div>
                    <div class="mb-3">
                        <label for="inputConfirmNewPassword" class="form-label">Confirm new password*</label>
                        <input type="password" class="form-control" id="inputConfirmNewPassword" required>
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade text-white" id="askForPartner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog text-white">
        <div class="modal-content bg-light-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="Report-modal-label">Ask for Partner</h5>
                <button type="button" class="btn-close btn-close-white " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <p>Please tell us why you should become a partner:</p>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="I should become a partner because..."></textarea>
                </div>
                </div>
                
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
                </form>
            </div>
        
        </div>
    </div>
</div>

<div class="modal fade text-white" id="deleteAccount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog text-white">
        <div class="modal-content bg-light-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="Report-modal-label">Delete Account</h5>
                <button type="button" class="btn-close btn-close-white " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <p>Do you wish to delete your account?</p>
                    <p class="small">Your profile will be deleted, but your posts will stay in our website.</p>
                </div>
                
                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal"  onclick="location.href='main.php'">Delete Account</button>
                </form>
            </div>
        
        </div>
    </div>
</div>

@endsection
