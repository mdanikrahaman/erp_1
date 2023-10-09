<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{ __('Add Room Amenity') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="ajaxForm" class="modal-form"
                    action="{{ route('user.rooms_management.store_amenity', ['language' => request()->input('language')]) }}"
                    method="post">
                    @csrf
                    <div class="form-group">
                        <label for="language">{{   __('Language') }} **</label>
                        <select id="language" name="user_language_id" class="form-control">
                            <option value="" selected disabled>
                                {{  __('Select a language') }}</option>
                            @foreach ($langs as $lang)
                                <option value="{{ $lang->id }}" {{ $language->id == $lang->id ? 'selected' : '' }}>
                                    {{ $lang->name }}</option>
                            @endforeach
                        </select>
                        <p id="erruser_language_id" class="mb-0 text-danger em"></p>
                    </div>
                    <div class="form-group">
                        <label for="">{{   __('Ammenity Name') . '*' }}</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Ammenity Name">
                        <p id="errname" class="mt-1 mb-0 text-danger em"></p>
                    </div>

                    <div class="form-group">
                        <label
                            for="">{{  __('Ammenity Serial Number') . '*' }}</label>
                        <input type="number" class="form-control " name="serial_number"
                            placeholder="{{   __('Enter Ammenity Serial Number') }}">
                        <p id="errserial_number" class="mt-1 mb-0 text-danger em"></p>
                        <p class="text-warning mt-2">
                            <small>{{ __('The higher the serial number is, the later the ammenity will be shown.') }}</small>
                        </p>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    {{   __('Close') }}
                </button>
                <button id="submitBtn" type="button" class="btn btn-primary">
                    {{   __('Save') }}
                </button>
            </div>
        </div>
    </div>
</div>
