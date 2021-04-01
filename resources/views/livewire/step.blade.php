<div>
    <div class="py-4">
        <div class=" d-flex justify-content-around">
            <h3>Create Steps</h3>
            <span class="fas fa-plus pt-2" style="cursor: pointer;" wire:click="add"></span>
        </div>
        @foreach($steps as $step)
        <div class="d-flex justify-content-center" wire:key="{{$step}}">
            <input type="text" name="step[]" class="mt-4" placeholder="{{'Describe Steps '.($step +1)}}" value="{{$step['name']}}">
            <span class="fas fa-times p-1 pt-4" style="cursor: pointer;" wire:click="remove({{$step}})"></span>
        </div>
        @endforeach
    </div>
</div>
