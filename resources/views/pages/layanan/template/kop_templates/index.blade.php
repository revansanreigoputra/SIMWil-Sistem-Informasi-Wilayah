@extends('layouts.master')

@section('title', 'Kop Surat')
      
@section('action')
  <a href="{{ route('kop_templates.create') }}" class="btn btn-primary ">
    <i class="bi bi-plus-circle me-2"></i> Tambah Kop    
  </a>  
@endsection

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle table-hover">
                    <thead class="table-light">
                        <tr class="text-center">
                            <th  >No</th> 
                            <th >Jenis Kop</th>
                            <th >Nama Kop</th>
                            <th >Logo</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kopTemplates as $kopTemplate)
                        <tr>
                            <td class="text-center fw-semibold">
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                <strong>{{ $kopTemplate->jenis_kop }}</strong><br>
                                
                            </td>
                            <td>{{ $kopTemplate->nama }}</td>
                            <td class="text-center">
                                @if($kopTemplate->logo)
                                    <img src="{{ asset('storage/' . $kopTemplate->logo) }}" 
                                         alt="Logo" 
                                         class="img-fluid rounded shadow-sm" 
                                         width="80">
                                @else
                                    <span class="text-muted">Tidak ada logo</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('kop_templates.edit', $kopTemplate->id) }}" 
                                   class="btn btn-sm btn-warning me-1">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="{{ route('kop_templates.destroy', $kopTemplate->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus data ini?')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection