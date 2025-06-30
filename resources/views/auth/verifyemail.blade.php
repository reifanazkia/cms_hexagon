@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow rounded">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Verifikasi Email</h4>
                </div>

                <div class="card-body">
                    @if (session('status') == 'verification-link-sent')
                        <div class="alert alert-success mb-3">
                            Link verifikasi baru telah dikirim ke email Anda.
                        </div>
                    @endif

                    <p>
                        Terima kasih telah mendaftar! Sebelum memulai, silakan verifikasi email Anda dengan mengklik tautan yang baru saja kami kirim.
                        Jika Anda tidak menerima email tersebut, kami akan dengan senang hati mengirimkannya lagi.
                    </p>

                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <div class="d-grid gap-2 mt-3">
                            <button type="submit" class="btn btn-primary">
                                Kirim Ulang Email Verifikasi
                            </button>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('logout') }}" class="mt-3">
                        @csrf
                        <button type="submit" class="btn btn-link text-danger w-100 text-center">
                            Keluar
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
