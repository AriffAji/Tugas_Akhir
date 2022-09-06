@extends('layouts/indexmaster')
@section('judul_halaman', 'Profile')

@section('konten')

    <section class="section">
        <div class="section-body">
            <h2 class="section-title">Hi, {{ auth()->user()->username }}!</h2>
            <p class="section-lead">
                Change information about yourself on this page.
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-5">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <img alt="image" src="../assets/img/avatar/avatar-1.png"
                                class="rounded-circle profile-widget-picture">
                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label"></div>
                                    <div class="profile-widget-item-value"></div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label"></div>
                                    <div class="profile-widget-item-value"></div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label"></div>
                                    <div class="profile-widget-item-value"></div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name">{{ auth()->user()->username }}<div
                                    class="text-muted d-inline font-weight-normal">
                                    <div class="slash"></div>
                                    @if (auth()->user()->role_id == '1')
                                        Mahasiswa
                                    @endif
                                    @if (auth()->user()->role_id == '2')
                                        Sekertaris Direktur
                                    @endif
                                    @if (auth()->user()->role_id == '3')
                                        Dosen
                                    @endif
                                    @if (auth()->user()->role_id == '4')
                                        Admin
                                    @endif
                                    @if (auth()->user()->role_id == '5')
                                        SuperAdmin
                                    @endif
                                </div>
                            </div>
                            {{-- Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a
                            fictional character but an original hero in my family, a hero for his children and for his wife.
                            So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John
                                Doe'</b>. --}}
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec bibendum dapibus nunc bibendum
                            ornare. Duis fringilla ex quis eros fermentum egestas. Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit. Donec et aliquet erat, nec accumsan sem. Donec vitae vulputate sapien, id
                            blandit enim. Phasellus sed leo sollicitudin, consequat turpis eget, tempor ipsum. Integer
                            tempus odio lectus, ac semper mauris auctor.
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form method="post" class="needs-validation" novalidate="">
                            <div class="card-header">
                                <h4>Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-7 col-12">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" value="{{ auth()->user()->username }}"
                                            required="">
                                        <div class="invalid-feedback">
                                            Please fill in the first name
                                        </div>
                                    </div>
                                    <div class="form-group col-md-5 col-12">
                                        <label>NIM/NIK</label>
                                        <input type="text" class="form-control" value="{{ auth()->user()->nim }}"
                                            required="">
                                        <div class="invalid-feedback">
                                            Please fill in the last name
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-7 col-12">
                                        <label>Email</label>
                                        <input type="email" class="form-control" value="{{ auth()->user()->email }}"
                                            required="">
                                        <div class="invalid-feedback">
                                            Please fill in the email
                                        </div>
                                    </div>
                                    <div class="form-group col-md-5 col-12">
                                        <label>Phone</label>
                                        <input type="tel" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Bio</label>
                                        <textarea class="form-control summernote-simple" style="height: 200px">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec bibendum dapibus nunc bibendum ornare. Duis fringilla ex quis eros fermentum egestas. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec et aliquet erat, nec accumsan sem. Donec vitae vulputate sapien, id blandit enim. Phasellus sed leo sollicitudin, consequat turpis eget, tempor ipsum. Integer tempus odio lectus, ac semper mauris auctor.</textarea>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="card-footer text-right">
                                <button class="btn btn-primary">Save Changes</button>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection

@push('JSLib')
    <script src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
@endpush

@push('JSFile')
    <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
@endpush

@push('page-styles')
    <script rel="stylesheet" src="{{ asset('assets/modules/datatables/datatables.min.js') }}"></script>
    <script rel="stylesheet"
        src="{{ asset('assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}"></script>
    <script rel="stylesheet" src="{{ asset('assets/modules/datatables/select-1.2.4/css/select.bootstrap4.min.css') }}">
    </script>
@endpush
