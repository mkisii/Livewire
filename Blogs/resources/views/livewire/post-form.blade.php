<div>
    <div>
        {{-- Care about people's approval and you will be their prisoner. --}}
        <H1>Livewire</H1>
        <label> Title</label>
        <input   wire:model ="title" type="title" class="form-control"/>
    
        <label>Description</label>
        <textarea wire:model="description" class="form-control"></textarea>
    
        <br>
        <button wire:click ="save" class="btn btn-primary">Save</button>
        <div>
    </div>
    
</div>
