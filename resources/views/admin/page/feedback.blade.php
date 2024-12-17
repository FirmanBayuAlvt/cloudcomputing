@extends('admin.layout.index')

@section('content')
<div class="container">
    <h1>Kritik dan Saran</h1>

    @if($feedbacks->isEmpty())
        <p>Tidak ada kritik dan saran yang diterima.</p>
    @else
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Pesan</th>
                    <th>Dikirim Pada</th>
                </tr>
            </thead>
            <tbody>
                @foreach($feedbacks as $feedback)
                    <tr>
                        <td>{{ $feedback->email }}</td>
                        <td>{{ $feedback->pesan }}</td>
                        <td>{{ $feedback->created_at->format('d-m-Y H:i') }}</td>
                    </tr>
                    <td>
        <form action="{{ route('admin.feedback.destroy', $feedback->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus feedback ini?')">
                Hapus
            </button>
        </form>
    </td>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection