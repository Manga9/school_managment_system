<div @if ($currentStep != 3) style="display: none" @endif class="row setup-content" id="step-3">
    <div class="col-xs-12">
        <div class="col-md-12"><br><br> <br>

            <label>{{trans('main.attachFile')}}</label>
            <div class="form-group">
                <input type="file" wire:model="photos" accept="image/*" multiple>
            </div>
            <input type="hidden" wire:model="parentt_id">

            @if($updateMode)
                <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="submitForm_edit"
                        type="button">{{ trans('main.finish') }}</button>
            @else
                <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="submitForm"
                        type="button">{{ trans('main.finish') }}</button>
            @endif

            <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button" style="margin-right: 10px"
            wire:click="back(2)">{{ trans('main.back') }}</button>
        </div>
    </div>
</div>
