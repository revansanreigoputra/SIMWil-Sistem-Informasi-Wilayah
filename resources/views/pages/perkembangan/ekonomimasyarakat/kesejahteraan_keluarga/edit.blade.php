@extends('layouts.master')

@section('title', 'Edit Kesejahteraan Keluarga')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Edit Data Kesejahteraan Keluarga</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('perkembangan.ekonomimasyarakat.kesejahteraan_keluarga.update', $item->id) }}" method="POST" id="form-edit-keluarga">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-12 mb-3">
                    <label for="tanggal" class="form-label required">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ old('tanggal', $item->tanggal) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="prasejahtera" class="form-label required">Prasejahtera</label>
                    <input type="number" name="prasejahtera" id="prasejahtera" class="form-control" value="{{ old('prasejahtera', $item->prasejahtera) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="sejahtera1" class="form-label required">Sejahtera 1</label>
                    <input type="number" name="sejahtera1" id="sejahtera1" class="form-control" value="{{ old('sejahtera1', $item->sejahtera1) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="sejahtera2" class="form-label required">Sejahtera 2</label>
                    <input type="number" name="sejahtera2" id="sejahtera2" class="form-control" value="{{ old('sejahtera2', $item->sejahtera2) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="sejahtera3" class="form-label required">Sejahtera 3</label>
                    <input type="number" name="sejahtera3" id="sejahtera3" class="form-control" value="{{ old('sejahtera3', $item->sejahtera3) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="sejahteraplus" class="form-label required">Sejahtera Plus</label>
                    <input type="number" name="sejahteraplus" id="sejahteraplus" class="form-control" value="{{ old('sejahteraplus', $item->sejahteraplus) }}" required>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-3 flex-wrap">
                <a href="{{ route('perkembangan.ekonomimasyarakat.kesejahteraan_keluarga.index') }}" class="btn btn-secondary me-2 mb-2">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="button" class="btn btn-warning me-2 mb-2" onclick="resetToOriginal()">
                    <i class="fas fa-undo"></i> Reset ke Data Asli
                </button>
                <button type="submit" class="btn btn-primary mb-2">
                    <i class="fas fa-save"></i> Update Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('addon-script')
<script>
$(document).ready(function() {
    const originalValues = {
        tanggal: "{{ $item->tanggal }}",
        prasejahtera: "{{ $item->prasejahtera }}",
        sejahtera1: "{{ $item->sejahtera1 }}",
        sejahtera2: "{{ $item->sejahtera2 }}",
        sejahtera3: "{{ $item->sejahtera3 }}",
        sejahteraplus: "{{ $item->sejahteraplus }}"
    };

    // Form validation
    $('#form-edit-keluarga').on('submit', function(e) {
        let isValid = true;
        $(this).find('[required]').each(function() {
            if (!$(this).val()) {
                $(this).addClass('is-invalid');
                isValid = false;
            } else {
                $(this).removeClass('is-invalid');
            }
        });
        if (!isValid) e.preventDefault();
    });

    // Remove invalid class on input
    $('input').on('input change', function() {
        if ($(this).val()) $(this).removeClass('is-invalid');
    });

    // Highlight changed fields
    $('input').on('change', function() {
        const fieldName = $(this).attr('name');
        const currentValue = $(this).val();
        if (originalValues[fieldName] != currentValue) {
            $(this).addClass('border-warning');
            $(this).closest('.mb-3').find('label').addClass('text-warning font-weight-bold');
        } else {
            $(this).removeClass('border-warning');
            $(this).closest('.mb-3').find('label').removeClass('text-warning font-weight-bold');
        }
    });
});

function resetToOriginal() {
    const originalValues = {
        tanggal: "{{ $item->tanggal }}",
        prasejahtera: "{{ $item->prasejahtera }}",
        sejahtera1: "{{ $item->sejahtera1 }}",
        sejahtera2: "{{ $item->sejahtera2 }}",
        sejahtera3: "{{ $item->sejahtera3 }}",
        sejahteraplus: "{{ $item->sejahteraplus }}"
    };
    Object.keys(originalValues).forEach(key => {
        $(`[name="${key}"]`).val(originalValues[key]).trigger('change');
    });
    $('input').removeClass('border-warning');
    $('.mb-3 label').removeClass('text-warning font-weight-bold');
}
</script>
@endpush

@push('addon-style')
<style>
.required::after {
    content: " *";
    color: red;
    font-weight: bold;
}
.form-label {
    font-weight: 600;
    margin-bottom: 0.5rem;
}
.card {
    box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
    border: none;
}
.border-warning {
    border-color: #ffc107 !important;
    box-shadow: 0 0 0 0.2rem rgba(255,193,7,.25);
}
.text-warning.font-weight-bold {
    color: #e0a800 !important;
}
</style>
@endpush
