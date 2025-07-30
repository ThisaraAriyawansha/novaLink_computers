@include('layouts.header')

<!-- main-content -->
<div class="main-content">
    <!-- main-content-wrap -->
    <div class="main-content-inner">
        <!-- main-content-wrap -->
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>User Profile</h3>
            </div>

            <!-- new-category -->
            <div class="wg-box">
                <form id="UpdateUser" class="form-new-product form-style-1" method="POST" enctype="multipart/form-data" action="{{ route('updateProfile') }}">
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Oops! There were some errors with your submission:</strong>
                            <ul class="mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success! </strong> {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error! </strong> {{ session('error') }}
                        </div>
                    @endif

                    <fieldset class="name">
                        <div class="body-title mb-10">Email <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="email" name="email" value="{{ old('email', $user->email) }}" required placeholder="Enter your email">
                    </fieldset>

                    <fieldset class="value">
                        <div class="body-title mb-10">Password <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="password" name="password" placeholder="New Password (leave empty if unchanged)">
                    </fieldset>

                    <fieldset class="value">
                        <div class="body-title mb-10">Confirm Password <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="password" name="password_confirmation" placeholder="Confirm your password">
                    </fieldset>

                    <div class="bot">
                        <div></div>
                        <button class="tf-button w208" type="submit">Save</button>
                    </div>
                </form>
            </div>
            <!-- /new-category -->
        </div>
        <!-- /main-content-wrap -->
    </div>
</div>

@include('layouts.footer')
