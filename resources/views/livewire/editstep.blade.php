<div>
    <div class="py-4">
        <div class=" d-flex justify-content-around">
            <h3>Create Steps</h3>
            <span class="fas fa-plus pt-2" style="cursor: pointer;" wire:click="add"></span>
        </div>
        {{--        {{dd($steps)}}--}}
        @foreach($steps as $step)
            <div class="d-flex justify-content-center" wire:key="{{$loop->index}}">
                <input type="text" name="step[]" class="mt-4"
                       placeholder="{{'Describe Steps '}}" value="@isset($step['name']){{$step['name']}}@endisset">
                <span class="fas fa-times p-1 pt-4" style="cursor: pointer;"
                      wire:click="remove({{$loop->index}})"></span>
            </div>
        @endforeach
    </div>
</div>
