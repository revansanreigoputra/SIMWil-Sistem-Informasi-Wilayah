@props([
    'id',
    'title' => 'Yakin hapus item ini?',
    'description' => 'Aksi ini tidak bisa dikembalikan.',
    'route',
    'item' => '',
])

<div class="modal fade" id="{{ $id }}" tabindex="-1">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <button type="button" class="m-3 btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-status bg-danger"></div>
            <div class="py-4 text-center modal-body">
                <svg xmlns="http://www.w3.org/2000/svg" class="mb-2 icon text-danger icon-lg"
                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 9v2m0 4v.01" />
                    <path
                        d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" />
                </svg>
                <h3>{{ $title }}</h3>
                <div class="text-secondary">
                    {{ $description }}
                    @if ($item)
                        <br><strong>{{ $item }}</strong>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <div class="w-100">
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn w-100" data-bs-dismiss="modal">
                                Batal
                            </button>
                        </div>
                        <div class="col">
                            <form action="{{ $route }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger w-100">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
