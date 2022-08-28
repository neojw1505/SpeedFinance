@foreach($uploaded as $checklists)
<label class="font-weight-bold" for='{{$checklists->checklist_id}}'>{{$checklists->checklists->name}}</label><br>
<div class="text-center">
    @foreach($checklists->files as $file)
    <div class="d-flex justify-content-center">
        <span class="pr-3">{{$file->name}}</span>
        <div>
            <a class="btn btn-light btn-rounded mr-1" target="_blank" href="{{route('viewFile', $file)}}"><i class="i-Download-from-Cloud">
                </i></a>
        </div>
        <div>
            @if($application->status == 'new')
            <form method="POST" action="{{route('deleteFile', $file)}}">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger btn-rounded del-btn mb-3">
                    {{ __('Delete') }}
                </button>
            </form>
            @endif
        </div>
        <br>
        <div class="pb-3"></div>
    </div>
    @endforeach
</div>
@endforeach