@include('layouts.header')

<!-- main-content -->
<div class="main-content">
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Add a Type</h3>
            </div>

            <!-- New TV Type Form -->
            <div class="wg-box">
                <form id="addtypeForm" class="form-new-product form-style-1" method="POST" action="{{ route('tv-types.store') }}">
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Oops! There were some errors:</strong>
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

                    <h5>Add New TV Type</h5>
                    <div class="text-tiny">Do not exceed 20 characters when entering the Type name.</div>

                    <fieldset class="name">
                        <div class="body-title mb-10">Type Name <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="text" placeholder="Enter Type Name" name="name" value="{{ old('name') }}" required>
                    </fieldset>


                    <div class="bot d-flex justify-content-center">
                        <button class="tf-button w208" type="submit">Save</button>
                    </div>
                </form>
            </div>
            <!-- /New TV Type Form -->
        </div>
    </div>
</div>

@include('layouts.footer')