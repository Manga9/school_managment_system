<div>
    @if(!empty($successMsg))
        <div class="alert alert-success">
            {{$successMsg}}
        </div>
        <br>
    @endif
    @if($errorMsg)
        <div class="alert alert-danger">
            {{$errorMsg}}
        </div>
        <br>
    @endif

     @if($showTable)
         @include('livewire.parents.parents_table')
    @else
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button"
                       class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</a>
                    <p>{{ trans('parents.step_1') }}</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button"
                       class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</a>
                    <p>{{ trans('parents.step_2') }}</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-3" type="button"
                       class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}"
                       disabled="disabled">3</a>
                    <p>{{ trans('parents.step_3') }}</p>
                </div>
            </div>
        </div>
        @include('livewire.parents.addFatherForm')
        @include('livewire.parents.addMotherForm')
        @include('livewire.parents.confirmForm')
    @endif
</div>




