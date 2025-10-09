@extends('app.app')
@push('style')
    <link href="{{asset('bo/css/select2.min.css')}}" rel="stylesheet" />
@endpush
@section('content')
    <div class="container-fluid">
        <div class="col-md-6 card mt-4">
            <div class="card-body">
                <div class="card-body table-responsive">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h5 class="card-title fw-semibold mb-4">{{ $data['form_status'] }}Sub Kriteria</h5>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('sub-criteria.store') }}">
                        @csrf

                        <div class="mb-3-select">
                            <label class="form-label">Nama Kriteria</label>
                            <div class="input-group">
                                <select name="criteria_id" id="criteria_id" class="form-control select2">
                                    <option value="" disabled selected>Pilih Kriteria</option>
                                    @isset($data['criteria'])
                                        @foreach ($data['criteria'] as $criteria)
                                            <option value="{{ encrypt($criteria->id) }}"
                                                @isset($datas)
                                                    {{ $criteria->id == $datas['criteria'] ? 'selected' : '' }}
                                                    @endisset>
                                                {{ $criteria->name }}</option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Sub Kriteria</label>
                            <input type="text" name="name" class="form-control" placeholder="Nama Sub Kriteria"
                                id="name" aria-describedby="nameHelp"
                                value="{{ isset($data['record']) ? $data['record']['name'] : '' }}">
                        </div>

                        <input type="hidden" name="id" class="form-control"
                            value="{{ isset($data['record']) ? encrypt($data['record']['id']) : '' }}">

                        <label for="weight" class="form-label">Bobot (0–5)</label>
<div class="input-group mb-3">
    <input type="number" id="weight" name="weight" class="form-control"
        min="0" max="5" step="1"
        placeholder="Masukkan nilai 0–5"
        aria-label="weight"
        aria-describedby="basic-addon1"
        value="{{ isset($data['record']) ? $data['record']['weight'] / 20 : '' }}">
    <span class="input-group-text" id="basic-addon1"></span>
</div>

                        <button class="float-end btn btn-primary mt-3 mb-0">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('bo/js/custom.min.js') }}"></script>
    <script src="{{ asset('bo/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });

        // Validasi agar tidak di luar 0–5
        function handleChange(input) {
            if (input.value < 0) input.value = 0;
            if (input.value > 5) input.value = 5;
        }
    </script>
@endpush

